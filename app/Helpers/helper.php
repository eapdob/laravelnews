<?php

use App\Models\Language;
use App\Models\Setting;

function formatTags(array $tags): string
{
    return implode(',', $tags);
}

function getLanguage(): string
{
    if (session()->has('language')) {
        return session('language');
    } else {
        try {
            $language = Language::where('default', 1)->first();
            setLanguage($language->lang);

            return $language->lang;
        } catch (\Throwable $th) {
            setLanguage('en');

            return $language->lang;
        }
    }
}

function setLanguage(string $code): void
{
    session(['language' => $code]);
}

function getLanguageId(): string
{
    if (session()->has('language_id')) {
        return session('language_id');
    } else {
        try {
            $language = Language::where('default', 1)->first();
            setLanguageId($language->id);
            return $language->id;
        } catch (\Throwable $th) {
            setLanguageId(1);
            return $language->id;
        }
    }
}

function setLanguageId(string $language_id): void
{
    session(['language_id' => $language_id]);
}

function truncate(string $text, int $limit = 45): string
{
    return \Str::limit($text, $limit, '...');
}

function convertToKFormat(int $number): string
{
    if ($number < 1000) {
        return $number;
    } elseif ($number < 1000000) {
        return round($number / 1000, 1) . 'K';
    } else {
        return round($number / 1000000, 1) . 'M';
    }
}

function setSidebarActive(array $routes): ?string
{
    foreach ($routes as $route) {
        if (request()->routeIs($route)) {
            return 'active';
        }
    }
    return '';
}

function getSetting($key)
{
    $data = Setting::where('key', $key)->first();
    return $data->value;
}

function canAccess(array $permissions)
{
    $permission = auth()->guard('admin')->user()->hasAnyPermission($permissions);
    $superAdmin = auth()->guard('admin')->user()->hasRole('Super Admin');

    if ($permission || $superAdmin) {
        return true;
    } else {
        return false;
    }
}

function getRole()
{
    $role = auth()->guard('admin')->user()->getRoleNames();
    return $role->first();
}

function checkPermission(string $permission)
{
    return auth()->guard('admin')->user()->hasPermissionTo($permission);
}
