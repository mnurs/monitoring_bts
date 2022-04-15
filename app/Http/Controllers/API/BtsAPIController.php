<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBtsAPIRequest;
use App\Http\Requests\API\UpdateBtsAPIRequest;
use App\Models\Bts;
use App\Repositories\BtsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BtsController
 * @package App\Http\Controllers\API
 */

class BtsAPIController extends AppBaseController
{
    /** @var  BtsRepository */
    private $btsRepository;

    public function __construct(BtsRepository $btsRepo)
    {
        $this->btsRepository = $btsRepo;
    }

    /**
     * Display a listing of the Bts.
     * GET|HEAD /bts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bts = $this->btsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($bts->toArray(), 'Bts retrieved successfully');
    }

    /**
     * Store a newly created Bts in storage.
     * POST /bts
     *
     * @param CreateBtsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBtsAPIRequest $request)
    {
        $input = $request->all();

        $bts = $this->btsRepository->create($input);

        return $this->sendResponse($bts->toArray(), 'Bts saved successfully');
    }

    /**
     * Display the specified Bts.
     * GET|HEAD /bts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Bts $bts */
        $bts = $this->btsRepository->find($id);

        if (empty($bts)) {
            return $this->sendError('Bts not found');
        }

        return $this->sendResponse($bts->toArray(), 'Bts retrieved successfully');
    }

    /**
     * Update the specified Bts in storage.
     * PUT/PATCH /bts/{id}
     *
     * @param int $id
     * @param UpdateBtsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBtsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Bts $bts */
        $bts = $this->btsRepository->find($id);

        if (empty($bts)) {
            return $this->sendError('Bts not found');
        }

        $bts = $this->btsRepository->update($input, $id);

        return $this->sendResponse($bts->toArray(), 'Bts updated successfully');
    }

    /**
     * Remove the specified Bts from storage.
     * DELETE /bts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Bts $bts */
        $bts = $this->btsRepository->find($id);

        if (empty($bts)) {
            return $this->sendError('Bts not found');
        }

        $bts->delete();

        return $this->sendSuccess('Bts deleted successfully');
    }
}
