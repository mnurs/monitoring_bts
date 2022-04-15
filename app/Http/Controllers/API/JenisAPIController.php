<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJenisAPIRequest;
use App\Http\Requests\API\UpdateJenisAPIRequest;
use App\Models\Jenis;
use App\Repositories\JenisRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class JenisController
 * @package App\Http\Controllers\API
 */

class JenisAPIController extends AppBaseController
{
    /** @var  JenisRepository */
    private $jenisRepository;

    public function __construct(JenisRepository $jenisRepo)
    {
        $this->jenisRepository = $jenisRepo;
    }

    /**
     * Display a listing of the Jenis.
     * GET|HEAD /jenis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $jenis = $this->jenisRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($jenis->toArray(), 'Jenis retrieved successfully');
    }

    /**
     * Store a newly created Jenis in storage.
     * POST /jenis
     *
     * @param CreateJenisAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateJenisAPIRequest $request)
    {
        $input = $request->all();

        $jenis = $this->jenisRepository->create($input);

        return $this->sendResponse($jenis->toArray(), 'Jenis saved successfully');
    }

    /**
     * Display the specified Jenis.
     * GET|HEAD /jenis/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Jenis $jenis */
        $jenis = $this->jenisRepository->find($id);

        if (empty($jenis)) {
            return $this->sendError('Jenis not found');
        }

        return $this->sendResponse($jenis->toArray(), 'Jenis retrieved successfully');
    }

    /**
     * Update the specified Jenis in storage.
     * PUT/PATCH /jenis/{id}
     *
     * @param int $id
     * @param UpdateJenisAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJenisAPIRequest $request)
    {
        $input = $request->all();

        /** @var Jenis $jenis */
        $jenis = $this->jenisRepository->find($id);

        if (empty($jenis)) {
            return $this->sendError('Jenis not found');
        }

        $jenis = $this->jenisRepository->update($input, $id);

        return $this->sendResponse($jenis->toArray(), 'Jenis updated successfully');
    }

    /**
     * Remove the specified Jenis from storage.
     * DELETE /jenis/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Jenis $jenis */
        $jenis = $this->jenisRepository->find($id);

        if (empty($jenis)) {
            return $this->sendError('Jenis not found');
        }

        $jenis->delete();

        return $this->sendSuccess('Jenis deleted successfully');
    }
}
