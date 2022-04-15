<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMonitoringAPIRequest;
use App\Http\Requests\API\UpdateMonitoringAPIRequest;
use App\Models\Monitoring;
use App\Repositories\MonitoringRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MonitoringController
 * @package App\Http\Controllers\API
 */

class MonitoringAPIController extends AppBaseController
{
    /** @var  MonitoringRepository */
    private $monitoringRepository;

    public function __construct(MonitoringRepository $monitoringRepo)
    {
        $this->monitoringRepository = $monitoringRepo;
    }

    /**
     * Display a listing of the Monitoring.
     * GET|HEAD /monitorings
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $monitorings = $this->monitoringRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($monitorings->toArray(), 'Monitorings retrieved successfully');
    }

    /**
     * Store a newly created Monitoring in storage.
     * POST /monitorings
     *
     * @param CreateMonitoringAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMonitoringAPIRequest $request)
    {
        $input = $request->all();

        $monitoring = $this->monitoringRepository->create($input);

        return $this->sendResponse($monitoring->toArray(), 'Monitoring saved successfully');
    }

    /**
     * Display the specified Monitoring.
     * GET|HEAD /monitorings/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Monitoring $monitoring */
        $monitoring = $this->monitoringRepository->find($id);

        if (empty($monitoring)) {
            return $this->sendError('Monitoring not found');
        }

        return $this->sendResponse($monitoring->toArray(), 'Monitoring retrieved successfully');
    }

    /**
     * Update the specified Monitoring in storage.
     * PUT/PATCH /monitorings/{id}
     *
     * @param int $id
     * @param UpdateMonitoringAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMonitoringAPIRequest $request)
    {
        $input = $request->all();

        /** @var Monitoring $monitoring */
        $monitoring = $this->monitoringRepository->find($id);

        if (empty($monitoring)) {
            return $this->sendError('Monitoring not found');
        }

        $monitoring = $this->monitoringRepository->update($input, $id);

        return $this->sendResponse($monitoring->toArray(), 'Monitoring updated successfully');
    }

    /**
     * Remove the specified Monitoring from storage.
     * DELETE /monitorings/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Monitoring $monitoring */
        $monitoring = $this->monitoringRepository->find($id);

        if (empty($monitoring)) {
            return $this->sendError('Monitoring not found');
        }

        $monitoring->delete();

        return $this->sendSuccess('Monitoring deleted successfully');
    }
}
