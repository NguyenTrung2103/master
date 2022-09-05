@extends('layouts.admin.master')
@section('content')
@if (empty($customer))
<form class="container-fluid" method="post" action="{{ route('admin.customer.store') }}">
    @csrf
    <div class="d-flex justify-content-between">
        <h3> {{ __('user.createUser') }} </h3>
        <a href="{{ route('admin.user.index') }}" class="btn btn-primary">
            {{ __('button.back') }}
        </a>
    </div>

    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@if (!empty($customer))
    <div class="container-fluid">
        <label for="id" class="form-label"> {{ __('user.id') }} </label>
        <input name="id" id="id" class="form-control mb-2" value="{{ $customer->id }}" readonly>
    </div>
@endif

    <div class="container-fluid">
        <label for="name" class="form-label"> Thông tin khách hàng </label>
        <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $customer->name ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="container-fluid">
        <label for="birthday" class="form-label"> Ngày sinh </label>
        <input name="birthday" type="date" class="form-control mb-2 @error('birthday') is-invalid @enderror" id="birthday" placeholder="" value="{{ old('birthday', $customer->birthday ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('birthday')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="container-fluid">
        <label for="address" class="form-label"> Địa chỉ </label>
        <input name="address" type="text" class="form-control mb-2 @error('address') is-invalid @enderror" id="address" placeholder="" value="{{ old('address', $customer->address ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="container-fluid">
        <label for="phone" class="form-label"> Điện thoại </label>
        <input name="phone" type="text" class="form-control mb-2 @error('phone') is-invalid @enderror" id="phone" placeholder="" value="{{ old('phone', $customer->phone ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="container-fluid">
        <label for="phone" class="form-label"> Thêm số zalo </label>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <div class="container1">
        <button class="add_form_field">Thêm Số zalo &nbsp; 
        <span style="font-size:16px; font-weight:bold;">+ </span>
        </button>
    <div><input type="text" name="phonezalo[]"></div>
    </div>
        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
    



@php
    $selectedRoles = collect(old('role', empty($customer) ? [] : $customer->roles->pluck('id')->all()));
@endphp
    <div class="container-fluid">
        <label for="role" class="form-label"> Loại khách hàng </label>
        @if(!empty($roles))
            <div class="container-fluid">
                @foreach($roles as $role)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role_id" id="{{ 'chkbox_'.$role->id }}" value="{{ $role->id }}"{{ ($selectedRoles->contains($role->id)) ? ' checked' : '' }}{{ $isShow ? ' readonly' : ''}}>
                    <label class="form-check-label" for="{{ 'chkbox_'.$role->id }}">{{ $role->name }}</label>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="container-fluid">
        <label for="age" class="form-label"> Tuổi </label>
        <input name="age" type="text" class="form-control mb-2 @error('age') is-invalid @enderror" id="age" placeholder="" value="{{ old('age', $customer->age ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('age')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="container-fluid">
        <label for="cmnd" class="form-label"> Số Căn Cước Công Dân </label>
        <input name="cmnd" type="text" class="form-control mb-2 @error('cmnd') is-invalid @enderror" id="cmnd" placeholder="" value="{{ old('cmnd', $customer->cmnd ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('cmnd')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="container-fluid">
        <label for="bank" class="form-label"> Ngân hàng </label>
        <input name="bank" type="text" class="form-control mb-2 @error('bank') is-invalid @enderror" id="bank" placeholder="" value="{{ old('bank', $customer->bank ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('bank')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="container-fluid">
        <label for="sex" class="form-label"> Giới tính </label>
        <input name="sex" type="text" class="form-control mb-2 @error('sex') is-invalid @enderror" id="sex" placeholder="" value="{{ old('sex', $customer->sex ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('sex')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    @php
    $selectedUsers = collect(old('user', empty($customer) ? [] : $customer->users->pluck('id')->all()));
@endphp
    <div class="container-fluid">
        <label for="user" class="form-label"> Người tạo </label>
        @if(!empty($users))
            <div class="container-fluid">
                @foreach($users as $user)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="user_id" id="{{ 'chkbox_'.$user->id }}" value="{{ $user->id }}"{{ ($selectedUsers->contains($user->id)) ? ' checked' : '' }}{{ $isShow ? ' readonly' : ''}}>
                    <label class="form-check-label" for="{{ 'chkbox_'.$user->id }}">{{ $user->name }}</label>
                </div>
                @endforeach
            </div>
        @endif
    </div>
    {{ csrf_field() }}
        <div class="container-fluid">
            <label>Select Country:</label>
            <select class="form-control" name="country">
                <option value="">---</option>
                @foreach($countries as $country)
                    <option value="{{ $country->code }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="container-fluid">
            <label>Select City:</label>
            <select class="form-control" name="city">
            </select>
        </div>

        <div class="container-fluid">
            <label>Select City:</label>
            <select class="form-control" name="province">
            </select>
        </div>

        <div class="container-fluid">
            <label>Select City:</label>
            <select class="form-control" name="district">
            </select>
        </div>

        
    <div class="container-fluid">
        <label for="note" class="form-label"> Note </label>
        <input name="note" type="text" class="form-control mb-2 @error('note') is-invalid @enderror" id="note" placeholder="" value="{{ old('note', $customer->note ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
        @error('note')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-primary" value="{{ __('button.save') }}"></input>
        </div>
    </div>
</form>
<script type="text/javascript">
    $("select[name='country']").change(function(){
        var country_code = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "{{ url('/showCitiesInCountry') }}",
            method: 'POST',
            data: {
                country_code: country_code,
                _token: token
            },
            success: function(data) {
                console.log(data);
                $("select[name='city'").html('');
                $.each(data, function(key, value){
                    $("select[name='city']").append(
                        "<option value=" + value.id+ ">" + value.name + "</option>"
                    );
                });
            }
        });
    });

    $("select[name='city']").change(function(){
        var province_id = $(this).val();
        var token = $("input[name='_token']").val();
        console.log(province_id);
        $.ajax({
            url: "{{ url('/getCitiesInProvince') }}",
            method: 'POST',
            data: {
                province_id: province_id,
                _token: token
            },
            success: function(data) {
                console.log(data);
                $("select[name='province'").html('');
                $.each(data, function(key, value){
                    $("select[name='province']").append(
                        "<option value=" + value.id + ">" + value.name + "</option>"
                    );
                });
            }
        });
    });

    $("select[name='province']").change(function(){
        var city_id = $(this).val();
        var token = $("input[name='_token']").val();
        
        $.ajax({
            url: "{{ url('/getDistrictsInCity') }}",
            method: 'POST',
            data: {
                city_id: city_id,
                _token: token
            },
            success: function(data) {
                console.log(data);
                $("select[name='district'").html('');
                $.each(data, function(key, value){
                    $("select[name='district']").append(
                        "<option value=" + value.id + ">" + value.name + "</option>"
                    );
                });
            }
        });
    });
</script>
@endif


@endsection