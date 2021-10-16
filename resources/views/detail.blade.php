@extends('layouts.app')


@section('title', $company->root_domain)


@section('content')

    @livewire('detail',['company'=>$company])

@endsection
