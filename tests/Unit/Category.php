<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Category extends TestCase
{
    public function test_index_method_returns_view_with_categories()
    {
        $response = $this->get('/categories');

        $response->assertStatus(200)
            ->assertViewIs('categories')
            ->assertViewHas('categories');
    }

    public function test_create_method_returns_view_with_form()
    {
        $response = $this->get('/categories/create');

        $response->assertStatus(200)
            ->assertViewIs('CreateCategory');
    }

    public function test_edit_method_returns_view_with_form()
    {
        $categoryId = 1;
        $response = $this->get("/categories/{$categoryId}/edit");

        $response->assertStatus(200)
            ->assertViewIs('CategoryEdit');
    }
}
