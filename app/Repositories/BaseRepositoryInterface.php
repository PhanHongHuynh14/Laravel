<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function with($relations);

    public function paginate(array $input = [], $perPage = 10);

    public function save(array $input, array $conditions = []);

    public function findById($id);

    public function deleteById($id);

    public function getAll(array $input = []);
}
