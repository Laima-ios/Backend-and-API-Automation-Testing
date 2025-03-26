<?php

class InvalidUserCreationCest
{
    public function _before(ApiTester $I)
    {
    }

    public function createInvalidUser(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Authorization', 'Basic ' . base64_encode('username:password'));
        $I->sendPost('/users', [
            'firstName' => '',
            'lastName' => 'Doe',
            'email' => 'john.doe@example.com',
            'dateOfBirth' => '1985-10-01',
            'personalIdDocument' => [
                'documentId' => 'AB123456',
                'countryOfIssue' => 'US',
                'validUntil' => '2030-12-31',
            ]
        ]);
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContains('"title":"Invalid Input"');
    }
}
