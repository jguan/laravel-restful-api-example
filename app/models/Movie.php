<?php

class Movie extends Eloquent {
    public $timestamps = false;

    public function sessionTimes() {
        return $this->hasMany('SessionTime');
    }

    public function cinemas()
    {
        return $this->belongsToMany('Cinema', "session_times")->withPivot('play_at');
    }
}