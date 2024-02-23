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
use Illuminate\Support\Facades\Http;

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
        $directories = explode(',', $request->directory);
        $languageCode = $request->language_code;
        $fileName = $request->file_name;
        $localizationStrings = [];


        foreach ($directories as $directory) {

            $directory = trim($directory);

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
            }
        }


        $phpArray = "<?php\n\nreturn " . var_export($localizationStrings, true) . ";\n";

        if (!File::isDirectory(lang_path($languageCode))) {
            File::makeDirectory(lang_path($languageCode), 0755, true);
        }

        file_put_contents(lang_path($languageCode . '/' . $fileName . '.php'), $phpArray);

        toast(__('Generated successfully!'), 'success');

        return redirect()->back();
    }

    function updateLangString(Request $request): RedirectResponse
    {
        $languageStrings = trans($request->file_name, [], $request->lang_code);

        $languageStrings[$request->key] = $request->value;

        $phpArray = "<?php\n\nreturn " . var_export($languageStrings, true) . ";\n";

        file_put_contents(lang_path($request->lang_code . '/' . $request->file_name . '.php'), $phpArray);

        toast(__('Updated successfully!'), 'success');

        return redirect()->back();

    }

    function translateString(Request $request)
    {
        $langCode = $request->language_code;
        $languageStrings = trans($request->file_name, [], $request->language_code);
        $keyStrings = array_keys($languageStrings);
        $text = implode(' || ', $keyStrings);

        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'microsoft-translator-text.p.rapidapi.com',
            'X-RapidAPI-Key' => '9644c1868amsh7d7ad4b2feb85afp1973f8jsneb5a65f1a736',
            'content-type' => 'application/json',
        ])->post("https://microsoft-translator-text.p.rapidapi.com/translate?api-version=3.0&to%5B0%5D=$langCode&textType=plain&profanityAction=NoAction", [
            [
                "Text" => $text
            ]
        ]);

        $translatedText = json_decode($response->body())[0]->translations[0]->text;
        $translatedValues = explode(' || ', $translatedText);
        $updatedArray = array_combine($keyStrings, $translatedValues);
        $phpArray = "<?php\n\nreturn " . var_export($updatedArray, true) . ";\n";
        file_put_contents(lang_path($langCode . '/' . $request->file_name . '.php'), $phpArray);

        return response(['status' => 'success', __('Translation is completed!')]);
    }
}
