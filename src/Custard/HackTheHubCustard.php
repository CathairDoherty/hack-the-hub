<?php

namespace HackTheHub\Custard;

use HackTheHub\Models\Event\Category;
use Rhubarb\Stem\Custard\DemoDataSeederInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HackTheHubCustard implements DemoDataSeederInterface
{
    public function seedData(OutputInterface $output)
    {
        $this->importCategories();
    }

    public function importCategories()
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
