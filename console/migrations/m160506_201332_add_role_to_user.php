<?php

use yii\db\Migration;

/**
 * Handles adding role to table `user`.
 */
class m160506_201332_add_role_to_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'role', 'VARCHAR(50) AFTER `email` ');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'role');
    }
}
