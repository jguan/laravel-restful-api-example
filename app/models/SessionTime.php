<?php

class SessionTime extends Eloquent {
    public $timestamps = false;

    public function cinema()
    {
        return $this->belongsTo('Cinema');
    }

    public function movie()
    {
        return $this->belongsTo('Movie');
    }
}