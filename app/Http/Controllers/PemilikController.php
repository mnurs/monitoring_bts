<?php

namespace App\Http\Controllers;

use App\DataTables\PemilikDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePemilikRequest;
use App\Http\Requests\UpdatePemilikRequest;
use App\Repositories\PemilikRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PemilikController extends AppBaseController
{
    /** @var PemilikRepository $pemilikRepository*/
    private $pemilikRepository;

    public function __construct(PemilikRepository $pemilikRepo)
    {
        $this->pemilikRepository = $pemilikRepo;
    }

    /**
     * Display a listing of the Pemilik.
     *
     * @param PemilikDataTable $pemilikDataTable
     *
     * @return Response
     */
    public function index(PemilikDataTable $pemilikDataTable)
    {
        return $pemilikDataTable->render('pemiliks.index');
    }

    /**
     * Show the form for creating a new Pemilik.
     *
     * @return Response
     */
    public function create()
    {
        return view('pemiliks.create');
    }

    /**
     * Store a newly created Pemilik in storage.
     *
     * @param CreatePemilikRequest $request
     *
     * @return Response
     */
    public function store(CreatePemilikRequest $request)
    {
        $input = $request->all();

        $pemilik = $this->pemilikRepository->create($input);

        Flash::success('Pemilik saved successfully.');

        return redirect(route('pemiliks.index'));
    }

    /**
     * Display the specified Pemilik.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pemilik = $this->pemilikRepository->find($id);

        if (empty($pemilik)) {
            Flash::error('Pemilik not found');

            return redirect(route('pemiliks.index'));
        }

        return view('pemiliks.show')->with('pemilik', $pemilik);
    }

    /**
     * Show the form for editing the specified Pemilik.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pemilik = $this->pemilikRepository->find($id);

        if (empty($pemilik)) {
            Flash::error('Pemilik not found');

            return redirect(route('pemiliks.index'));
        }

        return view('pemiliks.edit')->with('pemilik', $pemilik);
    }

    /**
     * Update the specified Pemilik in storage.
     *
     * @param int $id
     * @param UpdatePemilikRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePemilikRequest $request)
    {
        $pemilik = $this->pemilikRepository->find($id);

        if (empty($pemilik)) {
            Flash::error('Pemilik not found');

            return redirect(route('pemiliks.index'));
        }

        $pemilik = $this->pemilikRepository->update($request->all(), $id);

        Flash::success('Pemilik updated successfully.');

        return redirect(route('pemiliks.index'));
    }

    /**
     * Remove the specified Pemilik from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pemilik = $this->pemilikRepository->find($id);

        if (empty($pemilik)) {
            Flash::error('Pemilik not found');

            return redirect(route('pemiliks.index'));
        }

        $this->pemilikRepository->delete($id);

        Flash::success('Pemilik deleted successfully.');

        return redirect(route('pemiliks.index'));
    }
}
