<?php

namespace HackTheHub\Models\Event;

use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Repositories\MySql\Schema\MySqlModelSchema;
use Rhubarb\Stem\Schema\Columns\AutoIncrementColumn;
use Rhubarb\Stem\Schema\Columns\ForeignKeyColumn;
use Rhubarb\Stem\Schema\Columns\StringColumn;

class Category extends Model
{
    protected function createSchema()
    {
        $schema = new MySqlModelSchema('tblCategory');

        $schema->addColumn(
            new AutoIncrementColumn('CategoryID'),
            new StringColumn('Name', 50),
            new ForeignKeyColumn('ParentCategoryID')
        );

        return $schema;
    }

    public static function checkRecords($oldVersion, $newVersion)
    {
        $createCategory = function($name, $subCategories) {
            $parentCategory = new Category();
            $parentCategory->Name = $name;
            $parentCategory->save();

            foreach($subCategories as $category) {
                $subCategory = new Category();
                $subCategory->ParentCategoryID = $parentCategory->UniqueIdentifier;
                $subCategory->Name = $category;
                $subCategory->save();
            }
        };
        if ($oldVersion <= 1 && $newVersion >= 1) {
            $categories = [
                'Food' => [
                    'Mexican',
                    'Italian',
                    'Spanish',
                    'Chinese',
                    'Indian'
                ],
                'Music' => [
                    'Blues',
                    'Country',
                    'Hip hop',
                    'Jazz',
                    'Pop',
                    'Reggae',
                    'R&B',
                    'Rock',
                    'Alternative',
                    'Metal',
                    'Punk'
                ],
                'Sport' => [
                    'Soccer',
                    'Football',
                    'Gaelic',
                    'Hurling',
                    'Rugby'
                ]
            ];

            foreach($categories as $key => $category) {
                $createCategory($key, $category);
            }
        }
    }


}