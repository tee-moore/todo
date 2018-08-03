<?php

namespace backend\tests\api;

use backend\tests\ApiTester;

class CreateTaskCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    public function GetMethod(ApiTester $I)
    {
        $I->sendGET("/tasks");
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function PostMethod(ApiTester $I)
    {
        $I->sendPOST('/tasks', [
            'title' => 'TestTitle',
            'description' => 'TestDescription',
            'created_at' => '1531833570',
            ' status' => 'new'
        ], [
            'imagefile' => codecept_data_dir('images.png')
        ]);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function PostMethodNotImage(ApiTester $I)
    {
        $I->sendPOST('/tasks', [
            'title' => 'TestTitle',
            'description' => 'TestDescription',
            'created_at' => '1531833570',
            ' status' => 'new'
        ], [
            'imagefile' => codecept_data_dir('notimahe.php')
        ]);

        $I->seeResponseCodeIs(422);
        $I->seeResponseIsJson();
    }

    public function PostMethodEmptyRequireField(ApiTester $I)
    {
        $I->sendPOST('/tasks', [
            'title' => 'new'
        ]);

        $I->seeResponseCodeIs(500);
        $I->seeResponseIsJson();
    }
}