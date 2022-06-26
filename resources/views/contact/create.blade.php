@extends('layouts.app')
@section('content')
<h1>Contact Us</h1>

<form action="/contact" method="post">
    <div class="form-group">
        <label for="name" >Name</label>
        <input type="text" class="form-control" id="name" name="name"  value="{{old('name')}}">
          {{$errors->first('name')}}
      </div>
      <div class="form-group">
        <label for="email" >Email</label>
        <input type="email" class="form-control" id="email" name="email"  value="{{old('email') }}">
            {{$errors->first('email')}}
      </div>
      <div class="form-group">
        <label for="message" >Message</label>
        <textarea name="message" class="form-control" id="message" cols="30" rows="10" value="{{old('message') }}"></textarea>
            {{$errors->first('message')}}
      </div>

      @csrf
      <button type="submit" class="btn btn-primary">Send Message</button>
</form>


@endsection
