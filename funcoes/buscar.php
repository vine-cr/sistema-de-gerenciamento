<?php 

function buscarContato(){

    global $contatos;

    system("clear");
    echo "Busca de contato \n";
    $busca = readline("Digite o nome ou email do contato: ");

    // Passa por cada contato armazenado e verificando se o nome ou email corresponde com a busca
    foreach($contatos as $index => $contato) {

        if ((strpos($contato['nome'], $busca) !== false) || (strpos($contato['email'], $busca) !== false)) {

            echo "Contato encontrado: \n";
            echo "Nome: " . $contato['nome'] . "\n";
            echo "Email: " . $contato['email'] . "\n";
            echo "Telefone: " . $contato['telefone'] . "\n";
            echo "Idade: " . $contato['idade'] . "\n";
            echo "----------------------------- \n";
            return ['index' => $index, 'contato' => $contato];

        }
    }

    echo "Contato não encontrado!\n\n";
    return null;
}