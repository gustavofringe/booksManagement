<?php


use Entity\Books;
use Phinx\Seed\AbstractSeed;

class DooksSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'title' => $faker->realText(15, 1),
                'author' => $faker->name,
                'resume' => $faker->realText(1500),
                'releaseDate' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'available' => 1,
                'categoryID' => $faker->numberBetween($min = 1, $max = 5)
            ];
        }

        $this->insert('books', $data);
    }
}
