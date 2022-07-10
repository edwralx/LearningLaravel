@extends('layouts.app')
@section('content')

<h2>Edit Details for {{$customer->name}}</h2>

<div class="py-3">
    <form action="/customers/{{$customer->id}}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @include('customers.form')

        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Save Customer</button>
        </div>

      </form>
</div>





@endsection
