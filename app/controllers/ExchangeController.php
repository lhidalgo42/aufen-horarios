<?php

use garethp\ews\API\ExchangeAutodiscover;
use garethp\ews\API\Exception\AutodiscoverFailed;
use garethp\ews\API;


class ExchangeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /exchange
	 *
	 * @return Response
	 */
	public function discover(){

        try {
            $username = 'lhidalgo@alumnos.uai.cl';
            $password = '4380.UoY';
            $api = ExchangeAutodiscover::getAPI($username,$password);

            $server = $api->getClient()->getServer();
            $version = $api->getClient()->getVersion();
            return json_encode(['server' => $server,'Version' => $version]);
        } catch (AutodiscoverFailed $exception) {
            //Autodiscover failed
        }
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /exchange/create
	 *
	 * @return Response
	 */
	public static function find()
    {
        $users = User::all();
        foreach ($users as $user) {
            $api = API::withUsernameAndPassword($user->server, $user->email, $user->password, [
                'version' => $user->version
            ]);
            $calendar = $api->getCalendar();
            $items = $calendar->getCalendarItems(date('Y-m-d'));
            foreach ($items->getItems()->toXmlObject()->CalendarItem as $item) {
                $schedules = Schedule::where('uid', $item->ItemId->Id)->get();
                if (count($schedules) == 0) {
                    $schedule = new Schedule();
                    $schedule->uid = $item->ItemId->Id;
                    $schedule->name = $item->LastModifiedName;
                    $schedule->subject = $item->Subject;
                    $schedule->start = Carbon\Carbon::parse($item->Start)->addHours(-3)->format('Y-m-d H:i:s');
                    $schedule->end = Carbon\Carbon::parse($item->End)->addHours(-3)->format('Y-m-d H:i:s');
                    $schedule->room = strtoupper($item->Location);
                    $schedule->save();
                    if (Room::where('name', $item->Location)->count() == 0) {
                        $room = new Room();
                        $room->name = $item->Location;
                        $room->save();
                    }
                }
                elseif (count($schedules) == 1){
                    $schedule = $schedules->first();
                    $schedule->name = $item->LastModifiedName;
                    $schedule->subject = $item->Subject;
                    $schedule->start = Carbon\Carbon::parse($item->Start)->addHours(-3)->format('Y-m-d H:i:s');
                    $schedule->end = Carbon\Carbon::parse($item->End)->addHours(-3)->format('Y-m-d H:i:s');
                    $schedule->room = strtoupper($item->Location);
                    $schedule->save();
                }
            }
        }
    }


}