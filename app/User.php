<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    public $timestamps = false;
    /**
     *
     * Whitelisted model properties for mass assignment.
     *
     * @var array
     */
    protected $fillable = array('name','email','mobile');




    private $rules = array(	'name' => 'required',
        'email' => 'required|email',
    'mobile' => 'required');



    /** RELATIONS AHEAD **/

    public function user_pwd()
    {
        return $this->hasOne('App\User_Pwd');
    }

    public function fa()
    {
        return $this->hasOne('Fa');
    }
    public function client()
    {
        return $this->hasOne('App\Client');
    }
    /** RELATIONS AHEAD ENDS **/
}
