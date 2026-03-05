<?php 

require_once 'buscar.php';

function removerContato(){

    global $contatos;

    system("clear");
    echo "Remoção de contato \n";

    $resultadoBusca = buscarContato();

    if($resultadoBusca === null){

        echo "Não foi possível remover, contato não encontrado!\n";
        return;

    }

    $confirmacao = readline("Tem certeza que deseja remover este contato? (s/n): ");
    system("clear");
    if(strtolower($confirmacao) === 's') {

        $index = $resultadoBusca['index'];
        unset($contatos[$index]);
        // Reindexa o array para evitar buracos nos índices
        $contatos = array_values($contatos);

    } else {

        echo "Remoção cancelada!\n\n";

    }

}