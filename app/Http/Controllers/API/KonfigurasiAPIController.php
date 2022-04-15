<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKonfigurasiAPIRequest;
use App\Http\Requests\API\UpdateKonfigurasiAPIRequest;
use App\Models\Konfigurasi;
use App\Repositories\KonfigurasiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class KonfigurasiController
 * @package App\Http\Controllers\API
 */

class KonfigurasiAPIController extends AppBaseController
{
    /** @var  KonfigurasiRepository */
    private $konfigurasiRepository;

    public function __construct(KonfigurasiRepository $konfigurasiRepo)
    {
        $this->konfigurasiRepository = $konfigurasiRepo;
    }

    /**
     * Display a listing of the Konfigurasi.
     * GET|HEAD /konfigurasis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $konfigurasis = $this->konfigurasiRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($konfigurasis->toArray(), 'Konfigurasis retrieved successfully');
    }

    /**
     * Store a newly created Konfigurasi in storage.
     * POST /konfigurasis
     *
     * @param CreateKonfigurasiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKonfigurasiAPIRequest $request)
    {
        $input = $request->all();

        $konfigurasi = $this->konfigurasiRepository->create($input);

        return $this->sendResponse($konfigurasi->toArray(), 'Konfigurasi saved successfully');
    }

    /**
     * Display the specified Konfigurasi.
     * GET|HEAD /konfigurasis/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Konfigurasi $konfigurasi */
        $konfigurasi = $this->konfigurasiRepository->find($id);

        if (empty($konfigurasi)) {
            return $this->sendError('Konfigurasi not found');
        }

        return $this->sendResponse($konfigurasi->toArray(), 'Konfigurasi retrieved successfully');
    }

    /**
     * Update the specified Konfigurasi in storage.
     * PUT/PATCH /konfigurasis/{id}
     *
     * @param int $id
     * @param UpdateKonfigurasiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKonfigurasiAPIRequest $request)
    {
        $input = $request->all();

        /** @var Konfigurasi $konfigurasi */
        $konfigurasi = $this->konfigurasiRepository->find($id);

        if (empty($konfigurasi)) {
            return $this->sendError('Konfigurasi not found');
        }

        $konfigurasi = $this->konfigurasiRepository->update($input, $id);

        return $this->sendResponse($konfigurasi->toArray(), 'Konfigurasi updated successfully');
    }

    /**
     * Remove the specified Konfigurasi from storage.
     * DELETE /konfigurasis/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Konfigurasi $konfigurasi */
        $konfigurasi = $this->konfigurasiRepository->find($id);

        if (empty($konfigurasi)) {
            return $this->sendError('Konfigurasi not found');
        }

        $konfigurasi->delete();

        return $this->sendSuccess('Konfigurasi deleted successfully');
    }
}
