<?php

namespace HackTheHub\Models;

use HackTheHub\Models\Event\Category;
use HackTheHub\Models\Event\Event;
use Rhubarb\Stem\Schema\SolutionSchema;

class HackTheHubSolutionSchema extends SolutionSchema
{
    public function __construct()
    {
        parent::__construct();
        $this->addModel('Event', Event::class, 1.5);
        $this->addModel('Category', Category::class, 1.2);
        $this->addModel('HTHUser', Category::class, 1);
        $this->addModel('Client', Category::class, 1);
        $this->addModel('Organizer', Category::class, 1);
    }

    protected function defineRelationships()
    {
        $this->declareOneToManyRelationships(
            [
                'Category' => [
                    'Events' => 'Event.CategoryID',
                    'ChildCategories' => 'Category.ParentCategoryID:ParentCategory',
                ],
            ]
        );
    }
}
