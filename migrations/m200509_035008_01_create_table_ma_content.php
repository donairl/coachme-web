<?php

use yii\db\Migration;

class m200509_035008_01_create_table_ma_content extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ma_content}}', [
            'id' => $this->primaryKey(),
            'title' => $this->integer()->notNull(),
            'content' => $this->text()->notNull(),
            'status' => $this->integer()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%ma_content}}');
    }
}
