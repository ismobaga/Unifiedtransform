<?php

namespace Database\Seeders;

use Canvas\Models\Post;
use Canvas\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $user = User::first();

        for( $amount = 1; $amount <= 6; $amount++ )
        {
            // $post = new Post();

            // $post->id = Str::uuid();
            // $post->title = $this->faker->sentence();
            // $post->slug = Str::snake( $post->title, '-' );
            // $post->summary = $this->faker->paragraph();
            // $post->body = '<p>' . $this->faker->paragraph( 2 ) . '</p><br><br><p>' . $this->faker->paragraph( 8 ) . '</p><br><br><p>' . $this->faker->paragraph( 6 ) . '</p>';
            // $post->published_at = Carbon::now()->addSeconds( $amount );
            // $post->featured_image = "/storage/canvas/images/capsules-blog-00{$amount}.jpg";
            // $post->user()->associate( $user );

            // $post->save();
        }
        $this->call([
            AcademicSettingSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}
