<?php

include_once 'conexao.php';
    

    $nome = filter_var($_POST["nome"]);
    $tipo = filter_var($_POST["tipo"]);
    $cpf = intval(filter_var($_POST["cpf"]));   
    $email = filter_var($_POST["email"],FILTER_VALIDATE_EMAIL);
    $senha = filter_var($_POST["senha"]);
    $dinheiro = 5000;
    

    // verificação de campos

    if(empty($nome)){
        echo "preencha o campo nome<br>";
        echo "<a href='cadastro.php'>Voltar a pagina anterior</a>";
        die();
    }
    if(empty($tipo)){
        echo "preencha o campo tipo<br>";
        echo "<a href='cadastro.php'>Voltar a pagina anterior</a>";
        die();
    }
    if(empty($cpf)){
        echo "preencha o campo CPF<br>";
        echo "<a href='cadastro.php'>Voltar a pagina anterior</a>";
        die();
    }
    if(empty($email)){
        echo "preencha o campo Email corretamente <br>";
        echo "<a href='cadastro.php'>Voltar a pagina anterior</a>";
        die();
    }
    if(empty($senha)){
        echo "preencha o campo senha<br>";
        echo "<a href='cadastro.php'>Voltar a pagina anterior</a>";
        die();
    }


     if($tipo === 'lojista'){

        try{
            $consulta = $conectar->query("SELECT email FROM lojista where email = '$email'");
            $verificador = $consulta->fetch(PDO::FETCH_ASSOC);
            print_r($verificador);
            
            
    
    
        }catch(PDOException $e){
            echo "erro $e na validação de email";
        } 
        if(empty($verificador)){
        try{
            $insert = $conectar->prepare("INSERT INTO lojista (nome,cpf,email,senha,dinheiro) values(:nome,:cpf,:email,:senha,:dinheiro)");
            $insert->bindParam(':nome',$nome);
            $insert->bindParam(':cpf',$cpf);
            $insert->bindParam(':email',$email);
            $insert->bindParam(':senha',$senha);
            $insert->bindParam(':dinheiro',$dinheiro);
            $insert->execute();


          }catch(PDOException $e){
            echo "erro no cadastro de lojista $e";
          }     echo  "lojista cadastrado com sucesso<br>";
                echo "<a href='/DOCKER/www/index.php'>Voltar ao inicio</a>";
        }
        else{
            echo "email já cadastrado";
        }
     }
    if($tipo === 'comprador'){
        try{
            $consulta = $conectar->query("SELECT email FROM lojista where email = '$email'");
            $verificador = $consulta->fetch(PDO::FETCH_ASSOC);
            print_r($verificador);
            
            
    
    
        }catch(PDOException $e){
            echo "erro $e na validação de email";
        } 
        if(empty($verificador)){
            try{
                $insert = $conectar->prepare("INSERT INTO comprador (nome,cpf,email,senha,dinheiro) values(:nome,:cpf,:email,:senha,:dinheiro)");
                $insert->bindParam(':nome',$nome);
                $insert->bindParam(':cpf',$cpf);
                $insert->bindParam(':email',$email);
                $insert->bindParam(':senha',$senha);
                $insert->bindParam(':dinheiro',$dinheiro);
                $insert->execute();

               }catch(PDOException $e){
                echo "erro no cadastro de comprador $e";            } 

        echo "comprador cadastrado com sucesso<br>";
        echo "<a href='/DOCKER/www/index.php'>Voltar ao inicio</a>";
          
        }
    }
   



   // cadastrar($nome,$tipo,$cpf,$email,$senha);
    //verificação de cpf

    
  
    echo "<br><br>";
    
    
