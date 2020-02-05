<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Week;
use App\OKR;
use App\User;
use Carbon\Carbon;

class WeekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $okr = OKR::all();
       $week = Week::orderBy('weeknum', 'desc')
                    ->where('user_id', auth()->user()->id)             
                    ->get();
       $date = Carbon::now();

       return view('weeks.index', compact('week', 'date', 'okr'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user = auth()->user()->id;
        $week = OKR::where('user_id' , $user)->pluck('objective', 'objective');
        return view('weeks.create', compact('var', 'week'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $week1 = Week::all();
        $week = new Week;
        $week->user_id = auth()->user()->id;

        $week->objective = $request->input('objective');
        $week->okr_id = OKR::where('objective', $week->objective)->pluck('okr_id')->toArray()[0];
        $week->weeknum = $request->input('weeknum');
        $week->year = $request->input('year');
        
        $week->save();

        return redirect('/week')->with('success', 'Task Created');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $week = Week::find($id);

        if(auth()->user()->id !== $week->user_id){
            return redirect('week')->with('error', 'Unauthorized Access');
        }
        $week->delete();
        return redirect('week')->with('success', 'Successfully Removed');
    }
    public function deleteItem(Request $req)
    {
        Week::find($req->id)->delete();

        return response()->json();
    }
}
