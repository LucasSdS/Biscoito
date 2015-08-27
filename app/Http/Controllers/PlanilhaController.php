<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlanilhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function enviar(Request $request){
        if($request->hasFile('planilha')){
            if($request->file('planilha')->isValid()){
                $planilha = $request->file('planilha');

                $extension = $planilha->getClientOriginalExtension();
                move_uploaded_file ($planilha, public_path().'\planilhas\abc.'.$extension);
                $tabela =  new \App\Planilha;
                $handle = fopen(public_path().'\planilhas\abc.'.$extension, "r");
                $aux = fgetcsv($handle, ",");
                $n = count($aux);
                $d = 0;
                $x = 0;
                while($d<$n){
                    $tabela->nome = $aux[$x];
                    $tabela->tipo = $aux[$x+1];
                    $tabela->apelido = $aux[$x+2];
                    $d = $d+3;
                }
                $tabela->save();

            }

        }
        return view('form');
    }
}
