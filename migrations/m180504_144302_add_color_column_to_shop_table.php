<?php

use yii\db\Migration;

/**
 * Handles adding color to table `shop`.
 */
class m180504_144302_add_color_column_to_shop_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('{{%shop}}', 'color', $this->string()->notNull()->after('image'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('{{%shop}}', 'color');
    }
}
