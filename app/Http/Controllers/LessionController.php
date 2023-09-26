<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lession;
use Illuminate\Http\Request;

class LessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data["alldata"]=Lession::all();
        if(Session()->has("message")){
            $this->data["message"]=Session()->get("message");
        };
        return view("admin.lession.tableshow",$this->data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data["editdata"]=new lession();
        $this->data["showcourse"]=Course::all();
        return view("admin.lession.addlession",$this->data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required",
            "course_id"=>"required"
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lession  $lession
     * @return \Illuminate\Http\Response
     */
    public function show(Lession $lession)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lession  $lession
     * @return \Illuminate\Http\Response
     */
    public function edit(Lession $lession)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lession  $lession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lession $lession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lession  $lession
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lession $lession)
    {
        //
    }
}
