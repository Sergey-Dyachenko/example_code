<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
   // use SoftDeletes;
    protected $table = 'subscriptions';

    protected $fillable = [
        'stripe_status',
    ];

    public function client(){
        return $this->belongsTo('App\Models\Client', 'user_id', 'id');
    }


}
