<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKuesionerAPIRequest;
use App\Http\Requests\API\UpdateKuesionerAPIRequest;
use App\Models\Kuesioner;
use App\Repositories\KuesionerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class KuesionerController
 * @package App\Http\Controllers\API
 */

class KuesionerAPIController extends AppBaseController
{
    /** @var  KuesionerRepository */
    private $kuesionerRepository;

    public function __construct(KuesionerRepository $kuesionerRepo)
    {
        $this->kuesionerRepository = $kuesionerRepo;
    }

    /**
     * Display a listing of the Kuesioner.
     * GET|HEAD /kuesioners
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kuesioners = $this->kuesionerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kuesioners->toArray(), 'Kuesioners retrieved successfully');
    }

    /**
     * Store a newly created Kuesioner in storage.
     * POST /kuesioners
     *
     * @param CreateKuesionerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKuesionerAPIRequest $request)
    {
        $input = $request->all();

        $kuesioner = $this->kuesionerRepository->create($input);

        return $this->sendResponse($kuesioner->toArray(), 'Kuesioner saved successfully');
    }

    /**
     * Display the specified Kuesioner.
     * GET|HEAD /kuesioners/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Kuesioner $kuesioner */
        $kuesioner = $this->kuesionerRepository->find($id);

        if (empty($kuesioner)) {
            return $this->sendError('Kuesioner not found');
        }

        return $this->sendResponse($kuesioner->toArray(), 'Kuesioner retrieved successfully');
    }

    /**
     * Update the specified Kuesioner in storage.
     * PUT/PATCH /kuesioners/{id}
     *
     * @param int $id
     * @param UpdateKuesionerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKuesionerAPIRequest $request)
    {
        $input = $request->all();

        /** @var Kuesioner $kuesioner */
        $kuesioner = $this->kuesionerRepository->find($id);

        if (empty($kuesioner)) {
            return $this->sendError('Kuesioner not found');
        }

        $kuesioner = $this->kuesionerRepository->update($input, $id);

        return $this->sendResponse($kuesioner->toArray(), 'Kuesioner updated successfully');
    }

    /**
     * Remove the specified Kuesioner from storage.
     * DELETE /kuesioners/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Kuesioner $kuesioner */
        $kuesioner = $this->kuesionerRepository->find($id);

        if (empty($kuesioner)) {
            return $this->sendError('Kuesioner not found');
        }

        $kuesioner->delete();

        return $this->sendSuccess('Kuesioner deleted successfully');
    }
}
