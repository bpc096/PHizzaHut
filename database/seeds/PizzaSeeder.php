<?php

use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizzas')->insert([
            'pizza_name'=> 'Cheese Bomb',
            'pizza_description' => 'Pizza with double extra cheese, some meat and sausage in deep',
            'pizza_price' => '80000',
            'pizza_image' => '../img/chsbomb.jpg'
        ]);

        DB::table('pizzas')->insert([
            'pizza_name'=> 'Tuna Man',
            'pizza_description' => 'Pizza with tuna meat, double onion and cheese on top, coated with best special sauce',
            'pizza_price' => '100000',
            'pizza_image' => '../img/tunaman.jpg'
        ]);

        DB::table('pizzas')->insert([
            'pizza_name'=> 'Classic Pepperoni',
            'pizza_description' => 'Pizza with peperoni, have a classic taste and coated with our special sauce',
            'pizza_price' => '75000',
            'pizza_image' => '../img/clscppr.jpg'
        ]);

        DB::table('pizzas')->insert([
            'pizza_name'=> 'Garlic and Chicken',
            'pizza_description' => 'Pizza with chicken meat and garlic, tasteful and delicious with our coated special sauce',
            'pizza_price' => '65000',
            'pizza_image' => '../img/grlchk.jpg'
        ]);

        DB::table('pizzas')->insert([
            'pizza_name'=> 'Lamb and Onion',
            'pizza_description' => 'Pizza with lamb meat, some onion and cheese on top, coated with our special sauce',
            'pizza_price' => '85000',
            'pizza_image' => '../img/lambonion.jpeg'
        ]);

        DB::table('pizzas')->insert([
            'pizza_name'=> 'Wheat and Veggie',
            'pizza_description' => 'Pizza with wheat and some vegetables, paprika n cheese on top, special sauce covered this pizza too!',
            'pizza_price' => '70000',
            'pizza_image' => '../img/whtvegie.jpg'
        ]);

        DB::table('pizzas')->insert([
            'pizza_name'=> 'Bacon and Egg',
            'pizza_description' => 'Pizza with bacon meat and egg, coated with barbeque sauce',
            'pizza_price' => '50000',
            'pizza_image' => '../img/baconegg.jpg'
        ]);

        DB::table('pizzas')->insert([
            'pizza_name'=> 'Beef Pepper and Onion',
            'pizza_description' => 'Pizza with double extra beef meat with fresh onion, some meat covered with cheese in deep',
            'pizza_price' => '120000',
            'pizza_image' => '../img/bflchicken.jpg'
        ]);

        DB::table('pizzas')->insert([
            'pizza_name'=> 'Gluten Free - Mushroom and Ricotta',
            'pizza_description' => 'Gluten Free Pizza with some mushroom and ricotta, suitable for those who are vegetarian',
            'pizza_price' => '60000',
            'pizza_image' => '../img/gltmushroom.jpeg'
        ]);
        
        DB::table('pizzas')->insert([
            'pizza_name'=> 'Hawaiian Pineapple and Pepperoni',
            'pizza_description' => 'Hawaiian Pizza with pepperoni and Jalapenos, balance out the sweet pineapple with smoky, salty pepperoni and spicy pickled jalapeños.',
            'pizza_price' => '90000',
            'pizza_image' => '../img/hwipizza.jpg'
        ]);
        
        DB::table('pizzas')->insert([
            'pizza_name'=> 'Italian Style Meatball',
            'pizza_description' => 'Italian Pizza with Paprika and Cheese, coated with spicy tomato and blackpepper sauce.',
            'pizza_price' => '95000',
            'pizza_image' => '../img/itlmeatball.jpg'
        ]);

        DB::table('pizzas')->insert([
            'pizza_name'=> 'Supreme Special Jumbo Pizza (Best in our pizza restaurant)',
            'pizza_description' => 'It’s a true supreme pizza: bacon, pepperoni slices, red and green bell pepper, red onion, black olives, mozzarella, Parmesan, and basil.',
            'pizza_price' => '150000',
            'pizza_image' => '../img/sprmpizza.jpg'
        ]);
    }
}
