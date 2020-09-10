<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('header')?>
<div class="container">

    <?php if( validation_errors() ): ?>
    <?=validation_errors(); ?>
    <?php endif;?>

    <?php if( $this->session->flashdata('error') ): ?>
        <p class="alert alert-danger"><?=$this->session->flashdata('error') ?></p>
    <?php endif;?>


    <?php if( $this->session->flashdata('success') ): ?>
        <p class="alert alert-success"><?=$this->session->flashdata('success') ?></p>
    <?php endif;?>


    <?=form_open('auth/login', ['class'=>'form-signin']);?>
        <h2 class="form-signin-heading">Авторизация</h2>
        <label for="inputLogin" class="sr-only">Логин</label>
        <?=form_input([
            'id' => 'inputLogin',
            'name' => 'login',
            'class' => 'form-control',
            'placeholder' => 'Логин',
            'required' => 'required',
            'autofocus' => 'autofocus',
            'value' => set_value('login'),
        ])?>
        <label for="inputPassword" class="sr-only">Password</label>
        <?=form_password([
            'id' => 'inputPassword',
            'name' => 'password',
            'class' => 'form-control',
            'placeholder' => 'Пароль',
            'required' => 'required',
            'value' => set_value('password'),
        ])?>

        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top: 10px;">Войти</button>
    <?=form_close()?>

</div> <!-- /container -->

<?php $this->load->view('footer')?>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
