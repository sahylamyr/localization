<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PDO;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();

        return view('languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('languages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLanguageRequest $request)
    {

        $name = $request->input('name');
        $code = $request->input('code');

        $base_path = base_path();
        $source_path = base_path('lang/en');
        $dest_path = base_path("lang/{$code}");

        if (File::exists($dest_path)) {
            return 'This language earlier has been created';
        }

        File::copyDirectory($source_path, $dest_path);



        $language = Language::create($request->only('name', 'code'));

        return redirect()->route('languages.index')->with('success', 'The language has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
        //
    }
    public function optionsUpdate(Request $request, Language $language)
    {
        $data = $request->input('translations');
        $fileContent = '';






        foreach ($data as $key => $value) {
            $filename = $key . '.php';

            $form = '';

            $filepath = base_path("lang/{$language->code}/{$filename}");




            if (File::exists($filepath) && is_writable($filepath)) {
                $form .= "<?php \n";

                $form .= "return  [\n";



                foreach ($value as $valKey => $val) {

                    if (!is_array($val)) {
                        $form .= '"' . $valKey . '"=>' . '"' . $val . '",  ' . "\n";
                    } else {
                        $form .= '"' . $valKey . '"=>[' . "\n";
                        foreach ($val as $vKey => $vVal) {
                            $form .= '"' . $vKey . '"=>' . '"' . $vVal . '",' . "\n";
                        }
                        $form .= "],\n";
                    }
                }

                $form .= "];";



                $file = base_path() . "/lang/{$language->code}/{$key}.php";

                $fp = fopen($file, "w+");
                fwrite($fp, $form);
                fclose($fp);
                $newFile = File::get($file);
            } else {
                echo 'yoxdu';
            }
        }



        return redirect()->back();
    }

    public function options(Language $language)
    {

        $translations = [];

        $files = File::files(base_path("lang/{$language->code}"));

        foreach ($files as $file) {
            $key = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            $translations[$key] = include $file;
        }





        return view('languages.options', compact('translations', 'language'));

   

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLanguageRequest $request, Language $language)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        $language->delete();

        $base_path = base_path("lang/{$language->code}");

        File::deleteDirectory($base_path);
        return redirect()->back()->with('success', 'Language has been deleted!');
    }
}
