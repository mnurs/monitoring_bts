<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKuesionerRequest;
use App\Http\Requests\UpdateKuesionerRequest;
use App\Repositories\KuesionerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KuesionerController extends AppBaseController
{
    /** @var KuesionerRepository $kuesionerRepository*/
    private $kuesionerRepository;

    public function __construct(KuesionerRepository $kuesionerRepo)
    {
        $this->kuesionerRepository = $kuesionerRepo;
    }

    /**
     * Display a listing of the Kuesioner.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kuesioners = $this->kuesionerRepository->all();

        return view('kuesioners.index')
            ->with('kuesioners', $kuesioners);
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

        $kuesioner = $this->kuesionerRepository->create($input);

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

        if (empty($kuesioner)) {
            Flash::error('Kuesioner not found');

            return redirect(route('kuesioners.index'));
        }

        return view('kuesioners.show')->with('kuesioner', $kuesioner);
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

        if (empty($kuesioner)) {
            Flash::error('Kuesioner not found');

            return redirect(route('kuesioners.index'));
        }

        return view('kuesioners.edit')->with('kuesioner', $kuesioner);
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

        if (empty($kuesioner)) {
            Flash::error('Kuesioner not found');

            return redirect(route('kuesioners.index'));
        }

        $kuesioner = $this->kuesionerRepository->update($request->all(), $id);

        Flash::success('Kuesioner updated successfully.');

        return redirect(route('kuesioners.index'));
    }

    /**
     * Remove the specified Kuesioner from storage.
     *
     * @param int $id
     *
     * @throws \Exception
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
