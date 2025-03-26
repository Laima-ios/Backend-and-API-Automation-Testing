<?php

class EdgeCasesCest
{
    public function _before(ApiTester $I)
    {
    }

    public function getNonExistingUser(ApiTester $I)
    {
        $I->haveHttpHeader('Authorization', 'Basic ' . base64_encode('username:password'));
        $I->sendGet('/users/non-existing-id');
        $I->seeResponseCodeIs(404);
        $I->seeResponseIsJson();
        $I->seeResponseContains('"title":"User not found"');
    }

    public function updateNonExistingUser(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Authorization', 'Basic ' . base64_encode('username:password'));
        $I->sendPut('/users/non-existing-id', [
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
        $I->seeResponseCodeIs(404);
        $I->seeResponseIsJson();
        $I->seeResponseContains('"title":"User not found"');
    }

    public function deleteNonExistingUser(ApiTester $I)
    {
        $I->haveHttpHeader('Authorization', 'Basic ' . base64_encode('username:password'));
        $I->sendDelete('/users/non-existing-id');
        $I->seeResponseCodeIs(404);
        $I->seeResponseIsJson();
        $I->seeResponseContains('"title":"User not found"');
    }
}
