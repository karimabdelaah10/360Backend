<?php

namespace App\Modules\Project\Database\Seeders;

use App\Modules\Project\Models\ComponentTemplate;
use App\Modules\Project\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComponentsTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tempImagesPath='/storage/component_temp_images/';
        $imgExt='.jpg';
        DB::table('component_templates')->delete();
        $componentsTemplateFields = [
            [
                'name' => 'bg_paragraph_m',
                'title'=> 'big middle paragraph',
                'fields' => ['textarea']

            ],

            [
                'name' => 'bg_title_m',
                'title'=> 'big middle title',
                'fields' => ['text']

            ],

            [
                'name' => 'five_image_space',
                'title'=> '5 img with spaces',
                'fields' => ['file', 'file', 'file', 'file', 'file']

            ],

            [
                'name' => 'four_image',
                'title'=> '4 img',
                'fields' => ['file', 'file', 'file', 'file']

            ],

            [
                'name' => 'four_image_space',
                'title'=> '4 img with space',
                'fields' => ['file', 'file', 'file', 'file']

            ],

//            [
//                'name' => 'nextProject',
//                'title'=> 'next Project',
//                'fields' => ['select']
//
//            ],

            [
                'name' => 'one_image_l',
                'title'=> 'left image',
                'fields' => ['file']

            ],

            [
                'name' => 'one_image_m',
                'title'=> 'middle img',
                'fields' => ['file']

            ],

            [
                'name' => 'one_image_r',
                'title'=> 'right img',
                'fields' => ['file']

            ],

            [
                'name' => 'paragraph_l',
                'title'=> 'left paragraph',
                'fields' => ['textarea']

            ],

            [
                'name' => 'paragraph_r',
                'title'=> 'right paragraph',
                'fields' => ['textarea']

            ],

            [
                'name' => 'six_image_space',
                'title'=> '6 img with space',
                'fields' => ['file', 'file', 'file', 'file', 'file', 'file']

            ],

            [
                'name' => 'slider',
                'title'=> 'Slider',
                'fields' => ['file[]']

            ],

            [
                'name' => 'title_l_paragraph_r',
                'title'=> 'left title right paragraph',
                'fields' => ['text', 'textarea']

            ],

            [
                'name' => 'two_image',
                'title'=> '2 img',
                'fields' => ['file', 'file']

            ],

            [
                'name' => 'two_image_space',
                'title'=> '2 img space',
                'fields' => ['file', 'file']
            ],

            [
                'name' => 'two_paragraph_m',
                'title'=> '2 middle paragraph ',
                'fields' => ['textarea', 'textarea']
            ]
        ];
        foreach ($componentsTemplateFields as $componentsTemplateField) {
            $element = [
                'name' => $componentsTemplateField['name'],
                'title' => $componentsTemplateField['title'],
                'image' => $componentsTemplateField['name'].$imgExt,
                'numberOfFields' => count($componentsTemplateField['fields']),
                'type' => 'element'
            ];
            ComponentTemplate::create($element);
        }
        $element = [
            'name' => 'margin',
            'title' => 'margin',
            'image' => 'null',
            'numberOfFields' => 1,
            'type' => 'space'
        ];
        ComponentTemplate::create($element);
    }
}
