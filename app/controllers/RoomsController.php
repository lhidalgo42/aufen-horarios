<?php

use garethp\ews\API;
use garethp\ews\API\Enumeration;

class RoomsController extends \BaseController {

	public function get($room)
    {
        ExchangeController::find();
        $room = strtoupper($room);
        $schedules = Schedule::where('start', '>=', date('Y-m-d 08:00:00'))->where('end', '<=', date('Y-m-d 18:00:00'))->where('room', $room)->get();
        $events = [];
        foreach ($schedules as $schedule) {
            $events[] = Calendar::event(
                $schedule->name,
                false,
                new DateTime($schedule->start),
                new DateTime($schedule->end)
            );
        }

        $calendar = Calendar::addEvents($events)
            ->setOptions([
            'firstDay' => 1,
            'nowIndicator' => true,
            'defaultView' => 'agendaDay',
            'allDaySlot' => false,
            'minTime' => '08:00:00',
            'maxTime' => '20:00:00',
            'header' => [
                'left' => '',
                'center' => 'title',
                'right' => ''
            ]
        ]);

        return View::make('pages.room')->with(compact('calendar'));
    }

}