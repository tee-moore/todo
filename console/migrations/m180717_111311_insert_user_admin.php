<?php

use yii\db\Migration;

/**
 * Class m180717_111311_insert_user_admin
 */
class m180717_111311_insert_user_admin extends Migration
{

    public function up()
    {
        $this->insert('user',array(
            'username' =>'admin',
            'auth_key' =>'eofzZj_j6BrrqzE0Cln93P9V71kgEHjc',
            'password_hash' =>'$2y$13$3ZJLiWta9RTUEuoEVxlVqOxMB5cmcS2I3KlU5/2HAeUW0b5KLvK9W',
            'email'=>'admin@todo.loc',
            'status'=>'10',
            'created_at'=>'1531826412',
            'updated_at'=>'1531826412',
        ));
    }

    public function down()
    {
        echo "m180717_111311_insert_user_admin does not support migration down.\n";
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180717_111311_insert_user cannot be reverted.\n";

        return false;
    }
    */
}
