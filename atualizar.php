<?php
include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o ID foi realmente enviado
    if (!isset($_POST['id']) || empty($_POST['id'])) {
        die("Erro: ID do aluno não foi enviado!");
    }
    // Pega os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $curso = $_POST['curso'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    // Atualiza os dados no banco
    $sql = "UPDATE alunos SET nome='$nome', matricula='$matricula', curso='$curso', email='$email', telefone='$telefone' WHERE id=$id";
?>


<!doctype html>
<html lang="br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/style.css"> 
  </head>
  <body>
<?php

    if (mysqli_query($conexao, $sql)) { // (Swet-Alert) de pop-up para mostrar se o aluno foi atualizado
        echo "<script>
        Swal.fire({     
            title: 'Sucesso!',
            text: 'Aluno(a) $nome atualizado com sucesso!',
            icon: 'success',
            draggable: true,
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'cadastro.php';
        });
        </script>"; 
    } else { // Mensagem de erro caso não consiga atualizar
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'O aluno $nome não foi atualizado',
            confirmButtonText: 'Voltar'
        }).then(() => {
            window.location.href = 'cadastro.php';
        });
        </script>";
    }
}
?>
</body>
</html>
