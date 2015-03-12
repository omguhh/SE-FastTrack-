<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Facl_Relation extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'facl_relations';
    /**
     * Whitelisted model properties for mass assignment.
     *
     * @var array
     */
   protected $fillable = array('cid','fid');


    /** RELATIONS - I AM THE FLIP-SIDE(REVERSE) **/

    public function clients()
    {
        return $this->belongsTo('App\Client');
    }
    public function fa()
    {
        return $this->belongsTo('App\Fa');
    }

    /** RELATIONS - I AM THE FLIP-SIDE(REVERSE) ENDS **/


}
