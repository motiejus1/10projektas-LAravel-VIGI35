@extends('layouts.app')

@section('content')
<div class="container">
    @can('role-create')
        <a href="{{route('roles.create')}}" class="btn btn-primary">Create</a>
    @endcan
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        @foreach ($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>

                    {{-- trynimo forma turi matytis tik tiems kurie turi teise permission-delete --}}
                    @can('role-delete')
                        <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    @endcan    
                   
                    {{-- edit mygtukas turi matytis tik tiems kurie turi teise permission-edit --}}

                    @can('role-edit')
                        <a href="{{route('roles.edit', $role->id)}}" class="btn btn-secondary">Edit</a>
                    @endcan    
                    <a href="{{route('roles.show', $role->id)}}" class="btn btn-success">Show</a>


                </td>
            </tr>
        @endforeach

    </table>
</div>


@endsection