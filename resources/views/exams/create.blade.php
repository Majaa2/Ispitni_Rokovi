@extends ('layouts.app')
@section('content')
        <h1>Dodaj ispitni rok</h1>
        <form action="{{route('exam.create')}}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="datepicker" >Datum</label>
                    <input id="datepicker" name="date" width="276"/>
                </div>
                <div class="form-group col-sm-4">
                    <label for="timepicker" >Vrijeme</label>
                    <input id="timepicker" name="time" width="276"/>
                </div>
                <div class="form-group col-sm-4">
                    <label for="nazivPredmeta">Naziv predmeta</label>
                    <input type="text" class="form-control" id="nazivPredmeta" name="nazivPredmeta" placeholder="Naziv predmeta">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
        
       
@endsection