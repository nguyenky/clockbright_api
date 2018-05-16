<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PictureApiTest extends TestCase
{
    use MakePictureTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePicture()
    {
        $picture = $this->fakePictureData();
        $this->json('POST', '/api/v1/pictures', $picture);

        $this->assertApiResponse($picture);
    }

    /**
     * @test
     */
    public function testReadPicture()
    {
        $picture = $this->makePicture();
        $this->json('GET', '/api/v1/pictures/'.$picture->id);

        $this->assertApiResponse($picture->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePicture()
    {
        $picture = $this->makePicture();
        $editedPicture = $this->fakePictureData();

        $this->json('PUT', '/api/v1/pictures/'.$picture->id, $editedPicture);

        $this->assertApiResponse($editedPicture);
    }

    /**
     * @test
     */
    public function testDeletePicture()
    {
        $picture = $this->makePicture();
        $this->json('DELETE', '/api/v1/pictures/'.$picture->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pictures/'.$picture->id);

        $this->assertResponseStatus(404);
    }
}
