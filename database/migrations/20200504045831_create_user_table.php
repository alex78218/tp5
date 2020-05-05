<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateUserTable extends Migrator
{
    public function up()
    {
        $table = $this->table('user');
        $table->addColumn('username', 'string', ['limit' => 15, 'default' => '', 'comment' => '用户名'])
                ->addColumn('password', 'string', ['limit' => 32, 'default' => '', 'comment' => '密码'])
                ->addColumn('created_at', 'timestamp', ['default' => null])
                ->addColumn('updated_at', 'timestamp', ['default' => null])
                ->addColumn(Column::timestamp('deleted_at')->setNullable())
                ->addIndex(array('username'), array('unique' => true))
                ->create();
    }

    public function down()
    {
        
    }
}
