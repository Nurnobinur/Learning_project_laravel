<?php

namespace App\Http\Controllers;

use App\Models\Categorise;
use Illuminate\Http\Request;

class CategoriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data["alldata"]=Categorise::all();
        if(Session()->has("message")){
            $this->data["message"]=Session()->get("message");
        }
        return view("admin.viewcategory.category",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data["editdadta"]=new Categorise();
        return view("admin.addcategory.addcategory",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $request->validate(
        [
            "title"=>"required|max:20"
        ]
    );
        $data=$request->all();
        Categorise::create($data);
        Session()->flash("message","category create successfully");
        return redirect()->to("/categorise");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorise  $categorise
     * @return \Illuminate\Http\Response
     */
    public function show(Categorise $categorise)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorise  $categorise
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorise $categorise)
    {
        $this->data["editdadta"]=$categorise;
        return view("admin.addcategory.addcategory",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorise  $categorise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorise $categorise)
    {
        $updatedata=$request->all();
        $categorise->title=$updatedata["title"];
        $categorise->save();
        Session()->flash("message","Category edit successfully");
        return redirect()->to('/categorise');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorise  $categorise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorise $categorise)
    {
       $categorise->delete();
       Session()->flash("message","Category deleted Successfully");
       return redirect()->to('/categorise');
    }
}
