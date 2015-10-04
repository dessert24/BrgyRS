<?php

	class Home_model extends CI_Model
	{

		public function __construct()
		{
			parent::__construct();
		}

		public function newAccount($data)
		{

			$maxID = $this->getMaxID() + 1;

			if($maxID == 1)
				$maxID = 2015101001;

			if(empty($data['result']))
			{
				$details = array(
					'Account_ID' => $maxID,
					'Firstname' => $data['firstName'],
					'Middlename' => $data['middleName'],
					'Lastname' => $data['lastName'],
					'Gender' => $data['gender'],
					'Email' => $data['emailAdd'],
					'Contact_number' => $data['contactNumber'],
					'Address' => $data['homeAdd'],
					'Password' => hash('sha512' , md5($data['password'])),
				);

				$this->db->insert('Accounts' , $details);
			}
			else
			{
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
				);

				$this->db->insert('Accounts' , $details);
			}
		}

		public function getMaxID()
		{
			$query = $this->db->query("SELECT max(Account_ID) as maxID FROM Accounts");

			foreach($query->result_array() as $row)
				$maxID = $row['maxID'];
			return $maxID;
		}

		public function userLogin($data)
		{
			$checkAccount = $this->checkAccount($data['email'] , $data['password']);
			$checkStatus = $this->checkStatus($data['email']);
			$checkType = $this->checkType($data['email']);
			$getAccountID = $this->getAccountID($data['email']);

			return $details = array(
				'accountExists' => $checkAccount,
				'accountStatus' => $checkStatus,
				'accountType' => $checkType,
				'accountID' => $getAccountID
			);
		}

		public function checkAccount($email , $password)
		{
			return count($this->db->select('*')->from('Accounts')->where('Email' , $email)->where('Password' , hash('sha512' , md5($password)))->get()->result());
		}

		public function checkStatus($email)
		{
			$query = $this->db->select('Status')->from('Accounts')->where('Email' , $email)->get();

			if($query->num_rows())
			{
				foreach($query->result_array() as $row)
					$accountStatus = $row['Status'];
				return $accountStatus;
			}
			else
			{
				return NULL;
			}
		}

		public function checkType($email)
		{
			$query = $this->db->select('Type')->from('Accounts')->where('Email' , $email)->get();

			if($query->num_rows())
			{
				foreach($query->result_array() as $row)
					$accountType = $row['Type'];
				return $accountType;
			}
			else
			{
				return NULL;
			}
		}

		public function getAccountID($email)
		{
			$query = $this->db->select('Account_ID')->from('Accounts')->where('Email' , $email)->get();

			if($query->num_rows())
			{
				foreach($query->result_array() as $row)
					$accountID = $row['Account_ID'];
				return $accountID;
			}
			else
			{
				return NULL;
			}
		}

	
	}