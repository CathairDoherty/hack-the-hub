<?php

namespace HackTheHub\Models\Event;

use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Repositories\MySql\Schema\MySqlModelSchema;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
use Rhubarb\Stem\Schema\Columns\DecimalColumn;
use Rhubarb\Stem\Schema\Columns\StringColumn;

class Event extends Model
{
    protected function createSchema()
    {
        $model = new MySqlModelSchema('tblEvent');

        $model->addColumn(
            new AutoIncrementColumn('EventID'),
            new StringColumn('Name', 100),
            new DecimalColumn( 'Latitude', 20, 10 ),
            new DecimalColumn( 'Longitude', 20, 10 )
        );

        return $model;
    }

}