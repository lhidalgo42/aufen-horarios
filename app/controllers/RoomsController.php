<?php

use garethp\ews\API;
use garethp\ews\API\Enumeration;

class RoomsController extends \BaseController {

	public function get($room)
    {
        ExchangeController::find();
        $room = strtoupper($room);
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
            'nowIndicator' => true,
            'defaultView' => 'agendaDay',
            'allDaySlot' => false,
            'minTime' => '09:00:00',
            'maxTime' => '19:00:00',
            'timeFormat' => [
                'agenda'=> 'h:mm'
            ],
            'axisFormat' => 'H:mm',
            'handleWindowResize' => true,
            'contentHeight' => 854,
            'header' => [
                'left' => '',
                'center' => 'title',
                'right' => ''
            ]
        ]);

        return View::make('pages.room')->with(compact('calendar'));
    }

}