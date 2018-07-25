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
            'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo distinctio fugiat quaerat vel ea unde impedit praesentium animi, tempora vitae similique culpa aut debitis assumenda quibusdam sed ad explicabo pariatur non, quam consequatur reprehenderit dignissimos aliquam iusto cum. Perferendis, voluptates.',
            'created_at' =>'1531824176',
            'started_at'=>'',
            'status'=>'new',
            'img'=>'',
        ));

        $this->insert('task',array(
            'title' =>'second task!',
            'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo distinctio fugiat quaerat vel ea unde impedit praesentium animi, tempora vitae similique culpa aut debitis assumenda quibusdam sed ad explicabo pariatur non, quam consequatur reprehenderit dignissimos aliquam iusto cum. Perferendis, voluptates.',
            'created_at' =>'1531825251',
            'started_at'=>'1531826765',
            'status'=>'done',
            'img'=>'',
        ));

        $this->insert('task',array(
            'title' =>'have breakfast',
            'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo distinctio fugiat quaerat vel ea unde impedit praesentium animi, tempora vitae similique culpa aut debitis assumenda quibusdam sed ad explicabo pariatur non, quam consequatur reprehenderit dignissimos aliquam iusto cum. Perferendis, voluptates.',
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
