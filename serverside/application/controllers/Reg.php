<?php
class Reg extends CI_Controller{
public function adduser(){
$validation=true;
if(isset($_REQUEST['firstname']) && isset($_REQUEST['lastname'])&& isset($_REQUEST['email']) && isset($_REQUEST['mob']) && isset($_REQUEST['Passwd']) && isset($_REQUEST['day']) && isset($_REQUEST['mnth'])&& isset($_REQUEST['Year']) && isset($_REQUEST['gender']))
{
	$user["firstname"]=$this->input->post('firstname');
	$user["surname"]=$this->input->post('lastname');
	$user["emailorphone"]=$this->input->post('email');
	$user["password"]=$this->input->post('Passwd');
	$user["date"]=$this->input->post('day');
	$user["month"]=$this->input->post('mnth');
	$user["year"]=$this->input->post('Year');
	$user["gender"]=$this->input->post('gender');

	        $mail= $this->input->post('email');
            $pword= $this->input->post('Passwd');
            $mbile= $this->input->post('mob');
            if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/",$mail))
            {
                $response=array("msg"=>"Please provide an acceptable email address");
                $validation=false;
            }
             else if($mbile != $mail)
            {
                $response=array("msg"=>"Invalid Emailid");
                $validation=false;
            }
             else if(strlen($pword) < 6)
             {
               $response=array("msg"=>"Password should have atleast 6 characters ");
               $validation=false;
             }
             if($validation==true)
            {
            $this->load->model('Regmodel');
            $this->AppModel->createuser($user);
	// print_r($user);
			}
                $response=array("msg"=>"Data received");
}

else
         {
            $response=array("msg"=>"Data no recieved");
        }
        
        
        echo json_encode($response);
    }
}
        


?>