<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKuesionerPilihanRequest;
use App\Http\Requests\UpdateKuesionerPilihanRequest;
use App\Repositories\KuesionerPilihanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

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
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kuesionerPilihans = $this->kuesionerPilihanRepository->all();

        return view('kuesioner_pilihans.index')
            ->with('kuesionerPilihans', $kuesionerPilihans);
    }

    /**
     * Show the form for creating a new KuesionerPilihan.
     *
     * @return Response
     */
    public function create()
    {
        return view('kuesioner_pilihans.create');
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

        return view('kuesioner_pilihans.edit')->with('kuesionerPilihan', $kuesionerPilihan);
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

        if (empty($kuesionerPilihan)) {
            Flash::error('Kuesioner Pilihan not found');

            return redirect(route('kuesionerPilihans.index'));
        }

        $kuesionerPilihan = $this->kuesionerPilihanRepository->update($request->all(), $id);

        Flash::success('Kuesioner Pilihan updated successfully.');

        return redirect(route('kuesionerPilihans.index'));
    }

    /**
     * Remove the specified KuesionerPilihan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
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
