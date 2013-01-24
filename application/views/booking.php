<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Biniarroca Booking Form</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="calendar.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="jquery.validate.js"></script>

<style type="text/css">
em { font-weight: bold; padding-right: 1em; vertical-align: top; color:red; }
</style>
  <script>
  $(document).ready(function(){
    $("#myform").validate({
		rules: {
			
			agree: "required"
		},
		messages: {
			agree: "X"
		}
	});
  });


  
  </script>

</head>


<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>.</a></h1>
		<form id="myform" class="appnitro" method="post" action="index.php/booking/save">
		<input type="hidden" name="lan" id="lan" value="<?php if( isset($_GET['lan']) ) { echo $_GET['lan']; } else { echo "en";  }  ?>" />
		<div class="form_description">
			<h2><?= $this->lang->line('title'); ?></h2>
			<p><?= $this->lang->line('description'); ?></p>
		</div>


		<ul>

		<li>
		<label class="description" for="name"><em>*</em><?= $this->lang->line('name'); ?></label>
		<div>
			<span>
			<input id="name" name= "name" class="element text required" minlength="2" maxlength="255" size="8" value=""/>
			<label><?= $this->lang->line('first'); ?></label>
		</span>
		<span>
			<input id="surname" name= "surname" class="element text required" minlength="2" maxlength="255" size="14" value=""/>
			<label><?= $this->lang->line('last'); ?></label>
		</span> 
		</div> 
		</li>	
			
		<li>
		<label class="description" for="passport"><em>*</em><?= $this->lang->line('passport'); ?></label>
		<div>
			<input id="passport" name="passport" class="element text medium required" type="text" maxlength="255" value=""  minlength="2"  maxlength="20"/> 
		</div> 
		</li>		

		<li id="li_6" >
		<label class="description" for="email"><em>*</em><?= $this->lang->line('email'); ?></label>
		<div>
			<input id="email" name="email" class="element text medium required email" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		

		<li id="li_3" >
		<label class="description" for="phone"><em>*</em><?= $this->lang->line('phone'); ?></label>
		<div>
			<input id="phone" name="phone" class="element text medium digits required" type="text" maxlength="255" value="" minlength="6"  maxlength="20"/> 
		</div> 
		</li>		





		<li id="li_2" >
		<label class="description" for="element_2"><?= $this->lang->line('address'); ?></label>
		
		<div>
			<input id="street_addr_1" name="street_addr_1" class="element text large required" minlength="2"  maxlength="30" value="" type="text">
			<label for="street_addr_1"><em>*</em><?= $this->lang->line('streetad1'); ?></label>
		</div>
	
		<div>
			<input id="street_addr_2" name="street_addr_2" class="element text large" value="" type="text">
			<label for="street_addr_2"><?= $this->lang->line('streetad2'); ?></label>
		</div>
	
		<div class="left">
			<input id="city" name="city" class="element text medium required" value="" type="text">
			<label for="city"><em>*</em><?= $this->lang->line('city'); ?></label>
		</div>
	
		<div class="right">
			<input id="state" name="state" class="element text medium required" value="" type="text">
			<label for="state"><em>*</em><?= $this->lang->line('state'); ?></label>
		</div>
	
		<div class="left">
			<input id="zipcode" name="zipcode" class="element text medium required" maxlength="15" value="" type="text">
			<label for="zipcode"><em>*</em><?= $this->lang->line('zipcode'); ?></label>
		</div>
	
		<div class="right">
			<select class="element select medium required" id="country" name="country"> 
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
<option value="United Kingdom" >United Kingdom</option>
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
		<label for="country"><em>*</em><?= $this->lang->line('country'); ?></label>
	</div> 
		</li>		




		<li class="section_break">
			<h3><?= $this->lang->line('bookingdtls'); ?></h3>
			<p></p>
		</li>		



		<li id="li_4" >
		<label class="description" for="arrival"><em>*</em><?= $this->lang->line('arrival'); ?></label>
		<span>
			<input id="arrival_1" name="arrival_1" class="element text required digits" size="2" maxlength="2" value="" type="text"> /
			<label for="arrival_1">DD</label>
		</span>
		<span>
			<input id="arrival_2" name="arrival_2" class="element text required digits" size="2" maxlength="2" value="" type="text"> /
			<label for="arrival_2">MM</label>
		</span>
		<span>
	 		<input id="arrival_3" name="arrival_3" class="element text required digits" size="4" maxlength="4" value="" type="text">
			<label for="arrival_3">YYYY</label>
		</span>
	
		<span id="calendar_4">
			<img id="cal_img_4" class="datepicker" src="calendar.gif" alt="Pick a date.">	
		</span>
		
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "arrival_3",
			baseField    : "arrival",
			displayArea  : "calendar_4",
			button		 : "cal_img_4",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectDate
			});
		</script>


			<span>
				<input id="arrival_4" name="arrival_4" class="element text required digits" size="2" maxlength="2" minlength="2" type="text"> : <label for="arrival_4">HH</label>
			</span>

			<span>
				<input id="arrival_5" name="arrival_5" class="element text required digits" size="2" maxlength="2" minlength="2" type="text"><label for="arrival_5">MM</label>
			</span>

		<?= $this->lang->line('flightno'); ?> : <input id="arrival_flight" name="arrival_flight" class="element text" type="text" maxlength="255" value=""  minlength="2"  maxlength="20" size="6"/>
		
		


		


		</li>







		<li id="li_5" >
		<label class="description" for="departure"><em>*</em><?= $this->lang->line('departure'); ?></label>
		<span>
			<input id="departure_1" name="departure_1" class="element text required digits" size="2" maxlength="2" value="" type="text"> /
			<label for="departure_1">DD</label>
		</span>
		<span>
			<input id="departure_2" name="departure_2" class="element text required digits" size="2" maxlength="2" value="" type="text"> /
			<label for="departure_2">MM</label>
		</span>
		<span>
	 		<input id="departure_3" name="departure_3" class="element text required digits" size="4" maxlength="4" value="" type="text">
			<label for="departure_3">YYYY</label>
		</span>
	
		<span id="calendar_5">
			<img id="cal_img_5" class="datepicker" src="calendar.gif" alt="Pick a date.">	
		</span>


		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "departure_3",
			baseField    : "departure",
			displayArea  : "calendar_5",
			button		 : "cal_img_5",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectDate
			});
		</script>

			<span>
				<input id="departure_4" name="departure_4" class="element text required digits" size="2" maxlength="2" minlength="2" type="text"> : <label for="departure_4">HH</label>
			</span>

			<span>
				<input id="departure_5" name="departure_5" class="element text required digits" size="2" maxlength="2" minlength="2" type="text"><label for="departure_5">MM</label>
			</span>
		 
		<?= $this->lang->line('flightno'); ?> : <input id="departure_flight" name="departure_flight" class="element text" type="text" maxlength="255" value=""  minlength="2"  maxlength="20" size="6"/>
		
		 
		</li>		










		<li id="li_8" >
		<label class="description" for="persons"><em>*</em><?= $this->lang->line('persons'); ?></label>
		<div>
		<select class="element select small required" id="persons" name="persons"> 
			<option value="" selected="selected"></option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>
<option value="5" >5</option>
<option value="6" >6</option>
<option value="7" >7</option>
<option value="8" >8</option>
<option value="9" >9</option>
<option value="10" >10</option>

		</select>
		</div> 
		</li>		<li id="li_9" >
		<label class="description" for="suites"><?= $this->lang->line('suites'); ?></label>
		<div>
		<select class="element select small" id="suites" name="suites"> 
			<option value="" selected="selected"></option>
<option value="0" selected>0</option>		
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>

		</select>
		</div> 
		</li>		<li id="li_11" >
		<label class="description" for="doubles"><?= $this->lang->line('doubles'); ?></label>
		<div>
		<select class="element select small" id="doubles" name="doubles"> 
			<option value="" selected="selected"></option>
<option value="0" selected>0</option>	
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>

		</select>
		</div> 
		</li>		<li id="li_10" >
		<label class="description" for="singles"><?= $this->lang->line('singles'); ?></label>
		<div>
		<select class="element select small" id="singles" name="singles"> 
			<option value="" selected="selected"></option>
<option value="0" selected>0</option>
<option value="1" >1</option>
<option value="2" >2</option>
<option value="3" >3</option>
<option value="4" >4</option>

		</select>
		</div> 
		</li>		

		<li id="li_17" >
		<label class="description" for="comments"><?= $this->lang->line('restaurant'); ?></label>
		
		<div>
			<textarea name="restaurant"	class="textarea medium" onFocus="this.value=''; return false;">Example: 19/08/2014 - 20:00</textarea>	
		</div>
		</li>

		<li id="li_18" >
		<label class="description" for="comments"><?= $this->lang->line('comments'); ?></label>
		<div>
			<textarea id="comments" name="comments" class="element textarea medium"></textarea> 
		</div>
		</li>



		<li class="section_break">
			<h3><?= $this->lang->line('cc'); ?><br>
<?= $this->lang->line('cc_desc'); ?></h3>
			<p></p>
		</li>		<li id="li_20" >
		<label class="description" for="cc_type"><em>*</em><?= $this->lang->line('cc_type'); ?></label>
		<div>
		<select class="element select large required" id="cc_type" name="cc_type"> 
			<option value="" selected="selected"></option>
<option value="Visa" >Visa</option>
<option value="MasterCard" >MasterCard</option>

		</select>
		</div> 
		</li>		<li id="li_15" >
		<label class="description" for="cc_number"><em>*</em><?= $this->lang->line('cc_number'); ?></label>
		<div>
			<input id="cc_number" name="cc_number" class="element text large required digits" type="text" size="15" maxlength="15" minlength="15"  maxlength="15" value=""/> 
		</div> 
		</li>		<li id="li_18" >
		<label class="description" for="element_18"><em>*</em><?= $this->lang->line('cc_holder'); ?></label>
		<span>
			<input id="cc_name" name= "cc_name" class="element text required" maxlength="255" size="8" value=""/>
			<label>First</label>
		</span>
		<span>
			<input id="cc_surname" name= "cc_surname" class="element text required" maxlength="255" size="14" value=""/>
			<label>Last</label>
		</span> 
		</li>		<li id="li_16" >
		<label class="description" for="element_16"><em>*</em><?= $this->lang->line('cc_expiry'); ?></label>
		<div>
					<span>
			<input id="cc_expiry_mm" name="cc_expiry_mm" class="element text required digits" size="2" maxlength="2" value="" type="text"> /
			<label for="cc_expiry_mm">MM</label>
		</span>
		<span>
	 		<input id="cc_expiry_yy" name="cc_expiry_yy" class="element text required digits" size="2" maxlength="2" value="" type="text">
			<label for="cc_expiry_yy">YY</label>
		</span>
		</div> 
		</li>

		<li class="section_break"></li>
			
				<li class="buttons">

				<input type="checkbox" checked="yes" class="checkbox" id="mailing" name="mailing" />
				<label class="choice" for="mailing"><?= $this->lang->line('mailing'); ?></label>


				<input type="checkbox" class="checkbox" id="agree" name="agree" />
				<label class="choice" for="agree"><?= $this->lang->line('agreement'); ?></label>

				<br>


			    <div align="center"><input id="saveForm" class="button_text" type="submit" name="submit" value="<?= $this->lang->line('submit'); ?>" /></div>
				
		</li>
			</ul>
		</form>	

	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>
