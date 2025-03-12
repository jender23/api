<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Illuminate\Support\Facades\Http;

class CharacterController extends Controller
{
    public function fetchCharacters()
    {
        $response = Http::get('https://rickandmortyapi.com/api/character');
        
        if ($response->failed()) {
            return response()->json(['message' => 'Error al consumir la API'], 500);
        }

        $characters = collect($response->json()['results'])->take(100);

        return view('index', compact('characters'));
    }

    public function storeCharacters()
    {
        $response = Http::get('https://rickandmortyapi.com/api/character');

        if ($response->failed()) {
            return response()->json(['message' => 'Error al consumir la API'], 500);
        }

        $characters = collect($response->json()['results'])->take(100);

        foreach ($characters as $character) {
            Character::updateOrCreate(
                ['id' => $character['id']], // Evita duplicados
                [
                    'name' => $character['name'],
                    'status' => $character['status'],
                    'species' => $character['species'],
                    'type' => $character['type'],
                    'gender' => $character['gender'],
                    'origin' => json_encode($character['origin']),
                    'image' => $character['image']
                ]
            );
        }

        return redirect()->route('characters.index')->with('success', 'Personajes guardados correctamente');
    }

    public function index()
    {
        $characters = Character::all();
        return view('list', compact('characters'));
    }

    public function edit($id)
    {
        $character = Character::findOrFail($id);
        return view('edit', compact('character'));
    }

    public function update(Request $request, $id)
    {
        $character = Character::findOrFail($id);
        $character->update($request->all());

        return redirect()->route('characters.index')->with('success', 'Personaje actualizado');
    }
}
