<?php

namespace App\Http\Controllers;
use App\Models\Venta;
use App\Models\Articulo;
use App\Models\RegistroVenta;
use App\Models\AsignaVenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    public function index()
    {
        // Obtener todas las ventas con sus relaciones (por ejemplo, artículo asociado)
        $ventas = Venta::with('articulo')->paginate(10); // Paginación opcional

        // Retornar a la vista index con las ventas
        return view('venta.index', compact('ventas'));
    }

    public function create()
    {
        $articulos = Articulo::all(); // Obtiene los artículos disponibles para la venta
        return view('venta.create', compact('articulos'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'articulo_id' => 'required|exists:articulos,id',
            'piezas' => 'required|integer|min:1',
        ]);

        $venta = new Venta();
        $venta->articulo_id = $validated['articulo_id'];
        $venta->piezas = $validated['piezas'];
        $venta->save();

        return redirect()->route('ventas.index')->with('success', 'Venta creada exitosamente.');
    }


    //

    public function crearRegistroVenta(Request $request)
    {
        // Verifica si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debe iniciar sesión para realizar una venta.');
        }
    
        // Crear un registro de venta
        $registroVenta = new RegistroVenta();
        $registroVenta->user_id = Auth::id(); // Obtén el ID del usuario autenticado
        $registroVenta->fecha = now()->toDateString();
        $registroVenta->hora = now()->toTimeString();
        $registroVenta->save();
    
        return redirect()->route('ventas.seleccionarProductos', ['registroVenta' => $registroVenta->id]);
    }
    
    public function seleccionarProductos($registroVentaId)
    {
          // Obtener los artículos que tienen stock disponible
    $productosEnStock = Articulo::whereHas('stocks', function ($query) {
        $query->where('cantidad', '>', 0);
    })->get();

    return view('venta.seleccionar', compact('productosEnStock', 'registroVentaId'));

    }/*
    public function guardarVentas(Request $request, $registroVentaId)
    {
        // Validar los datos enviados
        $validated = $request->validate([
            'productos.*.articulo_id' => 'required|exists:articulos,id',
            'productos.*.piezas' => 'required|integer|min:1',
        ]);

        foreach ($validated['productos'] as $producto) {
            $venta = new Venta();
            $venta->articulo_id = $producto['articulo_id'];
            $venta->piezas = $producto['piezas'];
            $venta->save();

            // Crear la asignación de la venta al registro
            $asignaVenta = new AsignaVenta();
            $asignaVenta->venta_id = $venta->id;
            $asignaVenta->registroventa_id = $registroVentaId;
            $asignaVenta->save();
        }

        return redirect()->route('ventas.resumen', ['registroVenta' => $registroVentaId]);
    }*//*
    public function guardarVentas(Request $request, $registroVentaId)
{
    // Validar los datos enviados
    $validated = $request->validate([
        'productos' => 'required|array', // Asegura que 'productos' sea un array
        'productos.*.articulo_id' => 'required|exists:articulos,id',
        'productos.*.piezas' => 'required|integer|min:1',
    ]);

    foreach ($validated['productos'] as $producto) {
        // Crear una venta por cada producto
        $venta = new Venta();
        $venta->articulo_id = $producto['articulo_id'];
        $venta->piezas = $producto['piezas'];
        $venta->save();

        // Asociar la venta al registro
        $asignaVenta = new AsignaVenta();
        $asignaVenta->venta_id = $venta->id;
        $asignaVenta->registroventa_id = $registroVentaId;
        $asignaVenta->save();
    }

    return redirect()->route('ventas.resumen', ['registroVenta' => $registroVentaId])
                     ->with('success', 'Ventas guardadas correctamente.');
}*//*
public function guardarVentas(Request $request, $registroVentaId)
{
    // Validar los datos enviados
    $validated = $request->validate([
        'productos.*.articulo_id' => 'required|exists:articulos,id',
        'productos.*.piezas' => 'required|integer|min:1',
    ]);

    foreach ($validated['productos'] as $producto) {
        $articulo = Articulo::findOrFail($producto['articulo_id']);

        // Crear una venta por cada producto
        $venta = new Venta();
        $venta->articulo_id = $producto['articulo_id'];
        $venta->piezas = $producto['piezas'];
        $venta->subtotal = $producto['piezas'] * $articulo->precio; // Calcula el subtotal
        $venta->save();

        // Asociar la venta al registro
        $asignaVenta = new AsignaVenta();
        $asignaVenta->venta_id = $venta->id;
        $asignaVenta->registroventa_id = $registroVentaId;
        $asignaVenta->save();
    }

    return redirect()->route('ventas.resumen', ['registroVenta' => $registroVentaId])
                     ->with('success', 'Ventas guardadas correctamente.');
}*/
public function guardarVentas(Request $request, $registroVentaId)
{
    // Validar los datos enviados
    $validated = $request->validate([
        'productos.*.articulo_id' => 'required|exists:articulos,id',
        'productos.*.piezas' => 'required|integer|min:1',
    ]);

    foreach ($validated['productos'] as $producto) {
        $stock = \App\Models\Stock::where('articulo_id', $producto['articulo_id'])->first();

        if (!$stock || $stock->cantidad < $producto['piezas']) {
            // Si no hay suficiente stock, redirige con un error
            return redirect()->back()->withErrors([
                'productos' => "No hay suficiente stock para el artículo con ID {$producto['articulo_id']}.",
            ]);
        }

        // Crear la venta
        $venta = new \App\Models\Venta();
        $venta->articulo_id = $producto['articulo_id'];
        $venta->piezas = $producto['piezas'];
        $venta->subtotal = $producto['piezas'] * $stock->costo; // Calcula el subtotal basado en el costo en stocks
        $venta->save();

        // Asociar la venta al registro
        $asignaVenta = new \App\Models\AsignaVenta();
        $asignaVenta->venta_id = $venta->id;
        $asignaVenta->registroventa_id = $registroVentaId;
        $asignaVenta->save();

        // Actualizar el stock
        $stock->cantidad -= $producto['piezas'];
        $stock->save();
    }

    return redirect()->route('ventas.resumen', ['registroVenta' => $registroVentaId])
                     ->with('success', 'Ventas guardadas correctamente.');
}
public function generarTicket($registroVentaId)
{
    $registroVenta = RegistroVenta::with(['ventas.articulo.stocks', 'user'])->findOrFail($registroVentaId);

    $pdf = \PDF::loadView('venta.ticket', compact('registroVenta'))->setPaper([0, 0, 220, 600]); // Tamaño aproximado para un ticket
    return $pdf->stream("ticket_venta_{$registroVentaId}.pdf");
}


/*
    public function guardarVentas(Request $request, $registroVentaId)
    {
        // Validar los datos enviados
        $validated = $request->validate([
            'productos.*.articulo_id' => 'required|exists:articulos,id',
            'productos.*.piezas' => 'required|integer|min:1',
        ]);

        foreach ($validated['productos'] as $producto) {
            $articulo = Articulo::findOrFail($producto['articulo_id']);

            // Crear la venta
            $venta = new Venta();
            $venta->articulo_id = $producto['articulo_id'];
            $venta->piezas = $producto['piezas'];
            $venta->subtotal = $producto['piezas'] * $articulo->precio; // Calcula el subtotal
            $venta->save();

            // Asociar la venta al registro
            $asignaVenta = new AsignaVenta();
            $asignaVenta->venta_id = $venta->id;
            $asignaVenta->registroventa_id = $registroVentaId;
            $asignaVenta->save();

            // Actualizar el stock
            $stock = $articulo->stocks; // Relación con la tabla stocks
            $stock->cantidad -= $producto['piezas'];
            $stock->save();
        }

        return redirect()->route('ventas.resumen', ['registroVenta' => $registroVentaId])
                        ->with('success', 'Ventas guardadas correctamente.');
    }
*/


    public function mostrarResumen($registroVentaId)
    {
        $registroVenta = RegistroVenta::with('ventas.articulo')->findOrFail($registroVentaId);

        return view('venta.resumen', compact('registroVenta'));
    }
        



}
