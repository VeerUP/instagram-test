<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%owner}}`.
 */
class m201011_121027_create_owner_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%owner}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->batchInsert('{{%owner}}', ['username', 'created_at'], [
            ['samoylovaoxana', time()],
            ['_agentgirl_', time()],
            ['khabib_nurmagomedov', time()],
            ['borodylia', time()],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%owner}}');
    }
}
