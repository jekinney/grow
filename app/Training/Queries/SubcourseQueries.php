<?php

namespace App\Training\Queries;

use Illuminate\Http\Request;

trait SubcourseQueries
{
	use CoursesQueries;
	
	/**
	* Get a list of resources
	*
	* @param \Illuminate\Http\Request $request
	* @return Collection
	*/
	public function list(Request $request)
	{
		return $this->orderBy( 'display_order', 'asc' )
			->paginate( $request->amount?? 10 );
	}

	/**
	* Get a list of resources
	*
	* @return Collection
	*/
	public function basicList($id)
	{
		return $this->where( 'course_id', $id )
				->orderBy( 'display_order', 'asc' )
				->get( 'id', 'name', 'slug', 'thumbnail' );
	}

	/**
	* Get a list of resources
	* Assumes route model binding
	*
	* @return Model
	*/
	public function show()
	{
		return $this->load( 'course', 'videos' );
	}

	/**
	* Get a list of resources
	* Assumes route model binding
	*
	* @param \Illuminate\Http\Request $request
	* @return Model
	*/
	public function edit()
	{
		return $this;
	}

	/**
	* Create and insert resource
	*
	* @param \Illuminate\Http\Request $request
	* @return Model
	*/
	public function store(Request $request)
	{
		return $this->create( $this->validateAndSet( $request ) );
	}

	/**
	* Update and insert resource
	* Assumes route model binding
	*
	* @param \Illuminate\Http\Request $request
	* @return boolean
	*/
	public function renew(Request $request)
	{
		return $this->update( $this->validateAndSet( $request ) );
	}

	/**
	* Remove a resource
	* Assumes route model binding
	*
	* @return boolean
	*/
	public function remove()
	{
		$this->videos()->detach();

		$this->removeThumbnail();

		return $this->delete();
	}
}