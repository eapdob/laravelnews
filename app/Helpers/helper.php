<?php

use App\Models\Language;
use App\Models\Setting;

if (!function_exists('formatTags')) {
    function formatTags(array $tags): string
    {
        return implode(',', $tags);
    }
}

if (!function_exists('getLanguageId')) {
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
}

if (!function_exists('setLanguageId')) {
    function setLanguageId(string $language_id): void
    {
        session(['language_id' => $language_id]);
    }
}

if (!function_exists('truncate')) {
    function truncate(string $text, int $limit = 45): string
    {
        return \Str::limit($text, $limit, '...');
    }
}

if (!function_exists('convertToKFormat')) {
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

}

if (!function_exists('setSidebarActive')) {
    function setSidebarActive(array $routes): ?string
    {
        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return 'active';
            }
        }
        return '';
    }
}

if (!function_exists('getSetting')) {
    function getSetting($key)
    {
        $data = Setting::where('key', $key)->first();
        return $data->value;
    }
}

if (!function_exists('canAccess')) {
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
}

if (!function_exists('getRole')) {
    function getRole()
    {
        $role = auth()->guard('admin')->user()->getRoleNames();
        return $role->first();
    }
}

if (!function_exists('checkPermission')) {
    function checkPermission(string $permission)
    {
        return auth()->guard('admin')->user()->hasPermissionTo($permission);
    }
}

if (!function_exists('format_date')) {
    function format_date($date, $format)
    {
        if (getLanguageId() == 2) {
            setlocale(LC_TIME, 'uk_UA.utf8');
        }

        return strftime($format, $date);
    }
}
