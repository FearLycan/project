<?php

use yii\db\Migration;

/**
 * Handles the creation of table `image`.
 *
 * @author Damian Brończyk <damian.bronczyk@gmail.com.pl>
 */
class m171218_210602_create_image_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%image}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'url' => $this->string(),
            'author_id' => $this->integer(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null(),
        ]);

        $this->createIndex('{{%image_created_at_index}}', '{{%image}}', 'created_at');
        $this->createIndex('{{%image_updated_at_index}}', '{{%image}}', 'updated_at');
        $this->addForeignKey('{{%image_author_id_fk}}', '{{%image}}', 'author_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');

    }


    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%image}}');
    }
}
