<?php

namespace App\DataTables;

use App\Models\KuesionerPilihan;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class KuesionerPilihanDataTable extends DataTable
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
        ->addColumn('action', 'kuesioner_pilihans.datatables_actions')
        ->editColumn('id_kuesioner', function ($data) 
        { 
            if(isset($data->idKuesioner->pertanyaan)) return $data->idKuesioner->pertanyaan;
            else return "";
        })
        ->editColumn('edited_at', function ($data) 
        {   
            if(isset($data->edited_at)) return date('d-m-Y', strtotime($data->edited_at) );
            else return "";
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\KuesionerPilihan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(KuesionerPilihan $model)
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
            'kuesioner' => ['name' => 'kuesioner', 'data' => 'kuesioner'],
            'pilihan_jawaban',
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
        return 'kuesioner_pilihans_datatable_' . time();
    }
}
