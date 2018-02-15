@extends ('layouts.dashboard') @section('page_heading',$owner->nome .' - Cadastro Gestor') @section('section')


@if ($errors->any())
<div class="row">
        <div class="col-lg-12">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div></div></div>
@endif
<div class="col-sm-12">
    <div class="row">
        <div class="col-lg-12">
            <form role="form" action="{{url('ownerManager')}}" method="POST">

                    {{ csrf_field() }}
                {{-- INICIO DADOS PESSOAIS --}}
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Dados Pessoais </h3>

                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" value="{{ old('email') }}">
                            {{--  <p class="help-block">Caso o email já exista. As informações correspondente serão carregadas</p>  --}}
                        </div>
                        <div class="form-group">
                            <label>Nome Completo</label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <input class="form-control" name="nome" placeholder="Nome" value="{{ old('nome') }}">
                                </div>
                                <div class="col-lg-9">
                                    <input class="form-control" name="sobrenome" placeholder="Sobrenomes" value="{{ old('sobrenome') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>CPF</label>
                            <input class="form-control" name="cpf" value="{{ old('cpf') }}">
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
                            <input class="form-control" name="cep" value="{{ old('cep') }}">
                        </div>
                        <div class="form-group">
                            <label>Logradouro</label>
                            <input class="form-control" name="logradouro" value="{{ old('logradouro') }}">
                        </div>
                        <div class="form-group">
                            <label>Número</label>
                            <input class="form-control" name="numero" value="{{ old('numero') }}">
                        </div>
                        <div class="form-group">
                            <label>Complemento</label>
                            <input class="form-control" name="complemento" value="{{ old('complemento') }}">
                        </div>
                        <div class="form-group">
                            <label>Cidade</label>
                            <input class="form-control" name="cidade" value="{{ old('cidade') }}">
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <input class="form-control" name="estado" value="{{ old('estado') }}">
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
                        <div class="form-group">
                                    <label>Principal</label>
                                    <input class="form-control" name="telefone[]">
                                </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-default" id="add_field_button">&nbsp;Adicionar Telefone</button>
                        </div>

                    </div>
                </div>
                <script>
                        $(document).ready(function() {
                            var max_fields      = 10; //maximum input boxes allowed
                            var wrapper         = $("#input_fields_wrap"); //Fields wrapper
                            var add_button      = $("#add_field_button"); //Add button ID
                            
                            var x = 1; //initlal text box count
                            $(add_button).click(function(e){ //on add input button click
                                e.preventDefault();
                                if(x < max_fields){ //max input box allowed
                                    x++; //text box increment
                                    $(wrapper).append('<div class="form-group"><label>Complementar &nbsp;</label><a href="#" id="remove_field">remover</a><input class="form-control" name="telefone[]"></div>'); // add input box
                                }
                            });
                            
                            $(wrapper).on("click","#remove_field", function(e){ //user click on remove text
                                e.preventDefault(); $(this).parent('div').remove(); x--;
                            })
                        });
                </script>
                {{-- FIM TELEFONES --}} {{-- INICIO FOTO --}}
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Foto </h3>

                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <p>
                                <img id="id_foto" src="data:image/png;base64,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"
                                />
                            </p>
                            <input type="file" accept="image/*" id="file_foto" onchange="encodeImageFileAsURL(this)" />
                            <button type="button" id="reset_foto" style="display:none" class="btn btn-danger btn-xs" onclick="clearImage(this)">Apagar</button>
                            <input type="text" hidden="hidden" id="input_foto" name="foto">
                        </div>
                    </div>
                </div>

                <script>
                    
                    function encodeImageFileAsURL(element) {
                        var file = element.files[0];
                        var reader = new FileReader();
                        var img = document.createElement("img");

                        reader.onload = function(e) {
                            img.src = e.target.result;
                        }

                        reader.onloadend = function () {
                            var canvas = document.createElement("canvas");
                            var ctx = canvas.getContext("2d");
                            ctx.drawImage(img, 0, 0);

                            var MAX_WIDTH = 128;
                            var MAX_HEIGHT = 128;
                            var width = img.width;
                            var height = img.height;

                            if (width > height) {
                            if (width > MAX_WIDTH) {
                                height *= MAX_WIDTH / width;
                                width = MAX_WIDTH;
                            }
                            } else {
                            if (height > MAX_HEIGHT) {
                                width *= MAX_HEIGHT / height;
                                height = MAX_HEIGHT;
                            }
                            }
                            canvas.width = width;
                            canvas.height = height;
                            var ctx = canvas.getContext("2d");
                            
                            ctx.drawImage(img, 0, 0, width, height);
                            var dataurl = canvas.toDataURL("image/png");
                            
                            foto = document.getElementById('id_foto');
                            foto.src = dataurl;
                            input = document.getElementById('input_foto');
                            input.value = dataurl;
                            reset = document.getElementById('reset_foto');
                            reset.style = "display:show";
                            element.style = "display:none";
                            element.value = "";

                        }

                        reader.readAsDataURL(file);
                    }

                    function clearImage() {
                        foto = document.getElementById('id_foto');
                        foto.src =
                            "data:image/png;base64,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"
                        input = document.getElementById('input_foto');
                        input.value = "";

                        file_foto = document.getElementById('file_foto');
                        file_foto.style = "display:show";

                        reset_foto = document.getElementById('reset_foto');
                        reset_foto.style = "display:none";

                        $('input').each(function(){
                            $(this).attr("value","");
                        });

                        return true;
                    }
                </script>
                {{-- FIM FOTO --}}
                <button type="submit" class="btn btn-success">Salvar</button>&nbsp;
                <button type="reset" class="btn btn-warning" onclick="clearImage()">Limpar</button>
            </form>
        </div>
    </div>
</div>

<p>&nbsp;</p>

<hr /> @stop