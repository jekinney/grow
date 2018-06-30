<?php

namespace App\Training\Queries;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

trait CourseQueries
{
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
	* Assumes route model binding
	*
	* @return Model
	*/
	public function show()
	{
		return $this;
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

		return $this->delete();
	}

	/**
	* Validate incoming request and set as array for inserting
	*
	* @param \Illuminate\Http\Request $request
	* @return array
	*/
	private function validateAndSet(Request $request)
	{
		$request = $this->validate( $request );

		return [
			'slug' => str_slug( $request->slug ),
			'name' => $request->name,
			'path' => $request->path,
			'is_free' => $request->has( 'is_free' )? true:false,
			'publish_at' => Carbon::parse( $request->publish_at ),
			'description' => $request->description
		];
	}

	/**
	* Set up validation of input
	*
	* @param \Illuminate\Http\Request $request
	* @return void
	*/
	private function validate(Request $request)
	{
		$base = [
			'slug' => 'required|string|max:255|unique:videos',
			'name' => 'required|string|max:255|unique:videos',
			'path' => 'required|string|max:255',
			'description' => 'required|string|max:50000',
		];

		if (  $request->method()  !== 'POST' ) {

			$base['slug'] = [
				'required', 'string', 'max:255',
				Rule::unique( 'videos', 'slug' )->ignore( $this->slug, 'slug' ),
			];

			$base['name'] = [
				'required', 'string', 'max:255',
				Rule::unique( 'videos', 'name' )->ignore( $this->name, 'name' ),
			];
		} 

		$request->validate( $base );

		return $request;
	}
}