<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKonfigurasiRequest;
use App\Http\Requests\UpdateKonfigurasiRequest;
use App\Repositories\KonfigurasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KonfigurasiController extends AppBaseController
{
    /** @var KonfigurasiRepository $konfigurasiRepository*/
    private $konfigurasiRepository;

    public function __construct(KonfigurasiRepository $konfigurasiRepo)
    {
        $this->konfigurasiRepository = $konfigurasiRepo;
    }

    /**
     * Display a listing of the Konfigurasi.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $konfigurasis = $this->konfigurasiRepository->all();

        return view('konfigurasis.index')
            ->with('konfigurasis', $konfigurasis);
    }

    /**
     * Show the form for creating a new Konfigurasi.
     *
     * @return Response
     */
    public function create()
    {
        return view('konfigurasis.create');
    }

    /**
     * Store a newly created Konfigurasi in storage.
     *
     * @param CreateKonfigurasiRequest $request
     *
     * @return Response
     */
    public function store(CreateKonfigurasiRequest $request)
    {
        $input = $request->all();

        $konfigurasi = $this->konfigurasiRepository->create($input);

        Flash::success('Konfigurasi saved successfully.');

        return redirect(route('konfigurasis.index'));
    }

    /**
     * Display the specified Konfigurasi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $konfigurasi = $this->konfigurasiRepository->find($id);

        if (empty($konfigurasi)) {
            Flash::error('Konfigurasi not found');

            return redirect(route('konfigurasis.index'));
        }

        return view('konfigurasis.show')->with('konfigurasi', $konfigurasi);
    }

    /**
     * Show the form for editing the specified Konfigurasi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $konfigurasi = $this->konfigurasiRepository->find($id);

        if (empty($konfigurasi)) {
            Flash::error('Konfigurasi not found');

            return redirect(route('konfigurasis.index'));
        }

        return view('konfigurasis.edit')->with('konfigurasi', $konfigurasi);
    }

    /**
     * Update the specified Konfigurasi in storage.
     *
     * @param int $id
     * @param UpdateKonfigurasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKonfigurasiRequest $request)
    {
        $konfigurasi = $this->konfigurasiRepository->find($id);

        if (empty($konfigurasi)) {
            Flash::error('Konfigurasi not found');

            return redirect(route('konfigurasis.index'));
        }

        $konfigurasi = $this->konfigurasiRepository->update($request->all(), $id);

        Flash::success('Konfigurasi updated successfully.');

        return redirect(route('konfigurasis.index'));
    }

    /**
     * Remove the specified Konfigurasi from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $konfigurasi = $this->konfigurasiRepository->find($id);

        if (empty($konfigurasi)) {
            Flash::error('Konfigurasi not found');

            return redirect(route('konfigurasis.index'));
        }

        $this->konfigurasiRepository->delete($id);

        Flash::success('Konfigurasi deleted successfully.');

        return redirect(route('konfigurasis.index'));
    }
}
