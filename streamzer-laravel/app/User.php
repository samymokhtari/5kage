<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * @property string $email
 * @property string $password
 * @property string $name
 * @property boolean $is_admin
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 */
class User extends Model implements Authenticatable
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'User';
    protected $primaryKey = 'id'; // Column name
    protected $rememberToken = 'remember_token'; // Column name
    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'email_verified_at', 'is_admin', 'is_whitelist', 'remember_token', 'created_at', 'updated_at'];


    /**
     * Implements Authenticatable
     */
    public function getAuthIdentifierName() {
        return $this->primaryKey;
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier(){
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword(){
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken(){
        return $this->password;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value){
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName(){
        return 'remember_token';
    }
}
