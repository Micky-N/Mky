<?php

declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class CreateProductsTable extends AbstractMigration
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
        $exists = $this->hasTable('products');
        if (!$exists) {
            $table = $this->table('products', ['id' => 'code_product']);
            $table->addColumn('code_category', MysqlAdapter::PHINX_TYPE_INTEGER, ['null' => true])
                ->addColumn('name', 'string', ['limit' => 100])
                ->addColumn('user_id', MysqlAdapter::PHINX_TYPE_INTEGER)
                ->addColumn('selling_price', MysqlAdapter::PHINX_TYPE_DOUBLE, ['limit' => MysqlAdapter::TEXT_LONG])
                ->addColumn('photo', 'text', ['limit' => 100])
                ->addForeignKey('code_category', 'categories', 'code_category', ['delete' => 'SET_NULL', 'update' => 'CASCADE'])
                ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
                ->create();
        }
    }
}
