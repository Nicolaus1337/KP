<?php

namespace App\DataTables;

use App\Models\UnitKerja;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UnitKerjaDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->setRowId('id')
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $action =' ';
            if(Gate::allows('update data unit kerja')){
                $action ='<button type="button" data-id='.$row->id.' data-jenis="edit" class="btn btn-primary btn-sm action"><i class="ti-pencil"></i></button>';
            }
            if(Gate::allows('delete data unit kerja')){
                $action .=' <button type="button"  data-id='.$row->id.' data-jenis="delete" class="btn  btn-danger btn-sm action"><i class="ti-trash"></i></button>';
            }
                return $action;
        });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(UnitKerja $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('unit_kerja-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ;
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('kode_unit_kerja'),
            Column::make('nama_unit_kerja'),
            
            Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(100)
                    ->addClass('text-center')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'UnitKerja_' . date('YmdHis');
    }
}
