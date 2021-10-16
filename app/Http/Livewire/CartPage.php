<?php

namespace App\Http\Livewire;


use Livewire\Component;


class CartPage extends Component
{
    use CartTrait;
    public function update()

    {

        session()->flash('message', 'Post successfully updated.');

        return redirect('checkout/success');

    }


    public function getTotal(){
        $total = 0;
        foreach ( session()->get( 'cart' ) as $cart ) {
            $total += $cart['quantity'] * 50;
        }
       return $total;
    }

    public function render()
    {
        return view('livewire.cart-page',
            [

                'total' =>$this->getTotal(),
            ]

        );
    }
}
