<?php

use yii\db\Migration;

/**
 * Handles adding country_id to table `user`.
 */
class m180328_133548_add_country_id_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'country_id', 'INTEGER AFTER `email`');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'country_id');
    }
}
