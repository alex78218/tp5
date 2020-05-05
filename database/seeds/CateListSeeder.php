<?php

use think\migration\Seeder;

class CateListSeeder extends Seeder
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
        $data0 = [
            'category' => 'ThinkPHP',
            'created_at' => date('Y-m-d H:i:s',time()),
            'updated_at' => date('Y-m-d H:i:s',time())
        ];

        $data1 = [
            'category' => 'Laravel',
            'created_at' => date('Y-m-d H:i:s',time()),
            'updated_at' => date('Y-m-d H:i:s',time())
        ];

        $this->table('category')->insert($data1)->save();
        $this->table('category')->insert($data0)->save();
    }
}