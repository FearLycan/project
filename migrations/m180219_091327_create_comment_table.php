<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m180219_091327_create_comment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer()->notNull(),
            'content' => $this->text(),
            'author_id' => $this->integer()->notNull(),
            'parent_id' => $this->integer()->null()->defaultValue(0),
            'level' => $this->smallInteger()->notNull()->defaultValue(1),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);

        $this->createIndex('{{%comment_created_at_index}}', '{{%comment}}', 'created_at');
        $this->createIndex('{{%comment_updated_at_index}}', '{{%comment}}', 'updated_at');

        $this->addForeignKey('{{%comment_author_id_fk}}', '{{%comment}}', 'author_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('{{%comment_item_id_fk}}', '{{%comment}}', 'item_id', '{{%item}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
