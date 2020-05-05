<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateCateListTable extends Migrator
{

    public function change()
    {
        $table = $this->table('category');
        $table->addColumn(Column::char('category'))
            ->addColumn('created_at', 'timestamp')
            ->addColumn(Column::timestamp('deleted_at')->setNullable())
            ->addColumn('updated_at', 'timestamp')
            ->create();
    }
}
