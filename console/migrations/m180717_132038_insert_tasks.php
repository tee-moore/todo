<?php

use yii\db\Migration;

/**
 * Class m180717_132038_insert_tasks
 */
class m180717_132038_insert_tasks extends Migration
{
    public function up()
    {
        $this->insert('task',array(
            'title' =>'first task!',
            'description' =>'we created first task',
            'created_at' =>'1531824176',
            'started_at'=>'',
            'status'=>'new',
            'img'=>'',
        ));

        $this->insert('task',array(
            'title' =>'take a run in the morning',
            'description' =>'sport is good for health',
            'created_at' =>'1531825251',
            'started_at'=>'1531826765',
            'status'=>'done',
            'img'=>'',
        ));

        $this->insert('task',array(
            'title' =>'have breakfast',
            'description' =>'I like eating',
            'created_at' =>'1531833570',
            'started_at'=>'1531833570',
            'status'=>'in progress',
            'img'=>'',
        ));
    }

    public function down()
    {
        echo "m180717_132038_insert_tasks does not support migration down.\n";
        return false;
    }
}
