<?php

namespace App\DataTables;

use App\Models\Foto;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class FotoDataTable extends DataTable
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
        ->addColumn('action', 'fotos.datatables_actions')
        ->editColumn('edited_at', function ($data) 
        {   
            if(isset($data->edited_at)) return date('d-m-Y', strtotime($data->edited_at) );
            else return "";
        })
        ->editColumn('id_bts', function ($data)
        {
            if(isset($data->idBts->nama)) return $data->idBts->nama;
            else return "";
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Foto $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Foto $model)
    {
        $foto =
        $model
        ->leftjoin('bts', 'bts.id', 'foto.id_bts')
        ->select('foto.id', 'foto.path_foto', 'foto.created_by', 'foto.created_at', 
        'foto.edited_by', 'foto.edited_at', 'bts.nama as nama_bts');
        //return $model->newQuery();
        return $this->applyScopes($foto);
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
            'bts' => ['name' => 'bts.nama', 'data' => 'nama_bts'],
            'path_foto',
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
        return 'fotos_datatable_' . time();
    }
}
