<?php

require 'functions.php';

// Arquivo INDEX do sistema de gerenciamento de contatos
// Utilizando as funções do arquivo functions.php

$turnon = 0;

while($turnon == 0) {

    echo "Bem-vindo ao sistema de gerenciamento de contatos! \n";
    echo "Escolha uma opção: \n";
    echo "----------------------------- \n";
    echo "1 - Cadastrar contato \n";
    echo "2 - Listar contatos \n";
    echo "3 - Buscar contato \n";
    echo "4 - Editar contato \n";
    echo "5 - Remover contato \n";
    echo "6 - Estatísticas \n";
    echo "7 - Sair \n";
    echo "----------------------------- \n";

    $option = trim(readline("Digite a opção desejada: "));
    switch($option){

        case 1:
            $contato = cadastrarContato();
            armazenarContato($contato);
            system("clear");
            echo "Contato cadastrado com sucesso!\n\n";
            break;
        
        case 2:
            listarContatos();
            break;
        
        case 3:
            buscarContato();
            break;
        
        case 4:
            editarContato();
            system("clear");
            echo "Contato editado com sucesso!\n\n";
            break;
        
        case 5:
            removerContato();
            echo "Contato removido com sucesso!\n\n";
            break;
        
        case 6:
            infoContato();
            break;
        
        case 7:
            echo "Saindo do sistema... \n";
            $turnon = 1;
            break;
    }
    

}