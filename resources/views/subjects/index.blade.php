@extends('layouts.app')

@section('content')
    <h1>Predmeti</h1>
    @if(count($subjects)>=1)
        <table class='table'>
        <thead>
            <tr>
            <th scope="col">Naziv</th>
            <th scope="col">Semestar</th>
            <th scope="col">Profesor</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $subject)
            <tr>
                <th>{{$subject->sname}}</th>
                <td>{{$subject->semester}}</td>
                <td>{{$subject->uname}}</td>
                <td>
                @if(Auth::User() && Auth::User()->type=='admin')
                <a href="./subjects/{{$subject->id}}/edit" class="btn btn-info btn-sm">Uredi</a>
                <a href="{{ route('subject.delete', $subject->id )}}" class="btn btn-danger btn-sm">Izbriši</a>
                @endif
                </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
        {{$subjects->links()}}
        
    @else
        <p>Nema unesenih predmeta</p>
    @endif
    @endsection