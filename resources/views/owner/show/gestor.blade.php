@extends ('layouts.dashboard') @section('page_heading',$owner->nome .' - Cadastro Gestor') @section('section')
<div class="col-sm-12">
    <div class="row">
        <div class="col-lg-12">
                {{-- INICIO DADOS PESSOAIS --}}
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Dados Pessoais </h3>

                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label>Email</label>
                            <p class="form-control-static">{{$pessoa->email}}</p>
                            {{--  <p class="help-block">Caso o email já exista. As informações correspondente serão carregadas</p>  --}}
                        </div>
                        <div class="form-group">
                            <label>Nome Completo</label>
                            <p class="form-control-static">{{$pessoa->nome}} {{$pessoa->sobrenome}}</p>
                        </div>
                        <div class="form-group">
                            <label>CPF</label>
                            <p class="form-control-static">{{$pessoa->cpf}}</p>
                        </div>
                    </div>
                </div>

                {{-- FIM DADOS PESSOAIS --}} {{-- INICIO ENDERECO --}}
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Endereço </h3>

                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label>CEP</label>
                            <p class="form-control-static">{{$pessoa->endereco->cep}}</p>
                        </div>
                        <div class="form-group">
                            <label>Logradouro</label>
                            <p class="form-control-static">{{$pessoa->endereco->logradouro}}</p>
                        </div>
                        <div class="form-group">
                            <label>Número</label>
                            <p class="form-control-static">{{$pessoa->endereco->numero}}</p>
                        </div>
                        <div class="form-group">
                            <label>Complemento</label>
                            <p class="form-control-static">{{$pessoa->endereco->complemento}}</p>
                        </div>
                        <div class="form-group">
                            <label>Cidade</label>
                            <p class="form-control-static">{{$pessoa->endereco->cidade}}</p>
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <p class="form-control-static">{{$pessoa->endereco->estado}}</p>
                        </div>
                    </div>
                </div>
                {{-- FIM ENDERECO --}} {{-- INICIO TELEFONES --}}
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Telefones </h3>

                    </div>

                    <div class="panel-body">
                            <div id="input_fields_wrap"> 
                                    @foreach ($pessoa->telefones as $telefone)
                        <div class="form-group">
                                    <label>{{($loop->first)?"Principal":"Complementar"}}</label>
                                    <p class="form-control-static">{{$telefone->numero}}</p>
                                </div>
                                @endforeach
                        </div>

                    </div>
                </div>
                {{-- FIM TELEFONES --}} {{-- INICIO FOTO --}}
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Foto </h3>

                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <p>
                                <img height="128px" id="id_foto" src="{{$pessoa->foto->imagem}}"/>
                            </p>
                        </div>
                    </div>
                </div>
                </script>
                {{-- FIM FOTO --}}
                <button type="submit" class="btn btn-warning">Editar</button>&nbsp;
                <button type="reset" class="btn btn-danger" onclick="clearImage()">Excluir</button>
        </div>
    </div>
</div>

<p>&nbsp;</p>

<hr /> @stop