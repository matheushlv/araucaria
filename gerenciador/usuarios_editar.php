<?php 
include("conexao.php");
include("session_start.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="#000">
		<link rel="shortcut icon" href="assets/images/favicon.png">


        <title>Painel Administrativo - Araucária Acabamentos</title>

        <!--Morris Chart CSS -->
		    <link rel="stylesheet" href="assets/css/morris.css">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>
<style type="text/css">
            .form-group{
                text-align: left;
            }
            input.form-control{
                max-width: 100%;
            }
        </style>
    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

        <?php include("menu.php"); ?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-lg-6">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Alterar Usuário</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                    Preencha corretamente os campos para realizar a edição.
	                                </p>
<?php

					$idUsuario = $_GET['idUsuario'];
					$consulta = mysql_query("SELECT * FROM usuarios WHERE idUsuario = '$idUsuario' AND deletar != 1");
					while ($dados = mysql_fetch_array($consulta))
					
					{

?>       
									<form action="alterar_usuarios.php" method="post" data-parsley-validate novalidate>
									
										<div class="">
											<div class="">
											  <input id="name" value="<?php echo $idUsuario;?>" name="idUsuario"  hidden="hidden" >
											</div>
										</div>
									
										<div class="form-group">
											<label for="userName">Login:</label>
											<input type="text" name="nome" value="<?php echo $dados['nome'];?>" parsley-trigger="change" required placeholder="Preencha um Login.." class="form-control" id="nome">
										</div>
										
										<div class="form-group">
											<label for="emailAddress">Email:</label>
											<input type="email" name="email" value="<?php echo $dados['email'];?>" parsley-trigger="change" required placeholder="Preencha um email.." class="form-control" id="email">
										</div>
										
										<div class="form-group">
											<label for="pass1">Senha:</label>
											<input id="pass1" type="password" name="senha" placeholder="Preencha uma senha válida.." required class="form-control">
										</div>
										
										<div class="form-group text-center m-b-0">
											<input name="submit" id="send" class="btn btn-primary " value="Alterar" type="submit">
											<button type="reset" class="btn btn-default  m-l-5" onClick="window.location.href='usuarios.php'">
												Voltar
											</button>
										</div>
										
									</form>
                                    
<?php } ?>
								</div>
							</div>
                        </div>


                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include("rodape.php"); ?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>

        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/js/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.waypoints.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>

        <script src="assets/js/morris.min.js"></script>
        <script src="assets/js/raphael-min.js"></script>

        <script src="assets/js/jquery.knob.js"></script>

        <script src="assets/js/jquery.dashboard.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>
		
		<!-- FORM VALIDATION -->

		<script type="text/javascript" src="assets/js/parsley.min.js"></script>
        
        <script type="text/javascript">
			$(document).ready(function() {
				$('form').parsley();
			});
		</script>
			
		<!-- /FORM -->
		


    </body>
</html>