<?php

class GetUserByIDCest
{
    public function _before(ApiTester $I)
    {
    }

    public function getUserById(ApiTester $I)
    {
        $I->haveHttpHeader('Authorization', 'Basic ' . base64_encode('username:password'));
        $I->sendGet('/users/123456');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContains('"id":"123456"');
    }
}
