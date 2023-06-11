<?php

use App\Filament\Resources\PostResource;
use App\Models\Post;
use Tests\BaseTest;

class PostsTest extends BaseTest
{
    public function test_can_render_index_page()
    {
        Post::factory()->count(10)->create([
            'user_id' => $this->admin->id,
        ]);

        $this->actingAs($this->admin)->get(PostResource::getUrl())->assertSuccessful();
    }
}
