<?php

class Booking extends CI_Controller {

	public function index()
	{
		$data['title'] = "Biniarroca";
		$this->load->view('booking',$data);
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
		    'arrival' 		=>	$_POST['arrival_1'] . "-" . $_POST['arrival_2'] . "-" . $_POST['arrival_3'],
		    'departure' 	=>	$_POST['departure_1'] . "-" . $_POST['departure_2'] . "-" . $_POST['departure_3'],
		    'persons' 		=>	$_POST['persons'],
		    'suites' 		=>	$_POST['suites'],
		    'doubles' 		=>	$_POST['doubles'],
		    'singles' 		=>	$_POST['singles'],
		    'comments' 		=>	$_POST['comments'],
		    'cc_type'		=>	$_POST['cc_type'],
		    'cc_number' 	=>	$_POST['cc_number'],
		    'cc_name' 		=>	$_POST['cc_name'],
		    'cc_surname' 	=>	$_POST['cc_surname'],
		    'cc_expiry_mm'  =>	$_POST['cc_expiry_mm'],
  			'cc_expiry_yy'  =>	$_POST['cc_expiry_yy']
		);
		
		// Save to DB
		$this->db->insert('bookings', $data);

		// Load thankyou message
		$this->load->view('thankyou',$data);

	}

	public function bookings()
	{
	$crud = new grocery_CRUD();
	$crud->set_theme('datatables');
    $crud->set_table('bookings');
    $crud->columns('created_at','name','surname','passport','arrival','departure');
 
    $output = $crud->render();
 
    $this->_example_output($output);

	}

	function _example_output($output = null)
 
    {
        $this->load->view('example.php',$output);    
    }

}

?>