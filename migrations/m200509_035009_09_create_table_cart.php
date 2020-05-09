<?php

use yii\db\Migration;

class m200509_035009_09_create_table_cart extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%cart}}', [
            'cart_id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'qty' => $this->integer()->notNull(),
            'username' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createIndex('product_id', '{{%cart}}', 'product_id');
        $this->addForeignKey('FK_CartUsername', '{{%cart}}', 'username', '{{%ma_users}}', 'username', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('cart_ibfk_1', '{{%cart}}', 'product_id', '{{%ma_product}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%cart}}');
    }
}
