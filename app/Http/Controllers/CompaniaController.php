<?php

namespace App\Http\Controllers;

use App\Models\Compania;
use Illuminate\Http\Request;

/**
 * Class CompaniaController
 * @package App\Http\Controllers
 */
class CompaniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companias = Compania::paginate(10);

        return view('compania.index', compact('companias'))
            ->with('i', (request()->input('page', 1) - 1) * $companias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $compania = new Compania();
        return view('compania.create', compact('compania'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Compania::$rules);

        $compania = Compania::create($request->all());

        return redirect()->route('companias.index')
            ->with('success', 'Compania created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compania = Compania::find($id);

        return view('compania.show', compact('compania'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compania = Compania::find($id);

        return view('compania.edit', compact('compania'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Compania $compania
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compania $compania)
    {
        request()->validate(Compania::$rules);

        $compania->update($request->all());

        return redirect()->route('companias.index')
            ->with('success', 'Compania updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $compania = Compania::find($id)->delete();

        return redirect()->route('companias.index')
            ->with('success', 'Compania deleted successfully');
    }
}
