<?php

require_once 'validacoes.php';

function armazenarContato(array $contato) {

    // usa a variável global para persistir contatos durante a execução
    global $contatos;

    // garante que exista um ID único automático
    if (!isset($contato['id'])) {
        $contato['id'] = gerarIdContato();
    }

    $contatos[] = $contato;
    echo "Contatos armazenados: " . count($contatos) . "\n";

}

// Gera um identificador único simples para um contato.
function gerarIdContato(): string {

    return uniqid('', true);

}

function cadastrarContato() {

    system("clear");

    echo "Cadastro de contato \n";
    $nome = validarNome(readline("Digite o nome do contato: "));
    $email = validarEmail(readline("Digite o email do contato: "));
    $telefone = validarTelefone(readline("Digite o telefone do contato: "));
    $idade = validarIdade(readline("Digite a idade do contato: "));

    $contato = [
        'nome' => $nome,
        'email' => $email,
        'telefone' => $telefone,
        'idade' => $idade
    ];

    return $contato;

}