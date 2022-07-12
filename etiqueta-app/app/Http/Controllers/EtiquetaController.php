<?php

namespace App\Http\Controllers;

use App\Models\Model\Etiquetas;
use App\Models\Model\Empresa;
use App\Models\Model\Cliente;
use App\Models\Model\Equipamento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use JasperPHP\JasperPHP;

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

        $equipamentos = $this->equipamento
            ->where('id', '=', 0)
            ->orderBy('id', 'ASC')->get();
        $empresas = Empresa::all();
        $clientes = Cliente::all();
        //$equipamentos = Equipamento::all();
        //$equipamentos = Equipamento::find(0);
        return view('etiquetas.create_etiqueta', compact('empresas', 'clientes', 'equipamentos'));
    }

    public function loadEquipamento(Request $request)
    {
        $data = [];
        $dataForm = $request->all();
        $idEmpresa = $dataForm['empresa'];
        $empresa = Empresa::find($idEmpresa);
        if ($empresa->codigo == 0) {
            $data['list_equip'] = Equipamento::orderBy("nome", "asc")
                ->get();
        } else {
            $data['list_equip'] = Equipamento::orderby("nome", "asc")
                ->select('id', 'nome')
                ->where('codigo', $empresa->codigo)
                ->get();
        }
        return response()->json($data);
    }

    /*
    public function valida(Request $request){
       //dd($request->all());
         if ($request->empresa == null || $request->cliente == null || $request->equipamento == null) 
            return redirect('etiquetas.create_etiqueta')->with('status', 'Favor preencher todos os campos.');
    }
*/

    public function gerarEtiqueta(Request $request)
    {

        //$dataForm = $request->all();
        //$empresaId = $dataForm['empresa'];
        //dd($request->empresa);

        $empresa = Empresa::find($request->empresa);
        $equipamento = Equipamento::find($request->equipamentos);
        //dd($empresaId);

        $input = new Etiquetas();
        //
        $input->empresa = $empresa->nome;
        $input->logo = $empresa->logo;
        $input->cliente = $request->cliente;
        $input->nome_equipamento = $equipamento->nome;
        $input->observacao = $request->observacao;
        //$input->quantidade = $request->quantidade;

        $input->save();

        $pdf = PDF::loadView('etiquetas.pdf', compact('input'));

        //Etiquetas::create($input);
        //largura x altura(width x height)            
        $customPaper = array(0, 0, 1000, 700);
        return $pdf->setPaper('A4', 'landscape')->stream('etiqueta.pdf');
        //return $pdf->download('etiqueta.pdf');

    }

    public function listarEtiquetas()
    {
        $etiquetas = Etiquetas::all();
        return view('etiquetas.lista_etiquetas', compact('etiquetas'));
    }

    public function show($id)
    {

        $input = Etiquetas::find($id);

        $pdf = PDF::loadView('etiquetas.pdf', compact('input'));

        //$customPaper = array(0, 0, 800, 800);
        return $pdf->setPaper('A4', 'landscape')->stream('etiqueta.pdf');
    }


    /*
    public function getDatabaseConfig()
    {
        return [
            'driver'   => env('DB_CONNECTION'),
            'host'     => env('DB_HOST'),
            'port'     => env('DB_PORT'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'database' => env('DB_DATABASE'),
            'jdbc_dir' => base_path() . env('JDBC_DIR', '/vendor/lavela/phpjasper/src/JasperStarter/jdbc'),
        ];
    }

    public function ticket($id)
    {

        $output = public_path() . '/reports/' . time() . '_Clientes';
        // instancia um novo objeto JasperPHP

        $report = new JasperPHP;
        // chama o método que irá gerar o relatório
        // passamos por parametro:
        // o arquivo do relatório com seu caminho completo
        // o nome do arquivo que será gerado
        // o tipo de saída
        // parametros ( nesse caso não tem nenhum)         
        $report->process(
            public_path() . '/reports/etiqueta.jrxml',
            $output,
            ['pdf'],
            [],
            $this->getDatabaseConfig()
        )->execute();
        $file = $output . '.pdf';
        $path = $file;

        // caso o arquivo não tenha sido gerado retorno um erro 404
        if (!file_exists($file)) {
            abort(404);
        }
        //caso tenha sido gerado pego o conteudo
        $file = file_get_contents($file);
        //deleto o arquivo gerado, pois iremos mandar o conteudo para o navegador
        unlink($path);
        // retornamos o conteudo para o navegador que íra abrir o PDF
        return response($file, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="etiqueta.pdf"');
    }
*/
}
