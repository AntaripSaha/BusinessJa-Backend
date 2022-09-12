@extends('layouts.auth.default')
@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">Select Your Business Type</p>

        <form action="{{route('user.store')}}" method="post">
            {!! csrf_field() !!}
            <div class="input-group mb-3">
                 <select class="form-control" name="user_type">
                    <option value="1">Business</option>
                    <option value="2">Jobs</option>
                    <option value="3">Properties</option>
                </select>
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
            </div>

            <div class="col-4">
                <button type="submit" class="btn btn-outline-success btn-block">Save</button>
            </div>
        </form>
@endsection
