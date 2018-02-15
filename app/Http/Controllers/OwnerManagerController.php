<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerManagerController extends Controller
{
    private $owner;
    public function __construct()
    {
        $this->middleware(['auth','ownerManger']);
        $this->owner = Owner::find(1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pag = 10;
        $owner = $this->owner;
        $managers = $owner->managers()->paginate($pag);
        return view('owner.table.gestor')
            ->with(compact('owner'))
            ->with(compact('managers'))
            ->with('i', (request()->input('page', 1) - 1) * $pag);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owner = $this->owner;
        return view('owner.form.gestor')
            ->with(compact('owner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'cpf' => 'required',
            'email' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'telefone' => 'required|min:1',
        ]);

        $foto = new \App\Models\Foto;
        $foto->imagem = $request['foto'];

        $endereco = new \App\Models\Endereco;
        $endereco->cep = $request['cep'];
        $endereco->logradouro = $request['logradouro'];
        $endereco->numero = $request['numero'];
        $endereco->complemento = $request['complemento'];
        $endereco->cidade = $request['cidade'];
        $endereco->estado = $request['estado'];

        $pessoa = new \App\Models\Pessoa;
        $pessoa->nome = $request['nome'];
        $pessoa->sobrenome = $request['sobrenome'];
        $pessoa->cpf = $request['cpf'];
        $pessoa->email = $request['email'];

        $pessoa->save();

        $foto->save();
        $foto->pessoa()->save($pessoa);

        $endereco->save();
        $endereco->pessoa()->save($pessoa);

        foreach($request['telefone'] as $telefone){
            if(!empty($telefone)){
                $temp = new \App\Models\Telefone;
                $temp->numero = $telefone;
                $temp->save();
                $pessoa->telefones()->attach($temp);
            }
        }

        $owner = $this->owner;
        $pessoa->ownerManager()->save($owner);    
        $pessoa->save();

        return redirect('ownerManager')->with('success', $pessoa->id);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $owner = $this->owner;
        $pessoa = \App\Models\Pessoa::findOrFail($id);

        return view("owner.show.gestor")
            ->with(compact('pessoa'))
            ->with(compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
