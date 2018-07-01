<?php

namespace App\Http\Controllers\Dashboard;

use App\Training\Models\{
    Video,
    Course
};

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Video $video)
    {
        $request->merge(['all' => true]);
        
        return view( 'dashboard.video.index' )->withVideos( $video->list( $request ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
       return view( 'dashboard.video.create' )->withCourses( $course->basicList() );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Video $video)
    {
        dd( $request->all() );
        
        $video->store( $request );

        return redirect()->route( 'dash.video.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Training\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view( 'dashboard.video.show' )->withVideo( $video->show() );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Training\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video, Course $course)
    {
        return view( 'dashboard.video.edit' )->withVideo( $video->edit() )->withCourses( $course->root() );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Training\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $video->renew( $request );

        $request->session()->flash('success', 'Video has been updated.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Training\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->remove();

        return back();
    }
}
