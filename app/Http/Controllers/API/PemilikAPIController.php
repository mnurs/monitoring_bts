<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePemilikAPIRequest;
use App\Http\Requests\API\UpdatePemilikAPIRequest;
use App\Models\Pemilik;
use App\Repositories\PemilikRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PemilikController
 * @package App\Http\Controllers\API
 */

class PemilikAPIController extends AppBaseController
{
    /** @var  PemilikRepository */
    private $pemilikRepository;

    public function __construct(PemilikRepository $pemilikRepo)
    {
        $this->pemilikRepository = $pemilikRepo;
    }

    /**
     * Display a listing of the Pemilik.
     * GET|HEAD /pemiliks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pemiliks = $this->pemilikRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pemiliks->toArray(), 'Pemiliks retrieved successfully');
    }

    /**
     * Store a newly created Pemilik in storage.
     * POST /pemiliks
     *
     * @param CreatePemilikAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePemilikAPIRequest $request)
    {
        $input = $request->all();

        $pemilik = $this->pemilikRepository->create($input);

        return $this->sendResponse($pemilik->toArray(), 'Pemilik saved successfully');
    }

    /**
     * Display the specified Pemilik.
     * GET|HEAD /pemiliks/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pemilik $pemilik */
        $pemilik = $this->pemilikRepository->find($id);

        if (empty($pemilik)) {
            return $this->sendError('Pemilik not found');
        }

        return $this->sendResponse($pemilik->toArray(), 'Pemilik retrieved successfully');
    }

    /**
     * Update the specified Pemilik in storage.
     * PUT/PATCH /pemiliks/{id}
     *
     * @param int $id
     * @param UpdatePemilikAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePemilikAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pemilik $pemilik */
        $pemilik = $this->pemilikRepository->find($id);

        if (empty($pemilik)) {
            return $this->sendError('Pemilik not found');
        }

        $pemilik = $this->pemilikRepository->update($input, $id);

        return $this->sendResponse($pemilik->toArray(), 'Pemilik updated successfully');
    }

    /**
     * Remove the specified Pemilik from storage.
     * DELETE /pemiliks/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pemilik $pemilik */
        $pemilik = $this->pemilikRepository->find($id);

        if (empty($pemilik)) {
            return $this->sendError('Pemilik not found');
        }

        $pemilik->delete();

        return $this->sendSuccess('Pemilik deleted successfully');
    }
}
