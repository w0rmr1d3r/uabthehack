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
    <script src="../js/custom_js.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom_styles.css">

    <script>
    function showGroups(str) {
      if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtHint").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","controller/controller_groups.php?q="+str,true);
          xmlhttp.send();
      }
  }
</script>

  </head>
  <body>
    <h1>Hello, world!</h1>
    <!-- Icons Grid -->
    <section class="bg-light text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
              <button type="button" class="btn btn-success" onclick="showGroups(this.value)">SEE GROUP</button>
              <div id="txtHint"><b>Group info will be listed here...</b></div>
              <p class="lead mb-0">Lorem ipsum dolor sit amet.</p>
            </div>
          <div class="col-lg-4">
              <button type="button" class="btn btn-success">Success</button>
              <h3>DOWNLOAD</h3>
              <p class="lead mb-0">Lorem ipsum dolor sit amet.</p>
            </div>
          <div class="col-lg-4">
              <button type="button" class="btn btn-success">Success</button>
              <h3>Lorem ipsum</h3>
              <p class="lead mb-0">Lorem ipsum dolor sit amet.</p>
          </div>
        </div>
      </div>
    </section>




  </body>
</html>
