<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
use App\Services\ConsultaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsultaController extends Controller
{
    protected $consultaService;
    public function __construct(ConsultaService $consultaService)
    {
        $this->consultaService = $consultaService;
    }

    public function consulta(Request $request){
        $validated = Validator::make($request->all(), [
            'cpf' => 'required|digits:11',
            'valor' => 'required|numeric',
            'qntParcelas' => 'nullable|numeric'
        ], [
            'cpf.required' => 'O campo CPF é obrigatório',
            'cpf.digits' => 'CPF inválido',
            'valor.required' => 'O campo valor é obrigatório',
            'valor.numeric' => 'O campo valor deve ser numérico',
            'qntParcelas.numeric' => 'O campo quantidade de parcelas deve ser numérico'
        ]);
        if ($validated->fails()) {
            return response()->json(['status' => false, 'code' => 422, 'message' => $validated->errors()], 422);
        }
        $cpf = $request['cpf'];
        $valor = intval($request['valor']);
        $qntParcelas = $request->input('qntParcelas') ?? 0;
        $melhoresOfertas = $this->consultaService->getOfertas($cpf, $valor, $qntParcelas);
        if($melhoresOfertas == null){
            return response()->json(['status' => false, 'code' => 404, 'message' => 'Nenhuma oferta encontrada.'], 404);
        }else{
            return response()->json(['status' => true, 'code' => 200, 'data' => $melhoresOfertas], 200);
        }
    }
    public function renderBoxes(Request $request){
        $validated = Validator::make($request->all(), [
            'items' => 'required',
        ], [
            'required' => 'É necessário informar os itens para a renderização de boxes',
        ]);
        if ($validated->fails()) {
            return response()->json(['status' => false, 'code' => 422, 'message' => $validated->errors()], 422);
        }
        $boxes = $request['items'];
        $boxes = view('layouts.boxes', compact('boxes'))->render();
        return response()->json(['status' => true, 'code' => 200, 'html' => $boxes], 200);
    }
}
