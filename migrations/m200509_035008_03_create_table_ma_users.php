<?php

use yii\db\Migration;

class m200509_035008_03_create_table_ma_users extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ma_users}}', [
            'username' => $this->string()->notNull()->append('PRIMARY KEY'),
            'auth_key' => $this->string(32),
            'password_hash' => $this->string(),
            'password_reset_token' => $this->string(),
            'email' => $this->string()->notNull(),
            'role' => $this->smallInteger()->notNull()->defaultValue('10'),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%ma_users}}');
    }
}
