<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <title>Etiqueta</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/images/alucom.png" alt="" width="100" height="25" class="d-inline-block align-text-top">
                ETIQUETAS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Opções
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Criar</a></li>
                            <li><a class="dropdown-item" href="#">Listar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content padding-bottom-2 desktop-12 container card form-control">
        <div class="content padding-bottom-2 desktop-12 container">
            <div class="card-header">
                <h2>Criar etiquetas</h2>
            </div>
            <div class="desktop-12">
                <form id="ticketForm" action="" method="post" data-url="{{route ('loadEquipamento')}}">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-row label-block input-text">
                                    Empresa:
                                    <select class="form-select" name="empresa" id="empresa">
                                        <option value="">Selecione</option>
                                        @foreach($empresas as $empresa){
                                        <option value="{{$empresa->codigo}}">
                                            {{$empresa->nome}}
                                        </option>
                                        }
                                        @endforeach
                                    </select><br>
                                </div>

                                <div class="form-row label-block input-text">
                                    Cliente:
                                    <select class="form-select" name="cliente" id="cliente">
                                        <option value="" selected>Selecione</option>
                                        @foreach($clientes as $cliente){
                                        <option value="{{$cliente->nome}}">{{$cliente->nome}}</option>
                                        }
                                        @endforeach
                                    </select><br>
                                </div>

                                <div class="form-row label-block input-text">
                                    Equipamento:
                                    <select class="form-select" name="equipamento" id="equipamento">
                                        <option value="" selected>Selecione</option>
                                        @foreach($equipamentos as $equipamento){
                                        <option value="{{$equipamento->nome}}">{{$equipamento->nome}}</option>
                                        }
                                        @endforeach
                                    </select><br>
                                </div>

                                <div class="form-floating">
                                    Descrição:
                                    <textarea class="form-control" maxlength="400" name="observacao"></textarea>
                                </div><br>

                                <div class="form-row label-block input-text">
                                    Quantidade:
                                    <input step="1" min="1" max="100" type="number" name="quantidade" value="1" class="form-control" style="width: 100px" maxlength="3">
                                </div><br>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Gerar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>

<script type="text/javascript">
    /*function listaEquipamento(response) {
        const url = $('#empresa').attr("data-url");
        var codEmpresa = $('#empresa').val();
        alert(codEmpresa);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'get',
            data: {
                data: {
                    'codEmpresa': codEmpresa,
                },
            },
            sucess: function(data) {
                $("#equipamento").html(data);
            },
            error: function() {
                console.log('error');
            },
        });
    }
*/


    $(document).ready(function() {
        $("#empresa").change(function() {
            const url = $('#empresa').attr("data-url");
            var empresa = $('#empresa').val();
            alert(empresa);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'get',
                data: {
                    'empresa': empresa,
                },
                sucess: function(data) {
                    $("#equipamento").html(data);
                },
            });
        });
    });
</script>

</html>