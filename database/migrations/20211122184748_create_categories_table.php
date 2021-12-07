<?php

declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class CreateCategoriesTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $exists = $this->hasTable('categories');
        if (!$exists) {
            $table = $this->table('categories', ['id' => 'code_category']);
            $table->addColumn('name', 'string', ['limit' => 25])
                ->addColumn('description', 'text', ['limit' => MysqlAdapter::TEXT_LONG])
                ->addIndex('name', ['unique' => true])
                ->create();
        }
    }
}
