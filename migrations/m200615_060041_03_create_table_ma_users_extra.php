<?php

use yii\db\Migration;

class m200615_060041_03_create_table_ma_users_extra extends Migration
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
            'phone_no' => $this->string(32),
            'otp_activation' => $this->string(4),
            'address' => $this->string()->notNull(),
            'city' => $this->string(100),
            'current_class' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('fk_username', '{{%ma_users_extra}}', 'username');
    }

    public function down()
    {
        $this->dropTable('{{%ma_users_extra}}');
    }
}
