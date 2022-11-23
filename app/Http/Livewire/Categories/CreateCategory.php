<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;

class CreateCategory extends Component
{
    protected $listeners=[
        "cc-open"=>"open"
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
}
