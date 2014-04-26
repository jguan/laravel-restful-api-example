<?php

class Cinema extends Eloquent {
    public $timestamps = false;

    public function sessionTimes() {
        return $this->hasMany('SessionTime');
    }

    public function movies()
    {
        return $this->belongsToMany('Movie', "session_times")->withPivot('play_at');
    }
}