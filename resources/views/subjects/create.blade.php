@extends ('layouts.app')
@section('content')
        <h1>Dodaj predmet</h1>
        <form action="{{route('subject.create')}}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-sm-4">
                    <label  >Ime predmeta</label>
                    <input  class="form-control" id="name" name="name" width="276"/>
                </div>
                <div class="form-group col-sm-4">
                    <label >Semestar</label>
                    <input class="form-control"  id="semester" name="semester" width="276" />
                </div>
                <div class="form-group col-sm-4">
                    <label >Profesor</label>
                    <input  class="form-control" id="profesor" name="profesor" width="276" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
        
       
@endsection