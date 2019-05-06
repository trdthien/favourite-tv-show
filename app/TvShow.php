<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TvShow
 * @package App
 * @property $id
 * @property $season
 * @property $episode
 * @property $quote
 */
class TvShow extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
