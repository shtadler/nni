<?php

use yii\db\Migration;

class m170219_185132_main_slider extends Migration
{
    public function up()
    {
        $this->createTable('main_slider', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'status' => $this->boolean()->notNull()->defaultValue(1),
        ]);

        $this->insert('main_slider', [
            'id' => 1,
            'title' => 'УНІВЕРСИТЕТ ДЕРЖАВНОЇ ФІСКАЛЬНОЇ СЛУЖБИ УКРАЇНИ
                        ВІННИЦЬКИЙ НАВЧАЛЬНО-НАУКОВИЙ ІНСТИТУТ',
        ]);
        $this->insert('main_slider', [
            'id' => 2,
            'title' => 'Про нас',
            'description' => 'натисніть <a href="#">перейти</a>.'
        ]);
    }

    public function down()
    {
        $this->dropTable('main_slider');
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
