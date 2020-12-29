<?php

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $allData = [
            [
                'en' => [
                    'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat autem voluptas commodi temporibus error obcaecati pariatur animi, iure nobis, laudantium maxime dignissimos quo? Perspiciatis laboriosam voluptatibus accusamus iste dolore ab.',

                    'title' => 'Title',
                    'subtitle' => 'Subtitle',
                    'button_text' => 'Click Here'
                ],


                'ar' => [
                    'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat autem voluptas commodi temporibus error obcaecati pariatur animi, iure nobis, laudantium maxime dignissimos quo? Perspiciatis laboriosam voluptatibus accusamus iste dolore ab.',

                    'title' => 'Title',
                    'subtitle' => 'Subtitle',
                    'button_text' => 'Click Here'
                ],
                'photo' => 'slide_1.jpg',
                'in_order_to' => '1',
                'link' => '#',
                'status' => 1,
            ],
            [
                'en' => [
                    'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat autem voluptas commodi temporibus error obcaecati pariatur animi, iure nobis, laudantium maxime dignissimos quo? Perspiciatis laboriosam voluptatibus accusamus iste dolore ab.',

                    'title' => 'Title',
                    'subtitle' => 'Subtitle',
                    'button_text' => 'Click Here'
                ],


                'ar' => [
                    'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat autem voluptas commodi temporibus error obcaecati pariatur animi, iure nobis, laudantium maxime dignissimos quo? Perspiciatis laboriosam voluptatibus accusamus iste dolore ab.',

                    'title' => 'Title',
                    'subtitle' => 'Subtitle',
                    'button_text' => 'Click Here'
                ],
                'photo' => 'slide_2.jpg',
                'in_order_to' => '1',
                'link' => '#',
                'status' => 1,
            ],
            [
                'en' => [
                    'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat autem voluptas commodi temporibus error obcaecati pariatur animi, iure nobis, laudantium maxime dignissimos quo? Perspiciatis laboriosam voluptatibus accusamus iste dolore ab.',

                    'title' => 'Title',
                    'subtitle' => 'Subtitle',
                    'button_text' => 'Click Here'
                ],


                'ar' => [
                    'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat autem voluptas commodi temporibus error obcaecati pariatur animi, iure nobis, laudantium maxime dignissimos quo? Perspiciatis laboriosam voluptatibus accusamus iste dolore ab.',

                    'title' => 'Title',
                    'subtitle' => 'Subtitle',
                    'button_text' => 'Click Here'
                ],
                'photo' => 'slide_3.jpg',
                'in_order_to' => '1',
                'link' => '#',
                'status' => 1,
            ],

        ];

        foreach ($allData as $data) {

            Slider::create($data);
        }
    }
}
