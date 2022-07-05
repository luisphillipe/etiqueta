
<option value="" selected>Selecione</option>
@foreach($equipamentos as $equipamento){
<option value="{{$equipamento->nome}}">{{$equipamento->nome}}</option>
}
@endforeach
