<?php

if (!function_exists('get_excerpt')) {
    /**
     * get excerpt
     *
     * @param string $text
     * @param integer $maxChars
     * @param string $suffix
     * @param bool $br
     * @param bool $clean_html
     * @return string
     */
    function get_excerpt($text, $maxChars = null, $suffix = '...', $br = true, $clean_html = true)
    {
        // text is shorter than max chars
        if (strlen($text) < $maxChars) {
            return nl2br($text);
        }

        // remove html tags
        if ($clean_html) {
            $text = strip_tags($text);
        }

        // shorten output
        if ($maxChars) {
            $text = str_replace("&nbsp;&nbsp;", "", $text);
            $text = wordwrap($text, $maxChars, '<>');
            $text = explode('<>', $text);
            $text = str_replace("", "", $text);
            $text = $text[0];
        }

        // full output with line breaks
        if ($br) {
            $text = nl2br($text);
        }

        return $text . $suffix;
    }
}

if (!function_exists('format_bytes')) {
    /**
     * Format bytes into kilobytes, megabytes, gigabytes or terabytes.
     *
     * @param int $bytes
     * @param int $precision
     * @return string
     */
    function format_bytes(int $bytes, int $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // calculate bytes
        $bytes /= pow(1024, $pow);

        // return the bytes
        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}

if (!function_exists('filter_input')) {
    /**
     * remove html tags from input
     *
     * @param $value
     * @return string
     */
    function filter_input($value)
    {
        $value = strip_tags($value);
        $value = str_replace('‏', '', $value);
        $value = trim($value);
        $value = htmlspecialchars($value, ENT_QUOTES);

        return $value;
    }
}

if (!function_exists('phone')) {
    /**
     * phone formatter
     *
     * @param string $phone
     * @return string
     */
    function phone($phone)
    {
        // strip out non-numeric characters
        $phone = preg_replace("/[^0-9]/", "", $phone);

        // mobile number start with 09
        if (strlen($phone) == 11 and substr($phone, 0, 2) == '09') {
            $phone = substr($phone, 0, 4) . '-' . substr($phone, 4, 3) . '-' . substr($phone, 7, 4);
        } // mobile without 0
        elseif (strlen($phone) == 10 and substr($phone, 0, 1) == '9') {
            $phone = substr($phone, 0, 3) . '-' . substr($phone, 3, 3) . '-' . substr($phone, 6, 4);
        } // area code
        elseif (strlen($phone) == 11) {
            $phone = '(' . substr($phone, 0, 3) . ')' . substr($phone, 3, 4) . '-' . substr($phone, 7, 4);
        } // no area code
        elseif (strlen($phone) == 8) {
            $phone = substr($phone, 0, 4) . '-' . substr($phone, 4, 4);
        }

        return $phone;
    }
}
