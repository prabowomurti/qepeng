<?php

use yii\db\Migration;

/**
 * Drop username index from user table
 */
class m180402_043346_alter_user_table_drop_index_username extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropIndex('username', 'user');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->createIndex('username', 'user', 'username', $unique = true);
    }
}
