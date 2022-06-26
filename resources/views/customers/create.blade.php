@extends('layouts.app')
@section('content')

<h2>Add New Customer</h2>

<div class="py-3">
    <form action="/customers" method="post">
        @include('customers.form')

        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Add Customer</button>
        </div>

      </form>
</div>





@endsection
