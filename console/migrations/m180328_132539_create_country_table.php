<?php

use yii\db\Migration;

/**
 * Handles the creation of table `country`.
 */
class m180328_132539_create_country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('country', [
            'id'    => $this->primaryKey(),
            'code'  => $this->string(5)->notNull(),
            'label' => $this->string(100),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('country');
    }
}
