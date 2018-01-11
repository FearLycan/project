<?php

use yii\db\Migration;

/**
 * Handles the creation of table `page`.
 */
class m180111_182129_create_page_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'slug' => $this->string(),
            'content' => $this->text(),
            'status' => $this->smallInteger(),
            'author_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);

        $this->createIndex('{{%page_created_at_index}}', '{{%page}}', 'created_at');
        $this->createIndex('{{%page_updated_at_index}}', '{{%page}}', 'updated_at');
        $this->createIndex('{{%page_title_index}}', '{{%page}}', 'title');

        $this->addForeignKey('{{%page_author_id_fk}}', '{{%page}}', 'author_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%page}}');
    }
}
