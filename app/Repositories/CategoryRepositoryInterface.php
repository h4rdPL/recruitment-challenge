<?php

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    public function all();
    public function create(array $category);
    public function update(array $category, $id);
    public function delete($id);
    public function getById($id);
}
