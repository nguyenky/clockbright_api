<?php

namespace App\Repositories;

use App\Models\Profiles;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProfilesRepository
 * @package App\Repositories
 * @version May 8, 2018, 7:14 am UTC
 *
 * @method Profiles findWithoutFail($id, $columns = ['*'])
 * @method Profiles find($id, $columns = ['*'])
 * @method Profiles first($columns = ['*'])
*/
class ProfilesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'phone_number',
        'avatar',
        'fullname',
        'address'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Profiles::class;
    }
}
