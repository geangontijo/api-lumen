<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseCrud
{
    protected string $class;

    public function index(Request $request)
    {
        return $this->class::paginate($request->per_page);
    }

    public function store(Request $request)
    {
        return response()
            ->json($this->class::create($request->all()), 201);
    }

    public function show(int $id)
    {
        $serie = $this->class::find($id);

        if (!$serie) {
            return response()->json('',204);
        }

        return response()->json($serie);
    }

    public function edit(int $id, Request $request)
    {
        $serie = $this->class::find($id);

        if (is_null($serie)) {

            return response()->json(['error' => 'A série que você está tentando editar não existe'], 404);
        }
        $serie->nome = $request->nome;
        $serie->save();
        return response()->json($serie);
    }

    public function destroy(int $id)
    {
        $rowsAffecteds = $this->class::destroy($id);

        if ($rowsAffecteds === 0) {
            return response()->json(['error' => 'Não foi possivel remover a série'], 404);
        }

        return response()->json('' , 204);
    }

}
