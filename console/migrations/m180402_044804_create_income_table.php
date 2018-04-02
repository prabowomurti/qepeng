<?php

use yii\db\Migration;

/**
 * Handles the creation of table `income`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `currency`
 */
class m180402_044804_create_income_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('income', [
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
            'idx-income-user_id',
            'income',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-income-user_id',
            'income',
            'user_id',
            'user',
            'id',
            'SET NULL',
            'CASCADE'
        );

        // creates index for column `currency_id`
        $this->createIndex(
            'idx-income-currency_id',
            'income',
            'currency_id'
        );

        // add foreign key for table `currency`
        $this->addForeignKey(
            'fk-income-currency_id',
            'income',
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
            'fk-income-user_id',
            'income'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-income-user_id',
            'income'
        );

        // drops foreign key for table `currency`
        $this->dropForeignKey(
            'fk-income-currency_id',
            'income'
        );

        // drops index for column `currency_id`
        $this->dropIndex(
            'idx-income-currency_id',
            'income'
        );

        $this->dropTable('income');
    }
}
