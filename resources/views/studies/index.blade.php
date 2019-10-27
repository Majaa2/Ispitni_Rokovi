@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Studiji</h1>
    @if(count($studies)>=1)
       
        <table class='table'>
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Naziv studija</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($studies as $study)
            <tr>
                <th>{{$study->id}}</th>
                <td>{{$study->std_name}}</td>
                <td>
                @if(Auth::User() && Auth::User()->type=='admin')
                <a href="{{ route('study.delete', $study->id )}}" class="btn btn-danger btn-sm">Izbriši</a>
                @endif
                </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
        <div>
        {{$studies->links()}}
    @else
        <p>Nema studija</p>
    @endif
    @endsection