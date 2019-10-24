<?php

use yii\db\Migration;

/**
 * Class m191024_230055_immo
 */
class m191024_230055_immo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%currency}}', [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(200)->notNull(),
            'rate' => $this->float()->notNull(),
            'insert_dt' => $this->dateTime()->notNull(),
        ], 'COMMENT="Currency"');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%currency}}');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191024_230055_immo cannot be reverted.\n";

        return false;
    }
    */
}
