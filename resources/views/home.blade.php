@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard - Manage Users') }} 
                </div>
                <div class="d-flex flex-row-reverse">
                    <div class="p-2"><a href='{{ url('user/create') }}' class="btn btn-success">Add Users</a></div>
                  </div>
                

                <div class="card-body">
                    @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                        @endif
                    <div class="table-responsive">

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Operations</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td><a href='{{ url('user/delete/') }}/{{$user->id}}' >Delete</a>  <a href='{{ url('user/edit') }}/{{$user->id}}'>Edit</a></td>
                            </tr>  
                            @endforeach
                          
                        
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="pagination row">
{{ $users->links('pagination::bootstrap-4') }}
    </div>
@endsection

<style>
.pagination {
    justify-content: center;
}
</style>
