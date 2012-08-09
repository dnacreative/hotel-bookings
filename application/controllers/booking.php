<?php

class Booking extends CI_Controller {

	public function index()
	{
		
		// Get language files (default=english)
		if(isset($_GET['lan'])){
			$this->lang->load('form', $_GET['lan']);
		} else {
			$this->lang->load('form', 'english');
		}
		
		// Load booking form view
		$this->load->view('booking');
	}

	public function save()
	{

		// DB fields <- Form fields
		$data = array(
			'name'			=>	$_POST['name'],
			'surname'		=>	$_POST['surname'],
			'passport'		=>	$_POST['passport'],
  			'email'			=>	$_POST['email'],
  			'phone'			=>	$_POST['phone'],
  			'street_addr_1'	=>	$_POST['street_addr_1'],
		    'street_addr_2'	=>	$_POST['street_addr_2'],
		    'city'			=>	$_POST['city'],
		    'state'			=>	$_POST['state'],
		    'zipcode'		=>	$_POST['zipcode'],
		    'country'		=>	$_POST['country'],
		    'arrival' 		=>	$_POST['arrival_3'] . "/" . $_POST['arrival_2'] . "/" . $_POST['arrival_1'] . " " . $_POST['arrival_4'] . ":" . $_POST['arrival_5'] . ":00",
		    'arrival_flight'=>	$_POST['arrival_flight'],
		    'departure' 	=>	$_POST['departure_3'] . "/" . $_POST['departure_2'] . "/" . $_POST['departure_1']. " " . $_POST['departure_4'] . ":" . $_POST['departure_5'] . ":00",
		    'departure_flight'=>$_POST['departure_flight'],
		    'persons' 		=>	$_POST['persons'],
		    'suites' 		=>	$_POST['suites'],
		    'doubles' 		=>	$_POST['doubles'],
		    'singles' 		=>	$_POST['singles'],
		    'restaurant'	=>	$_POST['restaurant'],
		    'comments' 		=>	$_POST['comments'],
		    'cc_type'		=>	$_POST['cc_type'],
		    'cc_number' 	=>	$_POST['cc_number'],
		    'cc_name' 		=>	$_POST['cc_name'],
		    'cc_surname' 	=>	$_POST['cc_surname'],
		    'cc_expiry_mm'  =>	$_POST['cc_expiry_mm'],
  			'cc_expiry_yy'  =>	$_POST['cc_expiry_yy']
		);

		$data['code']=$this->_gencode($data);
		
		// Save to DB
		$this->db->insert('bookings', $data);

		// Send email to biniarroca and copy to client
		$this->_sendmail($data,'eduardo.wass@est.fib.upc.edu');

		// Load thankyou message
		$this->load->view('thankyou',$data);

	}

	public function admin()
	{

	// Generates admin page

		// Load login libs
		$this->load->library('tank_auth');
		$this->load->helper('url');

		// If logged in, show admin panel
		if( $this->tank_auth->is_logged_in() ) {

			$crud = new grocery_CRUD();
			$crud->set_theme('datatables');
		    $crud->set_table('bookings');
		    $crud->columns('created_at','name','surname','passport','arrival','departure','code');
		 	$crud->order_by('created_at','desc');
		 	$crud->change_field_type('created_at', 'hidden');
		 	$crud->change_field_type('restaurant', 'text');
		 	$crud->change_field_type('comments', 'text');
		    $output = $crud->render();
		 
		    $this->_example_output($output);
		
		} else {
			// send to login page
			redirect('/auth/login');
		}

	}

	function _example_output($output = null)
 
    {
        $this->load->view('template',$output);    
    }

    function _sendmail($data,$email){

    	$this->load->library('email');
		//$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';

		$this->email->initialize($config);

		// Clear example data from restaurant if present
		if($data['restaurant']=="Example: 19/08/2014 - 20:00"){
			$data['restaurant']="";
		}

		// Build email message
		$message="

		BOOKING CODE: " . $data['code'] . "

		[Personal Info]

		Full Name: " . $data['name'] . " " . $data['surname'] . "
		Passport: " . $data['passport'] . "
		Email: " . $data['email'] . "
		Phone: " . $data['phone'] . "
		Address:
		" . $data['street_addr_1'] . "
		" . $data['street_addr_2'] . "
		" . $data['city'] . "
		" . $data['state'] . "
		" . $data['zipcode'] . "
		" . $data['country'] . "

		======================================

		[Booking Info]

		Arrival Date: " . $data['arrival'] . "
		Arrival Flight: " . $data['arrival_flight'] . "

		Departure Date: " . $data['departure'] . "
		Departure Flight: " . $data['departure_flight'] . "

		Number of persons: " . $data['persons'] . "
		Suites: " . $data['suites'] . "
		Doubles: " . $data['doubles'] . "
		Singles: " . $data['singles'] . "

		Restaurant reservations:
		" . $data['restaurant'] . "

		Special requirements:
		" . $data['comments'] . "

		======================================

		[Credit Card]

		Type: " . $data['cc_type'] . "
		Number: " . $data['cc_number'] . "
		Card Holder: " . $data['cc_name'] . " " . $data['cc_surname'] . "
		Expiry Date: " . $data['cc_expiry_mm'] . "/" . $data['cc_expiry_yy'] . "

		";

		$this->email->from($data['email'], $data['name'] . " " . $data['surname']);
		$this->email->to($email);
		$this->email->subject('Biniarroca Booking ' . $data['code'] );
		$this->email->message($message);	
		$this->email->send();

		//echo $this->email->print_debugger();

		//=======================================
		// Send copy to client


		$this->email->clear();

		$message2="Thank you " . $data['name'] . " " . $data['surname'] . ",
We have recived your reservation request and will contact you shortly to confirm your booking. Reservation Department Biniarroca Hotel.

This is the booking information that we have, please contact us if there is any error:
		" . $message;

		$this->email->from('hotel@biniarroca.com', 'Hotel Biniarroca');
		$this->email->to($email);
		$this->email->subject('Biniarroca Booking ' . $data['code'] );
		$this->email->message($message2);	
		$this->email->send();




		//echo $this->email->print_debugger();

	}


	function _gencode($data){

		// Generates booking code
		// format: ab8686ee11
		// a: name 
		// b: surname
		// 8: arrival day (just 1 digit)
		// 6: arrival month (just 1 digit)
		// 8: departure day (just 1 digit)
		// 6: departure month (just 1 digit)
		// ee: email
		// 11: phone

		$code= $data['name'][0]. $data['surname'][0]  . $data['arrival'][8] . $data['arrival'][6] . $data['departure'][8] . $data['departure'][6]  . $data['email'][0] . $data['email'][1] . $data['phone'][0] . $data['phone'][1];	
		return strtoupper($code);

	}



    

}

?>