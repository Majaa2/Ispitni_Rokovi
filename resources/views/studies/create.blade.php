@extends ('layouts.app')
@section('content')
@if(Auth::User()->type=='admin')
<div class="container">
        <h1>Dodaj studij</h1>
        <form action="{{route('studies.create')}}" method="POST">
            @csrf
            <div class="row">
                
                <div class="form-group col">
                    <label for="nazivStudija">Naziv studija</label>
                    <input type="text" class="form-control" id="nazivStudija" name="name" placeholder="Naziv studija">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>     
        </div>
@endif     
@endsection