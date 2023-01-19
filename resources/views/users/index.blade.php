@extends('layouts.app')

@section('content')
    <div class="container">
        @can('user-create')
            <a href="{{ route('users.create') }}" class="btn btn-primary">Create</a>
        @endcan
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            
            @foreach ($users as $user)
                <tr>
                
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>

                       
                    <td>
                        @if (isset($user->roles->pluck('name')[0])) 
                        {{ $user->roles->pluck('name')[0]}}</td>
                        @endif
                    <td>

                        {{-- trynimo forma turi matytis tik tiems kurie turi teise permission-delete --}}
                        @can('user-delete')
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        @endcan

                        {{-- edit mygtukas turi matytis tik tiems kurie turi teise permission-edit --}}

                        @can('user-edit')
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary">Edit</a>
                        @endcan
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-success">Show</a>


                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection
