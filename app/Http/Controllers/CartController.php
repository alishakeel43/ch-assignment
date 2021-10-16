<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Stripe\Stripe;

class CartController extends Controller {

    /**
     * show the cart page
     *
     * @return View
     */
    public function index(): View {
        return view( 'cart' );
    }


    /**
     * callback url on stripe success
     *
     * @return View
     */
    public function checkoutSuccess(): View {
        session()->forget( 'cart' );
        return view( 'success' );
    }

}
