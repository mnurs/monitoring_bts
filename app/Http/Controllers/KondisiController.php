<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKondisiRequest;
use App\Http\Requests\UpdateKondisiRequest;
use App\Repositories\KondisiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KondisiController extends AppBaseController
{
    /** @var KondisiRepository $kondisiRepository*/
    private $kondisiRepository;

    public function __construct(KondisiRepository $kondisiRepo)
    {
        $this->kondisiRepository = $kondisiRepo;
    }

    /**
     * Display a listing of the Kondisi.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kondisis = $this->kondisiRepository->all();

        return view('kondisis.index')
            ->with('kondisis', $kondisis);
    }

    /**
     * Show the form for creating a new Kondisi.
     *
     * @return Response
     */
    public function create()
    {
        return view('kondisis.create');
    }

    /**
     * Store a newly created Kondisi in storage.
     *
     * @param CreateKondisiRequest $request
     *
     * @return Response
     */
    public function store(CreateKondisiRequest $request)
    {
        $input = $request->all();

        $kondisi = $this->kondisiRepository->create($input);

        Flash::success('Kondisi saved successfully.');

        return redirect(route('kondisis.index'));
    }

    /**
     * Display the specified Kondisi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kondisi = $this->kondisiRepository->find($id);

        if (empty($kondisi)) {
            Flash::error('Kondisi not found');

            return redirect(route('kondisis.index'));
        }

        return view('kondisis.show')->with('kondisi', $kondisi);
    }

    /**
     * Show the form for editing the specified Kondisi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kondisi = $this->kondisiRepository->find($id);

        if (empty($kondisi)) {
            Flash::error('Kondisi not found');

            return redirect(route('kondisis.index'));
        }

        return view('kondisis.edit')->with('kondisi', $kondisi);
    }

    /**
     * Update the specified Kondisi in storage.
     *
     * @param int $id
     * @param UpdateKondisiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKondisiRequest $request)
    {
        $kondisi = $this->kondisiRepository->find($id);

        if (empty($kondisi)) {
            Flash::error('Kondisi not found');

            return redirect(route('kondisis.index'));
        }

        $kondisi = $this->kondisiRepository->update($request->all(), $id);

        Flash::success('Kondisi updated successfully.');

        return redirect(route('kondisis.index'));
    }

    /**
     * Remove the specified Kondisi from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kondisi = $this->kondisiRepository->find($id);

        if (empty($kondisi)) {
            Flash::error('Kondisi not found');

            return redirect(route('kondisis.index'));
        }

        $this->kondisiRepository->delete($id);

        Flash::success('Kondisi deleted successfully.');

        return redirect(route('kondisis.index'));
    }
}
