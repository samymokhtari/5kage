<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $season_id
 * @property integer $serie_id
 * @property int $number
 * @property string $updated_at
 * @property Serie $serie
 * @property Season $season
 */
class Episode extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Episode';

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
    protected $fillable = ['season_id', 'serie_id', 'number', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function serie()
    {
        return $this->belongsTo('App\Serie', 'serie_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function season()
    {
        return $this->belongsTo('App\Season', 'season_id');
    }
}
