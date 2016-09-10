<?php

namespace HackTheHub\Leaves\Event;

use Rhubarb\Leaf\Views\View;

class EventCollectionView extends View
{
    protected function printViewContent()
    {
        print 'Event collection';
    }
}