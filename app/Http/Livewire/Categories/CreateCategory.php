<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class CreateCategory extends Component
{
    //#region models
    public $title;
    public $summary;
    //#endregion
    protected $listeners=[
        "cc-open"=>"open"
    ];
    public $rules=[
        "title"=>"required|min:4",
        "summary"=>"nullable|min:30"
    ];
    //#region modal
    public function open()
    {
        $this->dispatchBrowserEvent("ccm-open");
    }
    //#endregion
    public function render()
    {
        return view('livewire.categories.create-category');
    }
    //#region submit
    public function submit()
    {
        Category::query()->create($this->validate());
        session()->flash("saved", __("message.created", ["resource" => "category"]));
        $this->dispatchBrowserEvent("ccm-success");
        $this->reset();
    }
    //#endregion
}
