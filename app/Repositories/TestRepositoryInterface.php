<?php

namespace App\Repositories;

interface TestRepositoryInterface
{
    public function all();
    public function create(array $test);
    public function update(array $test, $id);
    public function delete($id);
    public function getById($id);
}
