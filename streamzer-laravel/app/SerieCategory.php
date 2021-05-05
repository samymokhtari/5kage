<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $serie_id
 * @property integer $category_id
 * @property Category $category
 * @property Serie $serie
 */
class SerieCategory extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'SerieCategory';

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
    public function serie()
    {
        return $this->belongsTo('App\Serie', 'serie_id');
    }
}
