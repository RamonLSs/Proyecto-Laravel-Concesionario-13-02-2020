<?php

namespace App\Http\Controllers;

use App\Coche;
use App\Marca;
use Illuminate\Http\Request;
use App\Rules\Matricula;
use Illuminate\Support\Facades\Storage;

class CocheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipos=['Diesel', 'Gasolina', 'Híbrido', 'Eléctrico', 'GAS (GNC/GLP)'];
        $marcas=Marca::orderBy('nombre')->get();

        //Recojo los campos de busqueda, me llegan en el request (en este caso los dos select)
        $miMarca=$request->get('marca_id');
        $miTipo=$request->get('tipo');




        $coches=Coche::orderBy('marca_id')
        ->marca_id($miMarca)
        ->tipo($miTipo)
        ->paginate(3);

        return view('coches.index', compact('coches' , 'marcas', 'tipos', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas=Marca::orderBy('nombre')->get();
        return view('coches.create', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'matricula'=>['required', 'unique:coches,matricula', new Matricula()],
            'modelo'=>['required']
        ]);
        //compruebo si he subido archiivo
        if($request->has('foto')){
            $request->validate([
                'foto'=>['image']
            ]);
            //Todo bien hemos subido un archivo y es de imagen
            $file=$request->file('foto');
            //Creo un nombre
            $nombre='coches/'.time().'_'.$file->getClientOriginalName();
            //Guardo el archivo de imagen
            Storage::disk('public')->put($nombre, \File::get($file));
            //Guardo el coche pero la imagen estaria mal
            $coche=Coche::create($request->all());
            //actualiza el registro foto del coche guardado
            $coche->update(['foto'=>"img/$nombre"]);
        }
        else{
            Coche::create($request->all());
        }
        return redirect()->route('coches.index')->with("mensaje", "Coche Guardado");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function show(Coche $coch)
    {
        return view('coches.detalle', compact('coch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function edit(Coche $coch)
    {
        $marcas=Marca::orderBy('nombre')->get();
        $tipos=['Diesel', 'Gasolina', 'Híbrido', 'Eléctrico', 'Gas (GNC/GLC)'];
        return view('coches.edit', compact('coch', 'marcas', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coche $coch)
    {
        $request->validate([
            'matricula'=>['required', 'unique:coches,matricula,'.$coch->id, new Matricula()],
            'modelo'=>['required']
        ]);
        //compruebo si he subido archiivo
        if($request->has('foto')){
            $request->validate([
                'foto'=>['image']
            ]);
            //Todo bien hemos subido un archivo y es de imagen
            $file=$request->file('foto');
            //Creo un nombre
            $nombre='coches/'.time().'_'.$file->getClientOriginalName();
            //Guardo el archivo de imagen
            Storage::disk('public')->put($nombre, \File::get($file));
            //si he subido un afoto nueva booro la vieja, SALVO que sea default.jpg
            if(basename($coch->foto)!='default.jpg'){
                unlink($coch->foto);
            }
            //ahora actualizo el coche
            $coch->update($request->all());
            $coch->update(['foto'=>"img/$nombre"]);
        }
        else{
            $coch->update($request->all());
        }
        return redirect()->route('coches.index')->with("mensaje", "Coche Modificado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coche $coch)
    {
        //Dos cosas borrar la imagen si no es default.jpg
        //y borrar registro
        $foto=$coch->foto;
        if(basename($foto)!="default.jpg"){
            //la borro NO es default.jpg
            unlink($foto);
        }
        //en cualquier caso borro el registro
        $coch->delete();
        return redirect()->route('coches.index')->with('mensaje', "Coche Eliminado");
    }
}
