<!doctype html>
<html lang="en">
  <head>

    <title>uabTheHack</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom JS -->
    <script src="js/custom_js.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom_styles.css">

  </head>
  <body>
    <?php 
    if (isset($_SESSION))
    {
      require_once('view/view_success_login_bar.php');
    }
    else
    {
      require_once('view/view_login_bar.php');  
    }
    ?>
    <h1>Hello, world!</h1>
    <!-- Icons Grid -->
    <section class="bg-light text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
              <button type="button" class="btn btn-success" onclick="seeGroup()">SEE GROUP</button>
              <div id="show-div"><b>Group info will be listed here...</b></div>
              <p class="lead mb-0">Lorem ipsum dolor sit amet.</p>
            </div>
          <div class="col-lg-4">
              <button type="button" class="btn btn-success">Success</button>
              <h3>DOWNLOAD</h3>
              <p class="lead mb-0">Lorem ipsum dolor sit amet.</p>
            </div>
          <div class="col-lg-4">
              <button type="button" class="btn btn-success">NEXT UPDATE</button>
              <h3>FUTURE UPDATES</h3>
              <p class="lead mb-0">upcoming soon...</p>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
