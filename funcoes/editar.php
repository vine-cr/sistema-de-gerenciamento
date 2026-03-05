<?php 

require_once 'buscar.php';

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

    $novoNome = readline("Nome ($contato[nome]): ");
    if (!empty($novoNome)) {
        $novoNome = validarNome($novoNome);
    }

    $novoEmail = readline("Email ($contato[email]): ");
    if (!empty($novoEmail)) {
        $novoEmail = validarEmail($novoEmail);
    }

    $novoTelefone = readline("Telefone ($contato[telefone]): ");
    if (!empty($novoTelefone)) {
        $novoTelefone = validarTelefone($novoTelefone);
    }
    
    $novaIdade = readline("Idade ($contato[idade]): ");
    if (!empty($novaIdade)) {
        $novaIdade = validarIdade($novaIdade);
    }

    // Atualiza os dados do contato, mantendo os valores atuais se o usuário deixar em branco
    $contatos[$index]['nome'] = !empty($novoNome) ? $novoNome : $contato['nome'];
    $contatos[$index]['email'] = !empty($novoEmail) ? $novoEmail : $contato['email'];
    $contatos[$index]['telefone'] = !empty($novoTelefone) ? $novoTelefone : $contato['telefone'];
    $contatos[$index]['idade'] = !empty($novaIdade) ? $novaIdade : $contato['idade'];
}
