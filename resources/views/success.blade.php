@extends('layouts.app')


@section('title', 'Success')


@section('content')

    <div class="container mx-auto mt-16 flex justify-center">
        <div class="w-1/2 bg-white shadow-md rounded-md p-5">
            <h1 class="text-4xl font-bold text-center flex justify-center items-center">
                Your order is successfully create.
            </h1>
            <p class="px-16 my-10 text-center text-xl">
                Report will be deliver to your email in 3-5 working days. </p>
            <a class="flex justify-center items-center px-16 my-10 text-center text-xl bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500" href="{{ route('home') }}" class="ml-3">Go Home</a>
        </div>
    </div>

@endsection
