<?php

class DeleteUserCest
{
    public function _before(ApiTester $I)
    {
    }

    public function deleteUser(ApiTester $I)
    {
        $I->haveHttpHeader('Authorization', 'Basic ' . base64_encode('username:password'));
        $I->sendDelete('/users/123456');
        $I->seeResponseCodeIs(204);
    }
}
