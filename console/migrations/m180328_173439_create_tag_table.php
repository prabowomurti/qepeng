<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tag`.
 */
class m180328_173439_create_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tag', [
            'id'         => $this->primaryKey(),
            'user_id'    => $this->integer(),
            'slug'       => $this->string()->notNull(),
            'type'       => $this->string()->notNull(),
            'count'      => $this->integer()->defaultValue(0),
            'deleted'    => $this->boolean()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-tag-user_id',
            'tag',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-tag-user_id',
            'tag',
            'user_id',
            'user',
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
            'fk-tag-user_id',
            'tag'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-tag-user_id',
            'tag'
        );

        $this->dropTable('tag');
    }
}
