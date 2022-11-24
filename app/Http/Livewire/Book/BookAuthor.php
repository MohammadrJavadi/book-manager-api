<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use Livewire\Component;

class BookAuthor extends Component
{
    //#region models
    public $data=null;
    //#endregion
    protected $listeners=[
        "ba-open"=>"open"
    ];
    public function render()
    {
        return view('livewire.book.book-author');
    }
    //#region modal
    public function open(Book $author)
    {
        $this->data=$author->author;
        $this->dispatchBrowserEvent("bam-open");
    }
    //#endregion
}
