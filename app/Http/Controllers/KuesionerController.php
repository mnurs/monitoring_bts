<?php

namespace App\Http\Controllers;

use App\DataTables\KuesionerDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKuesionerRequest;
use App\Http\Requests\UpdateKuesionerRequest;
use App\Repositories\KuesionerRepository;
use App\Repositories\KuesionerPilihanRepository;
use Flash;
use DateTime;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Kuesioner;
use App\Models\KuesionerPilihan;

class KuesionerController extends AppBaseController
{
    /** @var KuesionerRepository $kuesionerRepository*/
    private $kuesionerRepository;
    private $kuesionerPilihanRepository;

    public function __construct(KuesionerRepository $kuesionerRepo,KuesionerPilihanRepository $kuesionerPilihanRepo)
    {
        $this->kuesionerRepository = $kuesionerRepo;
        $this->kuesionerPilihanRepository = $kuesionerPilihanRepo;
    }

    /**
     * Display a listing of the Kuesioner.
     *
     * @param KuesionerDataTable $kuesionerDataTable
     *
     * @return Response
     */
    public function index(KuesionerDataTable $kuesionerDataTable)
    {
        return $kuesionerDataTable->render('kuesioners.index');
    }

    /**
     * Show the form for creating a new Kuesioner.
     *
     * @return Response
     */
    public function create()
    {  
        return view('kuesioners.create');
    }

    /**
     * Store a newly created Kuesioner in storage.
     *
     * @param CreateKuesionerRequest $request
     *
     * @return Response
     */
    public function store(CreateKuesionerRequest $request)
    {
        $input = $request->all();

        $nameUser = $request->session()->get('name'); 
        $input['created_by'] = $nameUser;   

        $kuesioner = $this->kuesionerRepository->create($input);

        $id_kuesioner = Kuesioner::latest()->first()->id;

        $pilihan = $request->pilihan_jawaban;
        foreach ($pilihan as $key => $value) {
            if(isset($value)){
                $data = [
                    "id_kuesioner" => $id_kuesioner,
                    "pilihan_jawaban"=> $value
                ];
                $this->kuesionerPilihanRepository->create($data);
            } 
        }

        Flash::success('Kuesioner saved successfully.');

        return redirect(route('kuesioners.index'));
    }

    /**
     * Display the specified Kuesioner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kuesioner = $this->kuesionerRepository->find($id);
        $pilihan = KuesionerPilihan::where("id_kuesioner",$id)->get();

        if (empty($kuesioner)) {
            Flash::error('Kuesioner not found');

            return redirect(route('kuesioners.index'));
        }

        return view('kuesioners.show')->with('kuesioner', $kuesioner)->with('pilihan', $pilihan);
    }

    /**
     * Show the form for editing the specified Kuesioner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kuesioner = $this->kuesionerRepository->find($id);
        $pilihan = KuesionerPilihan::where("id_kuesioner",$id)->get();
        if (empty($kuesioner)) {
            Flash::error('Kuesioner not found');

            return redirect(route('kuesioners.index'));
        }


        return view('kuesioners.edit')->with('kuesioner', $kuesioner)->with('pilihan', $pilihan);
    }

    /**
     * Update the specified Kuesioner in storage.
     *
     * @param int $id
     * @param UpdateKuesionerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKuesionerRequest $request)
    {
        $kuesioner = $this->kuesionerRepository->find($id);
        $input = $request->all();
        if (empty($kuesioner)) {
            Flash::error('Kuesioner not found');

            return redirect(route('kuesioners.index'));
        }

        $nameUser = $request->session()->get('name'); 
        $now = new DateTime(); 
        $input['edited_by'] = $nameUser;
        $input['edited_at'] = $now;
        $kuesioner = $this->kuesionerRepository->update($input, $id); 

        $deletePilihan = KuesionerPilihan::where('id_kuesioner',$id)->delete();
        $pilihan = $request->pilihan_jawaban;
        foreach ($pilihan as $key => $value) {
            if(isset($value)){
                $data = [
                    "id_kuesioner" =>  $id,
                    "pilihan_jawaban"=> $value
                ];
                $this->kuesionerPilihanRepository->create($data);
            } 
        }

        Flash::success('Kuesioner updated successfully.');

        return redirect(route('kuesioners.index'));
    }

    /**
     * Remove the specified Kuesioner from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kuesioner = $this->kuesionerRepository->find($id);

        if (empty($kuesioner)) {
            Flash::error('Kuesioner not found');

            return redirect(route('kuesioners.index'));
        }

        $this->kuesionerRepository->delete($id);

        Flash::success('Kuesioner deleted successfully.');

        return redirect(route('kuesioners.index'));
    } 
}
