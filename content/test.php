<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Kamar Sharing Team">
	<meta name="author" content="Fadilansyah">
        <link rel="icon" href="https://static.wixstatic.com/media/9506f9_08f188cb4b84419a8e7df2dc57bd1471.png">

	<title>KAMAR SHARING TEAM - CHECK FOLLOWERS</title>

	<!-- Bootstrap Core CSS -->
	<link href="https://panel.fast-pedia.id/assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="https://panel.fast-pedia.id/assets2/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="https://panel.fast-pedia.id/assets2/dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- DataTables CSS -->
	<link href="https://panel.fast-pedia.id/assets2/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

	<!-- DataTables Responsive CSS -->
	<link href="https://panel.fast-pedia.id/assets2/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="https://panel.fast-pedia.id/assets2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<!-- jQuery -->
	<script src="https://panel.fast-pedia.id/assets2/vendor/jquery/jquery.min.js"></script>

</head>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="http://www.fast-pedia.net"><b><i class="fa fa-code"></i> KASHAR TEAM</b></a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">
			</ul>
			<!-- /.navbar-top-links -->

			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li>
							<a href="/"><i class="fa fa-home fa-fw"></i> Halaman Utama</a>
						</li>
						<li>
							<a href="Tools/likes.php"><i class="fa fa-instagram fa-fw"></i> Likes Instagram</a>
						</li>
						<li>
							<a href="Tools/check-follow.php"><i class="fa fa-instagram fa-fw"></i> Followers Check</a>
						</li>


					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">KASHAR TEAM FREE - CHECK FOLLOWERS</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-question-circle fa-fw"></i> Isi form dibawah ini dengan benar :)
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
 								<form method="GET">
							<div class="form-group">
									<label>Username Instagram</label>
									<textarea class="form-control" name="username" required></textarea>
									<p class="help-block"></p>
								</div>
								<div class="pull-right">
									<button type="submit" class="btn btn-success"><i class="fa fa-instagram"></i> Check</button>

								</div>

							</form>
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>
				<div class="col-lg-5">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-question-circle fa-fw"></i> Hasil
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
<?php if(isset($_GET['username'])) {
$username = $_GET['username'];
function search($line)
{
    $line = str_replace($line);
    $line = explode($line);
    $i    = 0;
    while ($i < count($line)) {
        if (strpos($line[$i], '@') && strpos($line[$i], '.')) {
            $username = $line[$i];
            $i    = 10000;
        }
        $i++;
    }
    $line = $username;
    $line = explode($line);
    return $line;
}
$data = $username;
$extract = explode("\r\n", $data);
$i = 0;
    foreach ($extract AS $k => $line) {
        $i++;
        if (strpos($line, '=>') !== false) {
            $line = str_replace('=>', $line);
        }
        if (strpos($line, ']') !== false) {
            $line = str_replace('=>', $line);
        }
        if (strpos($line, '[') !== false) {
            $line = str_replace('=>', $line);
        }
        $username = trim($line);

	$id = file_get_contents("view-source:".$username."?");
	$id = json_decode($id, true);
        $start_count = $id['reactioncount'];
        $following = $id['user']['follows']['count'];
        $nama = $id['user']['full_name'];

	if($id){
		echo ''.$start_count.'';
	}else{		
		echo '<div class="alert alert-success"> <strong>GAGAL! <br/>Username tidak tersedia</div></strong>';

} } }?>
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->
