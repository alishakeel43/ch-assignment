<div>

        <div wire:loading.remove>
            @if($inCart)
                <button wire:click="removeFromCart({{$company->id}})"
                        class="inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 w-full">
                    Added</button>

            @else
                <button wire:click="addToCart({{$company->id}})"
                        class="inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 w-full">
                    Add To Cart</button>
            @endif
      
        </div>
</div>
