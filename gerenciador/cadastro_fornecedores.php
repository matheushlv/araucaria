<?php
include("conexao.php");
date_default_timezone_set('America/Sao_Paulo');


if($_POST['submit'] != NULL){
	
	$nome = addslashes($_POST['nome']);
	$link = addslashes($_POST['link']);
	
	$imagem = $_FILES['imagem'];
	$resultado = mysql_query("SELECT * FROM fornecedores WHERE deletar != '1' AND nome='$nome'");
	if(mysql_num_rows($resultado) > 0 ){
	header("location:fornecedores_incluir.php?msg=erro");
	}
	else{
		
		//INFO IMAGEM
		$file 		= $imagem;
		$numFile	= count(array_filter($file['name']));
		
		//PASTA
		$folder	= 'imagens_fornecedores/';
		
		//REQUISITOS
		$permite 	= array('image/jpeg', 'image/png');
		
		if($numFile <= 0)
			echo "";
		else{
			for($i = 0; $i < $numFile; $i++){
				
				$name 	= $file['name'][$i];
				$type	= $file['type'][$i];
				$size	= $file['size'][$i];
				$error	= $file['error'][$i];
				$tmp	= $file['tmp_name'][$i];
				
				$extensao = @end(explode('.', $name));
				$novoNome = uniqid(time()) . ".".$extensao."";				
				
				$nomeBanco = "$folder".'/'."$novoNome";
			
				if(!in_array($type, $permite)){
					echo "<script type='text/javascript'>window.location.href = 'fornecedores_incluir.php?&msg2=erro';</script>";
					}
				else if($size > 1024 * 1024 * 5){
					echo "<script type='text/javascript'>window.location.href = 'fornecedores_incluir.php?&msg3=erro';</script>";

					}
				else{
					
					if(move_uploaded_file($tmp, $folder.'/'.$novoNome)){
						echo "<script type='text/javascript'>window.location.href = 'fornecedores_incluir.php?&num_fotos=".$numFile."&msg=sucesso';</script>";
						}
					else{}
					
					// CASO TENHA INCLUIDO IMAGEM E TEXTO
					
					mysql_query("INSERT INTO fornecedores ( nome, imagem, link, deletar, status ) VALUES ( '$nome', '".$nomeBanco."', '$link', '0', 'ativo' )");		
					
					header("location:fornecedores_incluir.php?msg=sucesso");	
					
				}
			}
		}
	}
}


?>