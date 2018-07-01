<?php

namespace App\Training\Models;

use App\Training\Queries\VideoQueries;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	use VideoQueries;

	/**
	* Add dates as carbon instances
	*
	* @var array
	*/
    protected $dates = ['publish_at'];

    /**
	* Ensure data is cast properly
	*
	* @var array
	*/
    protected $casts = [
    	'is_free' => 'boolean',
    	'publish_at' => 'datetime:m/d/Y',
    ];

    /**
	* Protected columns from mass assignment
	*
	* @var array
	*/
    protected $guarded = [];

    /**
 	* Get the formated publish at date.
 	*
 	* @return string
 	*/
	public function formatedPublishAt()
	{
    	return $this->publish_at->format( 'm/d/Y' );
	}

	/**
 	* Get all assigned courses.
 	*/
	public function subcourses()
	{
    	return $this->belongsToMany( Subcourse::class );
	}
}
