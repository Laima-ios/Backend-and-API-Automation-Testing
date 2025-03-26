<?php

class UpdateUserCest
{
    public function _before(ApiTester $I)
    {
    }

    public function updateUser(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Authorization', 'Basic ' . base64_encode('username:password'));
        $I->sendPut('/users/123456', [
            'firstName' => 'Jane',
            'lastName' => 'Doe',
            'email' => 'jane.doe@example.com',
            'dateOfBirth' => '1985-10-01',
            'personalIdDocument' => [
                'documentId' => 'AB123456',
                'countryOfIssue' => 'US',
                'validUntil' => '2030-12-31',
            ]
        ]);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContains('"firstName":"Jane"');
    }
}
