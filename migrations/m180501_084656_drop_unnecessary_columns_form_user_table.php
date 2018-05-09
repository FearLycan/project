<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `unnecessary_columns_form_user`.
 */
class m180501_084656_drop_unnecessary_columns_form_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropColumn('{{%user}}', 'real_name');
        $this->dropColumn('{{%user}}', 'real_last_name');
        $this->dropColumn('{{%user}}', 'city');
        $this->dropColumn('{{%user}}', 'country');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->addColumn('{{%user}}', 'real_name', $this->string()->null()->after('name'));
        $this->addColumn('{{%user}}', 'real_last_name', $this->string()->null()->after('real_name'));
        $this->addColumn('{{%user}}', 'city', $this->string()->null()->after('status'));
        $this->addColumn('{{%user}}', 'country', $this->string()->null()->after('city'));
    }
}
