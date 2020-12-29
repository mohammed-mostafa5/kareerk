<?php

use App\Models\Paragraph;
use Illuminate\Database\Seeder;

class ParagraphTableSeeder extends Seeder
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
                'page_id' => 2,
                'en' => [
                    'text' => '<h1>Dog Care Services</h1>

                    <p>PLEASE CALL NOW:&nbsp;+20 100 500 7080</p>
                    
                    <p>Emotional support dogs are often identified by wearing an emotional support dog vest or tag, letting the public know that it is an emotional support dog; otherwise, their handler will find themselves having to explain that their dog is emotional support dog. some businesses, such as airline, prefer to see an identification card or vest that indicates that the dog is an emotional support dog.</p>'
                ],
                'ar' => [
                    'text' => '<h1>Dog Care Services</h1>

                    <p>PLEASE CALL NOW:&nbsp;+20 100 500 7080</p>
                    
                    <p>Emotional support dogs are often identified by wearing an emotional support dog vest or tag, letting the public know that it is an emotional support dog; otherwise, their handler will find themselves having to explain that their dog is emotional support dog. some businesses, such as airline, prefer to see an identification card or vest that indicates that the dog is an emotional support dog.</p>'
                ],
                
            ],
            [
                'page_id' => 2,
                'en' => [
                    'text' => '<h4><span style="color:#ffffff">DOMESTIC ANIMALS CAN SAVE YOU FROM LONELINESS</span></h4>

                    <p><span style="color:#ffffff">Different kind of domestic animals have different characteristics and needs. Aquatics pets can provide a sense of tranquility to their owners and remove stress. They don&rsquo;t need much of attention, and it&rsquo;s easy to take care of them. Rodents are small yet vigorous animals</span></p>'
                ],
                'ar' => [
                    'text' => '<h4><span style="color:#ffffff">DOMESTIC ANIMALS CAN SAVE YOU FROM LONELINESS</span></h4>

                    <p><span style="color:#ffffff">Different kind of domestic animals have different characteristics and needs. Aquatics pets can provide a sense of tranquility to their owners and remove stress. They don&rsquo;t need much of attention, and it&rsquo;s easy to take care of them. Rodents are small yet vigorous animals</span></p>'
                ],
            ],
        ];


        foreach ($allData as $data) {

            Paragraph::create($data);
        }
    }
}
