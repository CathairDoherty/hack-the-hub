<?php
use Rhubarb\Scaffolds\AuthenticationWithRoles\User;
use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Repositories\MySql\Schema\Columns\MySqlEnumColumn;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
use Rhubarb\Stem\Schema\Columns\DateTimeColumn;
use Rhubarb\Stem\Schema\Columns\ForeignKeyColumn;
use Rhubarb\Stem\Schema\Columns\StringColumn;

/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 10/09/2016
 * Time: 14:17
 */
class HTHUser extends User
{
    protected function createSchema()
    {
        parent::createSchema();
    }
}