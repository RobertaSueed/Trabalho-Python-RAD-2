<?php
// Conexão com o banco de dados SQLite
$db = new PDO('sqlite:paciente.db');

// Receber os dados do formulário
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$data_nascimento = $_POST['data_nascimento'];
$cep = $_POST['cep'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografar a senha

// Inserir os dados no banco
try {
    $query = "INSERT INTO pessoas (nome, telefone, data_nascimento, cep, cpf, email, senha) VALUES (:nome, :telefone, :data_nascimento, :cep,  :cpf, :email, :senha)";
    $stmt = $db->prepare($query);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':data_nascimento', $data_nascimento);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar.";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>