<?php 

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
