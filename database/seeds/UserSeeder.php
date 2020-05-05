<?php

use think\migration\Seeder;

class UserSeeder extends Seeder
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
        $data  =
           [
               'username'        =>  'admin' ,
               'password'        =>  '96e79218965eb72c92a549dd5a330112',
               'created_at'     =>   date('Y-m-d H:i:s',time()),
               'updated_at'     =>   date('Y-m-d H:i:s',time()),
            ];
        $this->table('user')->insert($data)->save();
    }
}