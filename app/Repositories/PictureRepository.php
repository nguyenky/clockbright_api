<?php

namespace App\Repositories;

use App\Models\Picture;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PictureRepository
 * @package App\Repositories
 * @version May 15, 2018, 2:31 am UTC
 *
 * @method Picture findWithoutFail($id, $columns = ['*'])
 * @method Picture find($id, $columns = ['*'])
 * @method Picture first($columns = ['*'])
*/
class PictureRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'activity_id',
        'name',
        'url'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Picture::class;
    }
}
