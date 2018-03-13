<?php

use yii\db\Migration;

/**
 * Class m180313_092651_add_columns_to_user_table
 */
class m180313_092651_add_columns_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'real_name', $this->string()->null()->after('name'));
        $this->addColumn('{{%user}}', 'real_last_name', $this->string()->null()->after('real_name'));
        $this->addColumn('{{%user}}', 'city', $this->string()->null()->after('status'));
        $this->addColumn('{{%user}}', 'country', $this->string()->null()->after('city'));
        $this->addColumn('{{%user}}', 'about', $this->text()->null()->after('real_last_name'));
        $this->addColumn('{{%user}}', 'links', $this->text()->null()->after('about'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'real_name');
        $this->dropColumn('{{%user}}', 'real_last_name');
        $this->dropColumn('{{%user}}', 'city');
        $this->dropColumn('{{%user}}', 'country');
        $this->dropColumn('{{%user}}', 'about');
    }
}
