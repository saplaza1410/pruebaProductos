<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateBrandRequest;

class BrandsController extends Controller
{
    /**
     * Punto de entrada del modulo de Marcas
     * 
     * Metodo que retorna una vista, desde la cual se hace uso de toda la API de Marcas
     * 
     * @author Sergio Andres <saplaza1410@gmail.com>
     * @since 25.4.21
     * @return view
     */
    public function index()
    {
    	return view('brands.index');
    }

    /**
     * Retorna una coleccion de datos de todos los marcas.
     *
     * @return DataTables
     * 
     * @author Sergio Andres <saplaza1410@gmail.com>
     * @since 25.4.21
     */
    public function list()
    {
    	return datatables()->collection(Brand::all())->toJson();
    }

    /**
     * Elimina una marca y todos sus productos asociados.
     *
     * @author Sergio Andres <saplaza1410@gmail.com>
     * @since 25.4.21
     * @param  $request
     */
    public function delete(Request $request)
    {
    	$brand = Brand::findOrFail($request->input("id"));
        $productos = Product::where('brand_id', $request->input("id"))->delete();

		$brand->delete();
    }

    /**
     * Almacena o actualiza un registro de marcas.
     *
     * @author Sergio Andres <saplaza1410@gmail.com>
     * @since 25.4.21
     * @param  \Illuminate\Http\Request\CreateBrandRequest  $request con lo datos del marcas
     * @return Boolean $resul
     */
    public function addOrEdit(CreateBrandRequest $request)
    {
        DB::beginTransaction();
        try {
            if($request->input('id') === '' || $request->input('id') === NULL){
                $brand = new Brand;
            }else{
                $brand = Brand::findOrFail($request->input('id'));
            }

            $brand->name = $request->input('nombre');
            $brand->reference = $request->input('referencia');
            
            $resul = $brand->save();

            DB::commit();
            return json_encode($resul);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * Muestra la información de la marca a ser editada
     *
     * @author Sergio Andres <saplaza1410@gmail.com>
     * @since 25.4.21
     * @param  Integer  $id codigo del marca a editar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return json_encode($brand);
    }
}
