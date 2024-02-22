<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;

class LocalizationController extends Controller
{
    function adminIndex(): View
    {
        $languages = Language::all();
        return view('admin.localization.admin-index', compact('languages'));
    }

    function frontendIndex(): View
    {
        $languages = Language::all();
        return view('admin.localization.frontend-index', compact('languages'));
    }

    function extractLocalizationStrings(Request $request)
    {
        $directory = $request->directory;
        $languageCode = $request->language_code;
        $fileName = $request->file_name;
        $localizationStrings = [];

        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
        foreach ($files as $file) {
            if ($file->isDir()) {
                continue;
            }

            $contents = file_get_contents($file->getPathname());

            preg_match_all('/__\([\'"](.+?)[\'"]\)/', $contents, $matches);


            if (!empty($matches[1])) {
                foreach ($matches[1] as $match) {
                    $localizationStrings[$match] = $match;
                }
            }

            $phpArray = "<?php\n\nreturn " . var_export($localizationStrings, true) . ";\n";

            if (!File::isDirectory(lang_path($languageCode))) {
                File::makeDirectory(lang_path($languageCode), 0755, true);
            }

            file_put_contents(lang_path($languageCode . '/' . $fileName . '.php'), $phpArray);
        }
    }

    function updateLangString(Request $request): RedirectResponse
    {
        $languageStrings = trans($request->file_name, [], $request->lang_code);

        $languageStrings[$request->key] = $request->value;

        $phpArray = "<?php\n\nreturn " . var_export($languageStrings, true) . ";\n";

        file_put_contents(lang_path($request->lang_code . '/' . $request->file_name . '.php'), $phpArray);

        toast(__('admin.updated_successfully'), 'success');

        return redirect()->back();

    }

}
