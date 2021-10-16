<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HomepageSearchAddtoCart extends Component
{
    use CartTrait;

    public $company = null;
    public $cart;
    public $inCart;


    public function render()
    {

        $this->cart = session()->get( 'cart' );

        $this->inCart = ($this->company && $this->cart) ? in_array($this->company->id,array_keys($this->cart)) : null;
        return view('livewire.homepage-search-addto-cart');
    }
}
