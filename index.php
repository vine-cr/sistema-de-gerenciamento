<?php

require_once 'funcoes/armazenar-cadastrar.php';
require_once 'funcoes/buscar.php';
require_once 'funcoes/editar.php';
require_once 'funcoes/listar.php';
require_once 'funcoes/remover.php';
require_once 'funcoes/validacoes.php';
require_once 'funcoes/estatisticas.php';

// Arquivo INDEX do sistema de gerenciamento de contatos
// Utilizando as funções do arquivo functions.php

$contatos = [
    [
        'nome' => 'João Silva',
        'email' => 'joao.silva@example.com',
        'telefone' => '11 99999-9999',
        'idade' => 30
    ],
    [
        'nome' => 'Maria Oliveira',
        'email' => 'maria.oliveira@example.com',
        'telefone' => '11 99999-9999',
        'idade' => 25
    ]
];

$turnOn = 0;

while ($turnOn == 0) {

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
    switch ($option) {

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
            estatisticasContato();
            break;

        case 7:
            echo "Saindo do sistema... \n";
            $turnon = 1;
            break;
    }


}