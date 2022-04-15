<?php

namespace App\Http\Controllers;

use App\DataTables\JenisDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use App\Repositories\JenisRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class JenisController extends AppBaseController
{
    /** @var JenisRepository $jenisRepository*/
    private $jenisRepository;

    public function __construct(JenisRepository $jenisRepo)
    {
        $this->jenisRepository = $jenisRepo;
    }

    /**
     * Display a listing of the Jenis.
     *
     * @param JenisDataTable $jenisDataTable
     *
     * @return Response
     */
    public function index(JenisDataTable $jenisDataTable)
    {
        return $jenisDataTable->render('jenis.index');
    }

    /**
     * Show the form for creating a new Jenis.
     *
     * @return Response
     */
    public function create()
    {
        return view('jenis.create');
    }

    /**
     * Store a newly created Jenis in storage.
     *
     * @param CreateJenisRequest $request
     *
     * @return Response
     */
    public function store(CreateJenisRequest $request)
    {
        $input = $request->all();

        $jenis = $this->jenisRepository->create($input);

        Flash::success('Jenis saved successfully.');

        return redirect(route('jenis.index'));
    }

    /**
     * Display the specified Jenis.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jenis = $this->jenisRepository->find($id);

        if (empty($jenis)) {
            Flash::error('Jenis not found');

            return redirect(route('jenis.index'));
        }

        return view('jenis.show')->with('jenis', $jenis);
    }

    /**
     * Show the form for editing the specified Jenis.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jenis = $this->jenisRepository->find($id);

        if (empty($jenis)) {
            Flash::error('Jenis not found');

            return redirect(route('jenis.index'));
        }

        return view('jenis.edit')->with('jenis', $jenis);
    }

    /**
     * Update the specified Jenis in storage.
     *
     * @param int $id
     * @param UpdateJenisRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJenisRequest $request)
    {
        $jenis = $this->jenisRepository->find($id);

        if (empty($jenis)) {
            Flash::error('Jenis not found');

            return redirect(route('jenis.index'));
        }

        $jenis = $this->jenisRepository->update($request->all(), $id);

        Flash::success('Jenis updated successfully.');

        return redirect(route('jenis.index'));
    }

    /**
     * Remove the specified Jenis from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jenis = $this->jenisRepository->find($id);

        if (empty($jenis)) {
            Flash::error('Jenis not found');

            return redirect(route('jenis.index'));
        }

        $this->jenisRepository->delete($id);

        Flash::success('Jenis deleted successfully.');

        return redirect(route('jenis.index'));
    }
}
