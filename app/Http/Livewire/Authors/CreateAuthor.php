<?php

namespace App\Http\Livewire\Authors;

use App\Models\Author;
use Livewire\Component;

class CreateAuthor extends Component
{
    public $name;
    public $family;
    public $age;
    public $gender="man";

    protected $rules=[
        "name"=>"required|min:3",
        "family"=>"required|min:3",
        "age"=>"required|numeric",
        "gender"=>"required"
    ];
    protected $listeners=["openModal"];

    public function render()
    {
        return view('livewire.authors.create-author');
    }

    //#region actions
    public function openModal()
    {
        // cam: Create Author Modal
        $this->dispatchBrowserEvent("cam-open");
    }
    //#endregion

    //#region submit
    public function submit()
    {
        $validatedData = $this->validate();
        Author::query()->create($validatedData);
        session()->flash("saved", __("message.created", ["resource" => "author"]));
        $this->dispatchBrowserEvent("cam-success");
        $this->reset();
    }
    //#endregion
}
