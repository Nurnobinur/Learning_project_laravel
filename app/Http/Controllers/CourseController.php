<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Categorise;
use App\Models\Course;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data["alldata"]=Course::all();
        if(Session()->has("message")){
            $this->data["message"]=Session()->get("message");
        }
        return view("admin.course.viewcourse",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data["editdata"]=new course();
        $this->data["showcategory"]=Categorise::all();
        return view("admin.addcourse.addcourse",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $data=$request->all();
       $data["user_id"]=1;
       if($request->file("photo")){
            $data["photo"]=Storage::putfile("courses",$request->file("photo"));
       }
       Course::create($data);
       Session()->flash("message","course insert successfully");
       return redirect()->to("/courses");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        if(Session()->has("message")){
            $this->data["message"]=Session()->get("message");
        }
        $this->data["singledata"]=$course;
        if($this->data["singledata"]->photo){
            $this->data["singledata"]->photo=Storage::url($this->data["singledata"]->photo);
        }
        return view("admin.courseview.courseview",$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $this->data["editdata"]=$course;
        $this->data["showcategory"]=Categorise::all();
        if($this->data["editdata"]->photo){
            $this->data["editdata"]->photo=Storage::url($this->data["editdata"]->photo);
        }
        return view("admin.addcourse.addcourse",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {

        $data=$request;
        $course->title=$data["title"];
        $course->category_id=$data["category_id"];
        $course->description=$data["description"];
        if($request->file("photo")){
            if($course->photo){
                Storage::delete($course->photo);
            }
            $course->photo=Storage::putfile("courses",$request->file("photo"));
        }
        $course->save();
        Session()->flash("message","Course updated successfully");
        return redirect()->to("/courses/$course->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if($course->photo){
            Storage::delete($course->photo);

        }
        $course->delete();
        Session()->flash("message","course delete successfully");
        return redirect()->to("courses");
    }
}
