<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exam;
use App\Subject;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = DB::table('exams')
        ->join('subjects', 'exams.subject_id','=', 'subjects.id')
        ->join('users', 'exams.user_id', '=', 'users.id')
        ->select('exams.id AS id','exams.date AS date','exams.time AS time', 'subjects.name AS name','users.name AS professor', 'subjects.semester AS semester')
        ->orderBy('date','ASC')
        ->paginate(15);
        //return ($exams);
        return view('exams.index')->with('exams',$exams);
    }
    public function search(Request $request){
        $search = $request->get('search');
        $exams = DB::table('exams')
        ->join('subjects', 'exams.subject_id','=', 'subjects.id')
        ->join('users', 'exams.user_id', '=', 'users.id')
        ->select('exams.id AS id','exams.date AS date','exams.time AS time', 'subjects.name AS name','users.name AS professor', 'subjects.semester AS semester')
        ->where('subjects.name', 'like', '%'.$search.'%' )
            ->orwhere('users.name', 'like', '%'.$search.'%')
        ->paginate(15);
        return view('exams.index')->with('exams',$exams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $_POST['nazivPredmeta'];
        $id = DB::table('subjects')
        ->select('id')
        ->where('name', '=', $name)->first();
        
        $exam = new Exam();
        $exam->fill($request->all());
        $exam->user_id=Auth::user()->id;
        $exam->subject_id=$id->id;
        $exam->date =  $request->date;
        $exam->time = $request->time;
        $exam->save();

        return redirect('/exams')->with('success');
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
        $exam = Exam::find($id);
        return view('exams.edit')->with('exam',$exam);
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
        $exam = Exam::find($id);
        $exam->fill($request->all());
        //$exam->date =  $request->date;
        //$exam->time = $request->time;
        $exam->save();

        return redirect('/exams')->with('success','Rok je uspješno promijenjen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $exam = Exam::find($id);
        $exam->delete();

        return redirect('/exams')->with('success','Rok je uspješno izbrisan');
    }
}
