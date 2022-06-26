@extends('layouts.app')
@section('content')

<h2>Details of {{$customer->name}}</h2>

<p><a href="/customers/{{$customer->id}}/edit">Edit</a></p>

<form action="/customers/{{$customer->id}}" method="post">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">DELETE</button>
</form>



<div class="row">

    <div class="col-12">
        <p><strong>Name</strong>{{$customer->name}}</p>
        <p><strong>Email</strong>{{$customer->email}}</p>
        <p><strong>Status</strong>{{$customer->active}}</p>
        <p><strong>Company</strong>{{$customer->company->name}}</p>
    </div>

</div>



@endsection
