<?php
    
    include_once('dbconnexion.php');

    
    
    if(isset($_POST['submit_1'])){
    $lastname= $_POST['lastname'];
    $firstname= htmlspecialchars($_POST["firstname"]);
    $school_class= htmlspecialchars($_POST["school_class"]);
    $email=htmlspecialchars($_POST["email"]); 
    $phone= htmlspecialchars( $_POST["phone"]);
    $order_id= $_POST["order_id"];
    $about= $_POST["about"];
    $message= $_POST["message"];

    //echo $lastname;
    //echo $firstname;
    //echo $school_class;
    //echo $email;
    //echo $phone;
    //echo $order_id;
    //echo $about;
    //echo $message;


    //On insère les données reçues si les champs sont remplis
    if(!empty($lastname)  && !empty($firstname) && !empty($school_class) && !empty($email)  && !empty($phone) && !empty($order_id) && !empty($about) && !empty($message)){
                 
                $sth = $dbco->prepare("
                    INSERT INTO membres(lastname , firstname , school_class , email , phone , order_id , about , message)
                    VALUES(:lastname, :firstname, :school_class, :email, :phone, :order_id, :about,:message)");

                    $sth->bindValue(':lastname', $lastname);
                    $sth->bindValue(':firstname', $firstname);
                    $sth->bindValue(':school_class', $school_class);
                    $sth->bindValue(':email',  $email);
                    $sth->bindValue(':phone', $phone);
                    $sth->bindValue(':order_id', $order_id);
                    $sth->bindValue(':about',  $about);
                    $sth->bindValue(':message',  $message);
                    $exec  =  $sth->execute();
                    
                      //On renvoie l'utilisateur vers la page de remerciement
                      header("Location:index.php");
                    
            }

}


   
    
?>


<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MyStudies &mdash;contact </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />
    
    <link rel="shortcut icon" href="../images/fav.png" type="images/x-icon">
    <link rel="icon" href="../images/fav.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">
    <link rel="preload" href="css/app66a7.css?id=63fde31c37b4743ec018" as="style">
    <link rel="stylesheet" href="css/app66a7.css?id=63fde31c37b4743ec018"/>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Pricing -->
	<link rel="stylesheet" href="css/pricing.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-right">
						<p class="site">www.mystudies.com</p>
						<p class="num">Call: +225 76441292</p>
						<ul class="fh5co-social">
							<li><a href="#"><i class="icon-facebook2"></i></a></li>
							<li><a href="#"><i class="icon-twitter2"></i></a></li>
							<li><a href="#"><i class="icon-dribbble2"></i></a></li>
							<li><a href="#"><i class="icon-github"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="index.php"><i class="icon-study"></i>MyStudies<span>.</span></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li class="active"><a href="index.php">Acceuil</a></li>
							<li><a href="courses.php">Courses</a></li>
							<li><a href="teacher.php">Teacher</a></li>
							<li><a href="about.php">A propos </a></li>
							<li><a href="pricing.php">Pricing</a></li>
							<li class="has-dropdown">
								<a href="blog.php">Blog</a>
								<ul class="dropdown">
									<li><a href="#">Web Design</a></li>
									<li><a href="#">eCommerce</a></li>
									<li><a href="#">Branding</a></li>
									<li><a href="#">API</a></li>
								</ul>
							</li>
							<!--<li><a href="contact.php">Contact</a></li>-->
							<li class="btn-cta"><a href="connexion.php"><span>Connexion</span></a></li>
							<li class="btn-cta"><a href="devenir-tuteur-correcteur.html"><span>Devenir tuteur </span></a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>
    
    
    <div class="container-fluid bg-contact pb-3">
        <div class="container pt-3">
            <div class="content-main-title pb-2">
                <div class="d-flex flex-column align-items-center">
                    <div class="text-center w-100">
                        <h3 class="text-color-blue text-center mt-0 mb-0 nunito font-weight-bolder font-size-xxlarge">Contactez-nous </h3>
                        <span class="font-size-normal text-dark font-size-large"> Notre équipe se tient à votre disposition pour vous assister ou vous informer.  </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="card mt-3">
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-lg-12 px-4 pb-3 pt-2">
                                    <div class="d-flex flex-column mt-3 pt-2 align-items-center">
                                        <img src="images/icon-mail.png" class="pt-1" alt="">
                                        <h3 class="text-center font-weight-bolder mt-2 pt-1 pb-0 mb-0 font-size-large"> Formulaire de contact </h3>
                                    </div>
                                    <form method="POST" action="<?php echo htmlspecialchars_decode($_SERVER['PHP_SELF']); ?>" role="form" accept-charset="UTF-8" class="pt-4 px-2 mb-0 ajax-form" enctype="multipart/form-data" autocomplete="off"><input name="_token" type="hidden" value="J836bzz4ZRGrsTGHzBlZf6PYHb9JVgZXGivpGTWD"> 
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group row">
                                                <label class="d-flex align-items-center mb-0 col-lg-12"> Vous êtes <span class="ml-1 text-color-red">*</span></label>
                                                <div class="col-lg-12"><select data-target="level" class="form-control input-medium select2-medium select-collapse select2-single" required name="type"><option selected="selected" value="">Sélectionnez un choix dans la liste</option><option value="student">Étudiant</option><option value="tutor">Tuteur</option><option value="parent">Parent</option><option value="other">Autre</option></select> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group row">
                                                <label class="d-flex align-items-center mb-0 col-lg-12"> Nom </label>
                                                <div class="col-lg-12"><input class="form-control input-medium" name="lastname" type="text" > 
                                               <!-- <span class="help-inline"><?php echo $lastnameError;?></span>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group row">
                                                <label class="d-flex align-items-center mb-0 col-lg-12"> Prénom </label>
                                                <div class="col-lg-12"><input class="form-control input-medium" name="firstname" type="text" >
                                                <!--<span class="help-inline"><?php echo $firstnameError;?></span>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="d-flex align-items-center mb-0 col-lg-12"> Niveau/classe <span class="ml-1 text-color-red">*</span></label>
                                                <div class="col-lg-12"><input class="form-control input-medium" placeholder="Ex : Licence 1ère année Histoire" name="school_class" type="text"> 
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-lg-4">
                                            <div class="form-group row">
                                                <label class="d-flex align-items-center mb-0 col-lg-12"> Adresse email <span class="ml-1 text-color-red">*</span></label>
                                                <div class="col-lg-12"><input class="form-control input-medium" required name="email" type="email" >
                                                <!--<span class="help-inline"><?php echo $emailError;?></span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group row">
                                                <label class="d-flex align-items-center mb-0 col-lg-12"> Téléphone (facultatif)</label>
                                                <div class="col-lg-12"><input class="form-control input-medium numeric-int" name="phone" type="tel"> 
                                                    <!--<span class="help-inline"><?php echo $phoneError;?></span>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group row">
                                                <label class="d-flex align-items-center mb-0 col-lg-12"> N° commande</label>
                                                <div class="col-lg-12"><input class="form-control input-medium numeric-int" name="order_id" type="text" > 
                                                <!--<span class="help-inline"><?php echo $order_idError;?></span>-->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="d-flex align-items-center mb-0 col-lg-12"> Sujet de votre demande </label>
                                                <div class="col-lg-12"><input class="form-control input-medium" name="about" type="text"> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="d-flex align-items-center mb-0 pb-0 col-lg-12"> Message <span class="ml-1 font-size-medium text-color-red">*</span></label>
                                                <div class="col-lg-12"><textarea rows="6" class="form-control input-medium" required name="message" cols="50"></textarea> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <div class="d-flex align-items-center mb-0 pb-0 col-lg-12">
                                                    <div data-sitekey="6LdNhZQUAAAAAHC3wPkYGOTjDU0EqMZgLeJfoodd" class="g-recaptcha"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <button class="btn mt-3 float-left font-size-large font-weight-bolder btn-blue w-100" name="submit_1" type="submit" id="submit" value="submit_1">Envoyer le message</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-push-1 animate-box">
					
                                    <div class="fh5co-contact-info">
                                        <h3>Contact Information</h3>
                                        <ul>
                                            <li class="address">198 West 21th Street, <br> Suite 721 New York NY 10016</li>
                                            <li class="phone"><a href="tel://76441292">+225 76441292 </a></li>
                                            <li class="email"><a href="mailto:info@mystudies.com">info@mystudies.com</a></li>
                                        </ul>
                                    </div>
                    
                                </div>

                               
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script defer src='../www.google.com/recaptcha/api.js'></script>

    <div class="container-fluid newsletter-register pt-4 mt-4 pb-4">

    <div class="container">

        <div class="row">

            <div class="col-12 text-sm-left text-center col-sm-7">
                <span class="font-weight-light text-sm-right text-center float-sm-right font-size-larger mt-1">
                <span class="font-weight-bolder">Ne manquez plus nos promos et bénéficiez jusqu’à 50% de réduction</span> une fois par semaine à travers :</span>
            </div>

            <div class="col-12 mt-sm-0 mt-3 col-sm-3">

                <div class="d-flex flex-grow-1 justify-content-center justify-content-sm-start">

                    <a href="#" data-toggle="modal" data-target="#modalEmailNewsletter" class=""> <img src="images/icon-mail-nl.png" style="margin-top:-1px;" class="" alt=""> </a>
                    <a href="https://www.facebook.com/mystudies.france/" target="_blank" class="ml-sm-3 ml-0"> <img src="images/icon-facebook-nl.png" style="margin-top:-1px;" class="" alt=""> </a>
                    <a href="https://www.instagram.com/mystudies.france" target="_blank" class="ml-sm-3 ml-0"> <img src="images/icon-instagram-nl.png" style="margin-top:-1px;" class="" alt=""> </a>
                    <a href="https://twitter.com/Mystudiesfr" target="_blank" class="ml-sm-3 ml-0"> <img src="images/icon-twitter-nl.png" style="margin-top:-1px;" class="" alt=""> </a>
                    <a href="https://www.linkedin.com/company/mystudies/about/" target="_blank" class="ml-sm-3 ml-0"> <img src="images/icon-linkedin-nl.png" style="margin-top:-1px;" class="" alt=""> </a>

                </div>

                <div class="modal fade" id="modalEmailNewsletter" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bolder">Recevez nos offres par email</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form method="POST" action="https://www.mystudies.com/suscribe" accept-charset="UTF-8" class="pt-0 mb-0 ajax-form" enctype="multipart/form-data"><input name="_token" type="hidden" value="J836bzz4ZRGrsTGHzBlZf6PYHb9JVgZXGivpGTWD"> 

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="form-group row">
                                            <label class="d-flex align-items-center mb-0 pb-0 col-lg-12"> Entrez votre adresse email <span class="ml-1 font-size-medium text-color-red">*</span></label>
                                            <div class="col-lg-12"><input class="form-control input-medium" required name="email" type="email"> 
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-12">
                                        <button class="btn btn-blue font-size-large font-weight-bolder  w-100 mt-0"> <i class="fas fa-check"></i> Recevoir les promotions par email </button>
                                    </div>

                                </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>

</div>
<div class="container-fluid top-footer"></div>


	<footer id="fh5co-footer" role="contentinfo" style="background-image: url(images/img_bg_4.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-3 fh5co-widget">
					<h3>About Education</h3>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Learning</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Course</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Meetups</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Learn &amp; Grow</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Blog</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Testimonials</a></li>
						<li><a href="#">Handbook</a></li>
						<li><a href="#">Held Desk</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Engage us</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Marketing</a></li>
						<li><a href="#">Visual Assistant</a></li>
						<li><a href="#">System Analysis</a></li>
						<li><a href="#">Advertise</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Legal</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Find Designers</a></li>
						<li><a href="#">Find Developers</a></li>
						<li><a href="#">Teams</a></li>
						<li><a href="#">Advertise</a></li>
						<li><a href="#">API</a></li>
					</ul>
				</div>
			</div>

			
		</div>
    </footer>
    <div class="container-fluid bottom-footer">
        <div class="container">
            <div class="row pt-xl-3 pb-xl-3 pt-sm-2 pb-sm-2">
                <div class="col-lg-4 mb-sm-0 mt-sm-0 mt-2 mb-2 text-center text-sm-left">
                    <span style="margin-top: 1px;" class="text-white font-weight-bold font-size-normal"> © Copyright 2019 Mystudies.com - <a class="text-white font-weight-normal font-size-normal"
                    href="charte-donnees-personnelles.html">Charte de confidentialité</a></span>
                </div>
                <div class="col-lg-6 d-flex align-items-center pl-sm-5 mb-sm-0 mt-sm-0 mt-2 mb-2 text-center text-sm-left">
                    <span class="text-white float-right font-size-lsmall">
                        <a class="text-white" target="_blank" href="https://www.checkout.com/"><i class="fas fa-shield-check"></i> Paiement 100 % sécurisé avec notre partenaire <b>checkout </b>.com   
                            <img src="images/payments.png" style="margin-top:-1px;" class="ml-2 mt-sm-0 mt-2 logo-footer mr-0" alt=""></a> &nbsp;&nbsp;
                    </span>
                </div>
                
            </div>
        </div>
    </div>
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Count Down -->
	<script src="js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	<script>
    var d = new Date(new Date().getTime() + 1000 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
	</script>
	</body>
</html>

