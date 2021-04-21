<?php

namespace App\Modules\Project\Database\Seeders;

use App\Modules\Project\Models\ComponentTemplate;
use App\Modules\Project\Models\Section;
use Illuminate\Database\Seeder;

class ComponentsTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $componentsTemplateFields = [
            [
                'name' => 'bg_paragraph_m',
                'fields' => ['textarea']

            ],

            [
                'name' => 'bg_title_m',
                'fields' => ['text']

            ],

            [
                'name' => 'five_image_space',
                'fields' => ['file', 'file', 'file', 'file', 'file']

            ],

            [
                'name' => 'four_image',
                'fields' => ['file', 'file', 'file', 'file']

            ],

            [
                'name' => 'four_image_space',
                'fields' => ['file', 'file', 'file', 'file']

            ],

            [
                'name' => 'nextProject',
                'fields' => ['text', 'textarea', 'link', 'file']

            ],

            [
                'name' => 'one_image_l',
                'fields' => ['file']

            ],

            [
                'name' => 'one_image_m',
                'fields' => ['file']

            ],

            [
                'name' => 'one_image_r',
                'fields' => ['file']

            ],

            [
                'name' => 'paragraph_l',
                'fields' => ['textarea']

            ],

            [
                'name' => 'paragraph_r',
                'fields' => ['textarea']

            ],

            [
                'name' => 'six_image_space',
                'fields' => ['file', 'file', 'file', 'file', 'file', 'file']

            ],

            [
                'name' => 'slider',
                'fields' => ['file[]']

            ],

            [
                'name' => 'title_l_pragraph_r',
                'fields' => ['text', 'textarea']

            ],

            [
                'name' => 'two_image',
                'fields' => ['file', 'file']

            ],

            [
                'name' => 'two_image_space',
                'fields' => ['file', 'file']
            ],

            [
                'name' => 'two_paragraph_m',
                'fields' => ['textarea', 'textarea']
            ]
        ];
        foreach ($componentsTemplateFields as $componentsTemplateField) {
            $element = [
                'name' => $componentsTemplateField['name'],
                'numberOfFields' => count($componentsTemplateField['fields']),
                'type' => 'element'
            ];
            ComponentTemplate::create($element);
        }
        $element = [
            'name' => 'margin',
            'numberOfFields' => 1,
            'type' => 'space'
        ];
        ComponentTemplate::create($element);
    }
}
