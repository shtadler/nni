<?php

use yii\db\Migration;

class m170208_150805_init extends Migration
{
    public function up()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(191)->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string(191)->notNull(),
            'password_reset_token' => $this->string(191)->unique(),
            'email' => $this->string(191)->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->insert('{{%user}}', [
            'id' => 1,
            'username' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('1'),
            'email' => 'admin@admin.com',
            'created_at' => time(),
            'updated_at' => time()
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
