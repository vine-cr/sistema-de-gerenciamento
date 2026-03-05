<?php

function listarContatos() {

    global $contatos;
    
    system("clear");
    echo "Listagem de contatos \n";
    
    // Caso não tenha nenhum contato armazenada
    if (empty($contatos)) {

        echo "Nenhum contato cadastrado!\n";
        return;

    }

    // Passa por cada contato armazenado e exibindo as principais informações
    foreach($contatos as $contato) {

        echo "Nome: " . $contato['nome'] . " - Email: " . $contato['email'] . " - Telefone: " . $contato['telefone'] . " - Idade: " . $contato['idade'] . "\n\n";

    }
}