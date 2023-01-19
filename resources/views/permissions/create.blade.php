@extends('layouts.app')

@section('content')
<div class="container">

    <form method="post" action="{{route('permissions.store')}}">
        @csrf
        <div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="Permission name">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>

</div>


@endsection