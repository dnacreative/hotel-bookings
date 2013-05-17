<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class View {

    public function gen($row)
    {

    	if($row['mailing']) { $active="checked"; $inactive=""; }
    	else { $active=""; $inactive="checked"; }

    	$html = "<div class='ui-widget-content ui-corner-all datatables'>
				<h3 class='ui-accordion-header ui-helper-reset ui-state-default form-title'>
					<div class='floatL form-title-left'>
						<a href='#'>View Record</a>
					</div> 
					<div class='floatR'>
						<a href='admin' onclick='javascript: return goToList()' class='gotoListButton ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary' role='button'><span class='ui-button-icon-primary ui-icon ui-icon-triangle-1-w'></span><span class='ui-button-text'>
							Back to list			</span></a>
					</div>
					
					<div class='clear'></div>
				</h3>
			<div class='form-content form-div'>
				<form action='' method='post' id='crudForm' autocomplete='off' enctype='multipart/form-data' accept-charset='utf-8'>		<div>
								<div class='form-field-box odd' id='code_field_box'>
							<div class='form-display-as-box' id='code_display_as_box'>
								Code :
							</div>
							<div class='form-input-box' id='code_input_box'>
								<input id='field-code' name='code' type='text' value='".$row['code']."' disabled='disabled' maxlength='10' >				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box even' id='language_field_box'>
							<div class='form-display-as-box' id='language_display_as_box'>
								Language :
							</div>
							<div class='form-input-box' id='language_input_box'>
								<input id='field-language' name='language' type='text' value='".$row['language']."' disabled='disabled' maxlength='10'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box odd' id='name_field_box'>
							<div class='form-display-as-box' id='name_display_as_box'>
								Name :
							</div>
							<div class='form-input-box' id='name_input_box'>
								<input id='field-name' name='name' type='text' value='".$row['name']."' disabled='disabled' maxlength='50'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box even' id='surname_field_box'>
							<div class='form-display-as-box' id='surname_display_as_box'>
								Surname :
							</div>
							<div class='form-input-box' id='surname_input_box'>
								<input id='field-surname' name='surname' type='text' value='".$row['surname']."' disabled='disabled' maxlength='50'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box odd' id='passport_field_box'>
							<div class='form-display-as-box' id='passport_display_as_box'>
								Passport :
							</div>
							<div class='form-input-box' id='passport_input_box'>
								<input id='field-passport' name='passport' type='text' value='".$row['passport']."' disabled='disabled' maxlength='50'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box even' id='email_field_box'>
							<div class='form-display-as-box' id='email_display_as_box'>
								Email :
							</div>
							<div class='form-input-box' id='email_input_box'>
								<input id='field-email' name='email' type='text' value='".$row['email']."' disabled='disabled' maxlength='50'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box odd' id='phone_field_box'>
							<div class='form-display-as-box' id='phone_display_as_box'>
								Phone :
							</div>
							<div class='form-input-box' id='phone_input_box'>
								<input id='field-phone' name='phone' type='text' value='".$row['phone']."' disabled='disabled' maxlength='20'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box even' id='street_addr_1_field_box'>
							<div class='form-display-as-box' id='street_addr_1_display_as_box'>
								Street addr 1 :
							</div>
							<div class='form-input-box' id='street_addr_1_input_box'>
								<input id='field-street_addr_1' name='street_addr_1' type='text' value='".$row['street_addr_1']."' disabled='disabled' maxlength='100'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box odd' id='street_addr_2_field_box'>
							<div class='form-display-as-box' id='street_addr_2_display_as_box'>
								Street addr 2 :
							</div>
							<div class='form-input-box' id='street_addr_2_input_box'>
								<input id='field-street_addr_2' name='street_addr_2' type='text' value='".$row['street_addr_2']."' disabled='disabled' maxlength='100'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box even' id='city_field_box'>
							<div class='form-display-as-box' id='city_display_as_box'>
								City :
							</div>
							<div class='form-input-box' id='city_input_box'>
								<input id='field-city' name='city' type='text' value='".$row['city']."' disabled='disabled' maxlength='50'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box odd' id='state_field_box'>
							<div class='form-display-as-box' id='state_display_as_box'>
								State :
							</div>
							<div class='form-input-box' id='state_input_box'>
								<input id='field-state' name='state' type='text' value='".$row['state']."' disabled='disabled' maxlength='50'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box even' id='zipcode_field_box'>
							<div class='form-display-as-box' id='zipcode_display_as_box'>
								Zipcode :
							</div>
							<div class='form-input-box' id='zipcode_input_box'>
								<input id='field-zipcode' name='zipcode' type='text' value='".$row['zipcode']."' disabled='disabled' maxlength='10'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box odd' id='country_field_box'>
							<div class='form-display-as-box' id='country_display_as_box'>
								Country :
							</div>
							<div class='form-input-box' id='country_input_box'>
								<input id='field-country' name='country' type='text' value='".$row['country']."' disabled='disabled' maxlength='50'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box even' id='arrival_field_box'>
							<div class='form-display-as-box' id='arrival_display_as_box'>
								Arrival :
							</div>
							<div class='form-input-box' id='arrival_input_box'>
								<input id='field-arrival' name='arrival' type='text' value='".$row['arrival']."' disabled='disabled' maxlength='19' class='datetime-input hasDatepicker'> 
					<a class='datetime-input-clear ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only' tabindex='-1' role='button'><span class='ui-button-text'>Clear</span></a>
					(dd/mm/yyyy) hh:mm:ss				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box odd' id='arrival_flight_field_box'>
							<div class='form-display-as-box' id='arrival_flight_display_as_box'>
								Arrival flight :
							</div>
							<div class='form-input-box' id='arrival_flight_input_box'>
								<input id='field-arrival_flight' name='arrival_flight' type='text' value='".$row['arrival_flight']."' disabled='disabled' maxlength='10'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box even' id='departure_field_box'>
							<div class='form-display-as-box' id='departure_display_as_box'>
								Departure :
							</div>
							<div class='form-input-box' id='departure_input_box'>
								<input id='field-departure' name='departure' type='text' value='".$row['departure']."' disabled='disabled' maxlength='19' class='datetime-input hasDatepicker'> 
					<a class='datetime-input-clear ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only' tabindex='-1' role='button'><span class='ui-button-text'>Clear</span></a>
					(dd/mm/yyyy) hh:mm:ss				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box odd' id='departure_flight_field_box'>
							<div class='form-display-as-box' id='departure_flight_display_as_box'>
								Departure flight :
							</div>
							<div class='form-input-box' id='departure_flight_input_box'>
								<input id='field-departure_flight' name='departure_flight' type='text' value='".$row['departure_flight']."' disabled='disabled' maxlength='10'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box even' id='persons_field_box'>
							<div class='form-display-as-box' id='persons_display_as_box'>
								Persons :
							</div>
							<div class='form-input-box' id='persons_input_box'>
								<input id='field-persons' name='persons' type='text' value='".$row['persons']."' disabled='disabled' class='numeric' maxlength='10'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box odd' id='suites_field_box'>
							<div class='form-display-as-box' id='suites_display_as_box'>
								Suites :
							</div>
							<div class='form-input-box' id='suites_input_box'>
								<input id='field-suites' name='suites' type='text' value='".$row['suites']."' disabled='disabled' class='numeric' maxlength='10'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box even' id='doubles_field_box'>
							<div class='form-display-as-box' id='doubles_display_as_box'>
								Doubles :
							</div>
							<div class='form-input-box' id='doubles_input_box'>
								<input id='field-doubles' name='doubles' type='text' value='".$row['doubles']."' disabled='disabled' class='numeric' maxlength='10'>				</div>
							<div class='clear'></div>	
						</div>
								
								<div class='form-field-box odd' id='singles_field_box'>
							<div class='form-display-as-box' id='singles_display_as_box'>
								Singles :
							</div>
							<div class='form-input-box' id='singles_input_box'>
								<input id='field-singles' name='singles' type='text' value='".$row['singles']."' disabled='disabled' class='numeric' maxlength='10'>				</div>
							<div class='clear'></div>	
						</div>

						<div class='form-field-box even' id='restaurant_field_box'>
							<div class='form-display-as-box' id='restaurant_display_as_box'>
								Roomtype :
							</div>
							<div class='form-input-box' id='restaurant_input_box'>
								<input id='field-singles' name='singles' type='text' value='".$row['roomtype']."' disabled='disabled' class='numeric' maxlength='10'>				</div>
							<div class='clear'></div>	
						</div>

								<div class='form-field-box even' id='restaurant_field_box'>
							<div class='form-display-as-box' id='restaurant_display_as_box'>
								Restaurant :
							</div>
							<div class='form-input-box' id='restaurant_input_box'>
								<textarea id='field-restaurant' name='restaurant' class='texteditor' disabled='disabled'>".$row['restaurant']."</textarea>				</div>
							<div class='clear'></div>	
						</div>


								<div class='form-field-box odd' id='comments_field_box'>
							<div class='form-display-as-box' id='comments_display_as_box'>
								Comments :
							</div>
							<div class='form-input-box' id='comments_input_box'>
								<textarea id='field-comments' name='comments' class='texteditor' disabled='disabled'>".$row['comments']."</textarea>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box even' id='cc_type_field_box'>
							<div class='form-display-as-box' id='cc_type_display_as_box'>
								Cc type :
							</div>
							<div class='form-input-box' id='cc_type_input_box'>
								<input id='field-cc_type' name='cc_type' type='text'  value='".$row['cc_type']."' disabled='disabled' maxlength='10'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box odd' id='cc_number_field_box'>
							<div class='form-display-as-box' id='cc_number_display_as_box'>
								Cc number :
							</div>
							<div class='form-input-box' id='cc_number_input_box'>
								<input id='field-cc_number' name='cc_number' type='text'  value='".$row['cc_number']."' disabled='disabled' maxlength='20'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box even' id='cc_name_field_box'>
							<div class='form-display-as-box' id='cc_name_display_as_box'>
								Cc name :
							</div>
							<div class='form-input-box' id='cc_name_input_box'>
								<input id='field-cc_name' name='cc_name' type='text'  value='".$row['cc_name']."' disabled='disabled' maxlength='50'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box odd' id='cc_surname_field_box'>
							<div class='form-display-as-box' id='cc_surname_display_as_box'>
								Cc surname :
							</div>
							<div class='form-input-box' id='cc_surname_input_box'>
								<input id='field-cc_surname' name='cc_surname' type='text'  value='".$row['cc_surname']."' disabled='disabled' maxlength='50'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box even' id='cc_expiry_mm_field_box'>
							<div class='form-display-as-box' id='cc_expiry_mm_display_as_box'>
								Cc expiry mm :
							</div>
							<div class='form-input-box' id='cc_expiry_mm_input_box'>
								<input id='field-cc_expiry_mm' name='cc_expiry_mm' type='text'  value='".$row['cc_expiry_mm']."' disabled='disabled' maxlength='5'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box odd' id='cc_expiry_yy_field_box'>
							<div class='form-display-as-box' id='cc_expiry_yy_display_as_box'>
								Cc expiry yy :
							</div>
							<div class='form-input-box' id='cc_expiry_yy_input_box'>
								<input id='field-cc_expiry_yy' name='cc_expiry_yy' type='text'  value='".$row['cc_expiry_yy']."' disabled='disabled' maxlength='5'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box even' id='room_field_box'>
							<div class='form-display-as-box' id='room_display_as_box'>
								Room :
							</div>
							<div class='form-input-box' id='room_input_box'>
								<input id='field-room' name='room' type='text'  value='".$row['room']."' disabled='disabled' maxlength='20'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box odd' id='mailing_field_box'>
							<div class='form-display-as-box' id='mailing_display_as_box'>
								Mailing :
							</div>
							<div class='form-input-box' id='mailing_input_box'>
								<label><input id='field-mailing-true' type='radio' name='mailing' value='1' disabled='disabled' ".$active."> active</label> <label><input id='field-mailing-false' type='radio' name='mailing' disabled='disabled' value='0' ".$inactive."> inactive</label>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box even' id='diet_field_box'>
							<div class='form-display-as-box' id='diet_display_as_box'>
								Dietary prefferences :
							</div>
							<div class='form-input-box' id='diet_input_box'>
								<textarea id='field-diet' name='diet' class='texteditor' disabled='disabled'>".$row['diet']."</textarea>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box odd' id='priv_comments_field_box'>
							<div class='form-display-as-box' id='priv_comments_display_as_box'>
								Private comments :
							</div>
							<div class='form-input-box' id='priv_comments_input_box'>
								<textarea id='field-priv_comments' name='priv_comments' class='texteditor' disabled='disabled'>".$row['priv_comments']."</textarea>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box even' id='deposit_field_box'>
							<div class='form-display-as-box' id='deposit_display_as_box'>
								Deposit :
							</div>
							<div class='form-input-box' id='deposit_input_box'>
								<input id='field-deposit' name='deposit' type='text' value='".$row['deposit']."' disabled='disabled'>				</div>
							<div class='clear'></div>	
						</div>
								<div class='form-field-box odd' id='rate_field_box'>
							<div class='form-display-as-box' id='rate_display_as_box'>
								Rate :
							</div>
							<div class='form-input-box' id='rate_input_box'>
								<input id='field-rate' name='rate' type='text' value='".$row['rate']."' disabled='disabled'>				</div>
							<div class='clear'></div>	
						</div>
							<div class='form-field-box odd' id='priv_comments_field_box'>
							<div class='form-display-as-box' id='priv_comments_display_as_box'>
								How did you find us :
							</div>
							<div class='form-input-box' id='priv_comments_input_box'>
								<textarea id='field-priv_comments' name='findus' class='texteditor' disabled='disabled'>".$row['findus']."</textarea>				</div>
							<div class='clear'></div>	
						</div>
								

						<div class='line-1px'></div>
						<div id='report-error' class='report-div error'></div>
						<div id='report-success' class='report-div success'></div>							
					</div>	
					<div class='buttons-box'>
						<div class='form-button-box'>
							<a href='admin' onclick='javascript: return goToList()' class='gotoListButton ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary' role='button'><span class='ui-button-icon-primary ui-icon ui-icon-triangle-1-w'></span><span class='ui-button-text'>
							Back to list			</span></a>
						</div>
										
					</div>
				</form>	
			</div>
			</div>";

			return($html);
    }
}

?>