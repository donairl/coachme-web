<?php

use yii\db\Migration;

class m200615_060041_01_create_table_ma_department extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ma_department}}', [
            'id' => $this->primaryKey(),
            'sort_no' => $this->smallInteger()->defaultValue('0'),
            'name' => $this->string(50)->notNull(),
            'menuicon' => $this->string(50)->notNull(),
            'price' => $this->decimal(10, 2),
            'note' => $this->string(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%ma_department}}');
    }
}
