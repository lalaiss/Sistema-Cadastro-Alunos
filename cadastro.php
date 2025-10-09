<!doctype html>
<html lang="br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="css/style.css"> 
    <title>Cadastro de Alunos</title>
  </head>
  <body> 

  <?php
  include "conexao.php";

  //Cadastrar Aluno
  if(isset($_POST['salvar'])) {
  $nome =  $_POST['nome'] ;
  $matricula = $_POST['matricula'];
  $curso = $_POST['curso'];
  $email = $_POST['email'] ;
  $telefone = $_POST['telefone'];
  
  // Insere os dados no banco
  $sql = "INSERT INTO `alunos`( `nome`, `matricula`, `curso`, `email`, `telefone`) 
  VALUES ('$nome','$matricula','$curso','$email','$telefone')";
   

  if(mysqli_query($conexao, $sql)) { // (Swet-Alert) de pop-up para mostrar se o aluno foi cadastrado
  echo "<script>
  Swal.fire({
  title: 'Sucesso!',
  text:'Aluno(a) $nome cadastrado com sucesso!',
  icon: 'success',
  draggable: true
  }).then(() => {     
  if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
  }
  });
  </script>";// Evita que duplique o cadastro ao atualizar a página
  }  else {
  echo "<script>
  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'O aluno $nome não foi cadastrado',
  }).then(() => {
  if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
  }});
  </script>";
  } 
  }

 //Lista de Usuários Cadastrados
  $query = "SELECT * FROM alunos ORDER BY id";
  $resultado = mysqli_query($conexao, $query);


  if (mysqli_num_rows($resultado) > 0) {
  echo "<div class='lista'>
  <h4> Lista de Alunos Cadastrados
  <a  href='index.php' class='btn btn-primary float-end'> + Adicionar Aluno</a>
  </h4>";
  echo "<table class='table table-bordered table striped'>
  <thead><tr>
  <th>ID</th>
  <th>Nome</th>
  <th>Matrícula</th>
  <th>Curso</th>
  <th>Email</th>
  <th>Telefone</th>
  <th>Ações </th>
  <th> </th>
  </tr></thead>
  <tbody></tbody>";
               
  while ($aluno = mysqli_fetch_assoc($resultado)) {
  echo "<tr>
  <td>{$aluno['id'] }</td>
  <td>{$aluno['nome']}</td>
  <td>{$aluno['matricula']}</td>
  <td>{$aluno['curso']}</td>
  <td>{$aluno['email']}</td>
  <td>{$aluno['telefone']}</td>
    <td>
      <a href='editar.php?id=" . $aluno['id']  . "'class= 'btn btn-success btn-sn'>✏️Editar Aluno</a>
    </td>
    <td>
    <a  href='excluir.php? id= " . $aluno['id'] .  "' onclick=\"return confirm ('Tem certeza que deseja excluir este aluno?');\">
    🗑️Excluir Aluno
     </a>
    </td>
    </tr>";
     }
        } else {
            echo "<p class='text-muted'>Nenhum aluno cadastrado ainda.</p>";
        }
        ?>
    </div>       
</body>
</html>