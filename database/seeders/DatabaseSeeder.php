<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Dictionary;
use App\Models\Word;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = array_map(
            fn () => User::factory()->create(),
            array_fill(0, 3, null)
        );
        $cUsers = count($users) - 1;

        $dictionaries = array_map(
            fn () => Dictionary::factory([
                'userID' => $users[random_int(0, $cUsers)]->id
            ])->create(),
            array_fill(0, 10, null)
        );
        $cDictionaries = count($dictionaries) - 1;

        $words = array_map(
            fn () => Word::factory([
                'dictionaryID' => $dictionaries[random_int(0, $cDictionaries)]->id
            ])->create(),
            array_fill(0, 100, null)
        );
    }
}
