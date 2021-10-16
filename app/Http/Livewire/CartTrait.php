<?php

namespace App\Http\Livewire;


use App\Models\Company;

Trait CartTrait
{
    public function addToCart( $companyId ) {
        $company = Company::findOrFail($companyId);
//        dd($company);
        $cart = session()->get( 'cart' );
        if ( !$cart ) {
            $cart = [
                $company->id => [
                    'name'     => $company->root_domain,
                    'logo'     => $company->logo,
                    'quantity' => 1,
                ],
            ];
            session()->put( 'cart', $cart );
//            return redirect()->back();
        }
        // if cart not empty then check if this product exist then increment quantity
        if ( isset( $cart[$company->id] ) ) {
            $cart[$company->id]['quantity']++;
            session()->put( 'cart', $cart );
//            return redirect()->back();
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$company->id] = [
            'name'     => $company->root_domain,
            'logo'     => $company->logo,
            'quantity' => 1,
        ];
        session()->put( 'cart', $cart );
//        return redirect()->back();
        $this->emit('cartUpdated');
    }

    public function removeFromCart(int $companyid)
    {
        $cart = session()->get( 'cart' );
        if ( !empty( $cart[$companyid] ) ) {
            unset( $cart[$companyid] );
            session()->put( 'cart', $cart );

        }
        $this->emit('cartUpdated');

//        $this->emit('cartUpdated');
    }

}
