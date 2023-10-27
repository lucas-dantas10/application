<?php

use yii\db\Migration;

/**
 * Class m231026_153503_pessoa
 */
class m231026_153503_pessoas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231026_153503_pessoa cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('pessoas', [
            'id' => 'pk',
            'nome' => 'string NOT NULL',
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    public function down()
    {
        $this->dropTable('pessoa');
    }
    
}
