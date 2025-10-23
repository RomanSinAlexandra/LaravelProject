<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Adeptus Mechanicus Patrol Pack',
                'description' => 'Комплект бойових одиниць Adeptus Mechanicus для настільної гри Warhammer 40k.',
                'price' => 2999.00,
                'image' => 'images/Adeptus-Mechanicus.jpg',
            ],
            [
                'name' => 'Astra Militarum Patrol Pack',
                'description' => 'Патрульний набір Astra Militarum — сила Імперської гвардії.',
                'price' => 1999.00,
                'image' => 'images/Astra_Militarum.jpg',
            ],
            [
                'name' => 'Space Marines Patrol Pack',
                'description' => 'Бойовий набір Space Marines — елітні захисники Імператора.',
                'price' => 4999.00,
                'image' => 'images/Space_Marines.jpg',
            ],
            [
                'name' => 'Chaos Space Marines Patrol Pack',
                'description' => 'Набір Chaos Space Marines — колишні герої, що служать Темним Богам.',
                'price' => 5999.00,
                'image' => 'images/Chaos_Space_Marines.jpg',
            ],
            [
                'name' => 'Adeptus Custodes Patrol Pack',
                'description' => 'Набір Adeptus Custodes — золоті воїни, охоронці самого Імператора.',
                'price' => 6999.00,
                'image' => 'images/Adeptus_Custodes.jpg',
            ],
            [
                'name' => 'Adepta Sororitas Patrol Pack',
                'description' => 'Патруль Adepta Sororitas — відважні Сестри Битви, що борються за віру.',
                'price' => 5999.00,
                'image' => 'images/Adepta-Sororitas.jpg',
            ],
        ]);
    }
}
