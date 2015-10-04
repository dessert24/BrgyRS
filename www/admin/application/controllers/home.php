<?php

	class Home extends CI_Controller
	{
		private $response = '';
		private $post = array('firstName' => '' , 'middleName' => '' , 'lastName' => '' , 'emailAdd' => '' , 'contactNumber' => '' , 'homeAdd' => '');
		private $cart = false;

		public function __construct()
		{
			parent::__construct();

			$this->form_validation->set_error_delimiters('<p style="color:red;font-family:Consolas;">' , '</p>');
			$this->load->model('home_model');
			$this->load->model('admin_model');
		}

		public function index()
		{
			$this->load->view('index' , array('title' => 'Shop Online | Store Tech' , 'response' => $this->response));
		}

		public function createAccount()
		{
			$this->load->view('createAccount' , array('title' => 'Create Account | Store Tech' , 'response' => $this->response , 'post' => $this->post));
		}

		public function newAccount()
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
			$result = $this->input->post(NULL , TRUE);

			if($this->form_validation->run())
			{
				if(empty($_FILES['userFile']['name']))
				{
					$this->home_model->newAccount($result);
					$this->response = '<center>
                              <div class="alert alert-success alert-dismissable" >
                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-check" style="margin-right:5px;"></i>Please Provide Required Fields .
                              </div>
                            </center>';
                    $this->newAccount();
				}
				elseif(!empty($_FILES['userFile']['name']))
				{
					$details = array(
						'fileName' => $_FILES['userFile']['name'],
						'result' => $this->input->post(NULL , TRUE)
					);

					if(is_uploaded_file($_FILES['userFile']['tmp_name']))
						move_uploaded_file($_FILES['userFile']['tmp_name'], 'C:/xampp/htdocs/Store_Tech/bootstrap/images/'.$_FILES['userFile']['name'].'');
						$this->home_model->newAccount($details);
						$this->response = '<center>
                              <div class="alert alert-success alert-dismissable" >
                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-check" style="margin-right:5px;"></i>Account Successfully Created .
                              </div>
                            </center>';
                        $this->createAccount();
				}
			}
			else
			{
				$this->response = '<center>
                              <div class="alert alert-danger alert-dismissable" >
                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-warning" style="margin-right:5px;"></i>Please Provide Required Fields .
                              </div>
                            </center>';
                $this->post = $this->input->post(NULL , TRUE);
				$this->createAccount();
			}
		}

		public function userLogin()
		{
			$result = $this->input->post(NULL , TRUE);
			$data = $this->home_model->userLogin($result);

			if($data['accountExists'])
			{
				if($data['accountStatus'] == 'Inactive')
				{
					$this->response = '<center>
                              <div class="alert alert-danger alert-dismissable" >
                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-warning" style="margin-right:5px;"></i>Account deactivated ! Contact us now .
                              </div>
                            </center>';
                    $this->index();
				}
				else
				{
					$this->session->set_userdata(array('accountID' => $data['accountID']));
					
					if($data['accountType'] == 'Admin')
					{
						$this->admin_model->loggedOn($this->session->userdata('accountID'));
						redirect('index.php/admin');
					}
					else
					{
						if($result['productID'])
						{
							$this->admin_model->loggedOn($this->session->userdata('accountID'));
							redirect(base_url('index.php/customer/addToCart/'.$result['productID'].'/'.$this->session->userdata('accountID').''));
						}
						else
						{
							$this->admin_model->loggedOn($this->session->userdata('accountID'));
							redirect(base_url('index.php/customer'));
						}
					}
				}
			}
			else
			{
				$this->response = '<center>
                              <div class="alert alert-danger alert-dismissable" >
                                <button class="close" area-hidden="true" data-dismiss="alert" type="button">x</button><i class="fa fa-warning" style="margin-right:5px;"></i>Account does not exists !
                              </div>
                            </center>';
                $this->index();
			}
		}

		

	}