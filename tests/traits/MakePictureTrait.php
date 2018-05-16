<?php

use Faker\Factory as Faker;
use App\Models\Picture;
use App\Repositories\PictureRepository;

trait MakePictureTrait
{
    /**
     * Create fake instance of Picture and save it in database
     *
     * @param array $pictureFields
     * @return Picture
     */
    public function makePicture($pictureFields = [])
    {
        /** @var PictureRepository $pictureRepo */
        $pictureRepo = App::make(PictureRepository::class);
        $theme = $this->fakePictureData($pictureFields);
        return $pictureRepo->create($theme);
    }

    /**
     * Get fake instance of Picture
     *
     * @param array $pictureFields
     * @return Picture
     */
    public function fakePicture($pictureFields = [])
    {
        return new Picture($this->fakePictureData($pictureFields));
    }

    /**
     * Get fake data of Picture
     *
     * @param array $postFields
     * @return array
     */
    public function fakePictureData($pictureFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'activity_id' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'url' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $pictureFields);
    }
}
