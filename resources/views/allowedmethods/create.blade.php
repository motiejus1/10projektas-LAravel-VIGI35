@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="{{route('allowedmethods.store')}}">
        @csrf
        <div class="form-group">
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="url" placeholder="Url">
            </div>
                
            <button type="submit" class="btn btn-primary">Create Method</button>
        </div>
    </form>
</div>


@endsection