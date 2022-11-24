<?php

namespace App\DataTables;

use App\Models\Book;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BookDataTable extends DataTable
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
            ->addColumn('action', 'book.action')
            ->editColumn("author", function (Book $item){
                $item_id = el("input", ["type"=>"hidden", "value"=>$item->id], $item->id);
                $btn = el("span.btn-author", $item->author->name." ".$item->author->family);
                return el("div", $item_id.$btn);
            })
            ->editColumn("category", function ($item){
                return $item->category->title;
            })
            ->editColumn("action", function ($item) {
                $item_id = el("input", ["type" => "hidden", "value" => $item->id], $item->id);
                $delete_page = el("input", ["type" => "hidden", "value" => route("books.destroy", $item->id)], route("books.destroy", $item->id));
                $edit_btn = el("a.text-warning", ["href" => route("books.edit", $item->id)], el("i.fa-solid.fa-pen-to-square.table-icon"));
                $delete_btn = el("a.text-danger.delete-btn", el("i.fa-solid.fa-trash.table-icon"));
                return el("pre", $item_id . $delete_page . $edit_btn . " " . $delete_btn);
            })
            ->rawColumns(["action", "category", "author"]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Book $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Book $model)
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
            ->setTableId('book-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->parameters([
                'buttons' => ['print'],
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
            Column::make('code'),
            Column::make("title"),
            Column::computed("category"),
            Column::computed("author"),
//            Column::make('updated_at'),
            Column::computed('action')->title(""),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Book_' . date('YmdHis');
    }
}
