<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKuesionerJawabanRequest;
use App\Http\Requests\UpdateKuesionerJawabanRequest;
use App\Repositories\KuesionerJawabanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KuesionerJawabanController extends AppBaseController
{
    /** @var KuesionerJawabanRepository $kuesionerJawabanRepository*/
    private $kuesionerJawabanRepository;

    public function __construct(KuesionerJawabanRepository $kuesionerJawabanRepo)
    {
        $this->kuesionerJawabanRepository = $kuesionerJawabanRepo;
    }

    /**
     * Display a listing of the KuesionerJawaban.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kuesionerJawabans = $this->kuesionerJawabanRepository->all();

        return view('kuesioner_jawabans.index')
            ->with('kuesionerJawabans', $kuesionerJawabans);
    }

    /**
     * Show the form for creating a new KuesionerJawaban.
     *
     * @return Response
     */
    public function create()
    {
        return view('kuesioner_jawabans.create');
    }

    /**
     * Store a newly created KuesionerJawaban in storage.
     *
     * @param CreateKuesionerJawabanRequest $request
     *
     * @return Response
     */
    public function store(CreateKuesionerJawabanRequest $request)
    {
        $input = $request->all();

        $kuesionerJawaban = $this->kuesionerJawabanRepository->create($input);

        Flash::success('Kuesioner Jawaban saved successfully.');

        return redirect(route('kuesionerJawabans.index'));
    }

    /**
     * Display the specified KuesionerJawaban.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kuesionerJawaban = $this->kuesionerJawabanRepository->find($id);

        if (empty($kuesionerJawaban)) {
            Flash::error('Kuesioner Jawaban not found');

            return redirect(route('kuesionerJawabans.index'));
        }

        return view('kuesioner_jawabans.show')->with('kuesionerJawaban', $kuesionerJawaban);
    }

    /**
     * Show the form for editing the specified KuesionerJawaban.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kuesionerJawaban = $this->kuesionerJawabanRepository->find($id);

        if (empty($kuesionerJawaban)) {
            Flash::error('Kuesioner Jawaban not found');

            return redirect(route('kuesionerJawabans.index'));
        }

        return view('kuesioner_jawabans.edit')->with('kuesionerJawaban', $kuesionerJawaban);
    }

    /**
     * Update the specified KuesionerJawaban in storage.
     *
     * @param int $id
     * @param UpdateKuesionerJawabanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKuesionerJawabanRequest $request)
    {
        $kuesionerJawaban = $this->kuesionerJawabanRepository->find($id);

        if (empty($kuesionerJawaban)) {
            Flash::error('Kuesioner Jawaban not found');

            return redirect(route('kuesionerJawabans.index'));
        }

        $kuesionerJawaban = $this->kuesionerJawabanRepository->update($request->all(), $id);

        Flash::success('Kuesioner Jawaban updated successfully.');

        return redirect(route('kuesionerJawabans.index'));
    }

    /**
     * Remove the specified KuesionerJawaban from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kuesionerJawaban = $this->kuesionerJawabanRepository->find($id);

        if (empty($kuesionerJawaban)) {
            Flash::error('Kuesioner Jawaban not found');

            return redirect(route('kuesionerJawabans.index'));
        }

        $this->kuesionerJawabanRepository->delete($id);

        Flash::success('Kuesioner Jawaban deleted successfully.');

        return redirect(route('kuesionerJawabans.index'));
    }
}
