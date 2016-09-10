<?php

namespace HackTheHub\Leaves\RestResource;

use Rhubarb\RestApi\Resources\ModelRestResource;

class EventResource extends ModelRestResource
{
    public function getModelName()
    {
        return 'Event';
    }
}