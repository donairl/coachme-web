<?php

use yii\db\Migration;

class m200615_060042_06_create_table_ma_product extends Migration
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
            'note' => $this->text(),
            'short_description' => $this->string(200),
            'unit' => $this->string(12),
            'price_unit' => $this->decimal(),
            'picture' => $this->string(60),
            'dept_id' => $this->integer()->notNull(),
            'category_id' => $this->string(2)->notNull(),
            'embed_url' => $this->string(),
        ], $tableOptions);

        $this->addForeignKey('FK_productCategory', '{{%ma_product}}', 'category_id', '{{%ma_category}}', 'category_code', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%ma_product}}');
    }
}
