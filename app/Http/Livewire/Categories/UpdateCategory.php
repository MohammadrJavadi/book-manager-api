<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;

class UpdateCategory extends Component
{
    protected $listeners=[
        "uc-open"=>"open"
    ];
    public function render()
    {
        return view('livewire.categories.update-category');
    }
    //#region modal
    public function open()
    {
        $this->dispatchBrowserEvent("ucm-open");
    }
    //#endregion
}
