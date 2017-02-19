<?php

use yii\db\Migration;

class m170219_182610_set_default_content extends Migration
{
    public function up()
    {
        $this->insert('content', [
            'id' => 1,
            'text' => '<strong>Twitter, Inc.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890',
            'description' => 'Перша контактна адреса',
        ]);

        $this->insert('content', [
            'id' => 2,
            'text' => '<strong>Twitter, Inc.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890',
            'description' => 'Друга контактна адреса',
        ]);
    }

    public function down()
    {
        $this->delete('content', ['id' => 1]);
        $this->delete('content', ['id' => 2]);
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
