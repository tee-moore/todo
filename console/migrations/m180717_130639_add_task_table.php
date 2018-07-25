<?php

use yii\db\Migration;

/**
 * Class m180717_130639_add_task_table
 */
class m180717_130639_add_task_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'created_at' => $this->string()->notNull(),
            'started_at' => $this->integer(),
            'status' => $this->string()->notNull(),
            'imagefilepath' => $this->string(),
            'imagefile' => $this->string(),

        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%task}}');
    }
}
