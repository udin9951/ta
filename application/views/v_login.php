
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIMA BARQAH</title>


    <!-- Bootstrap -->
    <link href="<?= base_url() ?>template/back-end/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url() ?>template/back-end/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url() ?>template/back-end/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url() ?>template/back-end/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url() ?>template/back-end//build/css/custom.min.css" rel="stylesheet">
    <!-- <link href="<?= base_url() ?>view/coba.css" rel="stylesheet"> -->
  </head>

  <body class="login">
    <div>
      <div style="color: white; position: absolute; left: 473px; top: 120px; font-size: 30px; background-color: black;">
  </div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php 
                    echo form_open('login');
                    if ($this->session->flashdata('pesan')) {
                      echo '<div class="alert alert-success alert-dismissible " role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                              </button>';
                        echo $this->session->flashdata ('pesan');
                        echo '</div>';
                    }
                    ?>
              <h1>Masjid Al-Barqah</h1>
              <div>
                <input name ="username" type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input name="password" type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <!-- <a href="#" class="btn btn-primary btn-lg disabled" role="button" aria-disabled="true">Primary link</a>
              <a href="#" class="btn btn-secondary btn-lg disabled" role="button" aria-disabled="true">Link</a>--> 
              <button type ="submit" class ="btn btn-success">Login</button>
              <a href="home" class="btn btn-light" role="button" >Cancel</a>
              <a class="reset_pass" href="#">Lost your password?</a>
              <div class="clearfix"></div>
           <? echo form_close(); ?> 
          </section>
        </div>
      </div>
    </div>
  </body>
</html>