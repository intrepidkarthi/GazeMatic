<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Contact_us extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation'));
       // $this->load->library('mailguner');
    }

    public function index($value='')
    {
        $this->load->view('contactview');
    }

    public function contactus()
    {

        // echo "hi"; exit;
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|callback_alpha_space_only');
        $this->form_validation->set_rules('email', 'Emaid ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            echo '<div class="alert alert-success text-center">Something went wrong!</div>'; exit;
                // redirect('index.php/contact_us');
        }
        else
        {
            $data = array(
                'name'=>$this->input->post('name'),
                'email'=>$this->input->post('email'),
                'subject'=>$this->input->post('subject'),
                'message'=>$this->input->post('message')
                );
           // $this->mailguner->contactus($data);    
                // mail sent
                echo '<div class="alert alert-success text-center">Your mail has been sent successfully!</div>'; exit;
        }
    }
}