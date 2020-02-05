<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OKR;
use App\Week;
class OKRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $okr = OKR::all()->latest()->get();
       return view('okr.index')->with('okr', $okr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('okr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $okr = new OKR;
        $okr->user_id = auth()->user()->id;
        $okr->name = auth()->user()->firstname.' '. auth()->user()->lastname;
        $okr->level = $request->input('level');
        $okr->weeknum = now()->weekOfYear;
        $okr->objective = $request->input('objective');
        $okr->description = $request->input('description');
        $okr->date_recieved = $request->input('date_recieved');
        $okr->date_due = $request->input('date_due');
        $okr->man_hours = $request->input('man_hours');
        $okr->status = '0';
        $okr->remarks = $request->input('remarks');
        $okr->save();

        $week = new Week;
        $week->user_id = auth()->user()->id;
        $week->status = '0';
        $week->objective = $request->input('objective');
        $week->weeknum = now()->weekOfYear;
        $week->year = now()->year;
        $week->save();

        return redirect('/okr')->with('success', 'Task Created');
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
        $okr = OKR::find($id);

        // Check for correct user
        if(auth()->user()->id !== $okr->user_id){
            return redirect('/okr')->with('error', 'Unauthorized Page');
        }

        return view('okr.edit')->with('okr', $okr);
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
        $okr = OKR::find($id);
     
        $okr->objective = $request->input('objective');
        $okr->date_received = $request->input('date_received');
        $okr->days_ago = $request->input('days_ago');
        $okr->date_due = $request->input('date_due');
        $okr->man_hours = $request->input('man_hours');
        $okr->status = $request->input('status');
        $okr->remarks = $request->input('remarks');
        $okr->save();

        Week::where('okr_id', $id)
          ->update(['objective' => $request->input('objective')]);

        return redirect('/okr')->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $okr = OKR::find($id);

        // Check for correct user
        if(auth()->user()->id !== $okr->user_id){
            return redirect('/okr')->with('error', 'Unauthorized Page');
        }

        $okr->delete();
        return redirect('okr')->with('success', 'Successfully Removed');
    }

    public function editItem(Request $req)
    {
        $data = OKR::find($req->id);
        $data->user_id = $req->user_id;
        $data->level = $req->level;
        $data->objective = $req->objective;
        $data->description = $req->description;
        $data->date_recieved = $req->date_received;
        $data->date_due = $req->date_due;
        $data->man_hours = $req->man_hours;
        $data->status = $req->status;
        $data->remarks = $req->remarks;
        $data->save();
        
        $week = Week::find($req->id);
        $week->objective = $req->objective;
        $week->status = $req->status;
        $week->save();

        return response()->json($data);
    }
    public function deleteItem(Request $req)
    {
        OKR::find($req->id)->delete();

        return response()->json();
    }
}
