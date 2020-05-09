<?php

use yii\db\Migration;

class m200509_035008_06_create_table_ma_category extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ma_category}}', [
            'category_code' => $this->string(2)->notNull()->append('PRIMARY KEY'),
            'dept_id' => $this->integer()->notNull(),
            'category_name' => $this->string(50)->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_dept', '{{%ma_category}}', 'dept_id', '{{%ma_department}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%ma_category}}');
    }
}
