<?php

use yii\db\Migration;

class m200509_035008_07_create_table_ma_product extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ma_product}}', [
            'id' => $this->primaryKey(),
            'product_name' => $this->string(40)->notNull(),
            'note' => $this->text()->notNull(),
            'short_description' => $this->string(80)->notNull(),
            'unit' => $this->string(12)->notNull(),
            'price_unit' => $this->decimal()->notNull(),
            'picture' => $this->string(60)->notNull(),
            'dept_id' => $this->integer()->notNull(),
            'category_id' => $this->string(2)->notNull(),
        ], $tableOptions);

        $this->addForeignKey('FK_productCategory', '{{%ma_product}}', 'category_id', '{{%ma_category}}', 'category_code', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%ma_product}}');
    }
}
