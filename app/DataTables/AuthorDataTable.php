<?php

namespace App\DataTables;

use App\Models\Author;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AuthorDataTable extends DataTable
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
            ->addColumn('action', 'author.action')
            ->editColumn("gender", function ($item) {
                $man = el("span.badge.badge-primary", __("general.gender.man"));
                $woman = el("span.badge.badge-secondary", __("general.gender.woman"));
                return $item->gender == "man" ? $man : $woman;
            })
            ->editColumn("action", function ($item) {
                $user = auth()->user();
                $item_id = el("input", ["type" => "hidden", "value" => $item->id], $item->id);
                $edit_btn = $user->can("update", $item) ? el("a.text-warning", el("i.fa-solid.fa-pen-to-square.table-icon")) : "";
                $delete_btn = $user->can("delete", $item) ? el("a.text-danger", el("i.fa-solid.fa-trash.table-icon")) : "";
                return el("pre", $item_id . $edit_btn . " " . $delete_btn);
            })
            ->rawColumns(["gender", "action"]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Author $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Author $model)
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
            ->setTableId('author-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->parameters([
                "buttons" => ["print"]
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
            Column::make("name"),
            Column::make("family"),
            Column::make("gender"),
            Column::make("age"),
            Column::computed("action")->title("")
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Author_' . date('YmdHis');
    }
}
