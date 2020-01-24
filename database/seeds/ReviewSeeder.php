<?php

use Illuminate\Database\Seeder;
use App\Model\Review;
class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Review::class,100)->create();
    }
}
