<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Fa extends \Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fa';
    protected $primaryKey= 'uid';
    public $timestamps = false;
    /**
     * Whitelisted model properties for mass assignment.
     *
     * @var array
     */
    protected $fillable = array('address','mob2');



    /** RELATIONS - I AM THE FLIP-SIDE(REVERSE) **/

    public function users()
    {
        return $this->belongsTo('User','id');
    }


    /** RELATIONS - I AM THE FLIP-SIDE(REVERSE) ENDS **/

    /** RELATIONS AHEAD **/

    public function facl_relations()
    {
        return $this->hasMany('App\Facl_Relation');
    }

    public function meetings()
    {
    return $this->hasMany('App\Meeting');
    }
    /** RELATIONS AHEAD ENDS **/
}
