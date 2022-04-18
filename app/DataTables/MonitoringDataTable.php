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
            //change over here
            return date('d-m-Y', strtotime($data->tgl_generate) );
        })
        ->editColumn('edited_at', function ($data) 
        {
            //change over here
            return date('d-m-Y', strtotime($data->edited_at) );
        })

        ->editColumn('id_bts', function ($data) 
        {
            //change over here
            return $data->idBts->nama;
        })
        ->editColumn('id_kondisi_bts', function ($data) 
        {
            //change over here
            return $data->idKondisiBts->nama;
        })
         ->editColumn('id_user_surveyor', function ($data) 
        {
            //change over here
            return $data->idUserSurveyor->name;
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
