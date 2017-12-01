<?php


use Entity\Borrowers;
use Phinx\Seed\AbstractSeed;

class BorrowersSeeder extends AbstractSeed
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
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'name'      => $faker->name,
                'memberID'=>$faker->swiftBicNumber
            ];
        }

        $this->insert('borrowers', $data);
    }
}
