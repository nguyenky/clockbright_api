<?php

use App\Models\Picture;
use App\Repositories\PictureRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PictureRepositoryTest extends TestCase
{
    use MakePictureTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PictureRepository
     */
    protected $pictureRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pictureRepo = App::make(PictureRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePicture()
    {
        $picture = $this->fakePictureData();
        $createdPicture = $this->pictureRepo->create($picture);
        $createdPicture = $createdPicture->toArray();
        $this->assertArrayHasKey('id', $createdPicture);
        $this->assertNotNull($createdPicture['id'], 'Created Picture must have id specified');
        $this->assertNotNull(Picture::find($createdPicture['id']), 'Picture with given id must be in DB');
        $this->assertModelData($picture, $createdPicture);
    }

    /**
     * @test read
     */
    public function testReadPicture()
    {
        $picture = $this->makePicture();
        $dbPicture = $this->pictureRepo->find($picture->id);
        $dbPicture = $dbPicture->toArray();
        $this->assertModelData($picture->toArray(), $dbPicture);
    }

    /**
     * @test update
     */
    public function testUpdatePicture()
    {
        $picture = $this->makePicture();
        $fakePicture = $this->fakePictureData();
        $updatedPicture = $this->pictureRepo->update($fakePicture, $picture->id);
        $this->assertModelData($fakePicture, $updatedPicture->toArray());
        $dbPicture = $this->pictureRepo->find($picture->id);
        $this->assertModelData($fakePicture, $dbPicture->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePicture()
    {
        $picture = $this->makePicture();
        $resp = $this->pictureRepo->delete($picture->id);
        $this->assertTrue($resp);
        $this->assertNull(Picture::find($picture->id), 'Picture should not exist in DB');
    }
}
