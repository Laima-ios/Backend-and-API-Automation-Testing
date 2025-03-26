<?php

class CreateUserCest
{
    public function _before(ApiTester $I)
    {
    }

    public function createUserSuccessfully(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Authorization', 'Basic ' . base64_encode('username:password'));
        $I->sendPost('/users', [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john.doe@example.com',
            'dateOfBirth' => '1985-10-01',
            'personalIdDocument' => [
                'documentId' => 'AB123456',
                'countryOfIssue' => 'US',
                'validUntil' => '2030-12-31',
            ]
        ]);
        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();
        $I->seeResponseContains('"firstName":"John"');
    }
}
