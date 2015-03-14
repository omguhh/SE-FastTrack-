<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Pwd extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_pwd';

    protected $primaryKey= 'uid';
    public $timestamps = false;

    protected $hidden = [ 'password', 'remember_token' ];
    /**
     * Whitelisted model properties for mass assignment.
     *
     * @var array
     */
    protected $fillable = array('usrn','pwd');


    private $rules = array(	'name' => 'required',
        'usrn' => 'required',
        'pwd' => 'required');



    /** RELATIONS - I AM THE FLIP-SIDE(REVERSE) **/

    public function users()
    {
        return $this->belongsTo('App\User','id');
    }


    /** RELATIONS - I AM THE FLIP-SIDE(REVERSE) ENDS **/


}
