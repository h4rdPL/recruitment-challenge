<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Category;

class CategoryFeature extends TestCase
{
use RefreshDatabase;

/**
* Test creating a new category.
*/
public function test_create_new_category(): void
    {
        $response = $this->postJson('/categories/create', [
            'name' => 'Test Name',
        ]);

        $response->assertStatus(201)
        ->assertJsonStructure(['message', 'category']);

        $this->assertDatabaseHas('categories', [
            'name' => 'Test Name',
        ]);

        $category = Category::where('name', 'Test Name')->first();
        $this->assertNotNull($category);
    }

    /**
     * Test updating an existing category.
     */
    public function test_update_category(): void
    {
        $category = Category::create(['name' => 'Original Name']);

        $response = $this->putJson("/categories/{$category->id}", [
            'name' => 'Updated Name',
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['message' => 'Category updated successfully']);

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name' => 'Updated Name',
        ]);
    }

    /**
     * Test deleting an existing category.
     */
    public function test_delete_category(): void
    {
        $category = Category::create(['name' => 'Category to delete']);

        $response = $this->delete("/categories/{$category->id}");

        $response->assertStatus(302);

        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
