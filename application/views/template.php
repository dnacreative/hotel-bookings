
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
    <head>
	
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-style-type" content="text/css" />
        <meta http-equiv="content-script-type" content="text/javascript" />
        
        <title>Biniarroca Admin</title>
        
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/black.css" media="screen, projection, tv" /><!-- Change name of the stylesheet to change colors (blue/red/black/green/brown/orange/purple) -->
        <!--[if lte IE 7.0]><link rel="stylesheet" type="text/css" href="<?=base_url()?>css/ie.css" media="screen, projection, tv" /><![endif]-->
		<!--[if IE 8.0]>
			<style type="text/css">
				form.fields fieldset {margin-top: -10px;}
			</style>
		<![endif]-->
		
		<script type="text/javascript" src="<?=base_url()?>js/jquery-1.3.2.min.js"></script>
		<!-- Adding support for transparent PNGs in IE6: -->
		<!--[if lte IE 6]>
			<script type="text/javascript" src="<?=base_url()?>js/ddpng.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('#nav #h-wrap .h-ico');
				DD_belatedPNG.fix('.ico img');
				DD_belatedPNG.fix('.msg p');
				DD_belatedPNG.fix('table.calendar thead th.month a img');
				DD_belatedPNG.fix('table.calendar tbody img');
			</script>
		<![endif]-->
		<script type="text/javascript">
			$(document).ready(function() {
			    // Search input text handling on focus
					var $searchq = $("#search-q").attr("value");
				    $('#search-q.text').css('color', '#999');
					$('#search-q').focus(function(){
						if ( $(this).attr('value') == $searchq) {
							$(this).css('color', '#555');
							$(this).attr('value', '');
						}
					});
					$('#search-q').blur(function(){
						if ( $(this).attr('value') == '' ) {
							$(this).attr('value', $searchq);
							$(this).css('color', '#999');
						}
					});
				// Switch categories
					$('#h-wrap').hover(function(){
							$(this).toggleClass('active');
							$("#h-wrap ul").css('display', 'block');
						}, function(){
							$(this).toggleClass('active');
							$("#h-wrap ul").css('display', 'none');
					});
				// Handling with tables (adding first and last classes for borders and adding alternate bgs)
					$('tbody tr:even').addClass('even');
					$('table.grid tbody tr:last-child').addClass('last');
					$('tr th:first-child, tr td:first-child').addClass('first');
					$('tr th:last-child, tr td:last-child').addClass('last');
					$('form.fields fieldset:last-child').addClass('last');
				// Handling with lists (alternate bgs)
					$('ul.simple li:even').addClass('even');
				// Handling with grid views (adding first and last classes for borders and adding alternate bgs)
					$('.grid .line:even').addClass('even');
					$('.grid .line:first-child').addClass('firstline');
					$('.grid .line:last-child').addClass('lastline');
				// Tabs switching
					$('#box1 .content#box1-grid').hide(); // hide content related to inactive tab by default
					$('#box1 .header ul a').click(function(){
						$('#box1 .header ul a').removeClass('active');
						$(this).addClass('active'); // make clicked tab active
						$('#box1 .content').hide(); // hide all content
						$('#box1').find('#' + $(this).attr('rel')).show(); // and show content related to clicked tab
						return false;
					});
			});
		</script>

		<script>
			function resizeText(multiplier) {
			  if (document.body.style.fontSize == "") {
			    document.body.style.fontSize = "1.0em";
			  }
			  document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";
			}
		</script>
		
		<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>


  
    </head>
    <body>

		<div id="header">
			<div class="inner-container clearfix">
				<h1 id="logo">
					<a class="home" href="<?=base_url()?>index.php/booking/admin" title="Go to admin's homepage">
						<!-- your title -->
						<span class="ir"></span>
					</a><br />
					<a class="button" href="http://biniarroca.com">visit site&nbsp;»</a>
				</h1>
				<div id="userbox">
					<div class="inner">
						<strong><?= $this->tank_auth->get_username(); ?></strong>
						<ul class="clearfix">
							<li><a href="<?=base_url()?>index.php/auth/logout">logout</a></li>
						</ul>
					</div>
					<a id="logout" href="<?=base_url()?>index.php/auth/logout">log out<span class="ir"></span></a>
				</div><!-- #userbox -->
			</div><!-- .inner-container -->
		</div><!-- #header -->
      	<div id="nav">
			<div class="inner-container clearfix">
				<div id="-wrap">
					<div >
						<a href="#"><img id="plustext" alt="Increase text size" src="<?=base_url()?>css/img/zoom_in.gif" onclick="resizeText(1)" /></a>
						<a href="#"><img id="minustext" alt="Decrease text size" src="<?=base_url()?>css/img/zoom_out.gif" onclick="resizeText(-1)" /></a>
					</div>
				</div><!-- #h-wrap -->
				
				
			</div><!-- .inner-container -->
      	</div><!-- #nav -->


		
		<div id="container">
			<div class="inner-container">

			<?php

			if( !$this->uri->segment(3) ){

			?>

			
			<div id="arrivaltoggle" class="form-content form-div" style="background-color:#ccc;padding:10px;border:1px dotted;margin:5px">
				<strong>(+) Filters:</strong>
				<div id="arrival" style="display:none">
			</br>

			<form style="display:inline;" action="<?=base_url()?>index.php/booking/datefilter" method="post">
			<?php


					$days = array(00 => 'Any Day');
			        for ($i = 01; $i <= 31; $i++)
			        {
			        	if(strlen($i)<2) $i="0".$i;
			            $days[] = $i;
			        }
			        $months = array(0 => 'Any Month', );
			        for ($i = 1; $i <= 12; $i++)
			        {
			        	if(strlen($i)<2) $i="0".$i;
			            $months[] = $i;
			        }
			        $years = array(0 => 'Any Year');
			        for ($i = 2010; $i <= 2020; $i++)
			        {
			            $years[$i] = $i; 
			            //echo "<pre>"; print_r($years); echo "</pre>";//remove this
			        }

			        $selected_day = (isset($selected_day)) ? $selected_day : 0;
			        $selected_month = (isset($selected_month)) ? $selected_month : 0;
			        $selected_year = (isset($selected_year)) ? $selected_year : 0;
			        //echo "<p>";
			            echo form_label('', 'day', array('class' => 'left'));
			            echo form_dropdown('day', $days, $selected_day, 'class="combosmall"'); 
			            echo form_dropdown('month', $months, $selected_month, 'class="combosmall"'); 
			            echo form_dropdown('year', $years, $selected_year, 'class="combosmall"'); 
			            echo '<input type="submit" value="Filter by date" />';
			        //echo "</p>";
			

			?>
			</form>

			<form style="display:inline;" action="<?= base_url("index.php/booking/admin"); ?>">
			
				
				<select name="lan" class="combosmall">
					<option value="en" selected="selected">en</option>
					<option value="es">es</option>
					<option value="fr">fr</option>
					<option value="de">de</option>
				</select>
				<input type="submit" value="Filter by Language">
			
			</form>


			<form style="display:inline;" action="<?= base_url("index.php/booking/admin"); ?>">
			
				
				<select id="country" name="country" class="combosmall"> 
					<option value="" selected="selected"></option>
					<option value="Afghanistan" >Afghanistan</option>
					<option value="Albania" >Albania</option>
					<option value="Algeria" >Algeria</option>
					<option value="Andorra" >Andorra</option>
					<option value="Antigua and Barbuda" >Antigua and Barbuda</option>
					<option value="Argentina" >Argentina</option>
					<option value="Armenia" >Armenia</option>
					<option value="Australia" >Australia</option>
					<option value="Austria" >Austria</option>
					<option value="Azerbaijan" >Azerbaijan</option>
					<option value="Bahamas" >Bahamas</option>
					<option value="Bahrain" >Bahrain</option>
					<option value="Bangladesh" >Bangladesh</option>
					<option value="Barbados" >Barbados</option>
					<option value="Belarus" >Belarus</option>
					<option value="Belgium" >Belgium</option>
					<option value="Belize" >Belize</option>
					<option value="Benin" >Benin</option>
					<option value="Bhutan" >Bhutan</option>
					<option value="Bolivia" >Bolivia</option>
					<option value="Bosnia and Herzegovina" >Bosnia and Herzegovina</option>
					<option value="Botswana" >Botswana</option>
					<option value="Brazil" >Brazil</option>
					<option value="Brunei" >Brunei</option>
					<option value="Bulgaria" >Bulgaria</option>
					<option value="Burkina Faso" >Burkina Faso</option>
					<option value="Burundi" >Burundi</option>
					<option value="Cambodia" >Cambodia</option>
					<option value="Cameroon" >Cameroon</option>
					<option value="Canada" >Canada</option>
					<option value="Cape Verde" >Cape Verde</option>
					<option value="Central African Republic" >Central African Republic</option>
					<option value="Chad" >Chad</option>
					<option value="Chile" >Chile</option>
					<option value="China" >China</option>
					<option value="Colombia" >Colombia</option>
					<option value="Comoros" >Comoros</option>
					<option value="Congo" >Congo</option>
					<option value="Costa Rica" >Costa Rica</option>
					<option value="Côte d'Ivoire" >Côte d'Ivoire</option>
					<option value="Croatia" >Croatia</option>
					<option value="Cuba" >Cuba</option>
					<option value="Cyprus" >Cyprus</option>
					<option value="Czech Republic" >Czech Republic</option>
					<option value="Denmark" >Denmark</option>
					<option value="Djibouti" >Djibouti</option>
					<option value="Dominica" >Dominica</option>
					<option value="Dominican Republic" >Dominican Republic</option>
					<option value="East Timor" >East Timor</option>
					<option value="Ecuador" >Ecuador</option>
					<option value="Egypt" >Egypt</option>
					<option value="El Salvador" >El Salvador</option>
					<option value="Equatorial Guinea" >Equatorial Guinea</option>
					<option value="Eritrea" >Eritrea</option>
					<option value="Estonia" >Estonia</option>
					<option value="Ethiopia" >Ethiopia</option>
					<option value="Fiji" >Fiji</option>
					<option value="Finland" >Finland</option>
					<option value="France" >France</option>
					<option value="Gabon" >Gabon</option>
					<option value="Gambia" >Gambia</option>
					<option value="Georgia" >Georgia</option>
					<option value="Germany" >Germany</option>
					<option value="Ghana" >Ghana</option>
					<option value="Greece" >Greece</option>
					<option value="Grenada" >Grenada</option>
					<option value="Guatemala" >Guatemala</option>
					<option value="Guinea" >Guinea</option>
					<option value="Guinea-Bissau" >Guinea-Bissau</option>
					<option value="Guyana" >Guyana</option>
					<option value="Haiti" >Haiti</option>
					<option value="Honduras" >Honduras</option>
					<option value="Hong Kong" >Hong Kong</option>
					<option value="Hungary" >Hungary</option>
					<option value="Iceland" >Iceland</option>
					<option value="India" >India</option>
					<option value="Indonesia" >Indonesia</option>
					<option value="Iran" >Iran</option>
					<option value="Iraq" >Iraq</option>
					<option value="Ireland" >Ireland</option>
					<option value="Israel" >Israel</option>
					<option value="Italy" >Italy</option>
					<option value="Jamaica" >Jamaica</option>
					<option value="Japan" >Japan</option>
					<option value="Jordan" >Jordan</option>
					<option value="Kazakhstan" >Kazakhstan</option>
					<option value="Kenya" >Kenya</option>
					<option value="Kiribati" >Kiribati</option>
					<option value="North Korea" >North Korea</option>
					<option value="South Korea" >South Korea</option>
					<option value="Kuwait" >Kuwait</option>
					<option value="Kyrgyzstan" >Kyrgyzstan</option>
					<option value="Laos" >Laos</option>
					<option value="Latvia" >Latvia</option>
					<option value="Lebanon" >Lebanon</option>
					<option value="Lesotho" >Lesotho</option>
					<option value="Liberia" >Liberia</option>
					<option value="Libya" >Libya</option>
					<option value="Liechtenstein" >Liechtenstein</option>
					<option value="Lithuania" >Lithuania</option>
					<option value="Luxembourg" >Luxembourg</option>
					<option value="Macedonia" >Macedonia</option>
					<option value="Madagascar" >Madagascar</option>
					<option value="Malawi" >Malawi</option>
					<option value="Malaysia" >Malaysia</option>
					<option value="Maldives" >Maldives</option>
					<option value="Mali" >Mali</option>
					<option value="Malta" >Malta</option>
					<option value="Marshall Islands" >Marshall Islands</option>
					<option value="Mauritania" >Mauritania</option>
					<option value="Mauritius" >Mauritius</option>
					<option value="Mexico" >Mexico</option>
					<option value="Micronesia" >Micronesia</option>
					<option value="Moldova" >Moldova</option>
					<option value="Monaco" >Monaco</option>
					<option value="Mongolia" >Mongolia</option>
					<option value="Montenegro" >Montenegro</option>
					<option value="Morocco" >Morocco</option>
					<option value="Mozambique" >Mozambique</option>
					<option value="Myanmar" >Myanmar</option>
					<option value="Namibia" >Namibia</option>
					<option value="Nauru" >Nauru</option>
					<option value="Nepal" >Nepal</option>
					<option value="Netherlands" >Netherlands</option>
					<option value="New Zealand" >New Zealand</option>
					<option value="Nicaragua" >Nicaragua</option>
					<option value="Niger" >Niger</option>
					<option value="Nigeria" >Nigeria</option>
					<option value="Norway" >Norway</option>
					<option value="Oman" >Oman</option>
					<option value="Pakistan" >Pakistan</option>
					<option value="Palau" >Palau</option>
					<option value="Panama" >Panama</option>
					<option value="Papua New Guinea" >Papua New Guinea</option>
					<option value="Paraguay" >Paraguay</option>
					<option value="Peru" >Peru</option>
					<option value="Philippines" >Philippines</option>
					<option value="Poland" >Poland</option>
					<option value="Portugal" >Portugal</option>
					<option value="Puerto Rico" >Puerto Rico</option>
					<option value="Qatar" >Qatar</option>
					<option value="Romania" >Romania</option>
					<option value="Russia" >Russia</option>
					<option value="Rwanda" >Rwanda</option>
					<option value="Saint Kitts and Nevis" >Saint Kitts and Nevis</option>
					<option value="Saint Lucia" >Saint Lucia</option>
					<option value="Saint Vincent and the Grenadines" >Saint Vincent and the Grenadines</option>
					<option value="Samoa" >Samoa</option>
					<option value="San Marino" >San Marino</option>
					<option value="Sao Tome and Principe" >Sao Tome and Principe</option>
					<option value="Saudi Arabia" >Saudi Arabia</option>
					<option value="Senegal" >Senegal</option>
					<option value="Serbia and Montenegro" >Serbia and Montenegro</option>
					<option value="Seychelles" >Seychelles</option>
					<option value="Sierra Leone" >Sierra Leone</option>
					<option value="Singapore" >Singapore</option>
					<option value="Slovakia" >Slovakia</option>
					<option value="Slovenia" >Slovenia</option>
					<option value="Solomon Islands" >Solomon Islands</option>
					<option value="Somalia" >Somalia</option>
					<option value="South Africa" >South Africa</option>
					<option value="Spain" >Spain</option>
					<option value="Sri Lanka" >Sri Lanka</option>
					<option value="Sudan" >Sudan</option>
					<option value="Suriname" >Suriname</option>
					<option value="Swaziland" >Swaziland</option>
					<option value="Sweden" >Sweden</option>
					<option value="Switzerland" >Switzerland</option>
					<option value="Syria" >Syria</option>
					<option value="Taiwan" >Taiwan</option>
					<option value="Tajikistan" >Tajikistan</option>
					<option value="Tanzania" >Tanzania</option>
					<option value="Thailand" >Thailand</option>
					<option value="Togo" >Togo</option>
					<option value="Tonga" >Tonga</option>
					<option value="Trinidad and Tobago" >Trinidad and Tobago</option>
					<option value="Tunisia" >Tunisia</option>
					<option value="Turkey" >Turkey</option>
					<option value="Turkmenistan" >Turkmenistan</option>
					<option value="Tuvalu" >Tuvalu</option>
					<option value="Uganda" >Uganda</option>
					<option value="Ukraine" >Ukraine</option>
					<option value="United Arab Emirates" >United Arab Emirates</option>
					<option value="United Kingdom" selected="selected">United Kingdom</option>
					<option value="United States" >United States</option>
					<option value="Uruguay" >Uruguay</option>
					<option value="Uzbekistan" >Uzbekistan</option>
					<option value="Vanuatu" >Vanuatu</option>
					<option value="Vatican City" >Vatican City</option>
					<option value="Venezuela" >Venezuela</option>
					<option value="Vietnam" >Vietnam</option>
					<option value="Yemen" >Yemen</option>
					<option value="Zambia" >Zambia</option>
					<option value="Zimbabwe" >Zimbabwe</option>
			</select>

				<input type="submit" value="Filter by Country">
			
			</form>

			





			</div>
			</div>
			

			<?php

			}

			?>

			

			<script>
			$('#arrivaltoggle').click(function() {
			  $('#arrival').slideToggle('slow', function() {
			    // Animation complete.
			  });
			});
			</script>

			<div>
			
				<?= $output ?>
				
  			</div>
			
			</div><!-- .inner-container -->
		</div><!-- #container -->
		
    </body>
</html>