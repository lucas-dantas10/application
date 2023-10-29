<?php

use yii\db\Migration;

/**
 * Class m231026_155603_atributo
 */
class m231026_155603_atributos extends Migration
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
        echo "m231026_155603_atributo cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->createTable('atributos', [
            'id' => 'pk',
            'nome' => 'string NOT NULL',
            'pessoa_id' => $this->integer(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->addForeignKey(
            'pk-atributos-pessoa_id',
            'atributos',
            'pessoa_id',
            'pessoas',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('atributo');
    }
}
