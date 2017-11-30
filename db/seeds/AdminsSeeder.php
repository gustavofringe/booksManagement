<?php


use Phinx\Seed\AbstractSeed;

class AdminsSeeder extends AbstractSeed
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
        $filename =  'db/seeds/admins.json';
        $file = fopen($filename, 'r');
        $contents = fread($file, filesize($filename));
        $cont = json_decode($contents, true);
        // dd($cont);
        $admins = [];
        foreach ($cont as $k => $v) {
            $admins[] = [
                'adminID' => $v['adminID'],
                'name' => $v['name'],
                'password' => $v['password']
            ];
        }
        $this->insert('admins', $admins);
    }
}
