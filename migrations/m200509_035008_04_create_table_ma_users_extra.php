<?php

use yii\db\Migration;

class m200509_035008_04_create_table_ma_users_extra extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ma_users_extra}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(225)->notNull(),
            'bank_name' => $this->string(22)->notNull(),
            'bank_acc_no' => $this->string(32)->notNull(),
            'bank_acc_name' => $this->string(100)->notNull(),
        ], $tableOptions);

        $this->createIndex('fk_username', '{{%ma_users_extra}}', 'username');
    }

    public function down()
    {
        $this->dropTable('{{%ma_users_extra}}');
    }
}
