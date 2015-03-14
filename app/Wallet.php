<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'wallets';

    protected $primaryKey= 'cid';
    public $timestamps = false;
    /**
     * Whitelisted model properties for mass assignment.
     *
     * @var array
     */
    protected $fillable = array('balance','equity');




    /** RELATIONS AHEAD **/

    public function clients()
    {
        return $this->belongsTo('App\Client','cid');
    }

}
