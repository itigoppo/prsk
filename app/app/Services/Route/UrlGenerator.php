<?php

namespace App\Services\Route;

use Illuminate\Routing\UrlGenerator as BaseUrlGenerator;

class UrlGenerator extends BaseUrlGenerator
{
    /**
     * Create a new manager instance.
     *
     * @param BaseUrlGenerator $url
     */
    public function __construct(BaseUrlGenerator $url)
    {
        parent::__construct($url->routes, $url->request);
    }

    /**
     * Format the given URL segments into a single URL.
     *
     * @param string $root
     * @param string $path
     * @param null $route
     * @return string
     */
    public function format($root, $path, $route = null)
    {
        $path = parent::format($root, $path);

        $mathes = null;
        preg_match("/([^\/]+?)?$/", $path, $mathes);
        $last = $mathes[0] ?? '';

        if (strpos($last, ".") === false) {
            return $path . "/";
        }
        return $path;
    }
}
