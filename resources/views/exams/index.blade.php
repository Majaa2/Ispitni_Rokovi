@extends('layouts.app')

@section('content')
    <div class="row">
        <div class='col-md-3'>
        <h1>Ispitni rokovi</h1>
        </div>
        <div class='col-md-7'>
        <form action="{{route('exams.search')}}" method="GET">
        
        <input type="text" name='search' id="search" class="input-group-text" placeholder="pretraga...">
        <span class='input-group-prepend'>
        
        </span>
            
        </form>
        </div>
    </div>
    @if(count($exams)>=1)
        <table class='table'>
        <thead>
            <tr>
            <th scope="col">Datum</th>
            <th scope="col">Vrijeme</th>
            <th scope="col">Predmet</th>
            <th scope="col">Profesor</th>
            <th scope="col">Semestar</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($exams as $exam)
            <tr>
                <th>{{$exam->date}}</th>
                <td>{{$exam->time}}</td>
                <td>{{$exam->name}}</td>
                <td>{{$exam->professor}}</td>
                <td>{{$exam->semester}}</td>
                <td>
                @if(Auth::User())
                <a href="./exams/{{$exam->id}}/edit" class="btn btn-info btn-sm">Uredi</a>
                <a href="{{ route('exam.delete', $exam->id )}}" class="btn btn-danger btn-sm">Izbriši</a>
                @endif
                </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
        {{$exams->links()}}
    @else
        <p>Nema ispitnih rokova</p>
    @endif
    @endsection