<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKuesionerJawabanAPIRequest;
use App\Http\Requests\API\UpdateKuesionerJawabanAPIRequest;
use App\Models\KuesionerJawaban;
use App\Repositories\KuesionerJawabanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class KuesionerJawabanController
 * @package App\Http\Controllers\API
 */

class KuesionerJawabanAPIController extends AppBaseController
{
    /** @var  KuesionerJawabanRepository */
    private $kuesionerJawabanRepository;

    public function __construct(KuesionerJawabanRepository $kuesionerJawabanRepo)
    {
        $this->kuesionerJawabanRepository = $kuesionerJawabanRepo;
    }

    /**
     * Display a listing of the KuesionerJawaban.
     * GET|HEAD /kuesionerJawabans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kuesionerJawabans = $this->kuesionerJawabanRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kuesionerJawabans->toArray(), 'Kuesioner Jawabans retrieved successfully');
    }

    /**
     * Store a newly created KuesionerJawaban in storage.
     * POST /kuesionerJawabans
     *
     * @param CreateKuesionerJawabanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKuesionerJawabanAPIRequest $request)
    {
        $input = $request->all();

        $kuesionerJawaban = $this->kuesionerJawabanRepository->create($input);

        return $this->sendResponse($kuesionerJawaban->toArray(), 'Kuesioner Jawaban saved successfully');
    }

    /**
     * Display the specified KuesionerJawaban.
     * GET|HEAD /kuesionerJawabans/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var KuesionerJawaban $kuesionerJawaban */
        $kuesionerJawaban = $this->kuesionerJawabanRepository->find($id);

        if (empty($kuesionerJawaban)) {
            return $this->sendError('Kuesioner Jawaban not found');
        }

        return $this->sendResponse($kuesionerJawaban->toArray(), 'Kuesioner Jawaban retrieved successfully');
    }

    /**
     * Update the specified KuesionerJawaban in storage.
     * PUT/PATCH /kuesionerJawabans/{id}
     *
     * @param int $id
     * @param UpdateKuesionerJawabanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKuesionerJawabanAPIRequest $request)
    {
        $input = $request->all();

        /** @var KuesionerJawaban $kuesionerJawaban */
        $kuesionerJawaban = $this->kuesionerJawabanRepository->find($id);

        if (empty($kuesionerJawaban)) {
            return $this->sendError('Kuesioner Jawaban not found');
        }

        $kuesionerJawaban = $this->kuesionerJawabanRepository->update($input, $id);

        return $this->sendResponse($kuesionerJawaban->toArray(), 'KuesionerJawaban updated successfully');
    }

    /**
     * Remove the specified KuesionerJawaban from storage.
     * DELETE /kuesionerJawabans/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var KuesionerJawaban $kuesionerJawaban */
        $kuesionerJawaban = $this->kuesionerJawabanRepository->find($id);

        if (empty($kuesionerJawaban)) {
            return $this->sendError('Kuesioner Jawaban not found');
        }

        $kuesionerJawaban->delete();

        return $this->sendSuccess('Kuesioner Jawaban deleted successfully');
    }
}
