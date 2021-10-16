<div>
<div class="container mx-auto p-5 rounded-md bg-white mt-16">
        <h1 class="text-4xl font-bold text-gray-700 mb-10 text-center">Search Companies</h1>
    <div>

        @if (session()->has('message'))

            <div class="alert alert-success">

                {{ session('message') }}

            </div>

        @endif

    </div>
        <div class="flex justify-between items-center px-60">
            <div class="w-1/3 mr-3">
                <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                    <label for="name" class="block text-xs font-medium text-gray-900">Name or website</label>
                    <input @if(request()->has('name')) value="{{ request()->get('name') }}" @endif
                    wire:model.debounce.500ms="name"


                           type="text" name="name" id="name"
                           class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm text-left"
                           placeholder="e.g apple or apple.com">
                </div>
            </div>
            <div class="w-1/3 mr-3">
                <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                    <label for="domain_authority" class="block text-xs font-medium text-gray-900">Domain Authority</label>
                    <input @if(request()->has('domain_authority'))
                           value="{{ request()->get('domain_authority') }}" @endif
                            wire:model.debounce.500ms="domain_authority"
                            type="text" name="domain_authority"
                           id="domain_authority"
                           class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm text-left"
                           placeholder="e.g 77">
                </div>
            </div>
            <div class="w-1/3 mr-3">
                <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                    <label for="root_domain_count" class="block text-xs font-medium text-gray-900">Root domains count</label>
                    <input @if(request()->has('root_domain_count')) value="{{ request()->get('root_domain_count') }}" @endif
                    wire:model.debounce.500ms="root_domain_count"

                    type="text" name="root_domain_count"
                           id="root_domain_count"
                           class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm text-left"
                           placeholder="e.g 77000">
                </div>
            </div>
            <div>
                <button class="inline-flex items-center px-6 py-4 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Search
                </button>
            </div>
        </div>

</div>

    <div class="container mx-auto mt-16">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Root Domain
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Rank
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Linking Root Domains
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Domain Authority
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($companies as $company)
{{--                                class="click-link hover:bg-gray-100 cursor-pointer" data-href="{{ route('company.detail',$company) }}"--}}
                               <tr>
                                    <td class="px-6 py-4 whitespace-nowrap click-link hover:bg-gray-100 cursor-pointer" data-href="{{ route('company.detail',$company) }}">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="{{ $company->logo }}" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="{{ route('company.detail',$company) }}">
                                                        {{ $company->root_domain }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap click-link hover:bg-gray-100 cursor-pointer" data-href="{{ route('company.detail',$company) }}">
                                        <div class="text-sm text-gray-900">{{ $company->rank }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 click-link hover:bg-gray-100 cursor-pointer" data-href="{{ route('company.detail',$company) }}">

                                    {{ number_format($company->linking_root_domains) }}
                                </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 click-link hover:bg-gray-100 cursor-pointer" data-href="{{ route('company.detail',$company) }}">
                                        {{ $company->domain_authority }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <livewire:homepage-search-addto-cart :company="$company" :key="$company->id">
{{--                                        <button wire:click="$emitUp('addToCart({{$company->id}})')" class="inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 w-full">Add to cart</button>--}}
                                    </td>
                                </tr>
                            @endforeach
                            <!-- More companies... -->
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $companies->onEachSide(0)->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
