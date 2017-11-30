<?php


use Phinx\Seed\AbstractSeed;

class CategoriesSeeder extends AbstractSeed
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
        $filename =  'db/seeds/categories.json';
        $file = fopen($filename, 'r');
        $contents = fread($file, filesize($filename));
        $cont = json_decode($contents, true);
        // dd($cont);
        $categories = [];
        foreach ($cont as $k => $v) {
            $categories[] = [
                'categoryID' => $v['categoryID'],
                'name' => $v['name'],
            ];
        }
        $this->insert('categories', $categories);
    }
}
