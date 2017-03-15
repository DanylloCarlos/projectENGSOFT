<?php


 include("connection/connection.php"); 
 

  $nome = mysqli_real_escape_string($conn,$_POST['nome']);
  $especie = mysqli_real_escape_string($conn,$_POST['especie']);
  $raca = mysqli_real_escape_string($conn,$_POST['raca']);
  $sexo = mysqli_real_escape_string($conn,$_POST['sexo']);
  $imagem = $_FILES['imagem']['tmp_name'];
  $tamanho = $_FILES['imagem']['size'];
  $tipo = $_FILES['imagem']['type'];

   
  if ( $imagem != "none" )
  {
      $fp = fopen($imagem, "rb");
      $conteudo = fread($fp, $tamanho);
      $conteudo = addslashes($conteudo);
      fclose($fp);
   
  $queryInsercao = "INSERT INTO ADOTAPETDB.PET (Nome,Especie,Raca,Sexo,Adotante_idAdotante, Imagem) VALUES ('$nome', '$especie', '$raca', '$sexo',4,'$conteudo')";
   
  mysqli_query($conn,$queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente.".error_reporting()." ");
 
  echo 'Registro inserido com sucesso!'; 
  header('Location: home.php');
   
  if(mysql_affected_rows($conexao) > 0)
       printf("A imagem foi salva na base de dados");
   else
       printf ("Não foi possível salvar a imagem na base de dados");
       
   
  }else
      printf("Não foi possível carregar a imagem");
?>   
