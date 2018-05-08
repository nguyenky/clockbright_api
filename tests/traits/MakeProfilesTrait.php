<?php

use Faker\Factory as Faker;
use App\Models\Profiles;
use App\Repositories\ProfilesRepository;

trait MakeProfilesTrait
{
    /**
     * Create fake instance of Profiles and save it in database
     *
     * @param array $profilesFields
     * @return Profiles
     */
    public function makeProfiles($profilesFields = [])
    {
        /** @var ProfilesRepository $profilesRepo */
        $profilesRepo = App::make(ProfilesRepository::class);
        $theme = $this->fakeProfilesData($profilesFields);
        return $profilesRepo->create($theme);
    }

    /**
     * Get fake instance of Profiles
     *
     * @param array $profilesFields
     * @return Profiles
     */
    public function fakeProfiles($profilesFields = [])
    {
        return new Profiles($this->fakeProfilesData($profilesFields));
    }

    /**
     * Get fake data of Profiles
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProfilesData($profilesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'phone_number' => $fake->word,
            'avatar' => $fake->word,
            'fullname' => $fake->word,
            'address' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $profilesFields);
    }
}
