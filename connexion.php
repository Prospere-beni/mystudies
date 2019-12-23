
<?php
	ini_set('display-errors', 'on');
	include_once('admin/Database.php');
	include_once('dbconnexion.php');
	//$dbConnect = Database::connectDB();

	if(isset($_POST['connect-submit'])){
		if(isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$sql = "SELECT customers_email, customers_password FROM customers WHERE customers_email=:email and customers_password=:passw";
			$login = $dbConnect->prepare($sql);
			$login->bindValue(':email', $email);
			$login->bindValue(':passw', $password);
			$login->execute();
			$row = $login->rowCount();
			if($row == 1){
				//echo("ok");
				header('Location: index.php');
			}
			else{
				$message = "Désolé ce compte n'existe pas";
			}
		}
		
	}

	if(isset($_POST['register-submit'])){
		if(isset($_POST['lastName'], $_POST['firstName'], $_POST['email'], $_POST['password'], $_POST['confirmPassword']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])){
			$name = $_POST['lastName'];
			$firstName = $_POST['firstName'];
			$email = $_POST['email'];
			$number = $_POST['phoneNumber'];
			$password = md5($_POST['password']);
			$password2 = md5($_POST['confirmPassword']);
			if($password == $password2){
				$sql = "SELECT * FROM customers WHERE customers_email=:email and customers_phoneNumber=:num and customers_password=:passw";
				$info = $dbConnect->prepare($sql);
				$info->bindValue(':email', $email);
				$info->bindValue(':num', $number);
				$info->bindValue(':passw', $password);
				$info->execute();
				$row = $info->rowCount();
				if($row == 0){

					$sql = "INSERT INTO customers (customers_name, customers_firstName, customers_email, customers_phoneNumber, customers_password) VALUES(:name, :firstName, :email, :number, :passw)";
					$login = $dbConnect->prepare($sql);
					
					$login->bindValue(':name', $name);
					$login->bindValue(':firstName', $firstName);
					$login->bindValue(':email', $email);
					$login->bindValue(':number', $number);
					$login->bindValue(':passw', $password);
					if($login->execute()){
					
						$sql = "SELECT id_customers FROM customers WHERE customers_email=:email and customers_password=:passw";
						$info = $dbConnect->prepare($sql);
						$info->bindValue(':email', $email);
						$info->bindValue(':passw', $password);
						$info->execute();
						$infos = $info->fetch();
						$_SESSION['login']= array(
							'name' => $name,
							'firstName' => $firstName,
							'email' => $email,
							'number' => $number,
							'id' => $infos['id_customers']
						);
						header("Location: index.php");
	
					}
					else{
						$message = "Désolé ce compte n'existe pas";
						echo $message;
					}
				}
				else{
					$message = "ce compte existe déja";
					echo $message;
				}
				
				
			}
			else{
				$message = "Mot de passe non identique";
			}
			
		}
	}
		
	


?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MyStudies &mdash;connexion </title>
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
							<li class="btn-cta"><a href="devenir-tuteur-correcteur.php"><span>Devenir tuteur </span></a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>
        
    <div class="container-fluid pb-5 bg-login">
        <div class="container pt-3">
            <div class="content-main-title pb-sm-3 pb-2">
                <div class="d-flex flex-column align-items-center">
                    <div class="ml-2 text-center  w-100">
                        <h3 class="text-white text-shadow-dark text-center mt-0 mb-2 nunito font-weight-bolder font-size-xxlarge"> Rejoignez la communauté Mystudies.com ! </h3>
                        <span class="font-size-normal text-white pt-sm-0 pt-2 font-size-large text-shadow-dark-min">Et augmentez vos chances de réussites dans vos études. </span>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body pt-4">
                        <div class="row">
                            <div class="col-lg-5 px-4 px-sm-5 pb-0 pb-sm-4 pt-2">
            <div class="d-flex flex-column align-items-center">
                <img src="images/login-icon.png" class="" alt="">
                <h3 class="text-center font-weight-bolder mt-sm-3 mt-1 font-size-large"> Vous possédez déjà un compte sur MyStudies.com ?</h3>
            </div>
                <form method="POST" action="" accept-charset="UTF-8" class="pt-3 pt-sm-4 mb-sm-4 mb-2" enctype="multipart/form-data"><input name="_token" type="hidden" value="J836bzz4ZRGrsTGHzBlZf6PYHb9JVgZXGivpGTWD"> 
            <input name="cjs_cr" type="hidden" value=""> 
            <input name="cjs_ck" type="hidden" value=""> 
                <div class="row">
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="d-flex align-items-center mb-0 col-lg-12"> Adresse email <span class="ml-1 text-color-red">*</span></label>
                        <div class="col-lg-12"><input class="form-control input-medium required" name="email" type="email" value="" required> 
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-4 row">
                        <label class="d-flex align-items-center mb-0 col-lg-12"> Mot de passe <span class="ml-1 text-color-red">*</span> <a class="font-size-small ml-auto text-color-blue float-right"
                        href="recuperation-mot-de-passe.html">J'ai oublié mon mot de passe</a></label>
                        <div class="col-lg-12"><input class="form-control input-medium" name="password_etud" type="password" value="" required> 
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="custom-control mt-0 mb-1 custom-checkbox custom-min custom-control-inline">
                                <input id="remember_token" class="mr-3 custom-control-input" name="remember_token" type="checkbox" value="1"> 
                                <label class="custom-control-label d-flex align-items-center pl-2" for="remember_token"> Mémoriser mes identifiants </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn mt-4 font-weight-bolder font-size-large float-left  btn-blue w-100" type="submit" value="submit_2" name="submit_2">Connexion</button>
                </div>
               
            </div>
           
                <input type="hidden" name="previous" value="index.php">
        </form>
       
    </div>
    <div class="col-lg-7 px-4 px-sm-5 pb-4 pt-2 content-infos-order">
        <div class="d-flex flex-column mt-3 pt-2 align-items-center">
            <img src="images/register-icon.png" class="pt-1" alt="">
            <h3 class="text-center font-weight-bolder mt-2 pt-1 pb-0 mb-0 font-size-large"> Vous n'êtes pas encore inscrit sur Mystudies.com ?
            </h3>
            <span class="text-color-blue font-weight-bolder mb-2 text-center text-sm-left mt-2 mt-sm-0 font-size-large">Rejoignez plus de 5000 étudiants</span>
        </div>
        <form method="POST" action="https://www.mystudies.com/creer-un-compte" accept-charset="UTF-8" class="pt-0 px-2 mb-4" enctype="multipart/form-data"><input name="_token" type="hidden" value="J836bzz4ZRGrsTGHzBlZf6PYHb9JVgZXGivpGTWD"> 
        <input name="cjs_cr" type="hidden" value=""> <br/><input name="cjs_ck" type="hidden" value=""> 
        <div class="row">
            <div class="col-lg-4">
        <div class="form-group row">
            <label class="d-flex align-items-center mb-0 col-lg-12"> Civilité <span class="ml-1 text-color-red">*</span></label>
            <div class="col-lg-12 "><select class="form-control input-medium select2-medium select2-single" errorBag="StudentRegister" name="gender_id"><option selected="selected" value="">Sélectionnez un choix dans la liste</option><option value="1">Monsieur</option><option value="2">Madame</option></select> 
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group row">
            <label class="d-flex align-items-center mb-0 col-lg-12"> Nom <span class="ml-1 text-color-red">*</span></label>
            <div class="col-lg-12 "><input class="form-control input-medium" errorBag="StudentRegister" name="lastname" type="text"> 
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group row">
            <label class="d-flex align-items-center mb-0 col-lg-12"> Prénom <span class="ml-1 text-color-red">*</span></label>
            <div class="col-lg-12 "><input class="form-control input-medium" errorBag="StudentRegister" name="firstname" type="text"> 
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group row">
            <label class="d-flex align-items-center mb-0 col-lg-12"> Adresse email <span class="ml-1 text-color-red">*</span></label>
            <div class="col-lg-12 "><input class="form-control input-medium" autocomplete="new-email" type="email" errorBag="StudentRegister" name="email"> 
            </div>
        </div>
    </div>
        <div class="col-lg-6">
            <div class="form-group row">
                <label class="d-flex align-items-center mb-0 col-lg-12"> Mot de passe <span class="ml-1 text-color-red">*</span></label>
                <div class="col-lg-12"><input class="form-control input-medium" errorBag="StudentRegister" name="password" type="password" value=""> 
                </div>
            </div>
        </div>
    <div class="col-lg-4">
        <div class="row">
            <label class="d-flex align-items-center mb-0 col-lg-12"> Date de naissance <span class="ml-1 text-color-red">*</span> </label>
            <div class="col-lg-3 pr-0">
                <div class="form-group row">
                    <div class="col-lg-12 pr-1 "><input placeholder="Jour" onfocus="this.select();" class="form-control px-2 input-medium numeric-int required" errorBag="StudentRegister" name="d_day" type="text"> 
                    </div>
                </div>
            </div>
            <div class="col-lg-3 pr-0">
                <div class="form-group row">
                    <div class="col-lg-12 pr-1 "><input placeholder="Mois" onfocus="this.select();" class="form-control px-2 input-medium numeric-int required" errorBag="StudentRegister" name="d_month" type="text"> 
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group row">
                    <div class="col-lg-12 "><input placeholder="Année" onfocus="this.select();" class="form-control px-2 input-medium numeric-int required" errorBag="StudentRegister" name="d_year" type="text"> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group row">
            <label class="d-flex align-items-center mb-0 col-lg-12"> Téléphone <span class="ml-1 text-color-red">*</span> </label>
            <div class="col-lg-12 "><input class="form-control input-medium numeric-int" errorBag="StudentRegister" name="phone" type="text"> 
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group row">
            <label class="d-flex align-items-center mb-0 col-lg-12"> Pays <span class="ml-1 text-color-red">*</span></label>
            <div class="col-lg-12"><select class="form-control input-medium select2-medium select2-single" errorBag="StudentRegister" name="country_id"><option selected="selected" value="">Sélectionnez un pays dans la liste</option><option value="1">Afghanistan</option><option value="2">Afrique du Sud</option><option value="3">Albanie</option><option value="4">Algérie</option><option value="5">Allemagne</option><option value="6">Andorre</option><option value="7">Angola</option><option value="8">Anguilla</option><option value="9">Antarctique</option><option value="10">Antigua-et-Barbuda</option><option value="11">Arabie saoudite</option><option value="12">Argentine</option><option value="13">Arménie</option><option value="14">Aruba</option><option value="15">Australie</option><option value="16">Autriche</option><option value="17">Azerbaïdjan</option><option value="18">Bahamas</option><option value="19">Bahreïn</option><option value="20">Bangladesh</option><option value="21">Barbade</option><option value="22">Belgique</option><option value="23">Belize</option><option value="24">Bermudes</option><option value="25">Bhoutan</option><option value="26">Biélorussie</option><option value="27">Bolivie</option><option value="28">Bosnie-Herzégovine</option><option value="29">Botswana</option><option value="30">Brunéi Darussalam</option><option value="31">Brésil</option><option value="32">Bulgarie</option><option value="33">Burkina Faso</option><option value="34">Burundi</option><option value="35">Bénin</option><option value="36">Cambodge</option><option value="37">Cameroun</option><option value="38">Canada</option><option value="39">Cap-Vert</option><option value="40">Ceuta et Melilla</option><option value="41">Chili</option><option value="42">Chine</option><option value="43">Chypre</option><option value="44">Colombie</option><option value="45">Comores</option><option value="46">Congo-Brazzaville</option><option value="47">Congo-Kinshasa</option><option value="48">Corée du Nord</option><option value="49">Corée du Sud</option><option value="50">Costa Rica</option><option value="51">Croatie</option><option value="52">Cuba</option><option value="53">Curaçao</option><option value="54">Côte d’Ivoire</option><option value="55">Danemark</option><option value="56">Diego Garcia</option><option value="57">Djibouti</option><option value="58">Dominique</option><option value="59">El Salvador</option><option value="60">Espagne</option><option value="61">Estonie</option><option value="62">Eurozone</option><option value="63">Fidji</option><option value="64">Finlande</option><option value="65">France</option><option value="66">Gabon</option><option value="67">Gambie</option><option value="68">Ghana</option><option value="69">Gibraltar</option><option value="70">Grenade</option><option value="71">Groenland</option><option value="72">Grèce</option><option value="73">Guadeloupe</option><option value="74">Guam</option><option value="75">Guatemala</option><option value="76">Guernesey</option><option value="77">Guinée</option><option value="78">Guinée équatoriale</option><option value="79">Guinée-Bissau</option><option value="80">Guyana</option><option value="81">Guyane française</option><option value="82">Géorgie</option><option value="83">Géorgie du Sud et îles Sandwich du Sud</option><option value="84">Haïti</option><option value="85">Honduras</option><option value="86">Hongrie</option><option value="87">Inde</option><option value="88">Indonésie</option><option value="89">Irak</option><option value="90">Iran</option><option value="91">Irlande</option><option value="92">Islande</option><option value="93">Israël</option><option value="94">Italie</option><option value="95">Jamaïque</option><option value="96">Japon</option><option value="97">Jersey</option><option value="98">Jordanie</option><option value="99">Kazakhstan</option><option value="100">Kenya</option><option value="101">Kirghizistan</option><option value="102">Kiribati</option><option value="103">Kosovo</option><option value="104">Koweït</option><option value="105">La Réunion</option><option value="106">Laos</option><option value="107">Lesotho</option><option value="108">Lettonie</option><option value="109">Liban</option><option value="110">Libye</option><option value="111">Libéria</option><option value="112">Liechtenstein</option><option value="113">Lituanie</option><option value="114">Luxembourg</option><option value="115">Macédoine</option><option value="116">Madagascar</option><option value="117">Malaisie</option><option value="118">Malawi</option><option value="119">Maldives</option><option value="120">Mali</option><option value="121">Malte</option><option value="122">Maroc</option><option value="123">Martinique</option><option value="124">Maurice</option><option value="125">Mauritanie</option><option value="126">Mayotte</option><option value="127">Mexique</option><option value="128">Moldavie</option><option value="129">Monaco</option><option value="130">Mongolie</option><option value="131">Montserrat</option><option value="132">Monténégro</option><option value="133">Mozambique</option><option value="134">Myanmar (Birmanie)</option><option value="135">Namibie</option><option value="136">Nations Unies</option><option value="137">Nauru</option><option value="138">Nicaragua</option><option value="139">Niger</option><option value="140">Nigéria</option><option value="141">Niue</option><option value="142">Norvège</option><option value="143">Nouvelle-Calédonie</option><option value="144">Nouvelle-Zélande</option><option value="145">Népal</option><option value="146">Oman</option><option value="147">Ouganda</option><option value="148">Ouzbékistan</option><option value="149">Pakistan</option><option value="150">Palaos</option><option value="151">Panama</option><option value="152">Papouasie-Nouvelle-Guinée</option><option value="153">Paraguay</option><option value="154">Pays-Bas</option><option value="155">Pays-Bas caribéens</option><option value="156">Philippines</option><option value="157">Pologne</option><option value="158">Polynésie française</option><option value="159">Porto Rico</option><option value="160">Portugal</option><option value="161">Pérou</option><option value="162">Qatar</option><option value="163">R.A.S. chinoise de Hong Kong</option><option value="164">R.A.S. chinoise de Macao</option><option value="165">Roumanie</option><option value="166">Royaume-Uni</option><option value="167">Russie</option><option value="168">Rwanda</option><option value="169">République centrafricaine</option><option value="170">République dominicaine</option><option value="171">Sahara occidental</option><option value="172">Saint-Barthélemy</option><option value="173">Saint-Christophe-et-Niévès</option><option value="174">Saint-Marin</option><option value="175">Saint-Martin</option><option value="176">Saint-Martin (partie néerlandaise)</option><option value="177">Saint-Pierre-et-Miquelon</option><option value="178">Saint-Vincent-et-les-Grenadines</option><option value="179">Sainte-Hélène</option><option value="180">Sainte-Lucie</option><option value="181">Samoa</option><option value="182">Samoa américaines</option><option value="183">Sao Tomé-et-Principe</option><option value="184">Serbie</option><option value="185">Seychelles</option><option value="186">Sierra Leone</option><option value="187">Singapour</option><option value="188">Slovaquie</option><option value="189">Slovénie</option><option value="190">Somalie</option><option value="191">Soudan</option><option value="192">Soudan du Sud</option><option value="193">Sri Lanka</option><option value="194">Suisse</option><option value="195">Suriname</option><option value="196">Suède</option><option value="197">Svalbard et Jan Mayen</option><option value="198">Swaziland</option><option value="199">Syrie</option><option value="200">Sénégal</option><option value="201">Tadjikistan</option><option value="202">Tanzanie</option><option value="203">Taïwan</option><option value="204">Tchad</option><option value="205">Tchéquie</option><option value="206">Terres australes françaises</option><option value="207">Territoire britannique de l’océan Indien</option><option value="208">Territoires palestiniens</option><option value="209">Thaïlande</option><option value="210">Timor oriental</option><option value="211">Togo</option><option value="212">Tokélaou</option><option value="213">Tonga</option><option value="214">Trinité-et-Tobago</option><option value="215">Tristan da Cunha</option><option value="216">Tunisie</option><option value="217">Turkménistan</option><option value="218">Turquie</option><option value="219">Tuvalu</option><option value="220">Ukraine</option><option value="221">Uruguay</option><option value="222">Vanuatu</option><option value="223">Venezuela</option><option value="224">Vietnam</option><option value="225">Wallis-et-Futuna</option><option value="226">Yémen</option><option value="227">Zambie</option><option value="228">Zimbabwe</option><option value="229">Égypte</option><option value="230">Émirats arabes unis</option><option value="231">Équateur</option><option value="232">Érythrée</option><option value="233">État de la Cité du Vatican</option><option value="234">États fédérés de Micronésie</option><option value="235">États-Unis</option><option value="236">Éthiopie</option><option value="237">Île Christmas</option><option value="238">Île Norfolk</option><option value="239">Île de Man</option><option value="240">Île de l’Ascension</option><option value="241">Îles Canaries</option><option value="242">Îles Caïmans</option><option value="243">Îles Cocos</option><option value="244">Îles Cook</option><option value="245">Îles Féroé</option><option value="246">Îles Malouines</option><option value="247">Îles Mariannes du Nord</option><option value="248">Îles Marshall</option><option value="249">Îles Pitcairn</option><option value="250">Îles Salomon</option><option value="251">Îles Turques-et-Caïques</option><option value="252">Îles Vierges britanniques</option><option value="253">Îles Vierges des États-Unis</option><option value="254">Îles mineures éloignées des États-Unis</option><option value="255">Îles Åland</option></select> 
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="alert alert-info mt-2 mb-3">
            <i>Pour rappel, toutes les données recueillies demeurent absolument confidentielles et ne sont pas transmises aux utilisateurs du site. </i>
        </div>
    </div>
        <div class="col-lg-12">
            <div class="custom-control mt-2 mb-1 custom-checkbox custom-min custom-control-inline">
                <input id="newsletter" class="mr-3 custom-control-input" errorBag="StudentRegister" name="newsletter" type="checkbox" value="1"> 
                <label class="custom-control-label d-flex align-items-center pl-2" for="newsletter"> Je souhaite m’inscrire à la newsletter et recevoir des promotions allant jusqu’à 50% de réduction 1 fois par semaine. </label>
            </div>
        </div>




            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="custom-control mt-2 mb-1 custom-checkbox custom-min custom-control-inline">
                            <input id="cgv_accepted" class="mr-3 custom-control-input" required errorBag="StudentRegister" name="cgv_accepted" type="checkbox" value="1"> 
                            <label class="custom-control-label d-flex flex-column flex-sm-row align-items-start align-items-sm-center pl-2" for="cgv_accepted"> J'accepte les <a class="ml-0 ml-sm-1" href="cgu/etudiant.html" target="_blank"> conditions générales de vente</a>.
                            </label>
                            <label for="cgv_accepted" style="display: none;">Cgv Accepted</label> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="d-flex flex-column align-items-center">
                     <button class="btn mt-4 font-weight-bolder font-size-large float-left btn-blue w-100" type="submit" name="register-submit">Créer un compte</button>
                    <a href="devenir-tuteur-correcteur.php"
                    class="btn py-1 btn-padding-sm-depth  btn-sm mt-3 font-size-medium font-weight-bold w-100  btn-dark "><i class="fas mt-1 fa-graduation-cap"></i> Vous souhaitez devenir tuteur ?</a>
                </div>
            </div>

                <input type="hidden" name="previous" value="index.php">
            
            </form>
        </div>
    </div>    
</div>
</div>
</div>
</div>
</div>
<div class="container-fluid newsletter-register pt-4 mt-4 pb-4">

    <div class="container">

        <div class="row">

            <div class="col-12 text-sm-left text-center col-sm-7">
                <span class="font-weight-light text-sm-right text-center float-sm-right font-size-larger mt-1">
                <span class="font-weight-bolder">Ne manquez plus nos promos et bénéficiez jusqu’à 50% de réduction</span> une fois par semaine à travers :                                    </span>
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
					<h3>A propos de MyStudies</h3>
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

