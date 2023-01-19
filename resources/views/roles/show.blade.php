@extends('layouts.app')

@section('content')
<div class="container">

   <h1> Role info </h1>

   <h2>Name : {{$role->name}}</h2>

   <h2>Permissions</h2>
   <ul>
       @foreach ($permissions as $permission)
           <li>{{$permission->name}}</li>
       @endforeach
   </ul>
@endsection