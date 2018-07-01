<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Training\Models\Course;
use App\Training\Models\Subcourse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubcourseResource;

class SubcourseController extends Controller
{
    protected $course;

    function __construct(Course $course)
    {
        $this->course = $course;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Subcourse $subcourse)
    {
        return SubcourseResource::collection( $subcourse->basicList( $request->id ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'dashboard.subcourse.create' )
            ->withCourses( $this->course->basicList() );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Subcourse $subcourse)
    {
        $subcourse->store( $request );

        $request->session()->flash( 'success', 'New Course has been created.' );

        return redirect()->route( 'dash.course.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Training\Models\Course $subcourse
     * @return \Illuminate\Http\Response
     */
    public function show(Subcourse $subcourse)
    {
        return view( 'dashboard.course.show' )
            ->withCourse( $subcourse->show() );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Training\Models\Course $subcourse
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcourse $subcourse)
    {
        return view( 'dashboard.subcourse.edit' )
            ->withCourse( $subcourse->edit() )
            ->withCourses( $this->course->basicList() );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Training\Models\Course $subcourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcourse $subcourse)
    {
        $subcourse->renew( $request );

        $request->session()->flash( 'success', 'Subcourse has been updated.' );

        return redirect()->route( 'dash.course.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Training\Models\Course $subcourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Subcourse $subcourse)
    {
        $subcourse->remove();

        $request->session()->flash( 'success', 'Subcourse has been removed and videos detached.' );

        return redirect()->route( 'dash.course.index' );
    }
}
