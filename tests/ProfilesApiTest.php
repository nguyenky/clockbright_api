<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfilesApiTest extends TestCase
{
    use MakeProfilesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProfiles()
    {
        $profiles = $this->fakeProfilesData();
        $this->json('POST', '/api/v1/profiles', $profiles);

        $this->assertApiResponse($profiles);
    }

    /**
     * @test
     */
    public function testReadProfiles()
    {
        $profiles = $this->makeProfiles();
        $this->json('GET', '/api/v1/profiles/'.$profiles->id);

        $this->assertApiResponse($profiles->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProfiles()
    {
        $profiles = $this->makeProfiles();
        $editedProfiles = $this->fakeProfilesData();

        $this->json('PUT', '/api/v1/profiles/'.$profiles->id, $editedProfiles);

        $this->assertApiResponse($editedProfiles);
    }

    /**
     * @test
     */
    public function testDeleteProfiles()
    {
        $profiles = $this->makeProfiles();
        $this->json('DELETE', '/api/v1/profiles/'.$profiles->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/profiles/'.$profiles->id);

        $this->assertResponseStatus(404);
    }
}
