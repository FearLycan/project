<?php

use yii\db\Migration;

/**
 * Handles the creation of table `review`.
 */
class m180417_205642_create_review_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%review}}', [
            'id' => $this->primaryKey(),
            'content' => $this->text(),
            'status' => $this->smallInteger()->defaultValue(0),
            'rating' => $this->decimal(4, 2)->null(),
            'images' => $this->text()->null(),
            'confirmed_by_purchase' => $this->smallInteger()->defaultValue(0),
            'author_id' => $this->integer(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null(),
        ]);

        $this->createIndex('{{%review_created_at_index}}', '{{%review}}', 'created_at');
        $this->createIndex('{{%review_updated_at_index}}', '{{%review}}', 'updated_at');
        $this->createIndex('{{%review_status_index}}', '{{%review}}', 'status');
        $this->createIndex('{{%review_rating_index}}', '{{%review}}', 'rating');

        $this->addForeignKey('{{%review_author_id_fk}}', '{{%review}}', 'author_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%review}}');
    }
}
