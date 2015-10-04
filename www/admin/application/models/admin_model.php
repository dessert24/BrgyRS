<?php

	class Admin_model extends CI_Model
	{

		public function __construct()
		{
			parent::__construct();
		}

	// Get data
		public function getAccountDetails($accountID)
		{
			return $this->db->select('*')->from('Accounts')->where('Account_ID' , $accountID)->get()->result();
		}

		public function getProducts()
		{
			return $this->db->select('*')->from('barangay_clearance')->get()->result();
		}

		public function getbusinessClearance()
		{
			return $this->db->select('*')->from('business_clearance')->get()->result();
		}

		public function getbrgypermit()
		{
			return $this->db->select('*')->from('brgy_permit')->get()->result();
		}

		public function getcomplaints()
		{
			return $this->db->select('*')->from('complaints')->get()->result();
		}

		public function getBrgyClearanceDetails($id)
		{
			return $this->db->select('*')->from('barangay_clearance')->where('id' , $id)->get()->result();
		}

		// Get data
// DELETE

		public function deleteBusinessClearance($id)
		{
			$this->db->query('DELETE FROM business_clearance WHERE id = '.$id.'');
		}


		public function deleteProduct($id)
		{
			$this->db->query('DELETE FROM barangay_clearance WHERE id = '.$id.'');
		}

		public function deleteComplaints($id)
		{
			$this->db->query('DELETE FROM complaints WHERE id = '.$id.'');
		}

		public function deleteBrgyPermit($id)
		{
			$this->db->query('DELETE FROM brgy_permit WHERE id = '.$id.'');
		}

// DELETE

// Get Users
		public function getAdminUsers()
		{
			return $this->db->query('SELECT * FROM accounts WHERE Account_ID  ')->result();
		}


			public function getUsers()
		{
			return $this->db->query('SELECT * FROM customers_auth WHERE uid  ')->result();
		}

		public function getSearchUsers($name)
		{
			return $this->db->query("SELECT * FROM Accounts WHERE Firstname LIKE '%".$name."%' OR Lastname LIKE '%".$name."%' AND Account_ID > 2015101001")->result();
		}
// Get Users

		

		public function getProductSearch($name)
		{
			return $this->db->query("SELECT * FROM barangay_clearance WHERE name LIKE '%".$name."%'")->result();
		}

	// USER INFO
		

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