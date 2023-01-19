@extends('layouts.app')

@section('content')
<div class="container">
    @can('permission-create')
        <a href="{{route('permissions.create')}}" class="btn btn-primary">Create</a>
    @endcan
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Guard Name</th>
            <th>Action</th>
        </tr>
        @foreach ($permissions as $permission)
            <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->guard_name }}</td>
                <td>

                    {{-- trynimo forma turi matytis tik tiems kurie turi teise permission-delete --}}
                    @can('permission-delete')
                        <form action="{{route('permissions.destroy', $permission->id)}}" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    @endcan    
                   
                    {{-- edit mygtukas turi matytis tik tiems kurie turi teise permission-edit --}}

                    @can('permission-edit')
                        <a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-secondary">Edit</a>
                    @endcan    
                    <a href="{{route('permissions.show', $permission->id)}}" class="btn btn-success">Show</a>


                </td>
            </tr>
        @endforeach

    </table>
</div>


@endsection