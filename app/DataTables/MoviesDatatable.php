<?php

namespace App\DataTables;

use App\Models\Movies;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MoviesDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->setRowId('id')
            ->addColumn('checkbox', 'control.actors.button.checkbox')
            ->addColumn('action', 'control.actors.button.action')
            ->rawColumns(['action', 'checkbox']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Movies $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Movies $model)
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
                    ->setTableId('actorsdatatables-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->pageLength(10)
                    ->lengthMenu([ [10, 25, 50, 100, -1], [10, 25, 50, 100, 'All'] ])
                    ->pagingType('full')
                    ->parameters([
                        'dom' => '<"float-left"B><"float-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
                    ])
                    ->buttons(
                        Button::make('create')->extend('collection')->text('create')->className("btn btn-outline-primary")
                        ->action("createRow()"),
                        Button::make(['copy'])->extend('collection')->text('MultiRemove')
                        ->addClass("btn btn-outline-danger delete_all")
                        ->attr(['data-url' => url("myproductsDeleteAll")])
                        ->action("deleteRows()"),
                        Button::make('print')->className("btn btn-outline-primary"),
                        Button::make(['copy'])->extend('collection')->text('Save as ..')->className("btn btn-outline-success")->buttons([
                          Button::make('csv'),
                          Button::make('excel'),
                        ]),
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name' => 'checkbox',
                'data' => 'checkbox',
                'title' => 'Check',
                'checkbox' => false,
                'printable' => false,
                'searchable' => false,
                'orderable' => false,
                'width' => '15px',
                'title' => '<input type="checkbox" id="master">',
            ],
            Column::make('id')->name('id'),
            Column::make('title'),
            Column::make('description'),
            Column::make('release_date'),
            Column::make('duration'),
            [
                'name' => 'action',
                'data' => 'action',
                'title' => 'Action',
                'width' => '150px',
                'printable' => false,
                'searchable' => false,
                'orderable' => false,
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Movies_' . date('YmdHis');
    }
}
