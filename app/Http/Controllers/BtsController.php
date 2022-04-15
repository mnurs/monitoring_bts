<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBtsRequest;
use App\Http\Requests\UpdateBtsRequest;
use App\Repositories\BtsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BtsController extends AppBaseController
{
    /** @var BtsRepository $btsRepository*/
    private $btsRepository;

    public function __construct(BtsRepository $btsRepo)
    {
        $this->btsRepository = $btsRepo;
    }

    /**
     * Display a listing of the Bts.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bts = $this->btsRepository->all();

        return view('bts.index')
            ->with('bts', $bts);
    }

    /**
     * Show the form for creating a new Bts.
     *
     * @return Response
     */
    public function create()
    {
        return view('bts.create');
    }

    /**
     * Store a newly created Bts in storage.
     *
     * @param CreateBtsRequest $request
     *
     * @return Response
     */
    public function store(CreateBtsRequest $request)
    {
        $input = $request->all();

        $bts = $this->btsRepository->create($input);

        Flash::success('Bts saved successfully.');

        return redirect(route('bts.index'));
    }

    /**
     * Display the specified Bts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bts = $this->btsRepository->find($id);

        if (empty($bts)) {
            Flash::error('Bts not found');

            return redirect(route('bts.index'));
        }

        return view('bts.show')->with('bts', $bts);
    }

    /**
     * Show the form for editing the specified Bts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bts = $this->btsRepository->find($id);

        if (empty($bts)) {
            Flash::error('Bts not found');

            return redirect(route('bts.index'));
        }

        return view('bts.edit')->with('bts', $bts);
    }

    /**
     * Update the specified Bts in storage.
     *
     * @param int $id
     * @param UpdateBtsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBtsRequest $request)
    {
        $bts = $this->btsRepository->find($id);

        if (empty($bts)) {
            Flash::error('Bts not found');

            return redirect(route('bts.index'));
        }

        $bts = $this->btsRepository->update($request->all(), $id);

        Flash::success('Bts updated successfully.');

        return redirect(route('bts.index'));
    }

    /**
     * Remove the specified Bts from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bts = $this->btsRepository->find($id);

        if (empty($bts)) {
            Flash::error('Bts not found');

            return redirect(route('bts.index'));
        }

        $this->btsRepository->delete($id);

        Flash::success('Bts deleted successfully.');

        return redirect(route('bts.index'));
    }
}
