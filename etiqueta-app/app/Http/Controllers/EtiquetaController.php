<?php

namespace App\Http\Controllers;

use App\Models\Model\Etiquetas;
use App\Models\Model\Empresa;
use App\Models\Model\Cliente;
use App\Models\Model\Equipamento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Console;
use Psy\Readline\Hoa\ConsoleOutput as HoaConsoleOutput;
use Symfony\Component\Console\Output\ConsoleOutput;

class EtiquetaController extends Controller
{

    public function __construct(Empresa $empresa, Cliente $cliente, Equipamento $equipamento)
    {
        $this->empresa = $empresa;
        $this->cliente = $cliente;
        $this->equipamento = $equipamento;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = $this->empresa
            ->orderBy('nome', 'ASC')->get();

        $clientes = $this->cliente
            ->orderBy('id', 'ASC')->get();

        $equipamentos = $this->equipamento
            ->where('id', '=', 0)
            ->orderBy('id', 'ASC')->get();
        //Empresa::all();
        //$clientes = Cliente::all();
        //$equipamentos = new Equipamento();

        return view('etiquetas.create_etiqueta', compact('empresas', 'clientes', 'equipamentos'));
    }


    public function gerarEtiqueta(Request $request)
    {

        //$input = Etiquetas::all();

        //dd($request->all());

        $id_empresa = $request->empresa;
        $empresa = Empresa::findOrFail($id_empresa);
        //dd($empresa);

        $input = new Etiquetas();

        $input->empresa = $empresa->nome;
        $input->logo = $empresa->logo;
        $input->cliente = $request->cliente;
        $input->nome_equipamento = $request->equipamento;
        $input->observacao = $request->observacao;
        $input->quantidade = $request->quantidade;

        $pdf = PDF::loadView('etiquetas.pdf', compact('input'));

        //Etiquetas::create($input);
        //altura x largura(heigh tx width)            
        $customPaper = array(0, 0, 425, 284);
        return $pdf->setPaper($customPaper)->stream('etiqueta.pdf');
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


    public function loadEquipamento(Request $request)
    {
        //$id_empresa = $request->empresa;
        //echo $id_empresa;
        //$empresa = Empresa::findOrFail($id_empresa);
        
        //$equipamentos = Equipamento::all();
        //$dataForm = $request->get('codEmpresa');
        
        $dataForm = $request->all();
        $codEmpresa = $dataForm['empresa'];
        dd($codEmpresa);

        //$sql = "Select nome from equipamentos where codigo = '$codEmpresa' ";
        //$equipamentos = DB::select($sql);
        //return view('etiquetas.lista_equipamentos',compact('equipamentos'));

       // $equipamentos = Equipamento::all();
        //return $equipamentos->where('codigo', '=', $request['codEmpresa']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
