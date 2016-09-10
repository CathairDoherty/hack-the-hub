<?php

namespace HackTheHub\Leaves\Event;

use Rhubarb\Leaf\Crud\Leaves\ModelBoundLeaf;

class EventItem extends ModelBoundLeaf
{
    protected function getViewClass()
    {
        return EventItemView::class;
    }

    protected function createModel()
    {
        $model = new EventItemModel();

        return $model;
    }
}