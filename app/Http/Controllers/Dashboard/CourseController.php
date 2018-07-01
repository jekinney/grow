<?php

namespace App\Http\Controllers\Dashboard;

use App\Training\Models\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Course $course)
    {
        return view( 'dashboard.course.index' )->withCourses( $course->list( $request ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        return view( 'dashboard.course.create' )->withCourses( $course->basicList() );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course)
    {
        $course->store( $request );

        $request->session()->flash( 'success', 'New Course has been created.' );

        return redirect()->route( 'dash.course.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Training\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view( 'dashboard.course.show' )->withCourse( $course->show() );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Training\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view( 'dashboard.course.edit' )->withCourse( $course->edit() )->withCourses( $course->basicList() );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Training\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course->renew( $request );

        $request->session()->flash( 'success', 'Course has been updated.' );

        return redirect()->route( 'dash.course.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Training\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Course $course)
    {
        $course->remove();

        $request->session()->flash( 'success', 'Course has been removed and videos detached.' );

        return redirect()->route( 'dash.course.index' );
    }
}
