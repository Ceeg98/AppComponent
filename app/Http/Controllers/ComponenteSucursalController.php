<?php

namespace App\Http\Controllers;

use App\Models\Componente_Sucursal;
use App\Models\Componente;
use App\Models\Sucursal;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class ComponenteSucursalController extends Controller
{


    public function listar($id)
    {
        $componentesSucursal = Componente_Sucursal::all();

        if (isNull($componentesSucursal)) {
            $componentesSucursal = null;
            $message = 'La sucursal no posee productos';
            return view('componentesSucursal.listar')
                ->with(
                    array(
                        'messageError' => $message,
                        'componentesSucursal' => $componentesSucursal
                    )
                );
        } else {
            $componentesSucursal = Componente_Sucursal::find($id);
            $componentes = Componente::all();
            $sucursales = Sucursal::all();
            return view('componentesSucursal.listar')
                ->with(
                    array(
                        'componentes' => $componentes,
                        'componentesSucursal' => $componentesSucursal,
                        'sucursales' =>  $sucursales
                    )
                );
        }
    }

    public function editComponente(Request $request)
    {
        $componentesSucursal = Componente_Sucursal::find($request->id);
        $componentesSucursal->stock = $request->stock;

        $componentesSucursal->save();
        $message = "Stock editado correctamente";

        $componentesSucursal = Componente_Sucursal::find($request->id);
        return view('componentesSucursal.listar')
            ->with(
                array(
                    'messageEdit' => $message,
                    'componentesSucursal' => $componentesSucursal
                )
            );
    }

    public function deleteComponente($id)
    {
        $componentesSucursal = Componente_Sucursal::find($id);

        $componentesSucursal->delete();
        $message = "Componente eliminado correctamente";


        $componentesSucursal = Componente_Sucursal::find($id);
        return view('componentesSucursal.listar')
            ->with(
                array(
                    'messageError' => $message,
                    'componentesSucursal' => $componentesSucursal
                )
            );
    }
}
