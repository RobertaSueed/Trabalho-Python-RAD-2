<?php
// Configurações do banco de dados
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "cadastro";

// Conexão com o banco de dados
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recuperar dados do formulário de login
$email = $_POST['email'];
$confirmar_senha = $_POST['senha'];
$email = mysqli_real_escape_string($conn, $email);
$confirmar_senha = mysqli_real_escape_string($conn, $confirmar_senha);
$sql ="SELECT email FROM cadastro.pessoas WHERE email='$email'";
$sql ="SELECT confirmar_senha FROM cadastro.pessoas WHERE confirmar_senha='$confirmar_senha'";
$retorno = mysqli_query($conn,$sql);


// Consulta SQL para verificar as credenciais do usuário
$query = "SELECT cadastro FROM pessoas WHERE email = '$email'";
$query = "SELECT cadastro FROM pessoas WHERE senha = '$confirmar_senha''";
$result = $conn->query($sql);

// Verifica se a consulta retornou resultados
if ($result->num_rows > 0) {
    // Login bem sucedido
    echo "LOGIN BEM SUCEDIDO!";
} else {
    // Login falhou
    echo "LOGIN INVALIDO!";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="1;url=login.html">
    <title>Redirecionando...</title>
</head>
</body>
</html>