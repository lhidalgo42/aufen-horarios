<?php

use garethp\ews\API;
use garethp\ews\API\Enumeration;

class RoomsController extends \BaseController
{

    public function get($room)
    {
        ExchangeController::find();
        $room = strtoupper($room);
        $schedules = Schedule::where('start', '>=', date('Y-m-d 09:00:00'))->where('active', 1)->where('end', '<=', date('Y-m-d 19:00:00'))->where('room', $room)->get();
        $events = [];
        if (count($schedules) > 0) {
            foreach ($schedules as $schedule) {
                $events[] = Calendar::event(
                    $schedule->name,
                    false,
                    new DateTime($schedule->start),
                    new DateTime($schedule->end)
                );
            }
        }

        $calendar = Calendar::addEvents($events)
            ->setOptions([
                'defaultView' => 'agendaDay',
                'allDaySlot' => false,
                'minTime' => '09:00:00',
                'maxTime' => '19:00:00',
                'lang' =>'es',
                'contentHeight' => 1073,
                'timeFormat' => 'h:mm',
                'header' => [
                    'left' => '',
                    'center' => 'title',
                    'right' => ''
                ],
                'nowIndicator' => true,
                'titleFormat' => ' '
            ]);

        return View::make('pages.room')->with(compact('calendar','room'));
    }

}