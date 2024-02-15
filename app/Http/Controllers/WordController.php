<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function addPage(Dictionary $dictionary)
    {
        return view('dictionary.word.add', ['dictionary' => $dictionary]);

    }

    public function add(Dictionary $dictionary)
    {
        $data = request()->validate([
            'word' => ['required'],
            'translation' => ['required']
        ]);

        $data['dictionaryID'] = $dictionary->id;

        Word::create($data);

        return redirect('/dictionary/' . $dictionary->slug)->with('success', 'Word was added.');
    }

    public function delete(Dictionary $dictionary, Word $word)
    {
        $word->delete();

        return redirect('/dictionary/' . $dictionary->slug)->with('success', 'Word was deleted.');
    }

}
