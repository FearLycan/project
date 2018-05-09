<?php

use yii\db\Migration;

/**
 * Handles adding item_it to table `review`.
 */
class m180418_131405_add_item_id_column_to_review_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('{{%review}}', 'item_id', $this->integer()->notNull()->after('author_id'));

        $this->addForeignKey('{{%review_item_id_fk}}', '{{%review}}', 'item_id', '{{%item}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('{{%review}}', 'item_id');
    }
}
