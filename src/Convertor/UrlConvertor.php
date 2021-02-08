<?php

declare(strict_types=1);

namespace App\Convertor;

class UrlConvertor
{
    public function convert(string $url): string
    {
        $regExp = "/\//";

        $convertedUrl = preg_replace($regExp, '|', $url);

        return $convertedUrl;
    }

    public function convertBack(string $convertedUrl): string
    {
        $regExp = "/\|/";

        $url = preg_replace($regExp, '/', $convertedUrl);

        return $url;
    }
}
