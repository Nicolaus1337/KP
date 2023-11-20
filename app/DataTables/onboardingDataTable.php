<?php

namespace App\DataTables;

use App\Models\onboarding;
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

class onboardingDataTable extends DataTable
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
                
                if(Gate::allows('update onboarding')){
                    $editUrl = route('onboarding.edit', $row->id);

                    $action = "<a href='$editUrl' class='btn btn-success btn-sm action btn-setting'>Setting</a>";
                }
                if(Gate::allows('read onboarding')){
                    $editUrl = route('onboarding.edit', $row->id);
                    $action .=' <button type="button" class="btn btn-primary btn-sm action"> Kerjakan </button>';
                }
               
                
                    return $action;
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(onboarding $model): QueryBuilder
    {
        $loggedInUserId = Auth::id();

        return $model->newQuery()
        ->whereHas('participants', function ($query) use ($loggedInUserId) {
            $query->where('user_id', $loggedInUserId);
        });
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('onboarding-table')
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
           
            
            Column::make('judul'),
            Column::make('status'),
            Column::make('start'),
            Column::make('end'),
            Column::make('created_by'),
            
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
        return 'onboarding_' . date('YmdHis');
    }
}
