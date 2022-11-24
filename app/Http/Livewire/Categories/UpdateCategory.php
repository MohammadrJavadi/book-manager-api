<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class UpdateCategory extends Component
{
    // ToDo: Reset the previous information before calling the modal | 11/24/2022
    //#region models
    public $category_id;
    public $title;
    public $summary;
    //#endregion
    protected $listeners=[
        "uc-open"=>"open"
    ];
    public $rules=[
        "title"=>"required|min:4",
        "summary"=>"nullable|min:30"
    ];
    public function render()
    {
        return view('livewire.categories.update-category');
    }
    //#region modal
    public function open(Category $category)
    {
        $this->category_id=$category->id;
        $this->title=$category->title;
        $this->summary=$category->summary;
        $this->dispatchBrowserEvent("ucm-open");
    }
    //#endregion
    //#region submit
    public function submit()
    {
        Category::query()->find($this->category_id)->update($this->validate());
        session()->flash("saved", __("message.updated", ["resource" => "category"]));
        $this->dispatchBrowserEvent("ucm-close");
    }
    //#endregion
}
