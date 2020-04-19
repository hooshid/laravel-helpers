<?php

if (!function_exists('image')) {
    /**
     * image helper
     *
     * provides default image if empty
     *
     * @param bool|string $url
     * @param string      $default
     * @return string
     */
    function image($url = false, $default = null)
    {
        // no image
        if (!$url) {
            return ($default) ?: config('helpers.default_image');
        }

        // pass through
        return '/' . ltrim($url, '/');
    }
}

if (!function_exists('gravatar')) {
    /**
     * gravatar
     *
     * provides default image if empty
     *
     * @param string $email
     * @param int $size
     * @return string
     */
    function gravatar($email = null, $size = 32)
    {
        if (empty($email) && !empty(auth()->user())) {
            $email = auth()->user()->email;
        }

        return 'https://www.gravatar.com/avatar/' . md5($email) . '?s='.$size;
    }
}
