<?php

namespace App\Services;

use App\Models\Test;
use App\Repositories\TestRepositoryInterface;

class TestService
{
    public function __construct(protected TestRepositoryInterface $testRepository)
    {
    }

    /**
     * @return mixed
     */
    public function all(): mixed
    {
        return $this->testRepository->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id): mixed
    {
        return $this->testRepository->getById($id);
    }


    /**
     * @param array $test
     * @return mixed
     */
    public function create(array $test): mixed
    {
        return $this->testRepository->create($test);
    }


    /**
     * @param array $test
     * @param $id
     * @return mixed
     */
    public function update(array $test, $id): mixed
    {
        return $this->testRepository->update($test, $id);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed
    {
        $test = Test::findOrFail($id);

        $test->categories()->detach();

        $test->delete();

        return $test;
    }

}
