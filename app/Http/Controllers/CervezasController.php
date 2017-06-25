<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CervezaCreateRequest;
use App\Http\Requests\CervezaEditRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Cerveza;
use App\Imagen_Cerveza;

class CervezasController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    
    public function index()
    {
        $cervezas = Cerveza::all();

        return view('cervezas.Index', compact('cervezas'));
    }

   
    public function create()
    {
        //
    }

    
    public function store(CervezaCreateRequest $request)
    {
        $image = new Imagen_cerveza();  
        $file = $request->file('Imagen');

        if($file != null){

            $nombre = $file->getClientOriginalName();
            $mime = $file->getClientOriginalExtension();
            $tamaño = $file->getClientSize()/1024;
            $file->move(public_path().'/images/', $nombre);

        }else{
            dd('error'); //cambiar a pagina 404
        }
        
        $imagen = public_path().'/images/'.$nombre;
        $fp = fopen($imagen, 'r');
        if($fp){
            $datos = fread($fp, filesize($imagen));
            fclose($fp);
        }

        $image->Nombre  = $nombre; 
        $image->Tamaño  = $tamaño;
        $image->Mime    = $mime;
        $image->Archivo = $datos;
        $image->save();

        $data = $request->all();
        $cerveza = Cerveza::create([
            'Nombre'            => $data['Nombre'],
            'Origen'            => $data['Origen'],
            'Presentacion'      => $data['Presentacion'],
            'Color'             => $data['Color'],
            'Sabor'             => $data['Sabor'],
            'Maridaje'          => $data['Maridaje'],
            'Estilo'            => $data['Estilo'],
            'Temperatura'       => $data['Temperatura'],
            'Volumen_alcohol'   => $data['Volumen_alcohol'],
            'Precio'            => $data['Precio'],
            'Cantidad'          => $data['Cantidad'],
            'Imagen_cerveza_id' => $image->id,
        ]);
        
        chmod(public_path().'/images/'.$nombre, 0777);
        unlink(public_path().'/images/'.$nombre);

        return redirect::back();
    }

    
    public function show($Id)
    {
        $id = base64_decode($Id);
        $cerveza = Cerveza::find($id);
        return view('cervezas.Perfil', compact('cerveza'));   
    }

    
    public function edit($Id)
    {
        $id = base64_decode($Id);
        $cerveza = Cerveza::find($id);
        return view('cervezas.Editar', compact('cerveza'));
    }

    
    public function update(CervezaEditRequest $request, $id)
    {
        $image = new Imagen_cerveza();  
        $file = $request->file('Imagen');
        $data = $request->all();

        if($file != null){

            $nombre = $file->getClientOriginalName();
            $mime = $file->getClientOriginalExtension();
            $tamaño = $file->getClientSize()/1024;
            $file->move(public_path().'/images/', $nombre);
        
        
        $imagen = public_path().'/images/'.$nombre;
        $fp = fopen($imagen, 'r');
        if($fp){
            $datos = fread($fp, filesize($imagen));
            fclose($fp);
        }

        $image->Nombre  = $nombre; 
        $image->Tamaño  = $tamaño;
        $image->Mime    = $mime;
        $image->Archivo = $datos;
        $image->save();

        $cerveza = Cerveza::find($id);                
        $cerveza->update([
            'Nombre'            => $data['Nombre'],
            'Origen'            => $data['Origen'],
            'Presentacion'      => $data['Presentacion'],
            'Color'             => $data['Color'],
            'Sabor'             => $data['Sabor'],
            'Maridaje'          => $data['Maridaje'],
            'Estilo'            => $data['Estilo'],
            'Temperatura'       => $data['Temperatura'],
            'Volumen_alcohol'   => $data['Volumen_alcohol'],
            'Precio'            => $data['Precio'],
            'Cantidad'          => $data['Cantidad'],
            'Imagen_cerveza_id' => $image->id,
        ]);

        chmod(public_path().'/images/'.$nombre, 0777);
        unlink(public_path().'/images/'.$nombre);

        }else{
            $cerveza = Cerveza::find($id);                
            $cerveza->update([
                'Nombre'            => $data['Nombre'],
                'Origen'            => $data['Origen'],
                'Presentacion'      => $data['Presentacion'],
                'Color'             => $data['Color'],
                'Sabor'             => $data['Sabor'],
                'Maridaje'          => $data['Maridaje'],
                'Estilo'            => $data['Estilo'],
                'Temperatura'       => $data['Temperatura'],
                'Volumen_alcohol'   => $data['Volumen_alcohol'],
                'Precio'            => $data['Precio'],
                'Cantidad'          => $data['Cantidad'],
            ]);
        }//fin else

        \Session::flash('message', 'Cerveza Actualizada Correctamente');
        return redirect('admin/cervezas');
    }

    
    public function destroy($Id)
    {
        $id = base64_decode($Id);
        $cerveza = Cerveza::find($id);
        $cerveza->delete();
        // Para restaurar es con el metodo restore()
        \Session::flash('message', 'Cerveza Borrada Correctamente');

        return redirect('admin/cervezas');
    }
}
