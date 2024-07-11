<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ConsultaService
{
    private $consultaOferta = "https://dev.gosat.org/api/v1/simulacao/credito";
    private $consultaSimulacao = "https://dev.gosat.org/api/v1/simulacao/oferta";

    /**
     * Retorna as ofertas de crédito disponíveis para o cpf informado
     * 
     * @param string $cpf
     * 
     * @return array
     */
    public function getOfertas(string $cpf, float $valor, int $qntParcelas): array
    {
        $response = Http::post($this->consultaOferta, [
            'cpf' => $cpf
        ]);
        if ($response->successful()) {
            $instituicoes = $response->json()['instituicoes'];
            $simulacoes = $this->simularOfertas($cpf, $valor, $instituicoes);
            return $this->mergeOfertas($simulacoes, $qntParcelas);
        }
        return [];
    }
    /**
     * Retorna as simulações de crédito disponíveis para o cpf informado
     * 
     * @param string $cpf
     * @param array $instituicoes
     * 
     * @return array
     */
    private function simularOfertas(string $cpf, float $valor, array $instituicoes): array
    {
        $simulacoes = [];
        foreach ($instituicoes as $instituicao) {

            foreach ($instituicao['modalidades'] as $modalidade) {
                $data = [
                    'cpf' => $cpf,
                    'instituicao_id' => $instituicao['id'],
                    'codModalidade' => $modalidade['cod']
                ];

                $response = Http::post($this->consultaSimulacao, $data);

                if ($response->successful()) {
                    $simulacao = $response->json();
                    if ($valor >= $simulacao['valorMin'] ) {
                        $simulacao['instituicaoFinanceira'] = $instituicao['nome'];
                        $simulacao['modalidadeCredito'] = $modalidade['nome'];
                        $simulacao['valorSolicitado'] =  ($valor > $simulacao['valorMax']) ? $simulacao['valorMax'] : $valor;
                        $simulacoes[] = $simulacao;
                    }
                }
            }
        }
        return $simulacoes;
    }

    /**
     * Retorna as ofertas de crédito disponíveis para o cpf informado, ordenando por melhor simulação
     * 
     * @param array $simulacoes
     * 
     * @return array
     */
    private function mergeOfertas(array $simulacoes, int $qntParcelas): array
    {
        foreach ($simulacoes as &$simulacao) {
            // Calcula o valor a pagar com base na simulação
            if ($qntParcelas < $simulacao['QntParcelaMin']) {
                $qntParcelas = $simulacao['QntParcelaMin'];
            } else if ($qntParcelas > $simulacao['QntParcelaMax']) {
                $qntParcelas = $simulacao['QntParcelaMax'];
            }
            $simulacao['valorAPagar'] = $simulacao['valorSolicitado'] * (1 + $simulacao['jurosMes'] * $qntParcelas);
            $simulacao['qntParcelas'] = $qntParcelas;
            $simulacao['valorParcela'] = $simulacao['valorAPagar'] / $qntParcelas;
        }
       
        // Ordena as simulações pelo valor a pagar
        usort($simulacoes, function ($a, $b) {
            return $a['valorAPagar'] <=> $b['valorAPagar'];
        });
        $melhoresOfertas = array_slice($simulacoes, 0, 3);
        return array_map(function ($oferta) {
            return [
                'instituicaoFinanceira' => $oferta['instituicaoFinanceira'],
                'modalidadeCredito' => $oferta['modalidadeCredito'],
                'valorAPagar' => $oferta['valorAPagar'],
                'valorParcela' => $oferta['valorParcela'],
                'valorSolicitado' => $oferta['valorSolicitado'],
                'taxaJuros' => $oferta['jurosMes'],
                'qntParcelas' => $oferta['qntParcelas']
            ];
        }, $melhoresOfertas);
    }
}
