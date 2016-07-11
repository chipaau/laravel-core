<?php

namespace Chipaau\Repositories;

use Chipaau\Eloquent\Model;
use Chipaau\Repositories\RepositoryInterface;

/**
* Base repository
*/
abstract class Repository implements RepositoryInterface
{
    
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function collection(callable $callback = null, array $columns = array('*'))
    {
        $query = $this->model;
        if ($callback) {
            $query = $callback($query);
        } 
        return $query->get($columns);
    }

    public function paginate(array $paging = array(), callable $callback = null, array $columns = array('*'))
    {

    }

    public function item($id, array $with = array(), callable $callback = null)
    {

    }

    public function create(array $data = array())
    {

    }

    public function update($id, array $data = array(), callable $callback = null)
    {

    }

    public function delete($id, callable $callback = null)
    {

    }
}