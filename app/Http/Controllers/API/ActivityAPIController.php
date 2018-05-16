<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateActivityAPIRequest;
use App\Http\Requests\API\UpdateActivityAPIRequest;
use App\Models\Activity;
use App\Repositories\ActivityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ActivityController
 * @package App\Http\Controllers\API
 */

class ActivityAPIController extends AppBaseController
{
    /** @var  ActivityRepository */
    private $activityRepository;

    public function __construct(ActivityRepository $activityRepo)
    {
        $this->activityRepository = $activityRepo;
    }

    /**
     * Display a listing of the Activity.
     * GET|HEAD /activities
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->activityRepository->pushCriteria(new RequestCriteria($request));
        $this->activityRepository->pushCriteria(new LimitOffsetCriteria($request));
        $activities = $this->activityRepository->all();

        return $this->sendResponse($activities->toArray(), 'Activities retrieved successfully');
    }

    /**
     * Store a newly created Activity in storage.
     * POST /activities
     *
     * @param CreateActivityAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateActivityAPIRequest $request)
    {
        $input = $request->all();

        $activities = $this->activityRepository->create($input);

        return $this->sendResponse($activities->toArray(), 'Activity saved successfully');
    }

    /**
     * Display the specified Activity.
     * GET|HEAD /activities/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Activity $activity */
        $activity = $this->activityRepository->findWithoutFail($id);

        if (empty($activity)) {
            return $this->sendError('Activity not found');
        }

        return $this->sendResponse($activity->toArray(), 'Activity retrieved successfully');
    }

    /**
     * Update the specified Activity in storage.
     * PUT/PATCH /activities/{id}
     *
     * @param  int $id
     * @param UpdateActivityAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActivityAPIRequest $request)
    {
        $input = $request->all();

        /** @var Activity $activity */
        $activity = $this->activityRepository->findWithoutFail($id);

        if (empty($activity)) {
            return $this->sendError('Activity not found');
        }

        $activity = $this->activityRepository->update($input, $id);

        return $this->sendResponse($activity->toArray(), 'Activity updated successfully');
    }

    /**
     * Remove the specified Activity from storage.
     * DELETE /activities/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Activity $activity */
        $activity = $this->activityRepository->findWithoutFail($id);

        if (empty($activity)) {
            return $this->sendError('Activity not found');
        }

        $activity->delete();

        return $this->sendResponse($id, 'Activity deleted successfully');
    }
}
