<?php

function app_asset(string $filename): string
{
    return '/build/' . config('app.version') . '/' . $filename;
}