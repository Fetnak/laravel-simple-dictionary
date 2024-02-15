<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DictionariesController extends Controller
{
    public function index()
    {
        return view('dictionary.index', [
            'dictionaries' => auth()->check()
                ? Dictionary::where('userID', '=', auth()->user()->id)
                    ->latest('created_at')
                    ->filter(request(['search']))
                    ->get()
                : [],
        ]);
    }

    public function show(Dictionary $dictionary)
    {
        return view('dictionary.show', [
            'words' => Word::where('dictionaryID', '=', $dictionary->id)->get(),
            'dictionary' => $dictionary
        ]);
    }

    public function delete(Dictionary $dictionary)
    {
        $dictionary->delete();

        return redirect('/')->with('success', 'Dictionary was deleted.');
    }

    public function create()
    {
        $data = request()->validate([
            'name' => ['required', 'min:3'],
        ]);
        $data['userID'] = auth()->user()->id;
        $data['slug'] =
            strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['name']))) .
            "-" .
            substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 8)), 0, 8); //generate slug of name and add 8 random characters

        $dictionary = Dictionary::create($data);

        return redirect('/')->with('success', 'Dictionary was created.');
    }

    public function createPage()
    {
        return view('dictionary.create');
    }

    public function export(Dictionary $dictionary) {
        $data = Word::where('dictionaryID', '=', $dictionary->id)->get(['word', 'translation']);

        $json = $data->toJson();

        $fileName = $dictionary->slug . '.json';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        // return response()->download($json, $fileName, $headers);
        //
            //         return response()->header($headers)->json($json)
            // ->withCallback(request()->input('callback'));
        return response($json)
            ->header('Content-Type', 'application/json')
            ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');
    }

    public function import(Dictionary $dictionary) {
        $file = request()->file('file');
        $data = json_decode(file_get_contents($file->getRealPath()));
        foreach ($data as $value) {
            Word::create([
                'word' => $value->word,
                'translation' => $value->translation,
                'dictionaryID' => $dictionary->id
            ]);
        }

        return redirect('/dictionary/' . $dictionary->slug)->with('success', 'Dictionary was created.');
    }

}
