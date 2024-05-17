<?php

// database/seeders/ItemSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['title' => 'Item 1'],
            ['title' => 'Item 2'],
            ['title' => 'Item 3'],
            ['title' => 'Item 4'],
        ];

        foreach ($items as $index => $item) {
            Item::create([
                'title' => $item['title'],
                'order' => $index + 1,
            ]);
        }
    }
}

