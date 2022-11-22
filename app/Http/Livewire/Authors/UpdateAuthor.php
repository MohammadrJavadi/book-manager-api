<?php

namespace App\Http\Livewire\Authors;

use App\Models\Author;
use Livewire\Component;

class UpdateAuthor extends Component
{
    public $author_id;
    public $name;
    public $family;
    public $gender;
    public $age;
    protected $listeners=["openUpdateModal"];
    protected $rules=[
        "name"=>"required|min:3",
        "family"=>"required|min:3",
        "age"=>"required|numeric",
        "gender"=>"required"
    ];
    public function render()
    {
        return view('livewire.authors.update-author');
    }
    //#region actions
    public function openUpdateModal(Author $author)
    {
        $this->author_id=$author->id;
        $this->name=$author->name;
        $this->family=$author->family;
        $this->gender=$author->gender;
        $this->age=$author->age;
        $this->dispatchBrowserEvent("uam-open");
    }
    //#endregion
    public function submit()
    {
        $validationData = $this->validate();
        Author::query()->find($this->author_id)->update($validationData);
        $this->dispatchBrowserEvent("uam-close");
    }
}
