<?php
    include_once 'conexao.php';


    $id = intval(filter_var($_POST["id"]));
    $senha = filter_var($_POST["senha"]);
    $tipo = filter_var($_POST["tipo"]);

    

    // verificação de campos

    if(empty($id)){
        echo "preencha o campo Matricula:<br>";
        echo "<a href='login.php'>Voltar a pagina anterior</a>";
        die();
    }
   
    if(empty($senha)){
        echo "preencha o campo Senha<br>";
        echo "<a href='login.php'>Voltar a pagina anterior</a>";
        die();
    }
  
    if ($tipo ==='comprador'){
        try{
            $consulta = $conectar->query("SELECT * FROM comprador where id = '$id'");
            $verificador = $consulta->fetch(PDO::FETCH_ASSOC);
                if($senha === $verificador['senha']){
                    echo  "você está logado como comprador";
                    header("location: /docker/www/controler/aplicacao.php?id=".$id."&tipo=".$tipo);
                }else{
                    echo "senha incorreta";
                    
                }
        }catch(PHPExcetion $e){
            echo $e;            

        }  
    }
    if ($tipo ==='lojista'){
        try{
            $consulta = $conectar->query("SELECT * FROM lojista where id = '$id'");
            $verificador = $consulta->fetch(PDO::FETCH_ASSOC);
                if($senha === $verificador['senha']){
                    echo  "você está logado como lojista";
                    header("location: /docker/www/controler/aplicacao.php?id=".$id."&tipo=".$tipo);
                }else{
                    echo "senha incorreta";
                }
        }catch(PHPExcetion $e){
            echo $e;            

        }  
    }

    


    