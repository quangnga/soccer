<?php
$this->layout = false;
?>

<!DOCTYPE html>
<!--
 * A Design by GraphBerry
 * Author: GraphBerry
 * Author URL: http://graphberry.com
 * License: http://graphberry.com/pages/license
-->
<html lang="ar">
<head>
   

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>العب كورة</title>

	<!-- Load fonts -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>

	<!-- Load css styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap1.css" />
	<link rel="stylesheet" type="text/css" href="css/font-awesome1.css" />
	<link rel="stylesheet" type="text/css" href="css/style1.css" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>

<?php //var_dump($_SESSION);exit;?>
	<div class="jumbotron home home-fullscreen" id="home">
		<div class="mask"></div>
		<a href="" class="logo">
			<img src="img/logoo.png" alt="Majed Almutairi">
		</a>
<a href="home-en" class="En">En</a>

		<a href="" class="menu-toggle" id="nav-expander"><i class="fa fa-bars"></i></a>
		<!-- Offsite navigation -->
        
		<nav class="menu">
<div class="mask"></div>
<a href="" class="logo">
<img src="img/logoo.png" alt="Majed Almutairi">
</a>


<a href="#" class="close"><i class="fa fa-close"></i></a>

			<h3>Menu</h3>

			<ul class="nav">
				<li><a data-scroll href="#home">الصفحة الرئيسية</a></li>
				<li><a data-scroll href="#services">خدماتنا</a></li>
				<li><a data-scroll href="#portfolio">من نحن</a></li>
				<li><a data-scroll href="#contact">إتصل بنا</a></li>
                <li><a href="home-en">English</a></li>
			</ul>


			<ul class="social-icons fix-ul">
				<li><a href=""><i class="fa fa-facebook"></i></a></li>
				<li><a href=""><i class="fa fa-twitter"></i></a></li>
				<li><a href=""><i class="fa fa-dribbble"></i></a></li>
				<li><a href=""><i class="fa fa-behance"></i></a></li>
				<li><a href=""><i class="fa fa-pinterest"></i></a></li>
			</ul>
		</nav>
		<div class="container">
			<div class="header-info">
				<h1>كورة تايم</h1>
				<p>تحضير تمارين كورة القدم
				</p>
                <!--<button type="button" class="btn btn-info btn-lg btn-login" data-toggle="modal" data-target="#myModal"> حضر نفسك من هنا</button>-->
                
                <?= $this->Form->create() ?>
                <div class="form-boder">
                    <div class="row">
                        
                            
                            <div class="col-md-4 col-sm-1 col-xs-0"></div>
                            <div class="form-group col-md-4 col-sm-10 col-xs-12 home-fix-col">
                                <i class="fa fa-user " aria-hidden="true"></i><?= $this->Form->input('email', ['type' => 'text', 'label'=>'','id'=>'email_log','class' => 'form-control','placeholder' => 'Enter Email or Phone number']) ?>
                                <i class="fa fa-lock " aria-hidden="true"></i><?= $this->Form->input('password', ['type' => 'password', 'label'=>'','id'=>'pass_log','class' => 'form-control','placeholder' => 'Enter Password']) ?>
                                <?= $this->Form->submit(__('Log In'), ['class' => 'btn btn-lg btn-primary btn-block']) ?>
                                <p class="small">
                                <?php echo $this->Html->link('Forgot Password', ['controller'=>'Users','action' => 'resetPassword']);
?>
                                                  
                            </p>
                            <p class="small">
                           
                                <?php echo $this->Html->link('Register', ['controller'=>'Users','action' => 'register']);
?>
                            </p>
                            </div>
                            <div class="col-md-4 col-sm-1 col-xs-0"></div>
                    </div>
                    
                </div>
                       
                        
                     <?= $this->Form->end() ?>
                    
                
                                                 
				
			</div>
		</div>
	</div>
	<!-- Services section start -->
	<section id="services">
		<div class="container">                      
			<div class="row">
				<div class="col-md-4">
					<div class="service-item">
						<div class="icon"><i class="fa fa-diamond"></i></div>
						<h3>ألية عمل الموقع</h3>
						<p>ببساطة هذا الموقع يتيح لأي فريق أمكانية التحضير للاعبية لأوقات التمارين اليومية او البطولات
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service-item">
						<div class="icon"><i class="fa fa-gear"></i></div>
						<h3>طريقة التسجيل</h3>
<p>يمكنك طلب تسجيل فريقك بالموقع من خلال مراسلة هذا الإيميل: Majed90@msn.com وسنقوم بالرد عليك خلال ٤٨ ساعة
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service-item">
						<div class="icon"><i class="fa fa-life-ring"></i></div>
						<h3>التسجيل بشكل مجاني</h3>
						<p>التسجيل بشكل مجاني للاعبين وللأندية
						</p>
					</div>
				</div>
			</div>
		</div>

	</section>
	<!-- Services section end -->
	<!-- Portfolio section start -->
	<section id="portfolio"  class="darker" >
            <div class="tt">
		<div class="transbox col-md-auto col-sm-auto">
			<header>




<h2>طريقة التسجيل</h2>
<p> تستطيع تسجيل ناديك من خلال الضغط على
<a data-scroll href="#contact">إتصل بنا</a>
أو من أسفل الصفحة <br>
نقوم بإعطائك إسم مستخدم “كمشرف” لناديك من خلاله تستطيع التحكم بناديك <br>
:مثل <br>
<ul style="list-style-type:none" >
<li> قيمة الإشتراك الشهري اللي تبغى تفرضها على اللاعبين </li>
<li> مواعيد التمرين والأيام التي لا يتواجد فيها تمرين </li>
<li> إدارة تحضير اللاعبين مين راح يحضر ومن ماراح يحضر للتمرين </li>
<li> التواصل مع اللاعبين بسهولة تامة, وإبلاغهم بالتوقف وعودة التمارين </li>
<li> زيادة عدد اللاعبين اذا اردت لاعبين أكثر, ونستطيع إيقاف هذه الخدمة عنك اذا لم ترغب بها </li>
</ul>
<br>
كل لاعب يستطيع التسجيل من خلال الضغط على <a href=Users/register>( التسجيل )</a> من هنا أو من القوائم في أعلى الصفحة لتحضير نفسه
</p>

			</header>
                    </div>
			<div id="single-project"></div>
			<div class="row" style="margin-right: 0px; margin-left: 0px;">
				<figure class="portfolio-item col-md-4 col-sm-6" >
					<img class="img-responsive" src="img/homepagephotos/1.jpg" alt="Adena icons pack" />
					<figcaption class="mask">
							<i class="glyphicon glyphicon-plus"></i>
						</a>
					</figcaption>
				</figure>
				<figure class="portfolio-item col-md-4 col-sm-6" >
					<img class="img-responsive" src="img/homepagephotos/2.jpg" alt="Adena icons pack" />
					<figcaption class="mask">
							<i class="glyphicon glyphicon-plus"></i>
						</a>
					</figcaption>
				</figure>
				<figure class="portfolio-item col-md-4 col-sm-6" >
					<img class="img-responsive" src="img/homepagephotos/3.jpg" alt="Adena icons pack" />
					<figcaption class="mask">
							<i class="glyphicon glyphicon-plus"></i>
						</a>
					</figcaption>
				</figure>
				<figure class="portfolio-item col-md-4 col-sm-6" >
					<img class="img-responsive" src="img/homepagephotos/4.jpg" alt="Adena icons pack" />
					<figcaption class="mask">
						<a href="projects/project-1.html">
							<i class="glyphicon glyphicon-plus"></i>
						</a>
					</figcaption>
				</figure>
				<figure class="portfolio-item col-md-4 col-sm-6" >
					<img class="img-responsive" src="img/homepagephotos/5.jpg" alt="Adena icons pack" />
					<figcaption class="mask">
							<i class="glyphicon glyphicon-plus"></i>
						</a>
					</figcaption>
				</figure>
				<figure class="portfolio-item col-md-4 col-sm-6" >
					<img class="img-responsive" src="img/homepagephotos/6.jpg" alt="Adena icons pack" />
					<figcaption class="mask">
							<i class="glyphicon glyphicon-plus"></i>
						</a>
					</figcaption>
				</figure>
			</div>
		</div>
	</section>
	<!-- Portfolio section end -->
	<!-- Contact section start -->
	<section id="contact">
		<div class="container">
			<header>
				<h2>إتصل بنا</h2>
				<p>سنقوم بالرد عليك في غضون ٤٨ ساعة
				</p>
			</header>
			

			<div class="row">
                <div class="col-md-2"></div>
				<div class="col-md-8">
					<form class="row" method="post" action="Pages/addsms">
						<div class="form-group col-md-6">
                            <input id="fname" name="first_name" required='true' type="text" placeholder="الأسم الأول" class="form-control">
                            						</div>
                            <div class="form-group col-md-6">
                            <input id="lname" name="last_name" required='true' type="text" placeholder="الأسم الأخير" class="form-control">
                            </div>
                            						<div class="form-group col-md-6">
                            <input id="email" required='true' name="email" type="text" placeholder="إيميلك" class="form-control">
                            						</div>
                            <div class="form-group col-md-6">
                            <input id="phone" required='true' name="phone_number" type="text" placeholder="رقم جوالك" class="form-control">
                            </div>
                            						<div class="form-group col-md-12">
                            <input id="subject" name="subject" required='true' type="text" placeholder="الموضوع" class="form-control">
                            						</div>
                            						<div class="form-group col-md-12">
                            <textarea required='true' class="form-control" id="message" name="content" placeholder="من فضلك, أكتب رسالتك هنا ثم أضغط الزر اسفل" rows="7"></textarea>
                            						</div>
                            						<div class="form-group sub-res col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
						</div>
					</form>
				</div>
                <div class="col-md-2"></div>
				
			</div>
            
		</div>
        
          
	</section>
    <section class="home-call">
                
    		<address class="home-title">
    			<span>تفضل لمراسلتنا</span>
    			<p>
    				في حال لديك مشكلة أو إقتراح نسعد بمراسلتنا من خلال الإيميل او رقم الجوال الظاهر
    أو من خلال الصندوق
    			</p>
    		</address>
            <div class="home-center">
                <address class="home-email">
    				<span>Email</span>
    				<p>admin@ksa-soccer.com</p>
    			</address>
    			<address class="home-phone">
    				<span>Phone</span>
    				<p><a href="tel:0580045546">Click Here To Call Support 0580045546</a></p>
    			</address>
            </div>
    		
    
    </section>
	<!-- Contact section end -->
	<!-- Footer start -->
	<footer>
		<div class="container">
			<div class="row footer-res">
                <p>&copy; 2016 by <a  target="_blank">Majed Almutairi</a></p>
				<span>تواصل معنا</span>
				
			</div>
            <div class="row footer-res">
                
                
                <ul class="social-icons">
                        
						<li><a href=""><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://twitter.com/Ass3bGr7" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li><a href=""><i class="fa fa-dribbble"></i></a></li>
						<li><a href=""><i class="fa fa-behance"></i></a></li>
			     </ul>
                 
            </div>
		</div>
       
        
	</footer>
	<!-- Footer end  -->

	<!-- Load jQuery -->
	<!--<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>-->

	<!-- Load Booststrap -->
	<!--<script type="text/javascript" src="js/bootstrap.js"></script>

	<script type="text/javascript" src="js/smooth-scroll.js"></script>

	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>-->

	<!-- Load custom js for theme -->
   
	<script type="text/javascript" src="js/app.js"></script>
   

   
    
    <script>
    

        
    </script>
    
</body>
</html>
