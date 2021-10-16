<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class Detail extends Component
{
    use CartTrait;
    public Company $company;


    /**
     * add item to the cart sesison
     *
     * @param Company $company
     * @return RedirectResponse
     */

    protected $listeners = ['addToCart'];




    public function render()
    {
        return view('livewire.detail');
    }
}
