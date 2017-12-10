<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shop`.
 *
 * @author Damian Brończyk <damian.bronczyk@gmail.com.pl>
 */
class m171210_205535_create_shop_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%shop}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'slug' => $this->string(),
            'image' => $this->string(),
            'author_id' => $this->integer(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null(),
        ]);

        $this->createIndex('{{%shop_created_at_index}}', '{{%shop}}', 'created_at');
        $this->createIndex('{{%shop_updated_at_index}}', '{{%shop}}', 'updated_at');
        $this->addForeignKey('{{%shop_author_id_fk}}', '{{%shop}}', 'author_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%shop}}');
    }
}
