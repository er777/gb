<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>GWM 5 Menu Examples on responsive Mega Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
	
	<!-- Extra Styles, not needed for Mega Menu or Boostrap -->
	<!--<link href="css/style.css" rel="stylesheet">-->
	
	<!-- Mega Menu Style, you kinda really need Bootstrap in order for this to work -->
	<link href="css/mega-menu.css" rel="stylesheet">
	
	<!-- Mega Menu w/Responsive, unload this if you don't want it to be responsive (which kinda defeats the purpose) -->
	<link href="css/mega-menu-responsive.css" rel="stylesheet">
	

</head>
<body>
	
<div class="container">
	
    <header>
	
		<div class="navbar navbar-inverse">
		
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href=" " title="responsive Mega Menu"><em>r</em> <strong>MM</strong></a>
			</div>
			
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
							
					<li><a href="">Main Menu</a></li>
								
					<li class="dropdown mega-menu-4 transition"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-home icon-white"></i> VENDORS<b class="caret"></b></a>
						<ul class="dropdown-menu">
							
							<li class="two-column">
								<ul>
									<!--<li class="nav-title">Vendors</li>-->
									
									
									<?php 
									$i = 0;
									foreach($menuvendors as $menuvendor) : 
									$i++;
									?>
									<li><?php echo $this->Html->link($menuvendor['User']['name'], 'http://' . $menuvendor['User']['slug'] . '.' . Configure::read('Settings.DOMAIN') . '/'); ?></li>
									
									
									
									
									
									<?php
									if (($i % 4) == 0) { echo "</ul>\n\t</li>\n\t\t<li class=\"two-column\">\n\n<ul>";	}
									endforeach;
									?>

									

									
									<!--<li><a href="http://allgourmetartisan.gourmetworldmarket.com/">All Gourmet Artisan</a></li>
									<li><a href="http://arnels.gourmetworldmarket.com/">Arnel&#039;s Originals</a></li>
									<li><a href="http://cherithvalleygardens.gourmetworldmarket.com/">Cherith Valley Gardens</a></li>
									<li><a href="http://criobru.gourmetworldmarket.com/">Crio Bru</a></li>
									<li><a href="http://dundeefruitcompany.gourmetworldmarket.com/">Dundee Fruit Company</a></li>
									<li><a href="http://euphoriaconfections.gourmetworldmarket.com/">Euforia Confections</a></li>
									<li><a href="http://favor.gourmetworldmarket.com/">Favor Ceylon Tea</a></li>
									<li><a href="http://fireworkspopcorn.gourmetworldmarket.com/">Fireworks Popcorn</a></li>
									<li><a href="http://gbmarket.gourmetworldmarket.com/">Gourmet Basket Market</a></li>
									<li><a href="http://hankook.gourmetworldmarket.com/">Hankook Tea Company</a></li>
									<li><a href="http://heirloomcoffee.gourmetworldmarket.com/">Heirloom Coffee</a></li>
									<li><a href="http://kopaliorganics.gourmetworldmarket.com/">Kopali Organics</a></li>
									<li><a href="http://pastamamas.gourmetworldmarket.com/">Pasta Mama&#039;s</a></li>
									<li><a href="http://pepperlaneproducts.gourmetworldmarket.com/">Pepperlane Products</a></li>
									-->
								</ul>
							</li>
							
							<!--<li class="two-column">
								<ul>
									<li><a href="http://purelyamerican.gourmetworldmarket.com/">Purely American</a></li>
									<li><a href="http://royalhawaiian.gourmetworldmarket.com/">Royal Hawaiian Macadamia Nut</a></li>
									<li><a href="http://seafarepacific.gourmetworldmarket.com/">Sea Fare Pacific</a></li>
									<li><a href="http://skylakeranch.gourmetworldmarket.com/">Skylake Ranch</a></li>
									<li><a href="http://sfi.gourmetworldmarket.com/">Specialty Foods International</a></li>
									<li><a href="http://taooftea.gourmetworldmarket.com/">The Tao of Tea</a></li>
									<li><a href="http://tropicalfruitstand.gourmetworldmarket.com/">Tropical Fruit Stand</a></li>
									<li><a href="http://tsarnicoulaicaviar.gourmetworldmarket.com/">Tsar Nicoulai Caviar</a></li>
									<li><a href="http://twosnootychefs.gourmetworldmarket.com/">Two Snooty Chefs</a></li>
									<li><a href="http://umpqua.gourmetworldmarket.com/">Umpqua Indian Foods</a></li>
									<li><a href="http://valbemar.gourmetworldmarket.com/">ValBeMar Specialty Coffee</a></li>
									<li><a href="http://vegeusa.gourmetworldmarket.com/">Vege USA</a></li>
									<li><a href="http://victorian.gourmetworldmarket.com/">Victorian House Scones</a></li>
									<li><a href="http://zspecialtyfood.gourmetworldmarket.com/">Z Specialty Food</a></li>
								</ul>
							</li>
							
							
							<li class="two-column">
								<ul>
									<li><a href="http://purelyamerican.gourmetworldmarket.com/">More</a></li>
									<li><a href="http://royalhawaiian.gourmetworldmarket.com/">And More</a></li>
									<li><a href="http://seafarepacific.gourmetworldmarket.com/">And Even More</a></li>
								</ul>
							</li>
										-->
						
										
						</ul>
					</li><!-- 1 Column Menu Ends -->
							
					<li class="dropdown mega-menu-4 transition">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase icon-white"></i>Food Types<b class="caret"></b></a>
						<ul class="dropdown-menu">
							
							<li class="two-column">
								<ul>
									<p class="nav-special"><a href="/categories">Stop by our "Pantry"</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/accessories">Accessories</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/appetizers">Appetizers</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/bakery">Bakery</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/beverages">Beverages</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/chocolates">Chocolates</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/coffee">Coffee</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/condiments">Condiments</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/confections">Confections</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/dairy">Dairy</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/desserts">Desserts</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/seafood">Fish & Seafood</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/fruits">Fruits</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/gluten-free">Gluten-Free</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/grains-and-cereals">Grains & Cereals</a></li>
								</ul>
							</li>	
							
							<li class="two-column">
								<ul>
									<li><a href="http://www.gourmetworldmarket.com/foods/herbs-spices">Herbs and Spices</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/jams-syrups">Jams & Syrups</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/legumes-beans">Legumes & Beans</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/lifestyle-products">Lifestyle Products</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/meats-poultry">Meats & Poultry</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/nuts-and-seeds">Nuts & Seeds</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/oils-vinegars">Oils & Vinegars</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/pasta-noodles">Pasta & Noodles</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/rice">Rice</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/salts-peppers">Salts & Peppers</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/sauces">Sauces & Marinades</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/snacks">Snacks</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/soups-prepared-foods">Soup / Prepared Foods</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/sweeteners-honey">Sweeteners & Honey</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/teas">Teas</a></li>
									<li><a href="http://www.gourmetworldmarket.com/foods/vegetables-and-potatoes">Vegetables & Potatoes</a></li>													
								</ul>
							</li>
						</ul>
					</li>			
										
					<li class="dropdown mega-menu-4 transition">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase icon-white"></i>US REGIONS<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="two-column">
								<ul>
									<li><a href="http://www.gourmetworldmarket.com/us/amish">Amish</a></li>
									<li><a href="http://www.gourmetworldmarket.com/us/deep-south ">Deep South </a></li>
									<li><a href="http://www.gourmetworldmarket.com/us/far-west ">Far West </a></li>
									<li><a href="http://www.gourmetworldmarket.com/us/great-lakes">Great Lakes</a></li>
									<li><a href="http://www.gourmetworldmarket.com/us/hawaii">Hawaii</a></li>
									<li><a href="http://www.gourmetworldmarket.com/us/louisiana">Louisiana</a></li>
									<li><a href="http://www.gourmetworldmarket.com/us/mid-atlantic">Mid-Atlantic</a></li>
								</ul>
							</li>
							<li class="two-column">
								<ul>
									
									<li><a href="http://www.gourmetworldmarket.com/us/mid-west">Midwest and Plains </a></li>
									<li><a href="http://www.gourmetworldmarket.com/us/native-american">Native American</a></li>
									<li><a href="http://www.gourmetworldmarket.com/us/new-england">New England</a></li>
									<li><a href="http://www.gourmetworldmarket.com/us/northwest">Pacific Northwest</a></li>
									<li><a href="http://www.gourmetworldmarket.com/us/southeast">Southeast</a></li>
									<li><a href="http://www.gourmetworldmarket.com/us/southwest">Southwest</a></li>
								</ul>
							</li>
					</ul>
				</li>		
				
				
					<li class="dropdown mega-menu-4 transition">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase icon-white"></i>INTL REGIONS<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="two-column">
								<ul>
								
									<li><a href="http://www.gourmetworldmarket.com/international/africa">Africa </a></li>
									<li><a href="http://www.gourmetworldmarket.com/international/british-isles">British Isles &amp; Ireland</a></li>
									<li><a href="http://www.gourmetworldmarket.com/international/china">China and Taiwan</a></li>
									<li><a href="http://www.gourmetworldmarket.com/international/central-america">Central America</a></li>
									<li><a href="http://www.gourmetworldmarket.com/international/eastern-europe">Eastern and Central Europe</a></li>
									<li><a href="http://www.gourmetworldmarket.com/international/japan">Japan</a></li>
									<li><a href="http://www.gourmetworldmarket.com/international/korea">Korea</a></li>
									<li><a href="http://www.gourmetworldmarket.com/international/mediterranean">Mediterranean Europe</a></li>
									<li><a href="http://www.gourmetworldmarket.com/international/mexico">Mexico</a></li>
								</ul>
							</li>
							<li class="two-column">
								<ul>
									<li><a href="http://www.gourmetworldmarket.com/international/middle-east">Middle East</a></li>
									<li><a href="http://www.gourmetworldmarket.com/international/north-america">North America / Canada</a></li>
									<li><a href="http://www.gourmetworldmarket.com/international/oceania">Oceania</a></li>
									<li><a href="http://www.gourmetworldmarket.com/international/scandinavia">Scandinavia</a></li>
									<li><a href="http://www.gourmetworldmarket.com/international/southeast-asia">Southeast Asia</a></li>
									<li><a href="http://www.gourmetworldmarket.com/international/south-america">South America</a></li>
									<li><a href="http://www.gourmetworldmarket.com/international/south-asia">South Asia</a></li>
									<li><a href="http://www.gourmetworldmarket.com/international/the-caribbean">The Caribbean</a></li>
									<li><a href="http://www.gourmetworldmarket.com/international/western-europe">Western Europe</a></li>
								</ul>
							</li>
					</ul>
				</li>	
					
				</ul><!-- 5 Menu Examples Ends -->
					
							
			</div><!--/.nav-collapse -->
						
		</div><!-- /.navbar .navbar-inverse -->
	
	</header><!-- /container -->
	
	
	<hr />
	
	
</div><!-- /.container -->
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/fitvid.js"></script>
	<script>
        // Basic FitVids Test
        $(".container").fitVids();
    </script>
	
  </body>
</html>
