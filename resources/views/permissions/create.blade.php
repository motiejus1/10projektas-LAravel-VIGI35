@extends('layouts.app')

@section('content')
<div class="container">

    <form method="post" action="{{route('permissions.store')}}">
        @csrf
        <div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="Permission name">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
        <div class="form-group">
            <label> Allowed Methods</label><br>
            @foreach ($allowedmethods as $allowedmethod)
                <label>
                    <input type="checkbox" name="allowedmethods[]" value="{{$allowedmethod->id}}">
                    {{$allowedmethod->name}}
                </label><br>
            @endforeach
        </div>    
    </form>

</div>


@endsection