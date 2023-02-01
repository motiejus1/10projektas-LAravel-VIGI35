@extends('layouts.app')

@section('content')
    <div class="container">
            <a href="{{ route('allowedmethods.create') }}" class="btn btn-primary">Create</a>
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Url</th>
                <th>Action</th>
            </tr>
            
            @foreach ($allowedmethods as $method)
                <tr>
                
                    <td>{{ $method->id }}</td>
                    <td>{{ $method->name }}</td>

                       
                    <td>{{ $method->url }}</td>
                    <td>
                            <form action="{{ route('allowedmethods.destroy', $method->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection
