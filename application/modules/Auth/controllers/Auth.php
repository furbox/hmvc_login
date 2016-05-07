<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author furbox
 */
class Auth extends MY_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("M_Auth");
    }

    function signup() {
        $data = new stdClass();
        $data->title = "Sign Up";
        $data->content_view = "Auth/signup_v";

        if ($this->input->post()) {
            $pass = $this->input->post('password');
            $pass_confirm = $this->input->post('confirm_password');
            if ($pass == $pass_confirm) {
                $_POST['password'] = md5($pass);
                unset($_POST['confirm_password']);

                $success = $this->M_Auth->addUser();

                if ($success) {
                    redirect(base_url()."Auth/signin");
                } else {
                    die("Ocurrio un error");
                }
            } else {
                die("password no iguales");
            }
            $pass = $this->input->post('password');
        } else {
            $this->template->call_template($data);
        }
    }

    function signin() {
        if ($this->input->post()) {
            $user = $this->M_Auth->getUser($this->input->post('email'));
            if (count($user) == 1) {
                $hash_pass = md5($this->input->post('password'));
                if ($hash_pass == $user->password) {
                    $this->session->set_userdata([
                        "user_id" => $user->id,
                        "logged_in" => 1
                    ]);
                    redirect(base_url().'Home');
                } else {
                    die("Datos Invalidos");
                }
            }
        } else {
            $data = new stdClass();
            $data->title = "Sign Up";
            $data->content_view = "Auth/signin_v";
            $this->template->call_template($data);
        }
    }

}
