<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $movie_id
 * @property integer $category_id
 * @property Category $category
 * @property Movie $movie
 */
class MovieCategory extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'MovieCategory';

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movie()
    {
        return $this->belongsTo('App\Movie', 'movie_id');
    }
}