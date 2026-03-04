<?php

// variável global que guarda todos os contatos (array de arrays associativos)
$contatos = [
    [
        'id' => gerarIdContato(),
        'nome' => 'João Silva',
        'email' => 'joao.silva@example.com',
        'telefone' => '11 99999-9999',
        'idade' => 30
    ],

    [
        'id' => gerarIdContato(),
        'nome' => 'João Carlos',
        'email' => 'joao.carlos@example.com',
        'telefone' => '11 99999-9999',
        'idade' => 20
    ]
];

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

// Criando uma função para validar os dados de entrada do contato, garantindo que o nome, email, telefone e idade estejam no formato correto e não sejam vazios, sendo possivel reutilizar essas validações na function editarContato() também.
function validarNome($nome){

    while(true) {

        if (empty($nome)) {
            echo "O nome não pode ser vazio!\n";
        } elseif (strlen($nome) < 3) {
            echo "O nome deve conter pelo menos 3 caracteres!\n";
        } elseif (!preg_match("/^[a-zA-Z\s]+$/", $nome)) {
            echo "O nome deve conter apenas letras e espaços!\n";
        } else {
            return $nome;
        }

        $nome = readline("Digite o nome do contato: ");

    }

}

function validarEmail($email) {

    while(true) {    

        if (empty($email)) {
            echo "O email não pode ser vazio!\n";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "O email deve ser um endereço de email válido!\n";
        } else {
            return $email;
        }

        $email = readline("Digite o email do contato: ");

    }
}

function validarTelefone($telefone){

    while(true){
        
        if(empty($telefone)) {
            echo "O telefone não pode ser vazio!\n";
        }if(!preg_match("/^\d{2} \d{5}-\d{4}$/", $telefone)) {
            echo "O telefone deve estar no formato 'XX XXXXX-XXXX'!\n";
        }
        else {
            return $telefone;
        }

        $telefone = readline("Digite o telefone do contato: ");

    }

}

function validarIdade($idade) {

    while(true){
        
        if (!is_numeric($idade)) {
            echo "A idade deve ser um numero!\n";
        } elseif (empty($idade && $idade != 0)) {
            echo "A idade não pode ser vazia!\n";
        } else {
            return (int)$idade;
        }

        $idade = readline("Digite a idade do contato: ");
    
    }

}

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

function editarContato(){

    global $contatos;

    system("clear");
    echo "Edição de contato \n";

    $resultadoBusca = buscarContato();

    if($resultadoBusca === null) {

        echo "Não foi possível editar, contato não encontrado!\n";
        return;

    }

    $index = $resultadoBusca['index'];
    $contato = $resultadoBusca['contato'];

    echo "Digite os novos dados do contato (deixe em branco para manter o valor atual): \n";

    $novoNome = validarNome(readline("Nome ($contato[nome]): "));
    $novoEmail = validarEmail(readline("Email ($contato[email]): "));
    $novoTelefone = validarTelefone(readline("Telefone ($contato[telefone]): "));
    $novaIdade = validarIdade(readline("Idade ($contato[idade]): "));

    // Atualiza os dados do contato, mantendo os valores atuais se o usuário deixar em branco
    $contatos[$index]['nome'] = !empty($novoNome) ? $novoNome : $contato['nome'];
    $contatos[$index]['email'] = !empty($novoEmail) ? $novoEmail : $contato['email'];
    $contatos[$index]['telefone'] = !empty($novoTelefone) ? $novoTelefone : $contato['telefone'];
    $contatos[$index]['idade'] = !empty($novaIdade) ? $novaIdade : $contato['idade'];
}

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

function infoContato() {

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