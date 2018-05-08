<?php

use App\Models\Profiles;
use App\Repositories\ProfilesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfilesRepositoryTest extends TestCase
{
    use MakeProfilesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProfilesRepository
     */
    protected $profilesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->profilesRepo = App::make(ProfilesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProfiles()
    {
        $profiles = $this->fakeProfilesData();
        $createdProfiles = $this->profilesRepo->create($profiles);
        $createdProfiles = $createdProfiles->toArray();
        $this->assertArrayHasKey('id', $createdProfiles);
        $this->assertNotNull($createdProfiles['id'], 'Created Profiles must have id specified');
        $this->assertNotNull(Profiles::find($createdProfiles['id']), 'Profiles with given id must be in DB');
        $this->assertModelData($profiles, $createdProfiles);
    }

    /**
     * @test read
     */
    public function testReadProfiles()
    {
        $profiles = $this->makeProfiles();
        $dbProfiles = $this->profilesRepo->find($profiles->id);
        $dbProfiles = $dbProfiles->toArray();
        $this->assertModelData($profiles->toArray(), $dbProfiles);
    }

    /**
     * @test update
     */
    public function testUpdateProfiles()
    {
        $profiles = $this->makeProfiles();
        $fakeProfiles = $this->fakeProfilesData();
        $updatedProfiles = $this->profilesRepo->update($fakeProfiles, $profiles->id);
        $this->assertModelData($fakeProfiles, $updatedProfiles->toArray());
        $dbProfiles = $this->profilesRepo->find($profiles->id);
        $this->assertModelData($fakeProfiles, $dbProfiles->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProfiles()
    {
        $profiles = $this->makeProfiles();
        $resp = $this->profilesRepo->delete($profiles->id);
        $this->assertTrue($resp);
        $this->assertNull(Profiles::find($profiles->id), 'Profiles should not exist in DB');
    }
}
