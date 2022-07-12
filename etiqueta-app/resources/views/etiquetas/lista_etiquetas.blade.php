@extends('etiquetas.base')

@section('content')


<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
        Lista de Etiquetas
    </h3>
</div><br>

<div class="card-body" style="width:auto; height: 750px; overflow-y: scroll;">
    <div id="divTable" class="table-editable">

        <table id="table" class="table table-bordered table-responsive-md table-striped text-center table-fixed" cellspacing="0">
            <thead>
                <tr>

                    <th class="text-center" style="width: 100px;">Logo</th>
                    <th class="text-center" style="width: 150px;">Empresa</th>
                    <th class="text-center" style="width: 150px;">Cliente</th>
                    <th class="text-center" style="width: 150px;">Equipamento</th>
                    <th class="text-center" style="width: 350px;">Observacao</th>
                    <th class="text-center" style="width: 100px;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($etiquetas as $etiqueta)
                <tr>
                    <td class="pt-3-half" contenteditable="true">
                        <img src="{{ $etiqueta->logo }}" width="50"></img>
                    </td>
                    <td class="pt-3-half" contenteditable="true" width="50">{{ $etiqueta->empresa }}</td>
                    <td class="pt-3-half" contenteditable="true">{{ $etiqueta->cliente }}</td>
                    <td class="pt-3-half" contenteditable="true">{{ $etiqueta->nome_equipamento }}</td>
                    <td class="pt-3-half" contenteditable="true" style="word-wrap: break-word;" width="10">{{ $etiqueta->observacao }}</td>

                    <td>
                        <a href="{{ route('show', $etiqueta->id) }}" formtarget="_blank" target="_blank">
                            <button type="button" class="btn btn-sm btn-light-secondary">
                                <img src="images\printer.svg" alt="Imprimir">

                            </button>
                        </a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<script>
    $(document).ready(function() {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    })
</script>

@endsection