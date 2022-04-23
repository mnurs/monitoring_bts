<?php

namespace App\DataTables;

use App\Models\KuesionerJawaban;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class KuesionerJawabanDataTable extends DataTable
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
        ->addColumn('action', 'kuesioner_jawabans.datatables_actions')
        ->editColumn('edited_at', function ($data) 
        {   
            if(isset($data->edited_at)) return date('d-m-Y', strtotime($data->edited_at) );
            else return "";
        })
        ->editColumn('id_monitoring', function ($data) 
        { 
            if(isset($data->idMonitoring->idUserSurveyor->name)) return $data->idMonitoring->idUserSurveyor->name;
            else return  "";
        })
        ->editColumn('id_kuesioner', function ($data) 
        { 
            if(isset($data->idKuesioner->pertanyaan)) return $data->idKuesioner->pertanyaan;
            else return  "";
        })
        ->editColumn('jawaban', function ($data) 
        { 
            if(isset($data->jawabanSoal->pilihan_jawaban)) return $data->jawabanSoal->pilihan_jawaban;
            else return  "";
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\KuesionerJawaban $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(KuesionerJawaban $model)
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
            'user_monitoring' => ['name' => 'id_monitoring', 'data' => 'id_monitoring'],  
            'kuesioner' => ['name' => 'id_kuesioner', 'data' => 'id_kuesioner'],   
            'jawaban' => ['name' => 'jawaban', 'data' => 'jawaban'],    
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
        return 'kuesioner_jawabans_datatable_' . time();
    }
}
