<?php

use App\Str;

if (!function_exists('is_debug')) {
    function is_debug()
    {
        return config('app.debug') == true;
    }
}

if (!function_exists('setting')) {
    function setting($key = '', $default = null)
    {
        return config('site.' . $key, $default);
    }
}

if (!function_exists('the_locale')) {
    function the_locale()
    {
        $language = setting('appearance.site_language');
        return  $language. '_' . \App\Enums\App::LOCALES[$language];
    }
}

if (!function_exists('s3url')) {
    function s3url($path)
    {
        if (empty($path)) {
            return '';
        }

        return asset('storage/' . $path);
        return \Illuminate\Support\Facades\Storage::disk('s3')->url($path);
    }
}

if (!function_exists('the_admin')) {
    function the_admin()
    {
        return setting('admin_email', config('app.admin_email'));
    }
}

if (!function_exists('api_throw')) {
    function api_throw($code, $message)
    {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(response()
            ->json([
                'code' => $code,
                'message' => $message,
            ], $code));
    }
}

if (!function_exists('the_name')) {
    function the_name()
    {
        return setting('name', config('app.name'));
    }
}

if (!function_exists('the_title')) {
    function the_title()
    {
        return setting('title', config('app.name'));
    }
}

if (!function_exists('the_desc')) {
    function the_desc()
    {
        return setting('description', config('app.title'));
    }
}

if (!function_exists('the_keywords')) {
    function the_keywords()
    {
        return setting('keywords', config('app.name'));
    }
}

if (!function_exists('the_copyright')) {
    function the_copyright()
    {
        return 'Copyright &copy; ' . now()->year . ' ' . the_name() . '.';
    }
}

if (!function_exists('the_facebook')) {
    function the_facebook()
    {
        return true;
    }
}

if (! function_exists('extract_headings_from_markdown')) {
    /**
     * This handy helper was written by ChatGPT and helps
     * me display the table of contents in articles.
     *
     * @return array<int, array{
     *     level: int,
     *     text: string,
     *     slug: string,
     *     children: array<int, array{
     *         level: int,
     *         text: string,
     *         slug: string,
     *         children: array
     *     }>
     * }>
     */
    function extract_headings_from_markdown(string $markdown) : array
    {
        // Split the markdown into lines (supports various newline types).
        $lines = preg_split('/\R/', $markdown);

        $headings = [];

        $stack = [];

        foreach ($lines as $line) {
            // Look for markdown headings (one or more '#' followed by a space and then text).
            if (preg_match('/^(#+)\s+(.*)$/', $line, $matches)) {
                $level = strlen($matches[1]);  // The heading level is determined by the number of '#' characters

                $text = trim($matches[2]);

                $node = [
                    'level' => $level,
                    'text' => $text,
                    'slug' => Str::slug($text),
                    'children' => [],
                ];

                // Pop the stack until we find a heading of a lower level.
                while (! empty($stack) && end($stack)['level'] >= $level) {
                    array_pop($stack);
                }

                if (empty($stack)) {
                    // No parent heading found; this is a top-level heading.
                    $headings[] = $node;

                    // Push a reference to the new node onto the stack.
                    $stack[] = &$headings[count($headings) - 1];
                } else {
                    // The current heading becomes a child of the last heading in the stack.
                    $parent = &$stack[count($stack) - 1];

                    $parent['children'][] = $node;

                    // Push a reference to the new child node onto the stack.
                    $stack[] = &$parent['children'][count($parent['children']) - 1];
                }
            }
        }

        return $headings;
    }
}
