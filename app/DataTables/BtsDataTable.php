<?php

namespace App\DataTables;

use App\Models\Bts;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class BtsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'bts.datatables_actions')
        ->editColumn('edited_at', function ($data) 
        {   
            if(isset($data->edited_at)) return date('d-m-Y', strtotime($data->edited_at) );
            else return "";
        })
        ->editColumn('id_user_pic', function ($data) 
        { 
            if(isset($data->idUserPic->name)) return $data->idUserPic->name;
            else return  "";
        })
        ->editColumn('id_pemilik', function ($data) 
        { 
            if(isset($data->idPemilik->nama)) return $data->idPemilik->nama;
            else return  "";
        })
        ->editColumn('id_wilayah', function ($data) 
        { 
            if(isset($data->idWilayah->nama)) return $data->idWilayah->nama;
            else return  "";
        })
        ->editColumn('id_jenis_bts', function ($data) 
        { 
            if(isset($data->idJenisBts->nama)) return $data->idJenisBts->nama;
            else return  "";
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Bts $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Bts $model)
    {
        return $model->newQuery();
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
                    'order'     => [[0, 'desc']],
                    'buttons'   => [
                        ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                        ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                        ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                        ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                        ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                    ],
                ]);
            }else{
                return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '120px', 'printable' => false])
                    ->parameters([
                        'dom'       => 'Bfrtip',
                        'stateSave' => true,
                        'order'     => [[0, 'desc']],
                        'buttons'   => [ 
                            ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                            ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                            ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                            ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                        ],
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
            'user_pic' => ['name' => 'id_user_pic', 'data' => 'id_user_pic'],
            'pemilik' => ['name' => 'id_pemilik', 'data' => 'id_pemilik'],
            'wilayah' => ['name' => 'id_wilayah', 'data' => 'id_wilayah'],
            'jenis_bts' => ['name' => 'id_jenis_bts', 'data' => 'id_jenis_bts'], 
            'nama',
            // 'alamat',
            // 'latitude',
            // 'longitude',
            // 'tinggi_tower',
            // 'panjang_tanah',
            // 'lebar_tanah',
            // 'ada_genset',
            // 'ada_tembok_batas',
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
        return 'bts_datatable_' . time();
    }
}
