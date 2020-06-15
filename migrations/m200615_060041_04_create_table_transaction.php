<?php

use yii\db\Migration;

class m200615_060041_04_create_table_transaction extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%transaction}}', [
            'id' => $this->primaryKey(),
            'invoice_no' => $this->string(60)->notNull(),
            'username' => $this->string()->notNull(),
            'total_paid' => $this->decimal()->notNull(),
            'status_payment' => $this->smallInteger()->notNull(),
            'type_payment' => $this->string(32)->notNull(),
            'paid_for_class' => $this->integer(),
            'trans_date' => $this->timestamp()->defaultExpression('now()'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%transaction}}');
    }
}
