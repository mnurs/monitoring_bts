<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMonitoringRequest;
use App\Http\Requests\UpdateMonitoringRequest;
use App\Repositories\MonitoringRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MonitoringController extends AppBaseController
{
    /** @var MonitoringRepository $monitoringRepository*/
    private $monitoringRepository;

    public function __construct(MonitoringRepository $monitoringRepo)
    {
        $this->monitoringRepository = $monitoringRepo;
    }

    /**
     * Display a listing of the Monitoring.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $monitorings = $this->monitoringRepository->all();

        return view('monitorings.index')
            ->with('monitorings', $monitorings);
    }

    /**
     * Show the form for creating a new Monitoring.
     *
     * @return Response
     */
    public function create()
    {
        return view('monitorings.create');
    }

    /**
     * Store a newly created Monitoring in storage.
     *
     * @param CreateMonitoringRequest $request
     *
     * @return Response
     */
    public function store(CreateMonitoringRequest $request)
    {
        $input = $request->all();

        $monitoring = $this->monitoringRepository->create($input);

        Flash::success('Monitoring saved successfully.');

        return redirect(route('monitorings.index'));
    }

    /**
     * Display the specified Monitoring.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $monitoring = $this->monitoringRepository->find($id);

        if (empty($monitoring)) {
            Flash::error('Monitoring not found');

            return redirect(route('monitorings.index'));
        }

        return view('monitorings.show')->with('monitoring', $monitoring);
    }

    /**
     * Show the form for editing the specified Monitoring.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $monitoring = $this->monitoringRepository->find($id);

        if (empty($monitoring)) {
            Flash::error('Monitoring not found');

            return redirect(route('monitorings.index'));
        }

        return view('monitorings.edit')->with('monitoring', $monitoring);
    }

    /**
     * Update the specified Monitoring in storage.
     *
     * @param int $id
     * @param UpdateMonitoringRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMonitoringRequest $request)
    {
        $monitoring = $this->monitoringRepository->find($id);

        if (empty($monitoring)) {
            Flash::error('Monitoring not found');

            return redirect(route('monitorings.index'));
        }

        $monitoring = $this->monitoringRepository->update($request->all(), $id);

        Flash::success('Monitoring updated successfully.');

        return redirect(route('monitorings.index'));
    }

    /**
     * Remove the specified Monitoring from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $monitoring = $this->monitoringRepository->find($id);

        if (empty($monitoring)) {
            Flash::error('Monitoring not found');

            return redirect(route('monitorings.index'));
        }

        $this->monitoringRepository->delete($id);

        Flash::success('Monitoring deleted successfully.');

        return redirect(route('monitorings.index'));
    }
}
