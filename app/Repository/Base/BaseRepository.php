<?php

namespace App\Repository\Base;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements WriteAbleInterface, ReadAbleInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function fetchAll()
    {
        return $this->model->orderBy('id', 'desc')->paginate(20);
    }

    public function save(array $data)
    {
        return $this->model->create($data);
    }

    public function search($id)
    {
        return $this->model->find($id);
    }

    public function update(array $data, $id)
    {
        return $this->model->findOrFail($id)->update($data);
    }

    public function remove($id)
    {
       return $this->model->findOrFail($id)->delete();
    }
}
