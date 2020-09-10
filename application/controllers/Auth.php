<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

    public function login()
    {
        if($this->input->post()) {
            $this->form_validation->set_rules('login', 'Логин', 'required|alpha_numeric|min_length[5]|max_length[12]', $this->_ru_messages());
            $this->form_validation->set_rules('password', 'Пароль', 'required|min_length[5]|max_length[12]', $this->_ru_messages());
            $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

            if ($this->form_validation->run() == FALSE) {
                return $this->load->view('auth/v_login', $this->data);
            }

            $login = trim($this->input->post('login', true));
            $password = trim($this->input->post('password', true));

            if(!$this->usr->login($login, $password)) {
                $this->session->set_flashdata('error', 'Неверное сочетание логина/пароля');
                redirect('sign_in');
            }


            $this->session->set_flashdata('success', 'Авторизация успешна');
            redirect('sign_in');


        } //end if post

        return $this->load->view('auth/v_login', $this->data);
    }

    private function _ru_messages()
    {
        return [
            'required' => '{field} поле обязательно.',
            'alpha_numeric' => '{field} может содержать только латинские симовлы или цифры.',
            'min_length' => '{field} должен быть не менее {param} знаков.',
            'max_length' => '{field} должен быть не более {param} знаков.',
        ];
    }

}