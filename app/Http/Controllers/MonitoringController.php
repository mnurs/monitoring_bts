<?php

namespace App\Http\Controllers;

use App\DataTables\MonitoringDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMonitoringRequest;
use App\Http\Requests\UpdateMonitoringRequest;
use App\Repositories\MonitoringRepository;
use App\Repositories\KuesionerRepository;
use App\Repositories\BtsRepository;
use App\Repositories\KondisiRepository;
use App\Repositories\KuesionerJawabanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use DateTime;
use Response;
use App\Models\Bts;
use App\Models\User;
use App\Models\Monitoring;
use App\Models\Kondisi;
use App\Models\KuesionerJawaban;
use App\Models\Helper;

class MonitoringController extends AppBaseController
{
    /** @var MonitoringRepository $monitoringRepository*/
    private $monitoringRepository;
    private $kuesionerRepository;
    private $btsRepository;
    private $kuesionerJawabanRepository;
    private $kondisiRepository;

    public function __construct(
        MonitoringRepository $monitoringRepo,
        KuesionerRepository $kuesionerRepo,
        BtsRepository $btsRepo,
        KuesionerJawabanRepository $kuesionerJawabanRepo,
        KondisiRepository $kondisiRepo
    )
    {
        $this->monitoringRepository = $monitoringRepo;
        $this->kuesionerRepository = $kuesionerRepo;
        $this->btsRepository = $btsRepo;
        $this->kuesionerJawabanRepository = $kuesionerJawabanRepo;
        $this->kondisiRepository = $kondisiRepo;
    }

    /**
     * Display a listing of the Monitoring.
     *
     * @param MonitoringDataTable $monitoringDataTable
     *
     * @return Response
     */
    public function index(MonitoringDataTable $monitoringDataTable,Request $request)
    {
        // $monitoring = $this->monitoringRepository->all();
        //  return view('monitorings.index')->with('monitoring', $monitoring);
        $role = $request->session()->get('role');
        $id = $request->session()->get('id');
        $kondisi =  Kondisi::pluck('id','nama');
        $users =  User::pluck('id','name');
        $bts =  Bts::pluck('id','nama');
        $id_bts = $request->id_bts;
        $id_kondisi_bts = $request->id_kondisi_bts; 
        $id_user_surveyor = $request->id_user_surveyor;
        $generate_mulai = $request->generate_mulai;
        $generate_selesai = $request->generate_selesai;
        $kunjungan_mulai = $request->kunjungan_mulai;
        $Kunjungan_selesai = $request->Kunjungan_selesai;
        $tahun = $request->tahun;
        // dd($id_bts);
        return $monitoringDataTable->
               with('role', $role)->
               with('id', $id)->
               with('id_bts', $id_bts)->
               with('id_kondisi_bts', $id_kondisi_bts)->
               with('id_user_surveyor', $id_user_surveyor)->
               with('generate_mulai', $generate_mulai)->
               with('generate_selesai', $generate_selesai)->
               with('kunjungan_mulai', $kunjungan_mulai)->
               with('Kunjungan_selesai', $Kunjungan_selesai)->
               with('tahun', $tahun)->
               render('monitorings.index',compact(['bts','users','kondisi','id_bts','id_kondisi_bts','id_user_surveyor','generate_mulai','generate_selesai','kunjungan_mulai','Kunjungan_selesai','tahun']));
    }

    /**
     * Show the form for creating a new Monitoring.
     *
     * @return Response
     */
    public function create()
    {
        $kondisi =  Kondisi::pluck('id','nama');
        $users =  User::pluck('id','name');
        $bts =  Bts::pluck('id','nama');
        return view('monitorings.create')
                ->with('kondisi', $kondisi)
                ->with('users', $users)
                ->with('bts', $bts);
    }

    public function createSurvey($id)
    {
        $monitoring = $this->monitoringRepository->find($id);
        $kuesioner = $this->kuesionerRepository->all(); 
        $kondisi =  Kondisi::pluck('id','nama');
        $users =  User::pluck('id','name');
        $bts =  Bts::pluck('id','nama');
        $helper = new Helper;
        if (empty($monitoring)) {
            Flash::error('Monitoring not found');

            return redirect(route('monitorings.index'));
        }

        return view('monitorings.survey')
        ->with('monitoring', $monitoring)
        ->with('kuesioner', $kuesioner)
        ->with('kondisi', $kondisi)
        ->with('helper', $helper)
        ->with('users', $users)
        ->with('bts', $bts)
        ->with('flag', true);
    }

    public function generateKunjungan(Request $request){
        $bts = $this->btsRepository->all();
        $nameUser = $request->session()->get('name');
        $users = User::select('id')->where('role','2')->get();
        $dataNama = [];
        foreach ($bts as $key => $value) { 
            array_push($dataNama,$value->id);
        }
        // shuffle($dataNama);
        $jml = $users->count();
        for ($i=0; $i < (int)$jml; $i++) {  
            foreach($dataNama as $j => $key) { 
                switch ($i) {
                    case $j % (int)$jml:
                        $cek = Monitoring::
                                where('id_bts',$key)->
                                where('id_user_surveyor', $users[$i]->id)->
                                where('tgl_generate',date('Y-m-d'))->
                                first();

                        if(empty($cek)){
                            // $users = User::inRandomOrder()->where('role','2')->first();
                            $input = [
                                'id_bts' => $key,
                                'id_user_surveyor' => $users[$i]->id,
                                'tgl_generate' => date('Y-m-d'),
                                'tahun' => date('Y'),
                                'created_by' => $nameUser
                            ];
                            $monitoring = $this->monitoringRepository->create($input);
                        }
                         
                        break; 
                }  
            } 
        } 
        //     dd($dataNama);

        // foreach ($bts as $key => $data) {
        //     $cek = Monitoring::
        //                 where('id_bts',$data->id)->
        //                 where('tgl_generate',date('Y-m-d'))->
        //                 first();

        //     if(empty($cek)){
        //         $users = User::inRandomOrder()->where('role','2')->first();
        //         $input = [
        //             'id_bts' => $data->id,
        //             'id_user_surveyor' => $users->id,
        //             'tgl_generate' => date('Y-m-d'),
        //             'tahun' => date('Y'),
        //             'created_by' => $nameUser
        //         ];
        //         $monitoring = $this->monitoringRepository->create($input);
        //     }
            
        // }

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

        $nameUser = $request->session()->get('name'); 
        $input['created_by'] = $nameUser; 
        $monitoring = $this->monitoringRepository->create($input);

        Flash::success('Monitoring saved successfully.');

        return redirect(route('monitorings.index'));
    }


    public function storeSurvey(Request $request){
        // dd($request->all());
        $monitoring = $this->monitoringRepository->find($request->id_monitoring);
        $nameUser = $request->session()->get('name');
        $now = new DateTime(); 
        if (empty($monitoring)) {
            Flash::error('Monitoring not found');

            return redirect(route('monitorings.index'));
        }

        $this->monitoringRepository->update([
            'id_kondisi_bts' => $request->id_kondisi_bts,
            'tgl_kunjungan' => $request->tgl_kunjungan,
            'edited_by'=>$nameUser ,
            'edited_at'=>$now
        ], $request->id_monitoring);

        $kuesioner = $request->kuesioner;
        $jawaban = $request->jawaban;
        foreach ($kuesioner as $key => $value) {
            $kuesionerJawabanQuery = KuesionerJawaban::
                                where('id_monitoring',$request->id_monitoring)->
                                where('id_kuesioner',$value);
            $kuesionerJawaban =  $kuesionerJawabanQuery->first();              
            if (empty($kuesionerJawaban)) {
                $this->kuesionerJawabanRepository->create([
                    'id_monitoring'=>$request->id_monitoring,
                    'id_kuesioner'=>$value,
                    'jawaban'=>$jawaban[$key],
                    'created_by'=>$nameUser 
                ]);
            }else{
                $kuesionerJawaban = $kuesionerJawabanQuery->update([
                    'jawaban'=>$jawaban[$key],
                    'edited_by'=>$nameUser ,
                    'edited_at'=>$now
                ]);
            } 
        } 

        Flash::success('Monitoring updated successfully.');

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
        $helper = new Helper;
        if (empty($monitoring)) {
            Flash::error('Monitoring not found');

            return redirect(route('monitorings.index'));
        }

        return view('monitorings.show')
        ->with('monitoring', $monitoring)
        ->with('kuesioner', $kuesioner)
        ->with('helper', $helper);
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
        $kondisi =  Kondisi::pluck('id','nama');
        $users =  User::pluck('id','name');
        $bts =  Bts::pluck('id','nama');

        if (empty($monitoring)) {
            Flash::error('Monitoring not found');

            return redirect(route('monitorings.index'));
        }

        return view('monitorings.edit')
        ->with('monitoring', $monitoring)
        ->with('kondisi', $kondisi)
        ->with('users', $users)
        ->with('bts', $bts);
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
        $input = $request->all();
        $monitoring = $this->monitoringRepository->find($id);

        if (empty($monitoring)) {
            Flash::error('Monitoring not found');

            return redirect(route('monitorings.index'));
        }

        $nameUser = $request->session()->get('name'); 
        $now = new DateTime(); 
        $input['edited_by'] = $nameUser;
        $input['edited_at'] = $now;
        $monitoring = $this->monitoringRepository->update($input, $id);

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
