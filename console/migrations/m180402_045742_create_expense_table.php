<?php

use yii\db\Migration;

/**
 * Handles the creation of table `expense`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `currency`
 */
class m180402_045742_create_expense_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('expense', [
            'id'          => $this->primaryKey(),
            'user_id'     => $this->integer(),
            'description' => $this->string(),   
            'amount'      => $this->money(14,2)->notNull()->defaultValue(0.00),
            'date'        => $this->date()->notNull(),
            'currency_id' => $this->integer(),
            'created_at'  => $this->integer()->notNull(),
            'updated_at'  => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-expense-user_id',
            'expense',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-expense-user_id',
            'expense',
            'user_id',
            'user',
            'id',
            'SET NULL',
            'CASCADE'
        );

        // creates index for column `currency_id`
        $this->createIndex(
            'idx-expense-currency_id',
            'expense',
            'currency_id'
        );

        // add foreign key for table `currency`
        $this->addForeignKey(
            'fk-expense-currency_id',
            'expense',
            'currency_id',
            'currency',
            'id',
            'SET NULL',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-expense-user_id',
            'expense'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-expense-user_id',
            'expense'
        );

        // drops foreign key for table `currency`
        $this->dropForeignKey(
            'fk-expense-currency_id',
            'expense'
        );

        // drops index for column `currency_id`
        $this->dropIndex(
            'idx-expense-currency_id',
            'expense'
        );

        $this->dropTable('expense');
    }
}
