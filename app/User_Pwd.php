<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Pwd extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_pwd';
    /**
     * Whitelisted model properties for mass assignment.
     *
     * @var array
     */
    protected $fillable = array('usrn','pwd');











    /** RELATIONS - I AM THE FLIP-SIDE(REVERSE) **/

    public function users()
    {
        return $this->belongsTo('App\User');
    }


    /** RELATIONS - I AM THE FLIP-SIDE(REVERSE) ENDS **/


}
