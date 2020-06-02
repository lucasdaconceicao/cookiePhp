<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('lista-produtos',
		[
			'produto1'=>'Barbeador realiza cortes'
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
	 
     */
	 
	  public function show()
    {
		$ler = $_COOKIE['prodweb'];
        return view('favoritos',
		[
			'produto1' => $ler
		]);
    }

    public function create(Request $request)
    {		
		$nome = "prodweb";
		$valor = $request->produto;
		$expira = time() + 3600;
		setcookie($nome, $valor, $expira);
         $favoritos = $this->show();
		 return $favoritos;
    }
}
