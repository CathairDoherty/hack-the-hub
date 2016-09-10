<?php

namespace HackTheHub\Leaves;

use HackTheHub\Models\Event\Event;
use Rhubarb\Leaf\Views\View;

class IndexView extends View
{
    protected function printViewContent()
    {
        $event = new Event();
        $event->save();
        print 'Its working!';
    }
}