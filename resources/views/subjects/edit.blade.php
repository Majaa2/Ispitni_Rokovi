@extends ('layouts.app')
@section('content')
        <h1>Uredi predmet</h1>
        <form action="{{ route ('subject.update', $subject->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-sm-4">
                    <label  >Ime predmeta</label>
                    <input id="name" name="name" class="form-control" width="276" value="{{$subject->sname}}"/>
                </div>
                <div class="form-group col-sm-4">
                    <label >Semestar</label>
                    <input id="semester" name="semester" class="form-control" width="276"  value="{{$subject->semester}}"/>
                </div>
                <div class="form-group col-sm-4">
                    <label >Profesor</label>
                    <input id="profesor" name="profesor" class="form-control" width="276"  value="{{$subject->uname}}"/>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Uredi</button>
        </form>
        
       
@endsection