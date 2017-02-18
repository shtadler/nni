<?php

use yii\db\Migration;

/**
 * Handles the creation of table `document`.
 */
class m170216_225241_create_document_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('document', [
            'id' => $this->primaryKey(),
            'entity_id' => $this->integer()->notNull(),
            'entity_name' => $this->string()->notNull(),
            'name' => $this->string(),
            'size' => $this->integer(),
            'hash_name' => $this->string(),
            'extension' => $this->string(),
            'mime' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('document');
    }
}
