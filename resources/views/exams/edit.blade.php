@extends ('layouts.app')
@section('content')
        <h1>Uredi ispitni rok</h1>
        <form action="{{ route ('exam.update', $exam->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="datepicker" >Datum</label>
                    <input id="datepicker" name="date" width="276" value="{{$exam->date}}"/>
                </div>
                <div class="form-group col-sm-4">
                    <label for="timepicker" >Vrijeme</label>
                    <input id="timepicker" name="time" width="276"  value="{{$exam->time}}"/>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Uredi</button>
        </form>
        
       
@endsection