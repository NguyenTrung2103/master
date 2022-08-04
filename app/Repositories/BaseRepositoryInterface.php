<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function getAll(array $input = []);

    public function paginate(array $input = [], $perPage = 10);

    public function save(array $inputs, array $conditions = []);

    public function deleteById($id);

    public function findById($id);
}
