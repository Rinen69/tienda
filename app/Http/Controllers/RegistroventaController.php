<?php

namespace App\Http\Controllers;

use App\Models\Registroventa;
use Illuminate\Http\Request;

/**
 * Class RegistroventaController
 * @package App\Http\Controllers
 */
class RegistroventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registroventas = Registroventa::paginate(10);

        return view('registroventa.index', compact('registroventas'))
            ->with('i', (request()->input('page', 1) - 1) * $registroventas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registroventa = new Registroventa();
        return view('registroventa.create', compact('registroventa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Registroventa::$rules);

        $registroventa = Registroventa::create($request->all());

        return redirect()->route('registroventas.index')
            ->with('success', 'Registroventa created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registroventa = Registroventa::find($id);

        return view('registroventa.show', compact('registroventa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registroventa = Registroventa::find($id);

        return view('registroventa.edit', compact('registroventa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Registroventa $registroventa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registroventa $registroventa)
    {
        request()->validate(Registroventa::$rules);

        $registroventa->update($request->all());

        return redirect()->route('registroventas.index')
            ->with('success', 'Registroventa updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $registroventa = Registroventa::find($id)->delete();

        return redirect()->route('registroventas.index')
            ->with('success', 'Registroventa deleted successfully');
    }
}
