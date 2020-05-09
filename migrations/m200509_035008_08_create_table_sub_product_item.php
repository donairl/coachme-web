<?php

use yii\db\Migration;

class m200509_035008_08_create_table_sub_product_item extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%sub_product_item}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'item_name' => $this->string(100)->notNull(),
            'price' => $this->decimal()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_product', '{{%sub_product_item}}', 'product_id', '{{%ma_product}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%sub_product_item}}');
    }
}
