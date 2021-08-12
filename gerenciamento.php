<?php

if(isset($_POST['btnGerarRemessa'])){
    $caminho = 'arquivosRemessa/remessa.txt';

    $header = array(
        'codigoRegistro'      => '0', // sempre 0
        'codigoRemessa'       => '1', // sempre 1
        'literalRemessa'      => 'REMESSA', // qualquer valor com 7 caracteres diferente de TESTE e REM.TST  
        'codigoServico'       => '01', // sempre 01
        'literalServico'      => 'COBRANCA       ', // sempre COBRANCA
        'codigoAgencia'       => '0000', // codigo da agencia detentora da conta
        'codigoBeneficiario'  => '0000000', // identificação da empresa na CAIXA
        'exclusivoCaixa'      => '         ', // preencher com vazios
        'nomeEmpresa'         => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', // nome por extenso da empresa
        'codigoBanco'         => '104', // codigo da caixa
        'nomeBanco'           => 'C ECON FEDERAL ', // nome do banco, no caso a CAIXA
        'dataGeracao'         => '290721', // data de geração do arquivo ex.: 100821 = 10 de agosto de 2021
        'versaoLayout'        => '   ', // em branco ou 007
        'emBranco'            => '                                                                                                                                                                                                                                                                                              ', // uso exclusivo caixa, sempre 286 espaços vazios
        'sequencialA'         => '00000', // número do aruivo (sequencial de geração do arquivo)
        'sequencialB'         => '000001' // sequencial do registro no arquivo (número da linha), sempre vai ser 000001
    );

    $detalhes = array(
        'codigoRegistro'      => '1', // sempre 1
        'tipoinscricao'       => '02', // 01 para cpf , 02 para cnpj
        'cpfCnpj'             => '00000000000000', // cnpj ou cpf (depende do que foi informado no campo anterior) do beneficiário
        'usoCaixa'            => '000', // sempre três zeros
        'codigoBeneficiario'  => '0000000', // identificação da empresa na CAIXA
        'idEmissao'           => '2', // 1 - banco emite, 2 - cliente emite 
        'idPostagem'          => '0', // codigo para identificar o responsável pela distribuição do boleto: 0 - postagem pelo beneficiario, 1 - pagador via correio, 2 - beneficiario via agência CAIXA, 3 - pagador via email 
        'taxaPermanencia'     => '00', // sempre dois zeros
        'identificacao'       => 'XXXXXXXXXXXXXXXXXXXXXXXXX', // idUnimedCobranca com espaços em brancos depois do número para preencher todas as 25 casas
        'nossoNumeroCC'       => '14', // 11 ou 14
        'nossoNumero'         => 'XXXXXXXXXXXXXXX', // nosso número com 0 a esquerda para completar 15 casas
        'vazios'              => '  ', // sempre dois espaços vazios
        'usoLivre'            => ' ', // 1 ou vazio para autorizar pagamento parcial, 2 para autorizar
        'codigoTipoJuros'     => '0', // 1, 3, 5, 6, 8
        'dataJuros'           => '000000', // ex.: 100221 = 10 de janeiro de 2021
        'codigoDesconto'      => '0', // 0 - sem desconto, 1 - valor fixo até a data informada, 2 - percentual até a data informada, 3 - valor por antecipação dia corrido, 4 - valor por antecipação dia útil, 5 - percentual por antecipação dia corrido, 6 - percentual por antecipação dia útil
        'branco'              => '                      ', // preencher com 22 zeros ou 22 vazios 
        'carteira'            => '01', // preencher com 01
        'codigoOcorrencia'    => '01', // 01 - entrada de título, 02 - pedido de baixa, 03 - concessao de abatimento, 04 - cancelamento de abatimento  
        'numeroCobranca'      => 'XXXXXXXXXX', // número do documento de cobrança com espaços em brancos depois do número para preencher todas as 10 casas
        'dataVencimento'      => '100821', // data de vencimento ex.: 100821 = 10 de agosto de 2021
        'valor'               => 'XXXXXXXXXXXXX', // valor a ser pago, completar com 0 a esquerda
        'codigoBanco'         => '104', // no caso o codigo da caixa: 104
        'agenciaCobradora'    => '00000', // agencia encarregada da cobranca
        'especie'             => '01', // código adotado pela FEBRABAN para identificar o tipo de título de cobrança
        'aceite'              => 'N', // A ou S para aceite, N para nao aceite
        'dataEmissao'         => '280721', // data de emissao ex.: 100821 = 10 de agosto de 2021
        'primeiraInstrucao'   => '02', // 01 - protestar dias corridos, 02 ou qualquer outro valor - devolver
        'segundaInstrucao'    => '00', // sempre dois zeros
        'jurosMora'           => '0000000000000', // valor de juros por dia (corrido) sobre o valor do título
        'dataDesconto'        => '000000', // data de desconto ex.: 100821 = 10 de agosto de 2021
        'valorDesconto'       => 'XXXXXXXXXXXXX', // valor de desconto
        'valorIOF'            => 'XXXXXXXXXXXXX', // valor de IOF a ser recolhido
        'abatimento'          => '0000000000000', // valor de abatimento a ser concedido
        'tipoInscricao'       => '01', // tipo de pagador: 01 - cpf, 02 - cnpj 
        'numeroInscricao'     => 'XXXXXXXXXXXXXX', // cpf ou cnpj do pagador, caso seja cpf completar com 0 a esquerda
        'nome'                => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', // nome do pagador (pode ter espaços entre as palavras) com espaços em brancos depois do nome para preencher todas as 40 casas
        'endereco'            => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', // endereço do pagador (pode ter espaços entre as palavras) com espaços em brancos depois do endereço para preencher todas as 40 casas
        'bairro'              => 'XXXXXXXXXXXX', // bairro do pagador (pode ter espaços entre as palavras) com espaços em brancos depois do bairro para preencher todas as 12 casas
        'cep'                 => '00000000', // cep do pagador 
        'cidade'              => 'XXXXXXXXXXXXXXX', // cidade do pagador
        'uf'                  => 'MG', // estado do pagador
        'dataMulta'           => '000000', // data para pagamento da multa ex.: 100821 = 10 de agosto de 2021
        'valorMulta'          => '0000000000', 
        'sacadorAvalista'     => '                      ', // nome do sacador ou avalista
        'terceiraInstrucao'   => '00', // sempre 00
        'prazo'               => '18', // número de dias para ínicio de protesto/ devolução
        'codigoMoeda'         => '1', // sempre 1 para a moeda real
        'numeroSequencial'    => '000000' // sequencial do registro no arquivo (número da linha), preencher com 0 a esquerda
    );

    $trailer = array(
        'codigoRegistro'      => '9', // sempre vai ser 9
        'usoCaixa'            => '                                                                                                                                                                                                                                                                                                                                                                                                         ', // sempre 393 espaços vazios
        'sequencial'          => '000000' // sequencial do registro no arquivo (número da linha), preencher com 0 a esquerda
    );

    $conteudo = implode($header) . "\n" . implode($detalhes) . "\n" . implode($trailer);

    file_put_contents($caminho, $conteudo); 

    //BAIXAR ARQUIVO:
    header('Content-disposition: attachment; filename=remessa.txt');
    header('Content-type: text/plain');
    readfile('arquivosRemessa/remessa.txt');
    die();
    header('location:index.php');
}

?>