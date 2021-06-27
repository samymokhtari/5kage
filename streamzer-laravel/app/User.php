<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $email
 * @property string $password
 * @property string $name
 * @property boolean $is_admin
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 */
class User extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'User';

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'email_verified_at', 'is_admin', 'remember_token', 'created_at', 'updated_at'];

}
