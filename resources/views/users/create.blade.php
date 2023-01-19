@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="{{route('users.store')}}">
        @csrf
        <div class="form-group">
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Username">
            </div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label> Roles</label><br>
                <select class="form-select" name="role">
                @foreach ($roles as $role)
                       <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
            </div>    
            <button type="submit" class="btn btn-primary">Create User</button>
        </div>
    </form>
</div>


@endsection