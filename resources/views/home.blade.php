@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Session::get('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {{ Session::get('message') }}

                        </div>
                    @endif

                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">Name</th>
                           <th scope="col">Middle Name</th>
                           <th scope="col">Last Name</th>
                           <th scope="col">Email</th>
                           <th scope="col">Role</th>
                           <th scope="col">Display Name</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                           <th scope="row">{{ $user->id }}</th>
                           <td>{{ $user->name }}</td>
                           <td>{{ $user->middle_name }}</td>
                           <td>{{ $user->last_name }}</td>
                           <td>{{ $user->email }}</td>
                            @foreach($user->roles as $role)
                              <td>{{ $role->name }}</td>
                            @endforeach
                           <td>{{ $user->getDisplayNameUser($user) }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
