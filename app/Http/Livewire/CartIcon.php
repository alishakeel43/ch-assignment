<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartIcon extends Component
{
    protected $listeners = ['cartUpdated'];

    public function cartUpdated()
    {
        //
    }

    public function render()
    {
        $count = (session()->get('cart')) ? count(session()->get( 'cart' )) : [];
        return view('livewire.cart-icon', ['cartCount' =>$count]);
    }
}
