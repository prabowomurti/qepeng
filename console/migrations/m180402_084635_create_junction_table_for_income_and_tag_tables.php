<?php

use yii\db\Migration;

/**
 * Handles the creation of table `income_tag`.
 * Has foreign keys to the tables:
 *
 * - `income`
 * - `tag`
 */
class m180402_084635_create_junction_table_for_income_and_tag_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('income_tag', [
            'income_id' => $this->integer(),
            'tag_id' => $this->integer(),
            'PRIMARY KEY(income_id, tag_id)',
        ]);

        // creates index for column `income_id`
        $this->createIndex(
            'idx-income_tag-income_id',
            'income_tag',
            'income_id'
        );

        // add foreign key for table `income`
        $this->addForeignKey(
            'fk-income_tag-income_id',
            'income_tag',
            'income_id',
            'income',
            'id',
            'CASCADE'
        );

        // creates index for column `tag_id`
        $this->createIndex(
            'idx-income_tag-tag_id',
            'income_tag',
            'tag_id'
        );

        // add foreign key for table `tag`
        $this->addForeignKey(
            'fk-income_tag-tag_id',
            'income_tag',
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
        // drops foreign key for table `income`
        $this->dropForeignKey(
            'fk-income_tag-income_id',
            'income_tag'
        );

        // drops index for column `income_id`
        $this->dropIndex(
            'idx-income_tag-income_id',
            'income_tag'
        );

        // drops foreign key for table `tag`
        $this->dropForeignKey(
            'fk-income_tag-tag_id',
            'income_tag'
        );

        // drops index for column `tag_id`
        $this->dropIndex(
            'idx-income_tag-tag_id',
            'income_tag'
        );

        $this->dropTable('income_tag');
    }
}
