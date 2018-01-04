<?php

use yii\db\Migration;

/**
 * Handles the creation of table `type`.
 */
class m171231_121004_create_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'slug' => $this->string(),
            'status' => $this->smallInteger()->defaultValue(0),
            'author_id' => $this->integer(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null(),
        ]);

        $this->createIndex('{{%type_created_at_index}}', '{{%type}}', 'created_at');
        $this->createIndex('{{%type_updated_at_index}}', '{{%type}}', 'updated_at');
        $this->addForeignKey('{{%type_author_id_fk}}', '{{%type}}', 'author_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%type}}');
    }
}
