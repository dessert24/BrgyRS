<?php

	class Admin_model extends CI_Model
	{

		public function __construct()
		{
			parent::__construct();
		}

	


//**************************************Barngay Clearance*************************************************
		public function getProducts()
		{
			return $this->db->select('*')->from('barangay_clearance')->get()->result();
		}

			public function getBarangay_clearance_search($name)
		{
			return $this->db->query("SELECT * FROM barangay_clearance WHERE name LIKE '%".$name."%'")->result();
		}

		public function getBrgyClearanceDetails($id)
		{
			return $this->db->select('*')->from('barangay_clearance')->where('id' , $id)->get()->result();
		}


		public function deleteProduct($id)
		{
			$this->db->query('DELETE FROM barangay_clearance WHERE id = '.$id.'');
		}

		public function BCUpdate($id , $data)
		{
			if(empty($data['result']))
			{
				$details = array(
					'name' => $data['name'],
					'age' => $data['age'],
					'sex' => $data['sex'],
					'civil_status' => $data['civil_status'],
					'pob' => $data['pob'],
					'residence' => $data['residence'],
					'purpose' => $data['purpose'],
				);

				$this->db->where('id' , $id);
				$this->db->update('barangay_clearance' , $details);
			}
			else
			{
				$details = array(
					'name' => $data['result']['name'],
					'age' => $data['result']['age'],
					'sex' => $data['result']['sex'],
					'civil_status' => $data['result']['civil_status'],
					'pob' => $data['result']['pob'],
					'residence' => $data['result']['residence'],
					'purpose' => $data['result']['purpose'],
					'image' => $data['image']
				);

				$this->db->where('id' , $id);
				$this->db->update('barangay_clearance' , $details);
			}
		}
		
//**************************************Barngay Clearance*************************************************

//**************************************Barngay Permit*************************************************


		public function getbrgypermit()
		{
			return $this->db->select('*')->from('brgy_permit')->get()->result();
		}

			public function getBarangay_permit_search($name)
		{
			return $this->db->query("SELECT * FROM brgy_permit WHERE name LIKE '%".$name."%'")->result();
		}


		public function deleteBrgyPermit($id)
		{
			$this->db->query('DELETE FROM brgy_permit WHERE id = '.$id.'');
		}


//***************************************Barngay Permit*************************************************

//**************************************Business Clearance*************************************************
		public function getbusinessClearance()
		{
			return $this->db->select('*')->from('business_clearance')->get()->result();
		}

		public function getBusiness_clearance_search($name)
		{
			return $this->db->query("SELECT * FROM business_clearance WHERE name LIKE '%".$name."%'")->result();
		}

		public function deleteBusinessClearance($id)
		{
			$this->db->query('DELETE FROM business_clearance WHERE id = '.$id.'');
		}

//**************************************Business Clearance*************************************************

//**************************************Complaints*************************************************
	public function getcomplaints()
		{
			return $this->db->select('*')->from('complaints')->get()->result();
		}
	public function getComplaints_search($id)
		{
			return $this->db->query("SELECT * FROM complaints WHERE id LIKE '%".$id."%'")->result();
		}

	public function deleteComplaints($id)
		{
			$this->db->query('DELETE FROM complaints WHERE id = '.$id.'');
		}	
//**************************************Complaints*************************************************


// Get Users
		public function getAdminUsers()
		{
			return $this->db->query('SELECT * FROM accounts WHERE Account_ID  ')->result();
		}


			public function getUsers()
		{
			return $this->db->query('SELECT * FROM customers_auth WHERE uid  ')->result();
		}

		 public function getSearchAdminUsers($name)
		 {
			return $this->db->query("SELECT * FROM Accounts WHERE Firstname LIKE '%".$name."%' OR Lastname LIKE '%".$name."%' AND Account_ID > 2015101001")->result();
		 }

		  public function getSearchUsers($name)
		 {
			return $this->db->query("SELECT * FROM customers_auth WHERE name LIKE '%".$name."%' ")->result();
		 }

// Get Users

		


	// USER INFO
		
		public function getAccountDetails($accountID)
		{
			return $this->db->select('*')->from('Accounts')->where('Account_ID' , $accountID)->get()->result();
		}

		public function newAccount($data)
		{

			$maxID = $this->getMaxID() + 1;

			if($maxID == 1)
				$maxID = 2015101001;

			$details = array(
				'Account_ID' => $maxID,
				'Firstname' => $data['result']['firstName'],
				'Middlename' => $data['result']['middleName'],
				'Lastname' => $data['result']['lastName'],
				'Gender' => $data['result']['gender'],
				'Email' => $data['result']['emailAdd'],
				'Contact_number' => $data['result']['contactNumber'],
				'Address' => $data['result']['homeAdd'],
				'Image' => $data['fileName'],
				'Password' => hash('sha512' , md5($data['result']['password'])),
				'Type' => $data['result']['type']
			);

			$this->db->insert('Accounts' , $details);
		}

		public function getMaxID()
		{
			$query = $this->db->query("SELECT max(Account_ID) as maxID FROM Accounts");

			foreach($query->result_array() as $row)
				$maxID = $row['maxID'];
			return $maxID;
		}

		public function updateAccount($data , $accountID)
		{
			if(empty($data['result']))
			{
				$details = array(
					'Firstname' => $data['firstName'],
					'Middlename' => $data['middleName'],
					'Lastname' => $data['lastName'],
					'Gender' => $data['gender'],
					'Email' => $data['emailAdd'],
					'Contact_number' => $data['contactNumber'],
					'Address' => $data['homeAdd']
				);

				$this->db->where('Account_ID' , $accountID);
				$this->db->update('Accounts' , $details);
			}
			else
			{
				$details = array(
					'Firstname' => $data['result']['firstName'],
					'Middlename' => $data['result']['middleName'],
					'Lastname' => $data['result']['lastName'],
					'Gender' => $data['result']['gender'],
					'Email' => $data['result']['emailAdd'],
					'Contact_number' => $data['result']['contactNumber'],
					'Address' => $data['result']['homeAdd'],
					'Image' => $data['fileName']
				);

				$this->db->where('Account_ID' , $accountID);
				$this->db->update('Accounts' , $details);
			}
		}

		public function updateUserAccount($data , $accountID)
		{
			if(empty($data['result']))
			{
				$details = array(
					'Firstname' => $data['firstName'],
					'Middlename' => $data['middleName'],
					'Lastname' => $data['lastName'],
					'Gender' => $data['gender'],
					'Email' => $data['emailAdd'],
					'Contact_number' => $data['contactNumber'],
					'Address' => $data['homeAdd'],
					'Type' => $data['type']
				);

				$this->db->where('Account_ID' , $accountID);
				$this->db->update('Accounts' , $details);
			}
			else
			{
				$details = array(
					'Firstname' => $data['result']['firstName'],
					'Middlename' => $data['result']['middleName'],
					'Lastname' => $data['result']['lastName'],
					'Gender' => $data['result']['gender'],
					'Email' => $data['result']['emailAdd'],
					'Contact_number' => $data['result']['contactNumber'],
					'Address' => $data['result']['homeAdd'],
					'Image' => $data['fileName'],
					'Type' => $data['result']['type']
				);

				$this->db->where('Account_ID' , $accountID);
				$this->db->update('Accounts' , $details);
			}
		}

		public function checkOldPassword($data , $accountID)
		{
			return count($this->db->select('Password')->from('Accounts')->where('Password' , hash('sha512' , md5($data['oldPass'])))->get()->result());
		}

		public function updatePassword($data , $accountID)
		{
			$this->db->where('Password' , hash('sha512' , md5($data['newPass'])));
			$this->db->update('Accounts' , array('Password' => hash('sha512' , md5($data['newPass']))));
		}

		public function updateAccountStatus($accountID , $status)
		{
			$updateStatus = $this->db->query("CALL Update_accountStatus($accountID , '".$status."')");
			
			if($updateStatus)
				return true;
		}

		

		public function loggedOn($accountID)
		{
			$this->db->insert('Sessions' , array('Account_ID' => $accountID));
		}

	
		

	}