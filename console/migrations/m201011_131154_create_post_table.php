<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m201011_131154_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->bigInteger()->notNull(),
            'url' => $this->string()->notNull(),
            'image' => $this->string(512)->notNull(),
            'caption' => $this->text(),
            'owner_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey(null, '{{%post}}', 'id');
        $this->createIndex('idx-post-owner_id', '{{%post}}', 'owner_id');
        $this->createIndex('idx-post-created_at', '{{%post}}', 'created_at');

        $this->addForeignKey(
            'fk-post-owner_id',
            '{{%post}}',
            'owner_id',
            '{{%owner}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%post}}');
    }
}
