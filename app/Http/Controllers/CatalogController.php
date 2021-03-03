<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Movie;
use DB;
class CatalogController extends Controller
{
    // se agrega el fichero array_peliculas.php como variable de la clase
    
    //----------------------------------------------------------------------------------------------
    public function getIndex()
    {
        /**
         * Muestra el listado de películas
        */ 
        //$pelicula=Movie::all();
        $pelicula = DB::table('movies')->get();
        return view('catalog.index',['arrayPeliculas'=>$pelicula]);
    }
    //---------------------------------------------------
    public function getShow($id) 
    {
        /**
         * Muestra los detalles de una película.
         * @param int $id
         * @param Response 
        */
        //$pelicula = Movie::findOrFail($id);
        $pelicula=DB::table('movies')->where('id',$id)->get();
        return view('catalog.show',array('pelicula'=>$pelicula));  
        //return view('catalog.show', array('id'=>$id)); 
    }
    //---------------------------------------------------
    public function getCreate() 
    {
        /**
         * Permite agregar una película.
        */ 
        return view('catalog.create'); 
    }
    //---------------------------------------------------
    public function getEdit($id) 
    {
        /**
         * Permite editar la información de una película.
         * @param int $id
         * @param Response 
        */
        $pelicula =  Movie::findOrFail($id);
        return view('catalog.edit',['id'=>$id]); 
    }
    //---------------------------------------------------
    public function postCreate(Request $request)
    {
        $createMovie = new Movie;
        $createMovie->title=$request->input('title');
        $createMovie->year=$request->input('year');
        $createMovie->director=$request->input('director');
        $createMovie->poster=$request->input('poster');
        $createMovie->synopsis=$request->input('synopsis');
        $createMovie->save();
        return redirect('/catalog');
    }
    //---------------------------------------------------
    public function putEdit(Request $request)
    {
        $editMovie = Movie::findOrFail($request->id);
        $editMovie->title=$request->input('title');
        $editMovie->year=$request->input('year');
        $editMovie->director=$request->input('director');
        $editMovie->poster=$request->input('poster');
        $editMovie->synopsis=$request->input('synopsis');
        $editMovie->save();
        return redirect('/catalog/show/'.$request->id);
    }
}
?>