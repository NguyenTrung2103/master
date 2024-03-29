<?php

namespace App\Repositories;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function paginate(array $input = [], $perPage = 10)
    {
        $query = $this->model->query();

        return $query->paginate($perPage);
    }

    public function save(array $inputs, array $conditions = ['id' => null])
    {
        return $this->model->updateOrCreate($conditions, $inputs);
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function deleteById($id)
    {
        return $this->model->destroy($id);
    }
}
