<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKondisiAPIRequest;
use App\Http\Requests\API\UpdateKondisiAPIRequest;
use App\Models\Kondisi;
use App\Repositories\KondisiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class KondisiController
 * @package App\Http\Controllers\API
 */

class KondisiAPIController extends AppBaseController
{
    /** @var  KondisiRepository */
    private $kondisiRepository;

    public function __construct(KondisiRepository $kondisiRepo)
    {
        $this->kondisiRepository = $kondisiRepo;
    }

    /**
     * Display a listing of the Kondisi.
     * GET|HEAD /kondisis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kondisis = $this->kondisiRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kondisis->toArray(), 'Kondisis retrieved successfully');
    }

    /**
     * Store a newly created Kondisi in storage.
     * POST /kondisis
     *
     * @param CreateKondisiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKondisiAPIRequest $request)
    {
        $input = $request->all();

        $kondisi = $this->kondisiRepository->create($input);

        return $this->sendResponse($kondisi->toArray(), 'Kondisi saved successfully');
    }

    /**
     * Display the specified Kondisi.
     * GET|HEAD /kondisis/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Kondisi $kondisi */
        $kondisi = $this->kondisiRepository->find($id);

        if (empty($kondisi)) {
            return $this->sendError('Kondisi not found');
        }

        return $this->sendResponse($kondisi->toArray(), 'Kondisi retrieved successfully');
    }

    /**
     * Update the specified Kondisi in storage.
     * PUT/PATCH /kondisis/{id}
     *
     * @param int $id
     * @param UpdateKondisiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKondisiAPIRequest $request)
    {
        $input = $request->all();

        /** @var Kondisi $kondisi */
        $kondisi = $this->kondisiRepository->find($id);

        if (empty($kondisi)) {
            return $this->sendError('Kondisi not found');
        }

        $kondisi = $this->kondisiRepository->update($input, $id);

        return $this->sendResponse($kondisi->toArray(), 'Kondisi updated successfully');
    }

    /**
     * Remove the specified Kondisi from storage.
     * DELETE /kondisis/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Kondisi $kondisi */
        $kondisi = $this->kondisiRepository->find($id);

        if (empty($kondisi)) {
            return $this->sendError('Kondisi not found');
        }

        $kondisi->delete();

        return $this->sendSuccess('Kondisi deleted successfully');
    }
}
