@extends('layouts.app')
@section('content')

<h2>Customer List</h2>
{{-- <h2>Customer Form</h2> --}}

<p><a href="/customers/create">Add New Customer</a></p>



@foreach ($customers as $customer)

<div class="row">

    <div class="col-2">{{$customer->id}}</div>
    <div class="col-4"><a href="/customers/{{$customer->id}}">{{$customer->name}}</a></div>
    <div class="col-4">{{$customer->company->name}}</div>
    <div class="col-2">{{$customer->active}}</div>

</div>

@endforeach


@endsection
