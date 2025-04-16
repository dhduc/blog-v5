<?php

namespace Database\Seeders;

use App\Filament\Pages\Navigation;
use App\Models\Category;
use App\Str;
use App\Models\Link;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use App\Actions\Posts\FetchPosts;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Finder\SplFileInfo;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\Console\Helper\ProgressBar;
use App\Models\Category as BlogCategory;
use App\Models\Post;
use Closure;

class DatabaseSeeder extends Seeder
{
    public function run() : void
    {
    	// Admin
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@gmail.com',
            'about' => "Hi! I'm from the South of France and I've been a self-taught web developer since 2006. When I started learning PHP and JavaScript, PHP 4 was still widely used, Internet Explorer 6 ruled the world, and we used DHTML to add falling snow on websites.

Để ủng hộ blog ra các bài viết tốt nhất, hãy sử dụng link giới thiệu của tác giả trong các bài viết, đây là cách giúp tác giả có thêm động lực viết bài.

Vui lòng không copy, sao chép nội dung của các bài viết dưới mọi hình thức."
        ]);

        DB::table('navigations')->insert(config('site.nav'));

        // Blog
        $this->command->warn(PHP_EOL . 'Creating blog categories...');

        $category = Category::create([
            'name' => 'General',
            'slug' => 'general',
        ]);
        Post::create([
            'title' => 'Flexible caching in Laravel made super easy',
            'slug' => 'caching-in-laravel',
            'desc' => 'Explore Laravel’s new Cache::flexible() method for balancing data freshness and performance in high-traffic applications.',
            'content' => "content",
            'published_at' => now()->subDay(),
            'category_id' => $category->id
        ]);
        Post::create([
            'title' => "Demystifying Artisan: Laravel's magical command tool",
            'slug' => 'artisan-laravel',
            'desc' => 'Artisan is Laravel’s command-line interface that can help you streamline your development process. Let’s explore its power and how it can boost your productivity.',
            'content' => 'content',
            'published_at' => now()->subDay(),
            'category_id' => $category->id
        ]);
        Post::create([
            'title' => 'A guide to architecture testing presets in Pest 3',
            'slug' => 'testing-presets',
            'desc' => 'Discover how Pest 3 simplifies architecture testing with pre-configured presets, making it effortless to enforce best practices and maintain code quality in your projects.',
            'content' => 'content',
            'published_at' => now()->subDay(),
            'category_id' => $category->id
        ]);

        Link::create([
            'user' => 'Karan Datwani',
            'url' => 'https://backpackforlaravel.com/articles/tutorials/receive-notifications-from-your-laravel-app-using-slack-with-a-10-minutes-setup',
            'image_url' => '',
            'title' => 'Receive Slack Notifications from your Laravel App with a 10-minute Setup',
            'description' => '',
            'is_approved' => now()->subDay(),
        ]);
        Link::create([
            'user' => 'Ash Allen',
            'url' => 'https://ashallendesign.co.uk/blog/freelance-web-dev-hub',
            'image_url' => '',
            'title' => 'Freelance Web Dev Hub: Free Community for Web Developers',
            'description' => 'Join the growing community of freelance web developers on Discord. It’s a great place to ask questions, get support, and hang out with other freelancers.',
            'is_approved' => now()->subDay(),
        ]);
        Link::create([
            'user' => 'Karan Datwani',
            'url' => 'https://github.com/ash-jc-allen/laravel-exchange-rates/releases/tag/v7.6.0',
            'image_url' => '',
            'title' => 'Laravel Exchange Rates v7.6.0 released!',
            'description' => 'Laravel Exchange Rates v7.6.0 adds support for the “VES” currency symbol and updates the test suite.',
            'is_approved' => now()->subDay(),
        ]);

        $this->command->info('Blog categories created.');
    }

    protected function withProgressBar(int $amount, Closure $createCollectionOfOne): Collection
    {
        $progressBar = new ProgressBar($this->command->getOutput(), $amount);

        $progressBar->start();

        $items = new Collection;

        foreach (range(1, $amount) as $i) {
            $items = $items->merge(
                $createCollectionOfOne()
            );
            $progressBar->advance();
        }

        $progressBar->finish();

        $this->command->getOutput()->writeln('');

        return $items;
    }
}
