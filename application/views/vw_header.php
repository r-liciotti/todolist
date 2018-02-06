<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--Let browser know website is optimized for mobile-->
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ToDo List</title>

    <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="<?php echo base_url() ?>includes/custom.css">

  </head>
  <body>


     <nav>
       <div class="nav-wrapper">
         <a href="<?php echo base_url() ?>" class="brand-logo">Logo</a>
         <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
         <ul class="right hide-on-med-and-down">
           <li><a href="<?php echo base_url() ?>">Home</a></li>
           <?php
           if($this->session->userdata('username','password','session')){ ?>
           <li><a href="<?php echo base_url() ?>auth/logout">Logout</a>
           <?php }else{ ?>
             <li><a href="<?php echo base_url() ?>auth">Login</a></li>
             <li><a href="<?php echo base_url() ?>auth/registrazione">Registrati</a>
             <?php } ?>

         </ul>
         <ul class="side-nav" id="mobile-demo">
           <li><a href="#">Home</a></li>
           <?php if($this->auth_model->get_session()){ ?>
           <li><a href="<?php echo base_url() ?>auth/logout">Logout</a>
           <?php }else{ ?>
             <li><a href="<?php echo base_url() ?>auth">Login</a></li>
             <li><a href="<?php echo base_url() ?>regitrati">Registrati</a>
             <?php } ?>
         </ul>
       </div>
     </nav>
