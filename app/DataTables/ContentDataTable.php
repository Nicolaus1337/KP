<?php

namespace App\DataTables;

use App\Models\Content;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ContentDataTable extends DataTable
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
            ->addColumn('action', function($row){
                $action =' ';
                
                if(Gate::allows('read content')){
                    $action ='<button type="button" data-id='.$row->id.' data-jenis="view" class="btn btn-success btn-sm action">view</button>';
                }
                if(Gate::allows('update content')){
                    $action .=' <button type="button" data-id='.$row->id.' data-jenis="edit" class="btn btn-primary btn-sm action"><i class="ti-pencil"></i></button>';
                }
                if(Gate::allows('delete content')){
                    $action .=' <button type="button"  data-id='.$row->id.' data-jenis="delete" class="btn  btn-danger btn-sm action"><i class="ti-trash"></i></button>';
                }
                
                    return $action;
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Content $model): QueryBuilder
    {
        $query = $model->newQuery();

        // Add condition to filter content based on visibility
        $visibility = Auth::user()->unit_kerja;

        $query->where(function ($query) use ($visibility) {
            
            $query->orWhere('visibility', null);
            
           
            $query->orWhere('visibility', $visibility);
        });

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('content-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
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
           
            Column::make('id'),
            Column::make('title'),
            Column::make('type'),
            Column::make('visibility'),
            
            Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(200)
                    ->addClass('text-center')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Content_' . date('YmdHis');
    }
}
