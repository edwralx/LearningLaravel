@extends('layouts.app')
@section('content')

@if (session()->has('updatemsg'))
    <script type="text/javascript">
        swal({
            title:'Record Saved',
            text:"{{Session::get('i[datemsg')}}",
            timer:4000,
            type:'success'
        }).then((value) => {
        }).catch(swal.noop);
    </script>
@endif

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
<div class="class-12 d-flex justify-content-center pt-5">
    {{$customers->links()}}
</div>

@endsection
@push('child-scripts')
<script>
$('#flash-overlay-modal').modal();
$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
@endpush
