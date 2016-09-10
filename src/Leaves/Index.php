<?php

namespace HackTheHub\Leaves;

use HackTheHub\Models\Event\Event;
use Rhubarb\Leaf\Leaves\Leaf;

class Index extends Leaf
{
    protected function getViewClass()
    {
        return IndexView::class;
    }

    protected function createModel()
    {
        $model = new IndexModel();

        $model->getEventsEvent->attachHandler(function(){
            $events = [];

            foreach(Event::find() as $event) {
                $eventClass = new \stdClass();
                $eventClass->Latitude = $event->Latitude;
                $eventClass->Longitude = $event->Longitude;
                $events[] = $eventClass;
            }

            return $events;
        });

        return $model;
    }
}