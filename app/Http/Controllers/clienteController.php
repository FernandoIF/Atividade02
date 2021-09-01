<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class clienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*return response()->json([
            "acao" => "sucesso"
        ]);*/

        $clientes = Cliente::All();
        $cliente = new Cliente();

        return view("cliente.index", [
            "clientes" => $clientes,
            "cliente" => $cliente
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get("id") == "") {
            $cliente = new Cliente();
        }else{
            $cliente = Cliente::Find($request->get("id"));
        }

        $cliente->nome = $request->get("nome");
        $cliente->cpf = $request->get("cpf");
        $cliente->email = $request->get("email");
        $cliente->telefone = $request->get("telefone");
        $cliente->dataNascimento = $request->get("dataNascimento");

        $cliente->save();

        return redirect("/cliente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::Find($id);
        return response()->json([
            "nome" => $cliente->nome,
            "cpf" => $cliente->cpf,
            "email" => $cliente->email
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = Cliente::All();
        $cliente = Cliente::Find($id);

        return view("cliente.index", [
            "clientes" => $clientes,
            "cliente" => $cliente
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::Destroy($id);
        return redirect("/cliente");
    }
}
