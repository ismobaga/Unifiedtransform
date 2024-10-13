<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Canvas\Events\PostViewed;
use Canvas\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Inertia\Response;

use Inertia\Inertia;

class PostController extends Controller
{
    public function index( Request $request ) : Response
    {
        $posts = Post::published()->orderBy( 'published_at', 'desc' )->get();

        return Inertia::render( 'Posts/Index', [ 'posts' => PostResource::collection( $posts )->toArray( $request ) ] );
    }

    public function show( Post $post ) : Response
    {
        Event::dispatch( new PostViewed( $post ) );

        return Inertia::render( 'Posts/Show', [ 'post' => new PostResource( $post ) ] );
    }
}
