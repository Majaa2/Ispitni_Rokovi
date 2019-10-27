<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Subject;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = DB::table('subjects')
        ->join('users', 'subjects.user_id','=', 'users.id')
        ->select('subjects.id','subjects.name AS sname', 'subjects.semester','users.name AS uname')
        ->paginate(15);
        return view('subjects.index')->with('subjects', $subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/subjects/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $_POST['profesor'];
        $id = DB::table('users')
        ->select('id')
        ->where('name', '=', $name)->first();
        
        $subject = new Subject();
        $subject->fill($request->all());
        $subject->user_id=$id->id;
        $subject->name =  $request->name;
        $subject->semester = $request->semester;
        $subject->save();

        return redirect('/subjects')->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = DB::table('subjects')
        ->join('users', 'subjects.user_id','=', 'users.id')
        ->select('subjects.id','subjects.name AS sname', 'subjects.semester','users.name AS uname')
        ->where('subjects.id', '=', $id)->first();
        return view('subjects.edit')->with('subject',$subject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $_POST['profesor'];
        
        $ide = DB::table('users')
        ->select('id')
        ->where('name', '=', $name)->first();
        //return ($ide->id);
        $subject = Subject::find($id);
        $subject->fill($request->all());
        $subject->user_id=$ide->id;
        $subject->save();
        
        return redirect('/subjects')->with('success','Predmet je uspješno promijenjen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $subject= Subject::find($id);
        $subject->delete();

        return redirect('/subjects')->with('success','Predmet je uspješno izbrisan');
    }
}
