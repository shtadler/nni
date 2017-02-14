<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m170212_153625_create_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('furl', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp()
        ]);

        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->defaultValue(''),
            'for_students' => $this->boolean(),
            'for_abitur' => $this->boolean(),
            'description' => $this->text(),
            'text' => $this->text(),
            'furl_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp()
        ]);

        $this->addForeignKey('fk_furl_article', 'article', 'furl_id', 'furl', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_furl_article', 'article');
        $this->dropTable('furl');
        $this->dropTable('article');
    }
}
