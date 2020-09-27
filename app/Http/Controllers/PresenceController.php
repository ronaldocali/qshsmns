<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Teacher;
use Carbon\Carbon;
use App\Presence;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $months = Presence::select('presence_date')
                            ->orderBy('presence_date')
                            ->get()
                            ->groupBy(function ($val) {
                                return Carbon::parse($val->presence_date)->format('m');
                            });

        if( request()->has(['type', 'month']) ) {
            $type = request()->input('type');
            $month = request()->input('month');

            if($type == 'class') {
                $presences = Presence::whereMonth('presence_date', $month)
                                     ->select('presence_date','student_id','presence_status','class_id')
                                     ->orderBy('class_id','asc')
                                     ->get()
                                     ->groupBy(['class_id','presence_date']);

                return view('backend.presence.index', compact('presences','months'));

            }
            
        }
        $presences = [];
        
        return view('backend.presence.index', compact('presences','months'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function createByTeacher($classid)
    {
        $class = Grade::with(['students','subjects','teacher'])->findOrFail($classid);

        return view('backend.presence.create', compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classid    = $request->class_id;
        $presentdate = date('Y-m-d');

        $teacher = Teacher::findOrFail(auth()->user()->teacher->id);
        $class   = Grade::find($classid);

        if($teacher->id !== $class->teacher_id) {
            return redirect()->route('teacher.presence.create',$classid)
                             ->with('status', 'You are not assign for this class presence!');
        }

        $dataexist = Presence::whereDate('presence_date',$presentdate)
                                ->where('class_id',$classid)
                                ->get();

        if (count($dataexist) !== 0 ) {
            return redirect()->route('teacher.presence.create',$classid)
                             ->with('status', 'Presence already taken!');
        }

      

        foreach ($request->presences as $studentid => $presence) {

            if( $presence == 'present' ) {
                $presence_status = true;
            } else if( $presence == 'absent' ){
                $presence_status = false;
            }

            Presence::create([
                'class_id'          => $request->class_id,
                'teacher_id'        => $request->teacher_id,
                'student_id'        => $studentid,
                'presence_date'   => $presentdate,
                'presence_status' => $presence_status
            ]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function show(Presence $presence)
    {
        $presences = Presence::where('student_id',$presence->id)->get();

        return view('backend.presence.show', compact('presences'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function edit(Presence $presence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presence $presence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presence $presence)
    {
        //
    }
}
