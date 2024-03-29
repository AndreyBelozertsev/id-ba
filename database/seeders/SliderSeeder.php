<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Domain\Slider\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'name' => 'Владимир Путин',
                'position' => 'Президент Российской Федерации',
                'content' => '«Сила России – внутри нас самих, она внутри нашего народа, в наших людях, в наших традициях и нашей культуре, в нашей экономике, в огромной нашей территории и природных богатствах, в обороноспособности, конечно. Но самое главное – наша сила, безусловно, в единстве нашего народа»',
                'thumbnail' => 'images/slider/2024/01/23/president.jpeg',
            ], 
            [
                'name' => 'Сергей Аксёнов',
                'position' => 'Глава Республики Крым',
                'content' => '«Изменить страну к лучшему можно только вместе с вами. Сейчас, когда вы полны сил и здоровых амбиций, нацелены на результат, а ваш ум не закостенел, самое время двигаться вперед. Нужно помнить, что все в наших руках и только вместе мы можем достигнуть самых высоких целей»',
                'thumbnail' => 'images/slider/2024/01/23/glava_rk.jpeg',
            ], 
            [
                'name' => 'Владимир Константинов',
                'position' => 'Председатель Государственного Совета Республики',
                'content' => '«Добровольческий корпус Крыма объединяет десятки тысяч человек. Волонтёры заняты поисковой, экологической деятельностью, опекунством и другими важными направлениями. Сегодня они поддерживают наших солдат, помогают семьям погибших наших героев, передают гуманитарный груз жителям новых российских регионов. Мы высоко ценим вклад каждого добровольца в развитие Крыма, формирование нашего гражданского общества, воспитание нравственных качеств у подрастающего поколения».',
                'thumbnail' => 'images/slider/2024/01/23/predsedatel_gsrk.jpg',
            ], 
     
        ];

        foreach($items as $item){
            Slider::create(
                $item
            );
        }
    }
}
