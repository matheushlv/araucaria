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

		<!-- DATATABLE -->
		<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
		<link href="assets/css/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="assets/css/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="assets/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="assets/css/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="assets/css/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
		<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="assets/css/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
		<!-- /DATATABLE -->
		
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

                        <div class="row">
							<div class="col-sm-12">
								<div class="card-box table-responsive">

									<h4 class="m-t-0 header-title"><b>Gerenciar Slideshow</b></h4>
									<p class="text-muted font-13 m-b-20">
									Ações como edição e exclusão serão feitas neste ambiente.
									</p><p><?php error_reporting(0); 
                					  if($_GET['msg'] == 'sucesso'){
                					  	echo '<div class="alert alert-sucess">Dados do Slideshow alterados com sucesso. </div>';
                					  }
                					  else if ($_GET['msg2'] == 'sucesso'){
                						 echo ' <div class="alert alert-sucess">Dados do Slideshow excluídos com sucesso. </div> '; 
                					  }
									  else if ($_GET['msg3'] == 'sucesso'){
										 echo ' <div class="alert alert-sucess">Status do Slideshow alterado para inativo com sucesso. </div> '; 
									  }
									  else if ($_GET['msg4'] == 'sucesso'){
										 echo ' <div class="alert alert-sucess">Status do Slideshow alterado para ativo com sucesso. </div> '; 
									  }
                					  ?></p>
									
                                    <button type="submit" class="btn btn-primary btn-xs" onClick="window.location.href='slideshow_incluir.php'"><i class="ti-plus m-r-10"></i>Adicionar Slide</button><br/><br/>

									<table id="datatable-responsive"
										   class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
										   width="100%">
										<thead>
											<tr>
												<th>Código</th>
												<th>Titúlo</th>
												<th>Subtitúlo</th>
												<th>Imagem</th>
												<th width="80px">Ações</th>
												<th width="80px">Status</th>
											</tr>
										</thead>
										<tbody>
<?php
$consulta = mysql_query("SELECT * FROM slides WHERE deletar != '1'");
while ($dados = mysql_fetch_array($consulta)){
$status = $dados['status'];
	?>
											<tr>
												<td><?php echo $dados['idSlide']; ?></td>
												<td><?php echo $dados['titulo']; ?></td>
												<td><?php echo $dados['subtitulo']; ?></td>
												<td><img src="<?php echo $dados['imagem']; ?>" class="img-responsive" width="100" height="100"></td>
												<td>
<a class="btn btn-primary btn-xs" href="slideshow_editar.php?&idSlide=<?php echo $dados['idSlide']; ?>"><i class="fa fa-pencil"></i></a>
<a class="btn btn-danger btn-xs" href="excluir_slideshow.php?&idSlide=<?php echo $dados['idSlide']; ?>" onclick="return confirm('Deseja realmente excluir? Esta opção é irreversível.');"><i class="fa fa-trash-o"></i></a>
												</td>
												<td>
												<?php 
												if($status != "ativo"){
												?>
													<button type="submit" class="btn btn-danger btn-xs" onClick="window.location.href='status_slideshow.php?acao=inativo&idSlide=<?php echo $dados['idSlide']; ?>'" alt="Clique para retornar para ativar o slideshow">Inativo</button>
												</style>
												<?php } else{ ?>
													<button type="submit" class="btn btn-primary btn-xs" onClick="window.location.href='status_slideshow.php?acao=ativo&idSlide=<?php echo $dados['idSlide']; ?>'" alt="Clique para retornar para inativar o slideshow">Ativo</button>
												<?php } ?>

												</td>
											</tr>
<?php } ?>
										</tbody>
									</table>
								</div>
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

		<!-- DATATABLE -->
		
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/dataTables.bootstrap.js"></script>

		<script src="assets/js/buttons.bootstrap.min.js"></script>
		<script src="assets/js/jszip.min.js"></script>
		<script src="assets/js/pdfmake.min.js"></script>
		<script src="assets/js/vfs_fonts.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/dataTables.fixedHeader.min.js"></script>
		<script src="assets/js/dataTables.keyTable.min.js"></script>
		<script src="assets/js/dataTables.responsive.min.js"></script>
		<script src="assets/js/responsive.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.scroller.min.js"></script>
		<script src="assets/js/dataTables.colVis.js"></script>
		<script src="assets/js/dataTables.fixedColumns.min.js"></script>

		<script src="assets/js/datatables.init.js"></script>
 
		<!-- /DATATABLE -->
		
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

		

        <script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({keys: true});
        $('#datatable-responsive').DataTable();
        $('#datatable-colvid').DataTable({
            "dom": 'C<"clear">lfrtip',
            "colVis": {
                "buttonText": "Change columns"
            }
        });
        $('#datatable-scroller').DataTable({
            ajax: "assets/js/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });
        var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
        var table = $('#datatable-fixed-col').DataTable({
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            fixedColumns: {
                leftColumns: 1,
                rightColumns: 1
            }
        });
    });
    TableManageButtons.init();

</script>

		
		


    </body>
</html>