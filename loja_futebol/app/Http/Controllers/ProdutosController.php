<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
use App\Http\Requests\NewProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\tipo_produto;

class ProdutosController extends Controller
{
    public function index()
    {
        $tipos = tipo_produto::all();
        $produtos = Product::all();

        return view('produtos', ['produtos' => $produtos,  'tipos'=> $tipos]);
    }

    public function show($id)
    {

        $produto =  Product::findOrFail($id);

        return view('detalhes', ['produto' => $produto]);
    }

    public function create()
    {
        $tipos = tipo_produto::all();

        $user = auth()->user();
        $userProducts = $user->products;
        if($userProducts->count() >= env('MAX_PRODUCTS'))
        {
            return redirect('/home')->with('mssg', 'Nao pode criar mais produtos');
        }

        return view('createProduct',['tipos' => $tipos]);
    }

    public function update($id, EditProductRequest $request)
    {
        $name = request('name');
        $desc = request('desc');
        $price = request('price');
        $tipo = request('tipoProduto');

        $changed = request ('changed');
        
        $produto = Product::FindOrFail($id);

        if($changed == 'true')
        {
            $url = "";
            if($request->has('url'))
            {
                $image = $request->file('url');
                
                $iname = 'prod'.'_'.time();
                $folder = '/img/produto/';
                $fileName = $iname. '.' .$image -> getClientOriginalExtension();
                $filePath = $folder . $fileName;

                $image->storeAs($folder, $fileName, 'public');
                $url = "/storage/".$filePath;
            }
            $produto->url = $url;
        }                                                              
        $produto->nome = $name;
        $produto->desc = $desc;
        $produto->preco = $price;
        $produto->tipo_produto_id = $tipo;

        $produto->save();

        return redirect("/produtos/$id")->with('mssg', 'Produto Criado');
    }

    public function edit($id){
        $tipos = tipo_produto::all();
        $produto = Product::findORFail($id);
        return view('createProduct',['produto' => $produto, 'tipos' => $tipos]);
    }

    public function destroy($id)
    {

        $produto = Product::findOrFail($id);
        $produto->delete();

        return redirect('/produtos');
    }

    public function produtosPorTipo($id){
        $tipos = tipo_produto::all();
        $tipo = tipo_produto::findOrFail($id);
        $produtos = $tipo->products;

        return view('produtos', ['produtos' => $produtos,'tipos' => $tipos, 'actTipo' => $id]);
    }

    public function store(NewProductRequest $request)
    {

        $name = request('name');
        $desc = request('desc');
        $url = request('url');
        $price = request('price');
        $tipo = request('tipoProduto');

        $url ="";
        if($request->has('url')){

            $image =$request->file('url');

            $iname = 'prod'. '_'.time();
            $folder = '/img/produtos/';
            $fileName = $iname.'.'.$image->getClientOriginalExtension();
            $filePath = $folder . $fileName;

            $image->storeAs($folder, $fileName, 'public');
            $ulr = "/storage/".$filePath;
        }

        $produto = new Product();

        $produto->nome = $name;
        $produto->desc = $desc;
        $produto->url = $url;
        $produto->preco = $price;
        $produto->tipo_produto_id = $tipo;
        $produto->created_by = auth()->user()->id;

        $produto->save();

        return redirect('/produtos/create')->with('mssg', 'Produto Criado');
    }


}
