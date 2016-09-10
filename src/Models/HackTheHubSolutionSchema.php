<?php

namespace HackTheHub\Models;

use HackTheHub\Models\Event\Event;
use Rhubarb\Stem\Schema\SolutionSchema;

class HackTheHubSolutionSchema extends SolutionSchema
{
    public function __construct()
    {
        parent::__construct();
        $this->addModel('Event', Event::class, 1);
    }
}
