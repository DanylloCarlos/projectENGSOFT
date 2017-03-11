<?php

 include("connection/connection.php"); 
 //Recebe os dados de entradas de origem do Form da página signUp.php
 $nome = mysqli_real_escape_string($conn, $_POST['nome']);
 $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
 $rg = mysqli_real_escape_string($conn, $_POST['rg']);
 $email= mysqli_real_escape_string($conn, $_POST['email']);
 $senha= mysqli_real_escape_string($conn, $_POST['senha']); 
 
  //Insere um novo ID na tabela Adotante
  $SQL_Insert1  = "INSERT INTO ADOTAPETDB.Adotante(idAdotante) VALUES('');   ";
  
  $stmt_createNewIdAdotante = mysqli_prepare($conn, $SQL_Insert1);
  mysqli_stmt_execute($stmt_createNewIdAdotante);
  mysqli_stmt_close($stmt_createNewIdAdotante);
  
  //A variável $idAdotante recebe o ultimo registro criado.
  $Select_lastIDAdotante = "SELECT ADOTAPETDB.Adotante.idAdotante FROM ADOTAPETDB.Adotante ORDER BY ADOTAPETDB.Adotante.idAdotante DESC LIMIT 1; ";
  $stmt_lastIdAdotante = mysqli_prepare($conn, $Select_lastIDAdotante);
  mysqli_stmt_bind_result($stmt_lastIdAdotante, $res);
  mysqli_stmt_execute($stmt_lastIdAdotante);
  
  //A variável $idAdotante recebe o ultimo id registrado. 
  while(mysqli_stmt_fetch($stmt_lastIdAdotante)){
      $idAdotante = $res;
  }
 
   mysqli_stmt_close($stmt_lastIdAdotante);
  
  
  //Insere um novo ID na tabela Endereço.
  $cmd = "INSERT INTO ADOTAPETDB.Endereco(idEndereco) VALUES(''); ";
  $resultado = mysqli_query($conn, $cmd);

  //Pega o ID de endereço registrado 
  $Select_lastIDEndereco = " SELECT ADOTAPETDB.Endereco.idEndereco FROM ADOTAPETDB.Endereco ORDER BY ADOTAPETDB.Endereco.idEndereco DESC LIMIT 1; " ;
  $stmt_lastIdEndereco = mysqli_prepare($conn, $Select_lastIDEndereco);
  mysqli_stmt_bind_result($stmt_lastIdEndereco, $var1); 
  mysqli_stmt_execute($stmt_lastIdEndereco);
  
  //A variável $IdEndereco recebe o ultimo endereço registrado. 
  while(mysqli_stmt_fetch($stmt_lastIdEndereco)){
      $IdEndereco = $var1;
  }
 
  //Criando usuário tipo Pessoa Física.
  $SQL_Insert  = "INSERT INTO ADOTAPETDB.Pessoa(CPF,Nome, RG, Senha, Adotante_idAdotante, Endereco_idEndereco) "; 
  $SQL_Insert .= "VALUES ( ?, ?, ?, ?, ?, ? ); ";
  
  $stmt = mysqli_prepare($conn, $SQL_Insert);
  // 's' = string 'i' = integer. Pareamento de ? com valores recebidos do form e de consultas query.
  mysqli_stmt_bind_param($stmt, 'isisii', $cpf, $nome, $rg, $senha, $idAdotante, $IdEndereco);  
  $result = mysqli_stmt_execute($stmt);
  
  if($result){
      printf("Sucesso!");
  }else{
      printf("Houve um problema");
      printf("%s ",mysqli_error($conn));
  }
  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

?> 