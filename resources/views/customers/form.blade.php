<div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="{{old('name') ?? $customer->name}}">
      {{$errors->first('name')}}
    </div>
  </div>
  <div class="row mb-3">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" value="{{old('email') ?? $customer->email}}">
        {{$errors->first('email')}}
      </div>
  </div>
  <div class="row mb-3">
      <label for="active" class="col-sm-2 col-form-label">Active</label>
      <div class="col-sm-10">
          <select class="form-control" id="active" name="active">
            {{-- <option selected>Select Customer Status</option> --}}
            {{-- @foreach ($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
            <option value="{{$activeOptionKey}}"{{$customer->active == $activeOptionValue ? 'selected':''}}>{{$activeOptionValue}}</option>
            @endforeach --}}

            @foreach ($customer->activeOptions() as $activeOptionKey=>$activeOptionValue)
                <option value="{{$activeOptionKey}}" {{ $customer->active == $activeOptionValue ? 'selected' : '' }}>{{$activeOptionValue}}</option>
            @endforeach

            {{-- <option value="0"{{$customer->active == 'Inactive' ? 'selected':''}}>Inactive</option> --}}
          </select>
          {{-- {{$errors->first('active')}} --}}
      </div>
  </div>
  <div class="row mb-3">
      <label for="company_id" class="col-sm-2 col-form-label">Company</label>
      <div class="col-sm-10">
          <select class="form-control" id="company_id" name="company_id">
              @foreach ($companies as $company)
              <option value="{{$company->id}}"{{$company->id == $customer->company_id ? 'selected' : ''}}>{{$company->name}}</option>
              @endforeach
          </select>
      </div>
  </div>
  <div class="row mb-3">
    <label for="image" class="col-sm-2 col-form-label">Profile Image</label>
    <div class="col-sm-10">
        <input type="file" name="image" id="">
        {{$errors->first('image')}}
    </div>
  </div>
  @csrf
