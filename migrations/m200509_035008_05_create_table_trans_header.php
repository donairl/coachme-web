<?php

use yii\db\Migration;

class m200509_035008_05_create_table_trans_header extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%trans_header}}', [
            'id' => $this->primaryKey(),
            'invoice_no' => $this->string(60)->notNull(),
            'username' => $this->integer()->notNull(),
            'total_paid' => $this->decimal()->notNull(),
            'status_payment' => $this->tinyInteger(1)->notNull(),
            'type_payment' => $this->string(3)->notNull(),
            'ship_to' => $this->string()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%trans_header}}');
    }
}
