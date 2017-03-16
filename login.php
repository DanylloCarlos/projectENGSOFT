<?php
    
  include("connection/connection.php"); 
  
      session_start();
    if(isset($_POST['signin'])){
        //bring variables from home.php - sign in
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $dbEmail = "";

         if ($username && $password) {
             
             //Seleciona e bind idContato para poder utilizá-lo como identificador da senha na tabela Empresa Ou Pessoa
             $sqlSelect = "SELECT idContato,Email FROM ADOTAPETDB.Contato WHERE Email= ? ";
             $stmt = mysqli_prepare($conn, $sqlSelect);
             mysqli_stmt_bind_param($stmt, 's', $username);
             mysqli_stmt_bind_result($stmt, $idContato, $email);
             mysqli_stmt_execute($stmt);
             
             //Salva valores idContato e Email em váriaves que serão utilizadas mais tarde para conexão com outras tabelas com o mesmo idContato
             while(mysqli_stmt_fetch($stmt)){
                 $dbIdContato = $idContato;
                 $dbEmail = $email;
             }
             mysqli_stmt_close($stmt);
       
             //Seleciona a Senha onde IdContato é o equilvalente. Tabela Empresa.
             $sqlCheckEmpresa = "SELECT Senha FROM ADOTAPETDB.Empresa WHERE Contato_idContato = ?";
             $stmt2 = mysqli_prepare($conn, $sqlCheckEmpresa);
             mysqli_stmt_bind_param($stmt2, 'i', $dbIdContato);
             mysqli_stmt_bind_result($stmt2, $senha);
             //Se a query falhar provavelmente os dados do usuário está na tabela Pessoa
             if(mysqli_stmt_execute($stmt2)){
                 //Salva a senha correspondente ao idContato
                 while(mysqli_stmt_fetch($stmt2)){
                     $dbSenha = $senha;
                 }        
             }else{              
                       //Seleciona a Senha onde IdContato é o equilvalente. Tabela Pessoa.
                       $sqlCheckPessoa = "SELECT Senha FROM ADOTAPETDB.Pessoa WHERE Contato_idContato = ?";
                       $stmt3 = mysqli_prepare($conn, $sqlCheckPessoa);
                       mysqli_stmt_bind_param($stmt3, 'i', $dbIdContato);
                       mysqli_stmt_bind_result($stmt3, $senha);
                       mysqli_stmt_execute($stmt3);

                       //Salva a senha correspondente ao idContato
                       while(mysqli_stmt_fetch($stmt3)){
                           $dbSenha = $senha;
                       }          
                       mysqli_stmt_close($stmt3);

                //    }
                } 
                
                   //Verifica se a informação de entrada é igual a senha armazenada no banco de dados e username é igual ao email armazenado no bd.
                   if($username==$dbEmail && $password==$dbSenha){
                       $_SESSION['username'] = $dbemail;
                       $_SESSION['password'] = $dbSenha;
                       $_SESSION['idContato'] = $dbIdContato;
                       header("location: home.php");
                   }else{
                       printf("Erro. Senha ou Username Incorreto");               
                       // header("location: index.php?notify=incorrect");
                   }
        }
    }

    // if(isset($_GET['action'])){
     //   session_destroy();
      //  header ("Location: /remindersystem%202/index.php");
    //}    
    
  





?>