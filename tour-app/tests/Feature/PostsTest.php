<?php


namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\PostCategory;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_post()
    {
        $user = User::factory()->create();
        $category = PostCategory::factory()->create();

        $response = $this->actingAs($user)->post(route('posts.store'), [
            'title' => 'Test Post',
            'link' => 'https://example.com',
            'description' => 'Test description',
            'category_id' => $category->id,
            'author_id' => $user->id,
            'images' => [UploadedFile::fake()->image('test.jpg')],
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('posts', ['title' => 'Test Post']);
    }
    public function test_can_update_post()
    {
        $user = User::factory()->create();
        $category = PostCategory::factory()->create();
        $post = $user->posts()->create([
            'title' => 'Old Title',
            'link' => 'https://old.com',
            'description' => 'Old desc',
            'category_id' => $category->id,
            'author_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->put(route('posts.update', $post), [
            'title' => 'New Title',
            'link' => 'https://new.com',
            'description' => 'New desc',
            'category_id' => $category->id,
            'author_id' => $user->id,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('posts', ['title' => 'New Title']);
    }

    public function test_can_delete_post()
    {
        $user = User::factory()->create();
        $category = PostCategory::factory()->create();
        $post = $user->posts()->create([
            'title' => 'Delete Me',
            'link' => 'https://del.com',
            'description' => 'Del desc',
            'category_id' => $category->id,
            'author_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->delete(route('posts.destroy', $post));
        $response->assertRedirect();
        $this->assertDatabaseMissing('posts', ['title' => 'Delete Me']);
    }
}