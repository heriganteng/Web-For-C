<?php
    // Menghindari error cannot modify header information
    ob_start(); // Initiate the output buffer
?>
<!DOCTYPE HTML>
<html lang = "id">
<head>
  <title><?php include "dina_title.php"; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />  
  <meta name="robots" content="index, follow">
  <meta name="description" content="<?php include "dina_metadeskripsi.php"; ?>">
  <meta name="keywords" content="<?php include "dina_metakeyword.php"; ?>">  

	<!-- Facebook Open Graph -->  
	<meta property="og:title" content="<?php include "dina_title.php" ?>" />
	<meta property="og:image" content="<?php echo "$d[alamat_website]" ?>/<?php include "dina_image.php" ?>" />
	<meta property="og:description" content="<?php include "dina_metadeskripsi.php" ?>" />

	<!-- Twitter Card -->  
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="<?php echo "$d[twitter]" ?>">
  <meta name="twitter:title" content="<?php include "dina_title.php" ?>">
  <meta name="twitter:description" content="<?php include "dina_metadeskripsi.php" ?>">
  <meta name="twitter:creator" content="<?php echo "$d[twitter]" ?>">
  <meta name="twitter:image" content="<?php echo "$d[alamat_website]" ?>/<?php include "dina_image.php" ?>">
  <meta name="twitter:domain" content="<?php echo "$d[alamat_website]" ?>">
  <meta name="twitter:url" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" />

  <!-- Google Plus Meta Tag -->  
 	<meta itemprop="name" content="<?php include "dina_title.php" ?>" />
 	<meta itemprop="description" content="<?php include "dina_metadeskripsi.php" ?>" />
 	<meta itemprop="image" content="<?php echo "$d[alamat_website]" ?>/<?php include "dina_image.php" ?>" />

  <!-- Google Plus Photo -->  
	<link href='https://plus.google.com/<?php echo "$d[googleplus]" ?>' rel='author'/>
	<link href='https://plus.google.com/<?php echo "$d[googleplus]" ?>' rel='publisher'/>
  
  <meta http-equiv="Copyright" content="For C">
  <meta name="author" content="Heri Susanto">
  <meta http-equiv="imagetoolbar" content="no">
  <meta name="language" content="Indonesia">
  <meta name="revisit-after" content="7">
  <meta name="webcrawlers" content="all">
  <meta name="rating" content="general">
  <meta name="spiders" content="all">

		<!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo "$d[alamat_website]/favicon.png" ?>" />

		<!-- Stylesheets -->
		<link type="text/css" rel="stylesheet" href="<?php echo "$d[alamat_website]/$f[folder]/css/reset.css" ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo "$d[alamat_website]/$f[folder]/css/font-awesome.min.css" ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo "$d[alamat_website]/$f[folder]/css/main-stylesheet.css" ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo "$d[alamat_website]/$f[folder]/css/shortcodes.css" ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo "$d[alamat_website]/$f[folder]/css/custom-fonts.css" ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo "$d[alamat_website]/$f[folder]/css/custom-colors.css" ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo "$d[alamat_website]/$f[folder]/css/prettyPhoto.css" ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo "$d[alamat_website]/$f[folder]/css/responsive.css" ?>" />

		<!-- JavaScripts/jQuery -->
    <script src="<?php echo "$d[alamat_website]/$f[folder]/js/clock.js" ?>" type="text/javascript"></script>
		<script src="<?php echo "$d[alamat_website]/$f[folder]/js/jquery-latest.min.js" ?>" type="text/javascript"></script>
		<script src="<?php echo "$d[alamat_website]/$f[folder]/js/theme-control.js" ?>" type="text/javascript"></script>
		<script src="<?php echo "$d[alamat_website]/$f[folder]/js/jquery-transit-modified.js" ?>" type="text/javascript"></script>
		<script src="<?php echo "$d[alamat_website]/$f[folder]/js/jquery-easing-1.3.js" ?>" type="text/javascript"></script>
		<script src="<?php echo "$d[alamat_website]/$f[folder]/js/jquery.prettyPhoto.js" ?>" type="text/javascript"></script>
		<script src="<?php echo "$d[alamat_website]/$f[folder]/js/unslider.min.js" ?>" type="text/javascript"></script>
		<script src="<?php echo "$d[alamat_website]/$f[folder]/js/cssSlidy.js" ?>" type="text/javascript"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $("a[rel^='prettyPhoto']").prettyPhoto();
      });
    </script>
	
    
    <!-- Script Facebook (yang digunakan untuk Facebook Fan Page, Komentar, Like dan Share via FB) -->
    <div id="fb-root"></div>
    <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>    
    <!-- Akhir Script Facebook -->
    
</head>
  <!-- startclock untuk me-load tgl.sekarang dan jam berdetak -->
	<body onload="startclock()">
		<!-- BEGIN .boxed -->
		<div class="boxed">			
			<!-- BEGIN .header -->
			

			<!-- BEGIN .main-menu-custom -->
			<div class="main-menu-custom">
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					<div class="ribbon-left"></div>
					<div class="ribbon-right"></div>
                                                
 				  <!---------------------- MENU WEBSITE ------------------------------------->										
          <ul>
          <?php  
          // query menu utama 
          $querymenu = "SELECT * FROM menu WHERE id_parent='0' AND aktif='Y' ORDER BY id_menu" ;
          $hasilmenu = mysqli_query($konek, $querymenu);
  
          while ($r=mysqli_fetch_array($hasilmenu)) {
            echo "<li><a href=\"$d[alamat_website]/$r[link]\">$r[nama_menu]</a>";
            // query submenu
            $querysubmenu = "SELECT * FROM menu WHERE id_parent='$r[id_menu]' AND aktif='Y'";
            $hasilsubmenu = mysqli_query($konek, $querysubmenu);
            $jumlah   = mysqli_num_rows($hasilsubmenu);
            // apabila ada submenu
            if ($jumlah > 0){
              echo "<ul>";  // <ul> untuk submenu
              while($w=mysqli_fetch_array($hasilsubmenu)){
                echo "<li><a href=\"$d[alamat_website]/$w[link]\">$w[nama_menu]</a></li>";
              }
              echo "</ul>";      
            }
            echo "</li>";
          }       
          ?>
          </ul>          
 				  <!---------------------- AKHIR MENU WEBSITE ----------------------------->										

				</div>  <!-- END .wrapper -->
			</div> <!-- END .main-menu-custom -->

	    <!---------------------- GAMBAR HEADER ----------------------------------->										
			<!-- BEGIN .slider-content -->
			<div class="slider-content">
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					<div id="slidy-container">
						<figure id="slidy">
							<img src="<?php echo "$d[alamat_website]/$f[folder]/images/header.jpg" ?>" alt data-caption="Family Is Forever">
							<img src="<?php echo "$d[alamat_website]/$f[folder]/images/hand.jpg" ?>" alt data-caption="Nobody Like Us">
							<img src="<?php echo "$d[alamat_website]/$f[folder]/images/intro-bg.jpg" ?>" alt data-caption="For C, STT-PLN">
							<img src="<?php echo "$d[alamat_website]/$f[folder]/images/himakasdf.jpg" ?>" alt data-caption="Code For Life">
						</figure>
					</div>
				
				
				
					
				</div>  <!-- END .wrapper -->				
			</div> <!-- END .slider-content -->
	    <!---------------------- AKHIR GAMBAR HEADER ----------------------------->										

			<!-- BEGIN .content -->
			<div class="content">				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					<div class="split-content">

	          <!---------------------- CONTENT ----------------------------------->										
				    <!-- BEGIN .content left -->
						<div class="content-white left">
							<div class="main-content">						
							   <?php include "isi.php" ?>
							</div>
						</div> <!-- END .content left -->
	          <!---------------------- AKHIR CONTENT ----------------------------->										
						
	          <!---------------------- SIDEBAR ----------------------------------->																
						<!-- BEGIN .content right -->
						<div class="content-white small right">
							<div class="main-content">
							
	              <!---------------------- FORM PENCARIAN BERITA ----------------------------------->																
								<div class="main-head">
									<div class="main-title">
										<h1>Pencarian</h1>
										
									</div>
								</div>

							  <!-- BEGIN .widget -->
							  <div class="widget">
								  <form class="searchform" action="<?php echo "$d[alamat_website]/hasil-pencarian.html"; ?>" method="post">									
									 <p>
										<input type="text" placeholder="cari post ..." name="kata" id="kata" class="search" /> 
                    <input type="submit" name="submit" value="Cari" class="button" />
									 </p>
								  </form>
							  </div> <!-- END .widget -->
	              <!---------------------- AKHIR FORM PENCARIAN BERITA ------------------------------>																

	              <!---------------------- TAB BERITA -------------------------------------->																
                <!-- BEGIN .tabs -->
								<div class="tabs">
									<ul class="tab-navi">
										<li class="active"><a href="#"><span>Populer</span></a></li>
										<li><a href="#"><span>Terkini</span></a></li>
										<li><a href="#"><span>Terhangat</span></a></li>
									</ul>

									<!--------------------------- TERPOPULER ---------------------------->
									<div class="latest-activity active">                  
                    <?php
                    $querypopuler = "SELECT * FROM berita ORDER BY dibaca DESC LIMIT 5";
                    $hasilpopuler = mysqli_query($konek, $querypopuler);
            
                    while($p=mysqli_fetch_array($hasilpopuler)){
							       echo "<div class=\"activity-item\">
											       <div class=\"image\">
												      <img src=\"$d[alamat_website]/foto_berita/small_$p[gambar]\" width=\"60\" height=\"50\">
											       </div>
											       <div class=\"text\">
												      <h5><a href=\"$d[alamat_website]/berita-$p[id_berita]/$p[judul_seo].html\">$p[judul]</a></h5>
												      <p><i>Dibaca: <b>$p[dibaca]</b> kali</i></p>
											       </div>
										       </div>";                       
                    }
                    ?>
									</div>
									<!--------------------------- AKHIR TERPOPULER ------------------------>

									<!--------------------------- TERKINI --------------------------------->
									<div class="latest-activity">
                    <?php
                    $queryterkini = "SELECT * FROM berita ORDER BY id_berita DESC LIMIT 5";
                    $hasilterkini = mysqli_query($konek, $queryterkini);
            
                    while($k=mysqli_fetch_array($hasilterkini)){
                      $tanggal=tgl_indo($k['tanggal']);
							        echo "<div class=\"activity-item\">
											       <div class=\"image\">
												        <img src=\"$d[alamat_website]/foto_berita/small_$k[gambar]\" width=\"60\" height=\"50\">
											       </div>
											       <div class=\"text\">
												        <h5><a href=\"$d[alamat_website]/berita-$k[id_berita]/$k[judul_seo].html\">$k[judul]</a></h5>
												        <p><i>$k[hari], $tanggal</i></p>
											       </div>
										        </div>";                       
                    }
                    ?>
									</div> 
									<!--------------------------- AKHIR TERKINI ---------------------------->

									<!--------------------------- TERHANGAT -------------------------------->
									<div class="latest-activity">
                    <?php
                    $querypilihan = "SELECT * FROM tag WHERE pilihan='Y' ORDER BY id_tag DESC LIMIT 6";
                    $hasilpilihan = mysqli_query($konek, $querypilihan);
            
                    while($q=mysqli_fetch_array($hasilpilihan)){
							        echo "<div class=\"activity-item\">
											       <div class=\"image\">
												        <h5><a href=\"$d[alamat_website]/topik/$q[tag_seo].html\">$q[nama_tag]</a></h5>
											       </div>
											       <div class=\"text\">
											         <h5>&nbsp</h5>
											         <p>&nbsp</p>
											       </div>
										        </div>";                       
                    }
                    ?>                  
									</div>
									<!--------------------------- AKHIR TERHANGAT ---------------------------->

								</div> <!-- END .tabs -->
                <br><br>
	              <!---------------------- AKHIR TAB BERITA ----------------------------------->																
	

								<div class="main-head">
									<a href="semua-download.html" class="right">semua download</a>
									<div class="main-title">
										<h1>Download</h1>
										
									</div>
								</div>

								<div class="events">



            <?php
            $querydownload = "SELECT * FROM download ORDER BY id_download DESC LIMIT 3";
            $hasildownload = mysqli_query($konek, $querydownload);
            
            while($v=mysqli_fetch_array($hasildownload)){
							echo "<div class=\"item\">
											<h5><a href=\"$d[alamat_website]/downlot.php?file=$v[nama_file]\">$v[judul]</a></h5>
										</div>";                       
            }
            ?>
								</div> <!--END .events -->


			<div class="main-head">
									<a href="<?php echo "$d[alamat_website]/semua-agenda.html" ?>" class="right">semua agenda</a>
									<div class="main-title">
										<h1>Agenda</h1>
										<div class="ribbon"></div>
									</div>
								</div>

								<div class="events">

            <?php
            $queryagenda = "SELECT * FROM agenda ORDER BY id_agenda DESC LIMIT 2";
            $hasilagenda = mysqli_query($konek, $queryagenda);
            
            while($a=mysqli_fetch_array($hasilagenda)){
              $tgl_mulai=tgl_indo($a['tgl_mulai']);
							echo "<div class=\"item\">
											<h6>$tgl_mulai</h6>
											<h5><a href=\"$d[alamat_website]/agenda-$a[id_agenda]/$a[tema_seo].html\">$a[tema]</a></h5>
										</div>";                       
            }
            ?>
								</div> <!--END .events -->

								
							<!-- BEGIN .widget -->
							<div class="widget">
							<div class="banner">
          <?php
          $querybanner = "SELECT * FROM banner ORDER BY rand() LIMIT 2";
          $hasilbanner = mysqli_query($konek, $querybanner);
          
          while($f=mysqli_fetch_array($hasilbanner)){
						echo "
						<p align=\"center\"><a href=\"$f[link]\" target=\"_blank\"><img src=\"$d[alamat_website]/foto_banner/small_$f[gambar]\" alt=\"$f[judul]\"></a></p>
								  ";          
          }
          ?>	    
          </div>      
							<!-- END .widget -->
							</div>
          					

							</div> <!-- END .main-content -->
						</div> <!-- END .right content (sidebar) -->
			    <!---------------------- AKHIR SIDEBAR ----------------------------->										

						<div class="clear-float"></div>
					</div> <!-- END .split-content -->
				</div>  <!-- END .wrapper -->
			</div>  <!-- END .content -->
			

			<!-- BEGIN .footer -->
			<!-- END .footer -->
			
			<!-- BEGIN .footer-desc -->
			<div class="footer-desc">
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					<p class="right">Developed by <strong>For C Team</strong></p>
					<p>Copyright &copy; 2016 <a href="#" target="_blank">For C | STT-PLN</a></p>
				</div>  <!-- END .wrapper -->
			</div> <!-- END .footer-desc -->
		</div>  <!-- END .boxed -->
		
		
		<script>cssSlidy();</script>
		
	</body>
</html>
<?php
    // penutup fungsi ob_start (lihat baris paling atas)
    ob_end_flush(); // Flush the output from the buffer
?>