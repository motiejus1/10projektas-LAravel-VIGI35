@extends('layouts.app')

@section('content')
<div class="container">

    <form method="post" action="{{route('permissions.update', $permission->id)}}">
        @csrf
        <div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="Permission name" value="{{$permission->name}}">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>

</div>


@endsection