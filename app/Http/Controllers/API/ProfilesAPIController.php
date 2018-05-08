<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProfilesAPIRequest;
use App\Http\Requests\API\UpdateProfilesAPIRequest;
use App\Models\Profiles;
use App\Repositories\ProfilesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProfilesController
 * @package App\Http\Controllers\API
 */

class ProfilesAPIController extends AppBaseController
{
    /** @var  ProfilesRepository */
    private $profilesRepository;

    public function __construct(ProfilesRepository $profilesRepo)
    {
        $this->profilesRepository = $profilesRepo;
    }

    /**
     * Display a listing of the Profiles.
     * GET|HEAD /profiles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->profilesRepository->pushCriteria(new RequestCriteria($request));
        $this->profilesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $profiles = $this->profilesRepository->all();

        return $this->sendResponse($profiles->toArray(), 'Profiles retrieved successfully');
    }

    /**
     * Store a newly created Profiles in storage.
     * POST /profiles
     *
     * @param CreateProfilesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProfilesAPIRequest $request)
    {
        $input = $request->all();

        $profiles = $this->profilesRepository->create($input);

        return $this->sendResponse($profiles->toArray(), 'Profiles saved successfully');
    }

    /**
     * Display the specified Profiles.
     * GET|HEAD /profiles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Profiles $profiles */
        $profiles = $this->profilesRepository->findWithoutFail($id);

        if (empty($profiles)) {
            return $this->sendError('Profiles not found');
        }

        return $this->sendResponse($profiles->toArray(), 'Profiles retrieved successfully');
    }

    /**
     * Update the specified Profiles in storage.
     * PUT/PATCH /profiles/{id}
     *
     * @param  int $id
     * @param UpdateProfilesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfilesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Profiles $profiles */
        $profiles = $this->profilesRepository->findWithoutFail($id);

        if (empty($profiles)) {
            return $this->sendError('Profiles not found');
        }

        $profiles = $this->profilesRepository->update($input, $id);

        return $this->sendResponse($profiles->toArray(), 'Profiles updated successfully');
    }

    /**
     * Remove the specified Profiles from storage.
     * DELETE /profiles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Profiles $profiles */
        $profiles = $this->profilesRepository->findWithoutFail($id);

        if (empty($profiles)) {
            return $this->sendError('Profiles not found');
        }

        $profiles->delete();

        return $this->sendResponse($id, 'Profiles deleted successfully');
    }
}
