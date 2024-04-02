<?php

namespace Tests\Unit;
use Tests\TestCase;

/**
 * @method get(string $string)
 */
class Test extends TestCase
{

    public function test_index_method_returns_view_with_tests()
    {
        $response = $this->get('/tests');

        $response->assertStatus(200)
            ->assertViewIs('Tests')
            ->assertViewHas('tests');
    }

    public function test_create_method_returns_view_with_form()
    {
        $response = $this->get('/tests/create');

        $response->assertStatus(200)
            ->assertViewIs('CreateTest')
            ->assertViewHas('categories');
    }

    public function test_edit_method_returns_view_with_form()
    {
        $testId = 1;
        $response = $this->get("/tests/$testId/edit");

        $response->assertStatus(200)
            ->assertViewIs('TestEdit');
    }
}
