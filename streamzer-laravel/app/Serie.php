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
 * @property Episode[] $episodes
 * @property Season[] $seasons
 * @property Category[] $categories
 */
class Serie extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Serie';

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
    protected $fillable = ['name', 'description', 'author', 'date_release', 'picture', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function episodes()
    {
        return $this->hasMany('App\Episode', 'serie_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seasons()
    {
        return $this->hasMany('App\Season', 'serie_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'SerieCategory', 'serie_id', 'category_id');
    }
}
