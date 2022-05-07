<?php

namespace App\Http\Controllers;

use App\DataTables\MonitoringDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMonitoringRequest;
use App\Http\Requests\UpdateMonitoringRequest;
use App\Repositories\MonitoringRepository;
use App\Repositories\KuesionerRepository;
use App\Repositories\BtsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\User;
use App\Models\Monitoring;

class MonitoringController extends AppBaseController
{
    /** @var MonitoringRepository $monitoringRepository*/
    private $monitoringRepository;
    private $kuesionerRepository;
    private $btsRepository;

    public function __construct(
        MonitoringRepository $monitoringRepo,
        KuesionerRepository $kuesionerRepo,
        BtsRepository $btsRepo
    )
    {
        $this->monitoringRepository = $monitoringRepo;
        $this->kuesionerRepository = $kuesionerRepo;
        $this->btsRepository = $btsRepo;
    }

    /**
     * Display a listing of the Monitoring.
     *
     * @param MonitoringDataTable $monitoringDataTable
     *
     * @return Response
     */
    public function index(MonitoringDataTable $monitoringDataTable)
    {
        // $monitoring = $this->monitoringRepository->all();
        //  return view('monitorings.index')->with('monitoring', $monitoring);
        return $monitoringDataTable->render('monitorings.index');
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

    public function createSurvey($id)
    {
        $monitoring = $this->monitoringRepository->find($id);
        $kuesioner = $this->kuesionerRepository->all();

        if (empty($monitoring)) {
            Flash::error('Monitoring not found');

            return redirect(route('monitorings.index'));
        }

        return view('monitorings.survey')
        ->with('monitoring', $monitoring)
        ->with('kuesioner', $kuesioner)
        ->with('flag', true);
    }

    public function generateKunjungan(){
        $bts = $this->btsRepository->all();
        foreach ($bts as $key => $data) {
            $cek = Monitoring::
                        where('id_bts',$data->id)->
                        where('tgl_generate',date('Y-m-d'))->
                        first();

            if(empty($cek)){
                $users = User::inRandomOrder()->first();
                $input = [
                    'id_bts' => $data->id,
                    'id_user_surveyor' => $users->id,
                    'tgl_generate' => date('Y-m-d'),
                    'tahun' => date('Y'),
                    'created_by' => "admin"
                ];
                $monitoring = $this->monitoringRepository->create($input);
            }
            
        }

         Flash::success('Generate Monitoring successfully.');

        return redirect(route('monitorings.index'));
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
        $kuesioner = $this->kuesionerRepository->all();
        if (empty($monitoring)) {
            Flash::error('Monitoring not found');

            return redirect(route('monitorings.index'));
        }

        return view('monitorings.show')
        ->with('monitoring', $monitoring)
        ->with('kuesioner', $kuesioner);
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
