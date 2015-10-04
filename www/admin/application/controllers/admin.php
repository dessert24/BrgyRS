<?php

	class Admin extends CI_Controller
	{
		private $response = '';
		private $msg = '';
		private $newCategory = false;
		private $newBrand = false;
		private $post = array('firstName' => '' , 'middleName' => '' , 'lastName' => '' , 'emailAdd' => '' , 'contactNumber' => '' , 'homeAdd' => '');
		private $newForum = false;

		public function __construct()
		{
			parent::__construct();

			$this->form_validation->set_error_delimiters('<p style="color:red;font-family:Consolas;">' , '</p>');
			$this->load->model('admin_model');
			$this->load->model('home_model');

			if(!$this->session->userdata('accountID'))
				redirect(base_url());

		}

		public function index()
		{
			$this->load->view('admin/index' , array('title' => 'Dashboard | Barangay Registration' , 'response' => '
                              <center><div class="alert alert-warning alert-dismissable" >
                                <i class="fa fa-warning " style="margin-right:5px;"></i>You have full control of the system ! Watch your actions
                              </div>
                            </center>' , 'accountID' => $this->session->userdata('accountID')));
		}

		public function barangay_clearance()
		{
			$this->load->view('admin/barangay_clearance' , array('title' => 'Barangay Clearance | Barangay Registration' , 'accountID' => $this->session->userdata('accountID') ));
		}

		public function barangay_permit()
		{
			$this->load->view('admin/barangay_permit' , array('title' => 'Barangay Permit | Barangay Registration' , 'accountID' => $this->session->userdata('accountID') ));
		}


		public function business_clearance()
		{
			$this->load->view('admin/business_clearance' , array('title' => 'Barangay Business Clearance | Barangay Registration' , 'accountID' => $this->session->userdata('accountID') ));
		}

		public function complaints()
		{
			$this->load->view('admin/complaints' , array('title' => 'complaints | Barangay Registration' , 'accountID' => $this->session->userdata('accountID') ));
		}

	// Delete data

		public function deleteProduct($id)
		{
			$this->admin_model->deleteProduct($id);
			$this->response = '
                              <div class="alert alert-success alert-dismissable" >
                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-check " style="margin-right:5px;"></i>Barangay Clearance Details Deleted
                              </div>';
            $this->barangay_clearance();
		}

		public function deleteBusinessClearance($id)
		{
			$this->admin_model->deleteBusinessClearance($id);
			$this->response = '
                              <div class="alert alert-success alert-dismissable" >
                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-check " style="margin-right:5px;"></i>Business Clearance Details Deleted
                              </div>';
            $this->business_clearance();
		}

		public function deleteComplaints($id)
		{
			$this->admin_model->deleteComplaints($id);
			$this->response = '
                              <div class="alert alert-success alert-dismissable" >
                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-check " style="margin-right:5px;"></i>Complaints Details Deleted
                              </div>';
            $this->complaints();
		}

		public function deleteBrgyPermit($id)
		{
			$this->admin_model->deleteBrgyPermit($id);
			$this->response = '
                              <div class="alert alert-success alert-dismissable" >
                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-check " style="margin-right:5px;"></i>Barangay Permit Details Deleted
                              </div>';
            $this->deleteBrgyPermit();
		}

// Delete data

		// USER

		public function AdminUsers()
		{
			$this->load->view('admin/AdminUsers' , array('title' => 'Admin Users | Barangay Registration' , 'accountID' => $this->session->userdata('accountID') , 'response' => $this->response));
		}

		public function Users()
		{
			$this->load->view('admin/Users' , array('title' => 'Customer Users | Barangay Registration' , 'accountID' => $this->session->userdata('accountID') , 'response' => $this->response));
		}

		public function newUser()
		{
			$this->load->view('admin/newUser' , array('title' => 'New User |Barangay Registration' , 'accountID' => $this->session->userdata('accountID') , 'response' => $this->response));
		}

		public function addUser()
		{
			$validate = array(
				array(
					'field' => 'firstName',
					'label' => 'Firstname',
					'rules' => 'required'
				),
				array(
					'field' => 'middleName',
					'label' => 'Middlename',
					'rules' => 'required'
				),
				array(
					'field' => 'lastName',
					'label' => 'Lastname',
					'rules' => 'required'
				),
				array(
					'field' => 'emailAdd',
					'label' => 'Email Address',
					'rules' => 'required|valid_email|is_unique[Accounts.Email]'
				),
				array(
					'field' => 'contactNumber',
					'label' => 'Contact Number',
					'rules' => 'required|int|max_length[11]'
				),
				array(
					'field' => 'homeAdd',
					'label' => 'Home Address',
					'rules' => 'required'
				),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'required|min_length[6]|matches[confPassword]'
				),
				array(
					'field' => 'confPassword',
					'label' => 'Password Confirmation',
					'rules' => 'required|matches[password]'
				)
			);

			$this->form_validation->set_rules($validate);

			if($this->form_validation->run())
			{
				$details = array(
						'fileName' => $_FILES['userFile']['name'],
						'result' => $this->input->post(NULL , TRUE)
					);

					if(is_uploaded_file($_FILES['userFile']['tmp_name']))
						move_uploaded_file($_FILES['userFile']['tmp_name'], 'C:/xampp/htdocs/Store_Tech/bootstrap/images/'.$_FILES['userFile']['name'].'');
						$this->admin_model->newAccount($details);
						$this->response = '<center>
                              <div class="alert alert-success alert-dismissable" >
                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-check" style="margin-right:5px;"></i>User Successfully Added
                              </div>
                            </center>';
                        $this->newUser();
			}
			else
			{
				$this->response = '<center>
                              <div class="alert alert-danger alert-dismissable" >
                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-warning" style="margin-right:5px;"></i>Please Provide Required Fields
                              </div>
                            </center>';
                $this->post = $this->input->post(NULL , TRUE);
				$this->newUser();
			}
		}

		// USER

		public function productSearch()
		{
			$this->load->view('admin/productSearch' , array('title' => 'Barangay Clearance |Barangay Registration' , 'accountID' => $this->session->userdata('accountID') , 'response' => $this->response , 'name' => $this->input->post(NULL , TRUE)));
		}

		public function myAccount()
		{
			$this->load->view('admin/myAccount' , array('title' => 'My Account | Barangay Registration' , 'accountID' => $this->session->userdata('accountID') , 'response' => $this->response , 'msg' => $this->msg));
		}

		public function updateUser($accountID)
		{
			$this->load->view('admin/updateUser' , array('title' => 'Update User | Barangay Registration' , 'accountID' => $this->session->userdata('accountID') , 'response' => $this->response , 'msg' => $this->msg , 'userID' => $accountID));
		}

		public function updateAccount($accountID)
		{
			$validate = array(
				array(
					'field' => 'firstName',
					'label' => 'Firstname',
					'rules' => 'required'
				),
				array(
					'field' => 'middleName',
					'label' => 'Middlename',
					'rules' => 'required'
				),
				array(
					'field' => 'lastName',
					'label' => 'Lastname',
					'rules' => 'required'
				),
				array(
					'field' => 'contactNumber',
					'label' => 'Contact Number',
					'rules' => 'required'
				),
				array(
					'field' => 'emailAdd',
					'label' => 'Email Address',
					'rules' => 'required'
				),
				array(
					'field' => 'homeAdd',
					'label' => 'Home Address',
					'rules' => 'required'
				)
			);

			$this->form_validation->set_rules($validate);
			$result = $this->input->post(NULL , TRUE);

			if($this->form_validation->run())
			{
				if(empty($_FILES['userFile']['name']))
				{
					$this->admin_model->updateAccount($result , $accountID);
					$this->response = '<div class="alert alert-success alert-dismissable" >
                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-check" style="margin-right:5px;"></i>Account Successfully Updated
                              </div>';
                    $this->myAccount();
				}
				elseif(!empty($_FILES['userFile']['name']))
				{
					$details = array(
						'fileName' => $_FILES['userFile']['name'],
						'result' => $this->input->post(NULL , TRUE)
					);

					if(is_uploaded_file($_FILES['userFile']['tmp_name']))
						move_uploaded_file($_FILES['userFile']['tmp_name'], 'C:/xampp/htdocs/Store_Tech/bootstrap/images/'.$_FILES['userFile']['name'].'');
						$this->admin_model->updateAccount($details , $accountID);
						$this->response = '<div class="alert alert-success alert-dismissable" >
	                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-check" style="margin-right:5px;"></i>Account Successfully Updated
	                              </div>';
	                    $this->myAccount();
				}
			}
			else
			{
				$this->response = '<div class="alert alert-danger alert-dismissable" >
                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-warning" style="margin-right:5px;"></i>Failed to update Account
                              </div>';
                $this->myAccount();
			}
		}

		public function updateUserAccount($accountID)
		{
			$validate = array(
				array(
					'field' => 'firstName',
					'label' => 'Firstname',
					'rules' => 'required'
				),
				array(
					'field' => 'middleName',
					'label' => 'Middlename',
					'rules' => 'required'
				),
				array(
					'field' => 'lastName',
					'label' => 'Lastname',
					'rules' => 'required'
				),
				array(
					'field' => 'contactNumber',
					'label' => 'Contact Number',
					'rules' => 'required'
				),
				array(
					'field' => 'emailAdd',
					'label' => 'Email Address',
					'rules' => 'required'
				),
				array(
					'field' => 'homeAdd',
					'label' => 'Home Address',
					'rules' => 'required'
				)
			);

			$this->form_validation->set_rules($validate);
			$result = $this->input->post(NULL , TRUE);

			if($this->form_validation->run())
			{
				if(empty($_FILES['userFile']['name']))
				{
					$this->admin_model->updateUserAccount($result , $accountID);
					$this->response = '<div class="alert alert-success alert-dismissable" >
                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-check" style="margin-right:5px;"></i>Account Successfully Updated
                              </div>';
                    $this->updateUser($accountID);
				}
				elseif(!empty($_FILES['userFile']['name']))
				{
					$details = array(
						'fileName' => $_FILES['userFile']['name'],
						'result' => $this->input->post(NULL , TRUE)
					);

					if(is_uploaded_file($_FILES['userFile']['tmp_name']))
						move_uploaded_file($_FILES['userFile']['tmp_name'], 'C:/xampp/htdocs/Store_Tech/bootstrap/images/'.$_FILES['userFile']['name'].'');
						$this->admin_model->updateUserAccount($details , $accountID);
						$this->response = '<div class="alert alert-success alert-dismissable" >
	                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-check" style="margin-right:5px;"></i>User Account Successfully Updated
	                              </div>';
	                    $this->updateUser($accountID);
				}
			}
			else
			{
				$this->response = '<div class="alert alert-danger alert-dismissable" >
                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-warning" style="margin-right:5px;"></i>Failed to update User Account
                              </div>';
                $this->updateUser($accountID);
			}
		}
// Account Search
		public function accountSearch()
		{
			$this->load->view('admin/userSearch' , array('title' => 'Users | Barangay Registration' , 'accountID' => $this->session->userdata('accountID') , 'response' => $this->response , 'data' => $this->input->post(NULL , TRUE)));
		}


		public function updatePassword($accountID)
        {
            $validate = array(
                array(
                    'field' => 'newPass',
                    'label' => 'New Password',
                    'rules' => 'required|matches[newPassConf]'
                ),
                array(
                    'field' => 'newPassConf',
                    'label' => 'Confirm Password',
                    'rules' => 'required|matches[newPass]'
                )
            );

            $this->form_validation->set_rules($validate);

            $result = $this->input->post(NULL , TRUE);

            if($this->admin_model->checkOldPassword($result , $accountID))
            {
                if($this->form_validation->run())
                {
                    $this->admin_model->updatePassword($result , $accountID);
                    $this->response = '<div class="alert alert-success alert-dismissable" >
                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-check" style="margin-right:5px;"></i>Password Successfully Updated
                              </div>';
                    $this->myAccount($accountID);
                }
                else
                {
                    $this->myAccount($accountID);
                }
            }
            else
            {
                $this->msg = '<i class="fa fa-close" style="margin-right:5px;"></i>Incorrect old password !';
                $this->myAccount($accountID);
            }
        }

        public function updateUserPassword($accountID)
        {
            $validate = array(
                array(
                    'field' => 'newPass',
                    'label' => 'New Password',
                    'rules' => 'required|matches[newPassConf]'
                ),
                array(
                    'field' => 'newPassConf',
                    'label' => 'Confirm Password',
                    'rules' => 'required|matches[newPass]'
                )
            );

            $this->form_validation->set_rules($validate);

            $result = $this->input->post(NULL , TRUE);

            if($this->admin_model->checkOldPassword($result , $accountID))
            {
                if($this->form_validation->run())
                {
                    $this->admin_model->updatePassword($result , $accountID);
                    $this->response = '<div class="alert alert-success alert-dismissable" >
                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-check" style="margin-right:5px;"></i>Password Successfully Updated
                              </div>';
                    $this->updateUser($accountID);
                }
                else
                {
                    $this->updateUser($accountID);
                }
            }
            else
            {
                $this->msg = '<i class="fa fa-close" style="margin-right:5px;"></i>Incorrect old password !';
                $this->myAccount($accountID);
            }
        }

        public function updateAccountStatus($accountID , $status)
        {
        	$updateStatus = $this->admin_model->updateAccountStatus($accountID , $status);
        	
        	if($updateStatus)
        		$this->response = '<div class="alert alert-success alert-dismissable" >
	                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-check" style="margin-right:5px;"></i><br>Account ID : '.$accountID.'<br> Status changed to '.$status.'
	                              </div>';
	        	$this->users();
        }

       

		public function userLogout()
		{
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}