<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

/**
 * @SWG\Definition(
 *  definition="User",
 *  @SWG\Property(
 *      property="id",
 *      type="integer"
 *  ),
 *  @SWG\Property(
 *      property="first_name",
 *      type="string"
 *  ),
 *  @SWG\Property(
 *      property="last_name",
 *      type="string"
 *  )
 *  *  @SWG\Property(
 *      property="last_name",
 *      type="string"
 *  )
 *   @SWG\Property(
 *      property="email",
 *      type="string"
 *  )
 * *   @SWG\Property(
 *      property="phone",
 *      type="string"
 *  )
 * )
 */


class Client extends Authenticatable
{
    use Billable;
    use Notifiable;
//    use SoftDeletes;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'token_expiration_date',
        'card_brand',
        'stripe_id',
        'card_last_four'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function subscriptions()
    {
        return $this->hasMany('App\Models\Subscriptions', 'user_id', 'id');
    }

    public function teams()
    {
        return $this->hasOne('App\Models\Team', 'user_id', 'id');
    }

    public function count_of_employees()
    {
        return $this->belongsToMany('App\Models\TeamNumberEmployees', 'teams', 'user_id', 'nbr_empls_id');
    }

    public function team_roles()
    {
        return $this->belongsToMany('App\Models\TeamUserRoles', 'teams', 'user_id', 'team_user_role_id');
    }
}
