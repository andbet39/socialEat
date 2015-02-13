<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {



    public function partecipants()
    {
        return $this->belongsToMany('App\User',  'user_reservation');
    }

    public function user(){

        return $this->belongsTo('App\User');

    }

}
