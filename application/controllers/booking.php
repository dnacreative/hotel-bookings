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
			'language'		=>	$_POST['lan'],
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
		$this->_sendmail($data,'hotel@biniarroca.com');

		// Load thankyou message

		// Load language strings
		$this->lang->is_loaded = array();
		$this->lang->language = array();
		$this->lang->load('form', $data['language']);
		$thanks=$this->lang->line('thanksform');
		$data = array('thanks' => $thanks);
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
		 	$crud->change_field_type('created_at', 'hidden');
		 	$crud->change_field_type('restaurant', 'text');
		 	$crud->change_field_type('comments', 'text');
		 	$crud->order_by('created_at','desc');
		    $output = $crud->render();
		 
		    $this->_example_output($output);
		
		
		} else {
			// else send to login page
			redirect('/auth/login');
		}
		
	}

	function _example_output($output = null)
 
    {
        $this->load->view('template',$output);    
    }

    function _sendmail($data,$email){

    	// Load email libs
    	$this->load->library('email');


		// Clear example data from restaurant if present
		if($data['restaurant']=="Example: 19/08/2014 - 20:00"){$data['restaurant']="";}

		//=======================================
		// Send copy to hotel

		$message=$this->_buildmail($data,'english',0); // Message for hotel
		$this->email->from($data['email'], $data['name'] . " " . $data['surname']);
		$this->email->to($email);
		$this->email->subject('Biniarroca Booking ' . $data['code'] );
		$this->email->message($message);	
		$this->email->send();





		//=======================================
		// Send copy to client


		$this->email->clear();
		$message_client=$this->_buildmail($data,$data['language'],1); // Message for client
		$this->email->from('hotel@biniarroca.com', 'Hotel Biniarroca');
		$this->email->to($data['email']);
		$this->email->subject('Biniarroca Booking ' . $data['code']);
		$this->email->message($message_client);	
		$this->email->send();

		//echo $this->email->print_debugger();
		//echo $data['language'];
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

	function _buildmail($data,$language,$isclient){

		// Load language strings
		$this->lang->is_loaded = array();
		$this->lang->language = array();
		$this->lang->load('form', $language);

		

		// Build email message
		$message="


		" . $this->lang->line('bookingcode') . ": " . $data['code'] . "
		

		[" . $this->lang->line('personalinfo') . "]

		" . $this->lang->line('name') . " : " . $data['name'] . " " . $data['surname'] . "
		" . $this->lang->line('passport') . ": " . $data['passport'] . "
		" . $this->lang->line('email') . ": " . $data['email'] . "
		" . $this->lang->line('phone') . ": " . $data['phone'] . "
		" . $this->lang->line('address') . ":
		" . $data['street_addr_1'] . "
		" . $data['street_addr_2'] . "
		" . $data['city'] . "
		" . $data['state'] . "
		" . $data['zipcode'] . "
		" . $data['country'] . "

		======================================

		[" . $this->lang->line('bookindtls') . "]

		" . $this->lang->line('arrival') . ": " . $data['arrival'] . "
		" . $this->lang->line('flightno') . ": " . $data['arrival_flight'] . "

		" . $this->lang->line('departure') . ": " . $data['departure'] . "
		" . $this->lang->line('flightno') . ": " . $data['departure_flight'] . "

		" . $this->lang->line('persons') . ": " . $data['persons'] . "
		" . $this->lang->line('suites') . ": " . $data['suites'] . "
		" . $this->lang->line('doubles') . ": " . $data['doubles'] . "
		" . $this->lang->line('singles') . ": " . $data['singles'] . "

		" . $this->lang->line('restaurant') . ":
		" . $data['restaurant'] . "

		" . $this->lang->line('comments') . ":
		" . $data['comments'] . "

		======================================

		[" . $this->lang->line('cc') . "]

		" . $this->lang->line('cc_type') . ": " . $data['cc_type'] . "
		" . $this->lang->line('cc_number') . ": " . $data['cc_number'] . "
		" . $this->lang->line('cc_holder') . ": " . $data['cc_name'] . " " . $data['cc_surname'] . "
		" . $this->lang->line('cc_expiry') . ": " . $data['cc_expiry_mm'] . "/" . $data['cc_expiry_yy'] . "

		======================================

		Biniarroca Country House Hotel, Camí Vell 57, Sant Lluís, Menorca 07710
		email hotel@biniarroca.com
		Tel.: (+34) 971 150 059
		Fax: (+34) 971 151 250
		Mobile: (+34) 619 460 942.
		© Biniarroca Hotel
		";

		if($isclient) $message=$this->lang->line('thanks').$message;

		return $message;
	}



    

}

?>