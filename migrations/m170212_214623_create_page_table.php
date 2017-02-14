<?php

use yii\db\Migration;

/**
 * Handles the creation of table `page`.
 */
class m170212_214623_create_page_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('page', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->defaultValue(''),
            'to_dropdown' => $this->boolean(),
            'to_submenu' => $this->boolean(),
            'text' => $this->text(),
            'furl_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp()
        ]);

        $this->addForeignKey('fk_furl_page', 'page', 'furl_id', 'furl', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_furl_page', 'page');
        $this->dropTable('page');
    }
}
