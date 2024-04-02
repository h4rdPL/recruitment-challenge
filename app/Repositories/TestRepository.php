<?php

namespace App\Repositories;

use App\Models\Test;
use Illuminate\Database\Eloquent\Collection;

class TestRepository implements TestRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Test::all();
    }

    /**
     * @param array $test
     * @return mixed
     */
    public function create(array $test): mixed
    {
        return Test::create($test);
    }


    /**
     * @param array $test
     * @param $id
     * @return mixed
     */
    public function update(array $test, $id): mixed
    {
        $updated_test = Test::findOrFail($id);
        $updated_test->update($test);
        return $updated_test;
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id): void
    {
        $test = Test::findOrFail($id);
        $test->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id): mixed
    {
        return Test::findOrFail($id);
    }
}
