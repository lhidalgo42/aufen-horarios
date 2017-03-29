<?php

use garethp\ews\API;
use garethp\ews\API\Enumeration;

class RoomsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /rooms
	 *
	 * @return Response
	 */
	public function index()
	{
        $server = 'outlook.office365.com';
        $username = 'lhidalgo@alumnos.uai.cl';
        $password = '4380.UoY';
        $api = API::withUsernameAndPassword($server,$username,$password);
        $calendar = $api->getCalendar();
//Get all items from midday today
        $items = $calendar->getCalendarItems('12:00 PM');
//Get all items from 8 AM to 9 AM today
        $start = new DateTime('8:00 AM');
        $end = new DateTime('9:00 AM');
        $items = $calendar->getCalendarItems($start, $end);
//Get a list of items in a Date Range
        $items = $calendar->getCalendarItems('01-03-2017', '29-03-2017');
        return $items;
	}

	public function get($room)
	{
        $date = date('Y-m-d');
        $room = Room::where('name','like',$room)->get()->first();
		$schedules = Schedule::where('end','like',$date.'%')->where('start','like',$date.'%')->where('room_id',$room->id)->get();
        return View::make('pages.room')->with(compact('schedules'));
	}

}