<?php

use yii\db\Migration;

/**
 * Class m180504_102443_add_avatar_columnt_to_user_table
 */
class m180504_102443_add_avatar_columnt_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'avatar', $this->string()->defaultValue('blank.gif')->after('email'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'avatar');
    }
}
