<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Rating;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainSeeder extends Seeder
{
    public function run(): void
    {
        DB::disableQueryLog();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Author::truncate();
        Category::truncate();
        Book::truncate();
        Rating::truncate();
        DB::table('book_category')->truncate();
        $this->command->info('Creating 1,000 authors...');
        Author::factory()->count(1000)->create();
        $this->command->info('Creating 3,000 categories...');
        Category::factory()->count(3000)->create();
        $categoryIds = Category::pluck('id')->toArray();
        $this->command->info('Creating 100,000 books...');
        $totalBooks = 100000;
        $batchSize = 1000;

        for ($i = 0; $i < $totalBooks; $i += $batchSize) {
            $chunk = [];
            for ($j = 0; $j < $batchSize; $j++) {
                $chunk[] = [
                    'author_id' => Author::inRandomOrder()->value('id'),
                    'title' => fake()->sentence(4),
                    'description' => fake()->paragraph(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            Book::insert($chunk);
        }

        $this->command->info('Attaching categories to books...');
        Book::chunk(1000, function ($books) use ($categoryIds) {
            $pivot = [];
            foreach ($books as $book) {
                $randomCats = (array) array_rand($categoryIds, rand(1, 3));
                foreach ($randomCats as $key) {
                    $pivot[] = [
                        'book_id' => $book->id,
                        'category_id' => $categoryIds[$key],
                    ];
                }
            }
            DB::table('book_category')->insert($pivot);
        });

        $this->command->info('Creating 500,000 ratings...');
        Book::chunk(1000, function ($books) {
            $ratings = [];
            foreach ($books as $book) {
                for ($i = 0; $i < rand(3, 7); $i++) {
                    $ratings[] = [
                        'book_id' => $book->id,
                        'rating' => rand(1, 10),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
            Rating::insert($ratings);
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->command->info('Database seeding completed successfully');
    }
}
