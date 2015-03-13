<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';
    /**
     * Whitelisted model properties for mass assignment.
     *
     * @var array
     */
    protected $fillable = array('address','mob2');












    /** RELATIONS AHEAD **/

    public function client_interest()
    {
        return $this->hasMany('App\C_Interest');
    }

    public function wallet()
    {
        return $this->hasOne('App\Wallet');
    }

    public function facl_relations()
    {
        return $this->hasOne('App\Facl_Relation');
    }


    public function meeting()
    {
        return $this->hasMany('App\Meeting');
    }
    /** RELATIONS AHEAD ENDS **/

    /** RELATIONS - I AM THE FLIP-SIDE(REVERSE) **/

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    /** RELATIONS - I AM THE FLIP-SIDE(REVERSE) ENDS **/

}
