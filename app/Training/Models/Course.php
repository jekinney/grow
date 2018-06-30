<?php

namespace App\Training\Models;

use App\Training\Queries\CourseQueries;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use CourseQueries;

    /**
	* Protected columns from mass assignment
	*
	* @var array
	*/
    protected $guarded = [];

    /**
	* Always load relationship count(s)
	*
	* @var array
	*/
    protected $withCount = ['videos'];

    /**
 	* Get all assigned videos.
 	*/
	public function videos()
	{
    	return $this->belongsToMany( Video::class );
	}
}
