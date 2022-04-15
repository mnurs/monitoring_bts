<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKuesionerPilihanAPIRequest;
use App\Http\Requests\API\UpdateKuesionerPilihanAPIRequest;
use App\Models\KuesionerPilihan;
use App\Repositories\KuesionerPilihanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class KuesionerPilihanController
 * @package App\Http\Controllers\API
 */

class KuesionerPilihanAPIController extends AppBaseController
{
    /** @var  KuesionerPilihanRepository */
    private $kuesionerPilihanRepository;

    public function __construct(KuesionerPilihanRepository $kuesionerPilihanRepo)
    {
        $this->kuesionerPilihanRepository = $kuesionerPilihanRepo;
    }

    /**
     * Display a listing of the KuesionerPilihan.
     * GET|HEAD /kuesionerPilihans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kuesionerPilihans = $this->kuesionerPilihanRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kuesionerPilihans->toArray(), 'Kuesioner Pilihans retrieved successfully');
    }

    /**
     * Store a newly created KuesionerPilihan in storage.
     * POST /kuesionerPilihans
     *
     * @param CreateKuesionerPilihanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKuesionerPilihanAPIRequest $request)
    {
        $input = $request->all();

        $kuesionerPilihan = $this->kuesionerPilihanRepository->create($input);

        return $this->sendResponse($kuesionerPilihan->toArray(), 'Kuesioner Pilihan saved successfully');
    }

    /**
     * Display the specified KuesionerPilihan.
     * GET|HEAD /kuesionerPilihans/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var KuesionerPilihan $kuesionerPilihan */
        $kuesionerPilihan = $this->kuesionerPilihanRepository->find($id);

        if (empty($kuesionerPilihan)) {
            return $this->sendError('Kuesioner Pilihan not found');
        }

        return $this->sendResponse($kuesionerPilihan->toArray(), 'Kuesioner Pilihan retrieved successfully');
    }

    /**
     * Update the specified KuesionerPilihan in storage.
     * PUT/PATCH /kuesionerPilihans/{id}
     *
     * @param int $id
     * @param UpdateKuesionerPilihanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKuesionerPilihanAPIRequest $request)
    {
        $input = $request->all();

        /** @var KuesionerPilihan $kuesionerPilihan */
        $kuesionerPilihan = $this->kuesionerPilihanRepository->find($id);

        if (empty($kuesionerPilihan)) {
            return $this->sendError('Kuesioner Pilihan not found');
        }

        $kuesionerPilihan = $this->kuesionerPilihanRepository->update($input, $id);

        return $this->sendResponse($kuesionerPilihan->toArray(), 'KuesionerPilihan updated successfully');
    }

    /**
     * Remove the specified KuesionerPilihan from storage.
     * DELETE /kuesionerPilihans/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var KuesionerPilihan $kuesionerPilihan */
        $kuesionerPilihan = $this->kuesionerPilihanRepository->find($id);

        if (empty($kuesionerPilihan)) {
            return $this->sendError('Kuesioner Pilihan not found');
        }

        $kuesionerPilihan->delete();

        return $this->sendSuccess('Kuesioner Pilihan deleted successfully');
    }
}
