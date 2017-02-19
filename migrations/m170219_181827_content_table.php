<?php

use yii\db\Migration;

class m170219_181827_content_table extends Migration
{
    public function up()
    {
        $this->createTable('content', [
            'id' => $this->primaryKey(),
            'text' => $this->text(),
            'description' => $this->text(),
        ]);
    }

    public function down()
    {
        $this->dropTable('content');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
