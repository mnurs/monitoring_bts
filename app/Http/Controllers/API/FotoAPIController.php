<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFotoAPIRequest;
use App\Http\Requests\API\UpdateFotoAPIRequest;
use App\Models\Foto;
use App\Repositories\FotoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FotoController
 * @package App\Http\Controllers\API
 */

class FotoAPIController extends AppBaseController
{
    /** @var  FotoRepository */
    private $fotoRepository;

    public function __construct(FotoRepository $fotoRepo)
    {
        $this->fotoRepository = $fotoRepo;
    }

    /**
     * Display a listing of the Foto.
     * GET|HEAD /fotos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $fotos = $this->fotoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($fotos->toArray(), 'Fotos retrieved successfully');
    }

    /**
     * Store a newly created Foto in storage.
     * POST /fotos
     *
     * @param CreateFotoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFotoAPIRequest $request)
    {
        $input = $request->all();

        $foto = $this->fotoRepository->create($input);

        return $this->sendResponse($foto->toArray(), 'Foto saved successfully');
    }

    /**
     * Display the specified Foto.
     * GET|HEAD /fotos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Foto $foto */
        $foto = $this->fotoRepository->find($id);

        if (empty($foto)) {
            return $this->sendError('Foto not found');
        }

        return $this->sendResponse($foto->toArray(), 'Foto retrieved successfully');
    }

    /**
     * Update the specified Foto in storage.
     * PUT/PATCH /fotos/{id}
     *
     * @param int $id
     * @param UpdateFotoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFotoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Foto $foto */
        $foto = $this->fotoRepository->find($id);

        if (empty($foto)) {
            return $this->sendError('Foto not found');
        }

        $foto = $this->fotoRepository->update($input, $id);

        return $this->sendResponse($foto->toArray(), 'Foto updated successfully');
    }

    /**
     * Remove the specified Foto from storage.
     * DELETE /fotos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Foto $foto */
        $foto = $this->fotoRepository->find($id);

        if (empty($foto)) {
            return $this->sendError('Foto not found');
        }

        $foto->delete();

        return $this->sendSuccess('Foto deleted successfully');
    }
}
