<?php

namespace App\Http\Controllers;

use App\DataTables\BtsDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateBtsRequest;
use App\Http\Requests\UpdateBtsRequest;
use App\Repositories\BtsRepository;
use Flash;
use DateTime;
use App\Http\Controllers\AppBaseController;
use App\Models\User;
use App\Models\Pemilik;
use App\Models\Jenis;
use App\Models\Foto;
use App\Models\Wilayah;
use App\Models\Bts;
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
     * @param BtsDataTable $btsDataTable
     *
     * @return Response
     */
    public function index(BtsDataTable $btsDataTable,Request $request)
    {
          $role = $request->session()->get('role');
          $users =  User::pluck('id','name');
          $pemilik =  Pemilik::pluck('id','nama');
          $wilayah =  Wilayah::pluck('id','nama');
          $jenis =  Jenis::pluck('id','nama');
          $id_user_pic = $request->id_user_pic;
          $id_pemilik = $request->id_pemilik;
          $id_wilayah = $request->id_wilayah;
          $id_jenis_bts = $request->id_jenis_bts;
        return $btsDataTable->
               with('role', $role)->
               with('id_user_pic', $id_user_pic)->
               with('id_pemilik', $id_pemilik)->
               with('id_wilayah', $id_wilayah)->
               with('id_jenis_bts', $id_jenis_bts)-> 
               render('bts.index', compact(['users', 'pemilik', 'wilayah', 'jenis'])); 
    }

    /**
     * Show the form for creating a new Bts.
     *
     * @return Response
     */
     public function showMaps()
    { 
        $bts = Bts::get();
        return view('bts.maps',compact('bts'));
    }

    public function create()
    {
        $users =  User::pluck('id','name');
        $pemilik =  Pemilik::pluck('id','nama');
        $wilayah =  Wilayah::where('level', 3)->pluck('id','nama');
        $jenis =  Jenis::pluck('id','nama');
        return view('bts.create')
                ->with('users', $users)
                ->with('pemilik', $pemilik)
                ->with('wilayah', $wilayah)
                ->with('jenis', $jenis);
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
        $nameUser = $request->session()->get('name'); 
        $input['created_by'] = $nameUser;
        $bts = $this->btsRepository->create($input);
        $path = Storage::disk('public')->putFile('foto', $request->file('foto'));
        $value = Bts::select('id')->orderBy('id','DESC')->first();
        $foto = Foto::create([
            "id_bts" => $value->id,
            "path_foto" => $path
        ]);

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
        $foto = Foto::where('id_bts',$id)->first();

        if (empty($bts)) {
            Flash::error('Bts not found');

            return redirect(route('bts.index'));
        }

        return view('bts.show')
        ->with('bts', $bts)
        ->with('foto', $foto);
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
        $users =  User::pluck('id','name');
        $pemilik =  Pemilik::pluck('id','nama');
        $wilayah =  Wilayah::pluck('id','nama');
        $jenis =  Jenis::pluck('id','nama');
        $foto = Foto::where('id_bts',$id)->orderBy('id','DESC')->first();

        if (empty($bts)) {
            Flash::error('Bts not found');

            return redirect(route('bts.index'));
        }

        return view('bts.edit')
                ->with('bts', $bts)
                ->with('users', $users)
                ->with('pemilik', $pemilik)
                ->with('wilayah', $wilayah)
                ->with('jenis', $jenis)
                ->with('foto', $foto);
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
        $input = $request->all();
        $bts = $this->btsRepository->find($id); 

        if (empty($bts)) {
            Flash::error('Bts not found');

            return redirect(route('bts.index'));
        }

        $nameUser = $request->session()->get('name'); 
        $now = new DateTime(); 
        $input['edited_by'] = $nameUser;
        $input['edited_at'] = $now;
        $bts = $this->btsRepository->update($input, $id);

        if($request->has('foto')){   
            $path = Storage::disk('public')->putFile('foto', $request->file('foto'));
            Foto::where('id_bts',$id)->delete();
            $foto = Foto::create([
                "id_bts" => $id,
                "path_foto" => $path
            ]); 
        } 
        
        Flash::success('Bts updated successfully.');

        return redirect(route('bts.index'));
    }

    /**
     * Remove the specified Bts from storage.
     *
     * @param int $id
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
