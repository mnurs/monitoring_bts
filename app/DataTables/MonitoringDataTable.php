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
            if(isset($data->tgl_generate)) return date('d-m-Y', strtotime($data->tgl_generate) );
            else return "";
        })
        ->editColumn('edited_at', function ($data) 
        {   
            if(isset($data->edited_at)) return date('d-m-Y', strtotime($data->edited_at) );
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
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
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
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'bts' => ['name' => 'id_bts', 'data' => 'id_bts'], 
            'kondisi_bts' => ['name' => 'id_kondisi_bts', 'data' => 'id_kondisi_bts'], 
            'user_surveyor' => ['name' => 'id_user_surveyor', 'data' => 'id_user_surveyor'],  
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
