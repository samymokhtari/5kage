<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $email
 * @property string $password
 * @property string $firstname
 * @property string $lastname
 * @property boolean $is_admin
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
    protected $fillable = ['email', 'password', 'firstname', 'lastname', 'is_admin', 'updated_at'];

}
