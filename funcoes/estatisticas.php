<?php

function estatisticasContato() {

    global $contatos;

    system("clear");
    echo "Estatísticas de contatos \n";

    $totalContatos = count($contatos);
    $mediaIdade = $totalContatos > 0 ? array_sum(array_column($contatos, 'idade')) / $totalContatos : 0;

    echo "Total de contatos: $totalContatos \n\n";
    echo "Idade média dos contatos: " . number_format($mediaIdade, 2) . " anos \n\n";

    // contagem por faixa etaria

    $faixasEtarias = [
        '0-18' => 0,
        '19-35' => 0,
        '36-60' => 0,
        '60+' => 0
    ];

    foreach($contatos as $contato) {

        if ($contato['idade'] <= 18) {
            $faixasEtarias['0-18']++;
        } elseif ($contato['idade'] <= 35) {
            $faixasEtarias['19-35']++;
        } elseif ($contato['idade'] <= 60) {
            $faixasEtarias['36-60']++;
        } else {
            $faixasEtarias['60+']++;
        }

    }       

    echo "Contatos por faixa etária: \n";
    foreach($faixasEtarias as $faixa => $quantidade) {

        echo "$faixa anos: $quantidade contatos \n";

    }

    echo "\n";
}