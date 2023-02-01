@extends('layouts.app')

@section('content')
<div class="container">

    <form method="post" action="{{route('permissions.update', $permission->id)}}">
        @csrf
        <div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="Permission name" value="{{$permission->name}}">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
        <div class="form-group">
            <label> Allowed Methods</label><br>
            @foreach ($allowedmethods as $allowedmethod)
                <label>
                    @if($permission->permissionsAllowedmethods->contains($allowedmethod))
                        <input type="checkbox" name="allowedmethods[]" value="{{$allowedmethod->id}}" checked>
                    @else    
                        <input type="checkbox" name="allowedmethods[]" value="{{$allowedmethod->id}}">
                    @endif
                    {{$allowedmethod->name}}

                </label><br>
            @endforeach
        </div>    
    </form>

</div>


@endsection