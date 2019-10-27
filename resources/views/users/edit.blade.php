@extends ('layouts.app')
@section('content')
        <h1>Uredi ispitni rok</h1>
        <form action="{{ route ('user.update', $user->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Ime i prezime</label>
                    <input id="name" class="form-control"  name="name" width="276" value="{{$user->name}}"/>
                </div>
                <div class="form-group col-sm-6">
                    <label  >Email</label>
                    <input id="email" class="form-control"  name="email" width="276"  value="{{$user->email}}"/>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Uredi</button>
        </form>
        
       
@endsection