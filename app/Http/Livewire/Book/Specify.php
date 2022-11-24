<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use Livewire\Component;

class Specify extends Component
{
    //#region models
    public $book;
    //#endregion
    protected $listeners=[
        "sb-open"=>"open"
    ];
    public function render()
    {
        return view('livewire.book.specify');
    }
    //#region modal
    public function open(Book $book)
    {
        $this->book=$book;
        $this->dispatchBrowserEvent("sbm-open");
    }
    //#endregion
}
