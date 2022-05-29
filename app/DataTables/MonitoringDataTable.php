<?php

namespace App\DataTables;

use App\Models\Monitoring;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class MonitoringDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query); 
        return $dataTable
        ->addColumn('action', 'monitorings.datatables_actions') 
        ->editColumn('tgl_generate', function ($data) 
        { 
            if(isset($data->tgl_generate)) return date('Y-m-d', strtotime($data->tgl_generate) );
            else return "";
        })
        ->editColumn('edited_at', function ($data) 
        {   
            if(isset($data->edited_at)) return date('Y-m-d', strtotime($data->edited_at) );
            else return "";
        })
        ->editColumn('tgl_kunjungan', function ($data) 
        {   
            if(isset($data->tgl_kunjungan)) return date('Y-m-d', strtotime($data->tgl_kunjungan) );
            else return "";
        })

        ->editColumn('id_bts', function ($data) 
        { 
            if(isset($data->idBts->nama)) return $data->idBts->nama;
            else return  "";
        })
        ->editColumn('id_kondisi_bts', function ($data) 
        { 
            if(isset($data->idKondisiBts->nama)) return $data->idKondisiBts->nama;
            else return "";
        })
         ->editColumn('id_user_surveyor', function ($data) 
        { 
            if(isset($data->idUserSurveyor->name)) return $data->idUserSurveyor->name;
            else return "";
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Monitoring $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Monitoring $model)
    {
        // return $model->newQuery();
        $monitorting = 
        $model
        ->leftjoin('bts','bts.id','monitoring.id_bts')
        ->leftjoin('kondisi','kondisi.id','monitoring.id_kondisi_bts')
        ->leftjoin('users','users.id','monitoring.id_user_surveyor')
        ->select('monitoring.id','monitoring.tgl_generate','monitoring.tgl_kunjungan','monitoring.tahun','monitoring.created_by','monitoring.edited_by','monitoring.edited_at','bts.nama as nama_bts','kondisi.nama as nama_kondisi','users.name as nama_user');
 
        if($this->role == 2){
             $monitorting->where('monitoring.id_user_surveyor',$this->id);
        }

        if($this->id_bts != ""){
             $monitorting->where('monitoring.id_bts',$this->id_bts);
        }
        if($this->id_kondisi_bts != ""){
        // dd($this->id_kondisi_bts);
             $monitorting->where('monitoring.id_kondisi_bts',$this->id_kondisi_bts);
        }

        if($this->id_user_surveyor != ""){
             $monitorting->where('monitoring.id_user_surveyor',$this->id_user_surveyor);
        }

        if(($this->generate_mulai != "") && ($this->generate_selesai != "")){
             $monitorting->whereBetween('monitoring.tgl_generate', [$this->generate_mulai, $this->generate_selesai]);
        } 

        if(($this->kunjungan_mulai != "") && ($this->Kunjungan_selesai != "")){
             $monitorting->whereBetween('monitoring.tgl_kunjungan', [$this->kunjungan_mulai, $this->Kunjungan_selesai]);
        }

        if($this->tahun != ""){
             $monitorting->where('monitoring.tahun',$this->tahun);
        }
        return $this->applyScopes($monitorting);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
         if($this->role == 1){
              return $this->builder()
                ->columns($this->getColumns())
                ->minifiedAjax()
                ->addAction(['width' => '120px', 'printable' => false])
                ->parameters([
                    'dom'       => 'Bfrtip',
                    'stateSave' => true,
                    'orderCellsTop'=> true,
                    'fixedHeader'=> true,
                    'order'     => [[0, 'desc']],
                    'buttons'   => [
                        ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                        ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                        ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                        ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                        ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                    ], 
                    // 'initComplete' => 'function () {
                    //     var api = this.api(); 
                    //     api
                    //         .columns()
                    //         .eq(0)
                    //         .each(function (colIdx) {
                    //             // Set the header cell to contain the input element
                    //             var cell = $(".filters th").eq(
                    //                 $(api.column(colIdx).header()).index()
                    //             );
                    //             var title = $(cell).text();
                    //             $(cell).html("<input type=text placeholder=" + title + " />");
             
                    //             // On every keypress in this input 
                    //             var that = this;
                 
                    //             $( "input", cell ).on( "keyup change clear", function () {
                    //                 if ( that.search() !== this.value ) {
                    //                     that
                    //                         .search( this.value )
                    //                         .draw();
                    //                 }   
                    //             } ); 
                                
                    //         });
                    // }'
                ]);
        }else{
             return $this->builder()
                ->columns($this->getColumns())
                ->minifiedAjax()
                ->addAction(['width' => '120px', 'printable' => false])
                ->parameters([
                    'dom'       => 'Bfrtip',
                    'stateSave' => true,
                    'orderCellsTop'=> true,
                    'fixedHeader'=> true,
                    'order'     => [[0, 'desc']],
                    'buttons'   => [ 
                        ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                        ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                        ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                        ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                    ], 
                    // 'initComplete' => 'function () {
                    //     var api = this.api(); 
                    //     api
                    //         .columns()
                    //         .eq(0)
                    //         .each(function (colIdx) {
                    //             // Set the header cell to contain the input element
                    //             var cell = $(".filters th").eq(
                    //                 $(api.column(colIdx).header()).index()
                    //             );
                    //             var title = $(cell).text();
                    //             $(cell).html("<input type=text placeholder=" + title + " />");
             
                    //             // On every keypress in this input 
                    //             var that = this;
                 
                    //             $( "input", cell ).on( "keyup change clear", function () {
                    //                 if ( that.search() !== this.value ) {
                    //                     that
                    //                         .search( this.value )
                    //                         .draw();
                    //                 }   
                    //             } ); 
                                
                    //         });
                    // }'
                ]);
        }
       
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'bts' => ['name' => 'bts.nama', 'data' => 'nama_bts'], 
            'kondisi_bts' => ['name' => 'kondisi.nama', 'data' => 'nama_kondisi'], 
            'user_surveyor' => ['name' => 'users.name', 'data' => 'nama_user'],  
            'tgl_generate',
            'tgl_kunjungan',
            'tahun',
            'created_by',
            'edited_by',
            'edited_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'monitorings_datatable_' . time();
    }
}
