<?php

 include("connection/connection.php"); 

 
 $razaosocial = mysqli_real_escape_string($conn, $_POST['razaosocial']);
 $cnpj = mysqli_real_escape_string($conn, $_POST['cnpj']);
 $nomeFantasia = mysqli_real_escape_string($conn, $_POST['nomefantasia']);
 $email = mysqli_real_escape_string($conn, $_POST['email']);
 $senha = mysqli_real_escape_string($conn, $_POST['password']);
 
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
 
   //Insere um novo ID na tabela Contato.
  $cmd2 = "INSERT INTO ADOTAPETDB.Contato(idContato) VALUES(''); ";
  $resultado2 = mysqli_query($conn, $cmd2);
  
   //Pega o ID de Contato registrado 
  $Select_lastIDContato = " SELECT ADOTAPETDB.Contato.idContato FROM ADOTAPETDB.Contato ORDER BY ADOTAPETDB.Contato.idContato DESC LIMIT 1; " ;
  $stmt_lastIdContato = mysqli_prepare($conn, $Select_lastIDContato);
  mysqli_stmt_bind_result($stmt_lastIdContato, $var3); 
  mysqli_stmt_execute($stmt_lastIdContato);
  
  
  //A variável $IdContato recebe o ultimo id Contato registrado. 
  while(mysqli_stmt_fetch($stmt_lastIdContato)){
      $IdContato = $var3;
  }
  
  //Criando usuário tipo Pessoa Física.
  $SQL_Insert  = "INSERT INTO ADOTAPETDB.Empresa(CNPJ,`Razao Social`, `Nome Fantasia`, Senha, Adotante_idAdotante, Endereco_idEndereco, Contato_idContato) "; 
  $SQL_Insert .= "VALUES ( ?, ?, ?, ?, ?, ?, ? ); ";
  
  $stmt = mysqli_prepare($conn, $SQL_Insert);
  // 's' = string 'i' = integer. Pareamento de ? com valores recebidos do form e de consultas query.
  mysqli_stmt_bind_param($stmt, 'ssssiii', $cnpj, $razaosocial, $nomeFantasia, $senha, $idAdotante, $IdEndereco, $IdContato );  
  $result = mysqli_stmt_execute($stmt);
  
  if($result){
      printf("Sucesso!");
  }else{
      printf("Houve um problema");
      printf("%s ",mysqli_error($conn));
  }
  
  
  //Inserindo email
  $SQL_update = "UPDATE ADOTAPETDB.Contato SET ADOTAPETDB.Contato.Email= '".$email."'  WHERE ADOTAPETDB.Contato.idContato =".$IdContato. " ;"  ;
  $stmt_update = mysqli_prepare($conn, $SQL_update);
  if( mysqli_stmt_execute($stmt_update)){
      
  }else{
      printf("%s", mysqli_error($conn));
  }
  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
  



?>