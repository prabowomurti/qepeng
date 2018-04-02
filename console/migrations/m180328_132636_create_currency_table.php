<?php

use yii\db\Migration;

/**
 * Handles the creation of table `currency`.
 */
class m180328_132636_create_currency_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('currency', [
            'id'         => $this->primaryKey(),
            'code'       => $this->string(5)->notNull(),
            'symbol'     => $this->string(10)->notNull(),
            'label'      => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('currency');
    }
}
