<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $author
 * @property string $date_release
 * @property string $picture
 * @property string $updated_at
 * @property Category[] $categories
 */
class Movie extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Movie';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'path', 'author', 'date_release', 'picture', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'MovieCategory', 'movie_id', 'category_id');
    }
}
