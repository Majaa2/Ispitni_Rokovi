@extends('layouts.app')

@section('content')
    <h1>Ispitni rokovi</h1>
    @if(count($users)>=1)
    <table class='table'>
        <thead>
            <tr>
            <th scope="col">Ime i prezime</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
                <th>{{$user->name}}</th>
                <td>{{$user->email}}</td>
                <td>
                @if(Auth::User() && Auth::User()->type=='admin')
                <a href="./users/{{$user->id}}/edit" class="btn btn-info btn-sm">Uredi</a>
                <a href="{{ route('user.delete', $user->id )}}" class="btn btn-danger btn-sm">Izbriši</a>
                @endif
                </td>
                
                </tr>
            @endforeach
            
            </tbody>
        </table>
        {{$users->links()}}
    @else
        <p>Nema profesora</p>
    @endif
    @endsection