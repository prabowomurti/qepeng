<?php

use yii\db\Migration;

/**
 * Handles the creation of table `expense_tag`.
 * Has foreign keys to the tables:
 *
 * - `expense`
 * - `tag`
 */
class m180402_085021_create_junction_table_for_expense_and_tag_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('expense_tag', [
            'expense_id' => $this->integer(),
            'tag_id' => $this->integer(),
            'PRIMARY KEY(expense_id, tag_id)',
        ]);

        // creates index for column `expense_id`
        $this->createIndex(
            'idx-expense_tag-expense_id',
            'expense_tag',
            'expense_id'
        );

        // add foreign key for table `expense`
        $this->addForeignKey(
            'fk-expense_tag-expense_id',
            'expense_tag',
            'expense_id',
            'expense',
            'id',
            'CASCADE'
        );

        // creates index for column `tag_id`
        $this->createIndex(
            'idx-expense_tag-tag_id',
            'expense_tag',
            'tag_id'
        );

        // add foreign key for table `tag`
        $this->addForeignKey(
            'fk-expense_tag-tag_id',
            'expense_tag',
            'tag_id',
            'tag',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `expense`
        $this->dropForeignKey(
            'fk-expense_tag-expense_id',
            'expense_tag'
        );

        // drops index for column `expense_id`
        $this->dropIndex(
            'idx-expense_tag-expense_id',
            'expense_tag'
        );

        // drops foreign key for table `tag`
        $this->dropForeignKey(
            'fk-expense_tag-tag_id',
            'expense_tag'
        );

        // drops index for column `tag_id`
        $this->dropIndex(
            'idx-expense_tag-tag_id',
            'expense_tag'
        );

        $this->dropTable('expense_tag');
    }
}
