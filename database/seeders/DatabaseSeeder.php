<?php

namespace Database\Seeders;

use App\Str;
use App\Models\Link;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use App\Actions\Posts\FetchPosts;
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
        ]);
        
        // Blog
        $this->command->warn(PHP_EOL . 'Creating blog categories...');
        $blogCategories = $this->withProgressBar(20, fn () => BlogCategory::factory(1)
            ->has(
                Post::factory()->count(5)
            )
            ->count(20)
            ->create());
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
