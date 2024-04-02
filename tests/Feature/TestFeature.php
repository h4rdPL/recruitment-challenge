<?php

namespace Tests\Feature;

use App\Models\Category;
use Tests\TestCase;
use App\Models\Test;

class TestFeature extends TestCase
{
    /**
     * Test creating a new test.
     */
    public function test_create_test(): void
    {

        $this->postJson('/tests/create', [
            'name' => 'Test Name',
            'description' => 'Test Description',
            'test_code' => '123',
            'icd_code' => 'A11',
            'categories' => [1]
        ]);


        $tests = Test::where('name','Test Name');

        $this->assertNotNull($tests);

    }

    /**
     * Test updating an existing test.
     */
    public function test_update_test(): void
    {
        $test = Test::create([
            'name' => 'Original Name',
            'description' => 'Original Description',
            'test_code' => '123',
            'icd_code' => 'A11',
        ]);

        $category = Category::factory()->create();
        $test->categories()->attach($category);

        // Define the updated data
        $data = [
            'name' => 'Updated Name',
            'description' => 'Updated Description',
            'test_code' => '456',
            'icd_code' => 'B22',
            'categories' => [$category->id],
        ];

        $response = $this->put("/tests/{$test->id}", $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('tests', [
            'id' => $test->id,
            'name' => 'Updated Name',
            'description' => 'Updated Description',
            'test_code' => '456',
            'icd_code' => 'B22',
        ]);

        $test->refresh();

        $this->assertEquals('Updated Name', $test->name);

        $this->assertTrue($test->categories->contains($category->id));
    }



    /**
     * Test deleting an existing test.
     */
    public function test_delete_test(): void
    {
        $test = Test::create([
            'name' => 'Test to delete',
            'description' => 'Description',
            'test_code' => '123',
            'icd_code' => 'A11',
        ]);

        $this->delete("/tests/{$test->id}");

        $this->assertDatabaseMissing('tests', ['id' => $test->id]);
    }
}
