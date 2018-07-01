<?php

namespace App\Training\Models;

use Illuminate\Database\Eloquent\Model;
use App\Training\Queries\SubcourseQueries;

class Subcourse extends Model
{
	use SubcourseQueries;

	///// Set up and overrides
	/**
	* Protected columns from mass assignements 
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

    //// Relationshsips
    /**
    * Get owning course
    */
    public function course()
    {
    	return $this->belongsTo( Course::class );
    }

     /**
 	* Get all assigned videos.
 	*/
	public function videos()
	{
    	return $this->belongsToMany( Video::class );
	}
}
