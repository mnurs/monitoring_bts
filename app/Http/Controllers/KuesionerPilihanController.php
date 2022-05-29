<?php

namespace App\Http\Controllers;

use App\DataTables\KuesionerPilihanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKuesionerPilihanRequest;
use App\Http\Requests\UpdateKuesionerPilihanRequest;
use App\Repositories\KuesionerPilihanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Kuesioner;
use DateTime;

class KuesionerPilihanController extends AppBaseController
{
    /** @var KuesionerPilihanRepository $kuesionerPilihanRepository*/
    private $kuesionerPilihanRepository;

    public function __construct(KuesionerPilihanRepository $kuesionerPilihanRepo)
    {
        $this->kuesionerPilihanRepository = $kuesionerPilihanRepo;
    }

    /**
     * Display a listing of the KuesionerPilihan.
     *
     * @param KuesionerPilihanDataTable $kuesionerPilihanDataTable
     *
     * @return Response
     */
    public function index(KuesionerPilihanDataTable $kuesionerPilihanDataTable)
    {
        return $kuesionerPilihanDataTable->render('kuesioner_pilihans.index');
    }

    /**
     * Show the form for creating a new KuesionerPilihan.
     *
     * @return Response
     */
    public function create()
    {
        $kuesioner =  Kuesioner::pluck('id','pertanyaan');
        return view('kuesioner_pilihans.create')->
               with('kuesioner', $kuesioner);
    }

    /**
     * Store a newly created KuesionerPilihan in storage.
     *
     * @param CreateKuesionerPilihanRequest $request
     *
     * @return Response
     */
    public function store(CreateKuesionerPilihanRequest $request)
    {
        $input = $request->all(); 

        $nameUser = $request->session()->get('name'); 
        $input['created_by'] = $nameUser; 
        $kuesionerPilihan = $this->kuesionerPilihanRepository->create($input);

        Flash::success('Kuesioner Pilihan saved successfully.');

        return redirect(route('kuesionerPilihans.index'));
    }

    /**
     * Display the specified KuesionerPilihan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kuesionerPilihan = $this->kuesionerPilihanRepository->find($id);

        if (empty($kuesionerPilihan)) {
            Flash::error('Kuesioner Pilihan not found');

            return redirect(route('kuesionerPilihans.index'));
        }

        return view('kuesioner_pilihans.show')->with('kuesionerPilihan', $kuesionerPilihan);
    }

    /**
     * Show the form for editing the specified KuesionerPilihan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kuesionerPilihan = $this->kuesionerPilihanRepository->find($id);

        if (empty($kuesionerPilihan)) {
            Flash::error('Kuesioner Pilihan not found');

            return redirect(route('kuesionerPilihans.index'));
        }

        $kuesioner =  Kuesioner::pluck('id','pertanyaan');
        return view('kuesioner_pilihans.edit')->
               with('kuesioner', $kuesioner)->
                with('kuesionerPilihan', $kuesionerPilihan); 
    }

    /**
     * Update the specified KuesionerPilihan in storage.
     *
     * @param int $id
     * @param UpdateKuesionerPilihanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKuesionerPilihanRequest $request)
    {
        $kuesionerPilihan = $this->kuesionerPilihanRepository->find($id);
        $input = $request->all();
        if (empty($kuesionerPilihan)) {
            Flash::error('Kuesioner Pilihan not found');

            return redirect(route('kuesionerPilihans.index'));
        }
        $nameUser = $request->session()->get('name'); 
        $now = new DateTime(); 
        $input['edited_by'] = $nameUser;
        $input['edited_at'] = $now;

        $kuesionerPilihan = $this->kuesionerPilihanRepository->update($input, $id);

        Flash::success('Kuesioner Pilihan updated successfully.');

        return redirect(route('kuesionerPilihans.index'));
    }

    /**
     * Remove the specified KuesionerPilihan from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kuesionerPilihan = $this->kuesionerPilihanRepository->find($id);

        if (empty($kuesionerPilihan)) {
            Flash::error('Kuesioner Pilihan not found');

            return redirect(route('kuesionerPilihans.index'));
        }

        $this->kuesionerPilihanRepository->delete($id);

        Flash::success('Kuesioner Pilihan deleted successfully.');

        return redirect(route('kuesionerPilihans.index'));
    }
}
