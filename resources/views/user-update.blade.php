@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin Dashboard - Update User') }}
                    </div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ url('user/edit') }}">

                            {{ csrf_field() }}
                            <input type="hidden" name="id" class="form-control" value="{{$data->id}}">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" value="{{$data->name}}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="text" name="email" class="form-control" value="{{$data->email}}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            


                            <div class="form-group">
                                <button class="btn btn-success btn-submit">Update</button>
                                <a href="{{ url('/home') }}" class="btn btn-success">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
