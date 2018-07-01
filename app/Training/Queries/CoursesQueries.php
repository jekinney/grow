<?php

namespace App\Training\Queries;

use Storage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

trait CoursesQueries
{
	/**
	* Validate incoming request and set as array for inserting
	*
	* @param \Illuminate\Http\Request $request
	* @return array
	*/
	private function validateAndSet(Request $request)
	{
		$request = $this->validate( $request );

		$request = $this->processThumbnail( $request );

		$base = [
			'slug' => str_slug( $request->slug ),
			'name' => $request->name,
			'base' => $request->base?? null,
			'thumbnail' => $request->path?? null,
			'description' => $request->description
		];

		// check if we have a subcourse
		if ( $request->has( 'course_id' ) ) {

			$base['course_id'] = $request->course_id;

		}

		// return array to be inserted into database
		return $base;
	}

	/**
	* Set up validation of input
	*
	* @param \Illuminate\Http\Request $request
	* @return void
	*/
	private function validate(Request $request)
	{
		// Base validation rules
		$base = [
			'slug' => 'required|string|max:255|unique:courses',
			'name' => 'required|string|max:255|unique:courses',
			'thumbnail' => 'required|image',
			'description' => 'required|string|max:50000',
		];

		// Check if updating a course
		if (  $request->method()  !== 'POST' && $request->is( '*/course' ) ) {

			$base['slug'] = [
				'required', 'string', 'max:255',
				Rule::unique( 'courses', 'slug' )->ignore( $this->slug, 'slug' ),
			];

			$base['name'] = [
				'required', 'string', 'max:255',
				Rule::unique( 'courses', 'name' )->ignore( $this->name, 'name' ),
			];

		// Check if updating a subcourse
		} elseif ( $request->method()  !== 'POST' && $request->is( '*/subcourse' ) ) {
			

			$base['slug'] = [
				'required', 'string', 'max:255',
				Rule::unique( 'subcourses', 'slug' )->ignore( $this->slug, 'slug' ),
			];

			$base['name'] = [
				'required', 'string', 'max:255',
				Rule::unique( 'subcourses', 'name' )->ignore( $this->name, 'name' ),
			];

			$base['course_id'] = [
				'required', 'exists:courses,id'
			];

		} elseif ( $request->method() === 'POST' && $request->is( '*/subcourse' ) ) {

			$base['course_id'] = [
				'required', 'exists:courses,id'
			];

		}

		// Actuall validation
		$request->validate( $base );

		return $request;
	}

	/**
	* Process thumbnail as needed
	*
	* @param \Illuminate\Http\Request $request
	* @return \Illuminate\Http\Request $request
	*/
	private function processThumbnail(Request $request)
	{
		// Check if request has a file to process
		if ( $request->hasFile( 'thumbnail' ) ) {

			// move to courses folder and set up urls.
			$baseurl = $request->file( 'thumbnail' )->store( 'courses' );
			$fullurl = env('APP_URL').'/storage/'.$baseurl;

			// Resize the image and save it
			Image::make( $fullurl )->resize( 300, 300, function( $constraint ) {
				$constraint->upsize();
			})->save( 'storage/'.$baseurl, 100 );

			// Add image path/url data to request object
			$request->merge(['path' => $fullurl, 'base' => $baseurl]);

		}

		// return request object
		return $request;
	}

	/**
	* Remove a thumbnail
	*/
	private function removeThumbnail()
	{
		Storage::delete( $this->base );
	}
	 
}