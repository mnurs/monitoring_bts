<?php

namespace App\DataTables;

use App\Models\Wilayah;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class WilayahDataTable extends DataTable
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
        ->addColumn('action', 'wilayahs.datatables_actions')
        ->editColumn('level', function ($data) 
        {   
            if($data->level == 1){
                return "Negara";
            }else if($data->level == 2){
                return "Provinsi"; 
            }else if($data->level == 3){
                return "Kabupaten/Kota";  
            }else if($data->level == 4){
                return "Kecamatan";   
            }else if($data->level == 5){
                return "Kelurahan";    
            }
            //change over here
           
        })
        ->editColumn('id_parent', function ($data) 
        {
            //change over here
            if(isset($data->parent->nama)) return $data->parent->nama; 
            else return "";
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Wilayah $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Wilayah $model)
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
            'nama',
            'level',
            'parent' => ['name' => 'id_parent', 'data' => 'id_parent'], 
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
        return 'wilayahs_datatable_' . time();
    }
}
