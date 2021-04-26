<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateProductRequest;
use DataTables;

class ProductsController extends Controller
{
    /**
     * Punto de entrada del modulo de Productos
     * 
     * Metodo que retorna una vista, desde la cual se hace uso de toda la API de Productos
     * 
     * @author Sergio Andres <saplaza1410@gmail.com>
     * @since 25.4.21
     * @return view
     */
    public function index()
    {
        $marcas = Brand::pluck('name','id');
        $tallas = ["S" => "S", "M" => "M", "L" => "L"];

    	return view('products.index')->with(['marcas'=>$marcas, 'tallas' => $tallas]);
    }

    /**
     * Retorna una coleccion de datos de todos los productos.
     *
     * @return DataTables
     * 
     * @author Sergio Andres <saplaza1410@gmail.com>
     * @since 25.4.21
     */
    public function list()
    {
        $query = DB::table('products')->join('brands', 'brands.id', '=', 'products.brand_id')
                ->select([
                    DB::raw('products.id AS id'),
                    DB::raw('products.name AS name'),
                    DB::raw('brands.name AS brands'),
                    'size',
                    'observations',
                    'brand_id',
                    'quantity',
                    'date_shipment'
                ]);

        return DataTables::queryBuilder($query)->toJson();
    }

    /**
     * Elimina un producto.
     *
     * @author Sergio Andres <saplaza1410@gmail.com>
     * @since 25.4.21
     * @param    $request
     */
    public function delete(Request $request)
    {
    	$product = Product::findOrFail($request->input("id"));

		$product->delete();
    }

    /**
     * Almacena o actualiza un registro de productos.
     *
     * @author Sergio Andres <saplaza1410@gmail.com>
     * @since 25.4.21
     * @param  \Illuminate\Http\Request\CreateProductRequest  $request con lo datos del productos
     * @return Boolean $resul
     */
    public function addOrEdit(CreateProductRequest $request)
    {
    	DB::beginTransaction();
    	try {
    		if($request->input('id') === '' || $request->input('id') === NULL){
    		    $product = new Product;
			}else{
				$product = Product::findOrFail($request->input('id'));
			}

            $product->name = $request->input('nombre');
            $product->size = $request->input('talla');
            $product->brand_id = $request->input('marca');
            $product->observations = $request->input('observaciones');
            $product->quantity = $request->input('cantidad');
            $product->date_shipment = $request->input('fecha_embarque');
            $resul = $product->save();

			DB::commit();
			return json_encode($resul);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * Muestra la información del producto a ser editado
     *
     * @author Sergio Andres <saplaza1410@gmail.com>
     * @since 25.4.21
     * @param  Integer  $id codigo del producto a editar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$product = Product::findOrFail($id);
    	return json_encode($product);
    }
}
