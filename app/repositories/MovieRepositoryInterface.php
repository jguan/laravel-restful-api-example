<?php namespace Repositories;

interface MovieRepositoryInterface {

    public function all();

    public function where($name);

}