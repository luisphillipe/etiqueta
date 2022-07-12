@extends('etiquetas.base')

@section('content')


<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
        Criar Etiquetas
    </h3>
</div><br>

<div class="card-body">
    <form id="form" name="form" action="{{ route('gerarEtiqueta') }}" method="POST" data-url="{{route('loadEquipamento')}}" formtarget="_blank" target="_blank">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-row label-block input-text">
                        Empresa:
                        <select class="form-select" name="empresa" id="empresa" required>
                            <option value="" selected>Selecione</option>
                            @foreach($empresas as $empresa)
                            <option value="{{$empresa->id}}">{{$empresa->codigo}} - {{$empresa->nome}}</option>
                            @endforeach
                        </select><br>
                    </div>

                    <div class="form-row label-block input-text">
                        Cliente:
                        <select class="form-select" name="cliente" id="cliente" required>
                            <option value="" selected>Selecione</option>
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->nome}}">{{$cliente->id}} - {{$cliente->nome}}</option>
                            @endforeach

                        </select><br>
                    </div>

                    <div class="form-row label-block input-text">
                        Equipamento:
                        <select class="form-select" name="equipamentos" id="equipamentos" required>
                            <option value="" selected>Selecione</option>


                        </select><br>
                    </div>

                    <div class="md-form">
                        Observação:
                        <textarea class="md-textarea form-control" maxlength="300" rows="4" name="observacao"></textarea>
                    </div><br><br>


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button id="btn" type="submit" class="btn btn-primary btn-rounded btn-lg col-12">Criar Etiqueta</button>
                    </div><br>
                </div>
            </div>
        </div>
    </form>

</div>

</body>

<script type="text/javascript">
    $(document).ready(function() {
        $('#empresa').change(function() {
            const url = $('#form').attr('data-url');
            empresa = $(this).val();
            $('#equipamentos').find('option').not(':first').remove();
            // alert(empresa);
            $.ajax({
                url: url,
                //type: 'post',
                dataType: 'json',
                //contentType: 'json',
                data: {
                    'empresa': empresa,
                    //_token: '{{csrf_token()}}'
                },
                success: function(data) {
                    var len = 0;
                    console.log(len);
                    if (data.list_equip != null) {
                        len = data.list_equip.length;
                    }

                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            var id = data.list_equip[i].id;
                            var nome = data.list_equip[i].nome;
                            var option = "<option value= " + id + ">" + nome + "</option>";
                            $('#equipamentos').append(option);
                        }
                    }

                }
            });
        });
    });

</script>

@endsection