<!DOCTYPE html>
<html lang="en">

<head>
  <title>Borrow Sample Loan Website</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Merriweather:300,300i,400,400i,700,700i"
    rel="stylesheet">
  <!-- Import the NovaConnect init loader in the head -->
  <script src="https://static.neednova.com/connect/v2/init.js"></script>
</head>

<body>
  <div class="header">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="logo">
            <img src="images/logo.png" alt="Borrow - Loan Company Website Template">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="dashboard-nav-bar">
    <div class="container">
      <div class="row">
        <div class="col-md-6 right-align">
          <a href="/" class="underlined">Applicant Loan Page</a>
        </div>
        <div class="col-md-6">
          <a href="/dashboard">Internal Company Dashboard</a>
        </div>
      </div>
    </div>
  </div>
  <div class="container" style="padding-top: 100px;">
    <div class="row">
      <div class="col-md-12">
        <div class="wrapper-content bg-white">
          <div class="section-scroll" id="section-apply">
            <div class="bg-light pinside60">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="section-title mb60 text-center">
                    <h1>We now need to run a quick credit check</h1>
                    <p>The last step in the process requires that we perform a personal credit check.</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <label class="control-label" for="name">First Name</label>
                    <input id="name" name="name" type="text" placeholder="First Name" class="form-control input-md" required>
                    <span class="help-block"> </span>
                  </div>
                  <div class="col-md-6">
                    <label class=" control-label" for="email">Last Name</label>
                    <div class="">
                      <input id="email" name="email" type="text" placeholder="Last Name" class="form-control input-md">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-12">
                    <label class="control-label" for="name">Address</label>
                    <div class="">
                      <input id="name" name="name" type="text" placeholder="Address" class="form-control input-md" required>
                      <span class="help-block"> </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <label class="control-label" for="name">City</label>
                    <div class="">
                      <input id="name" name="name" type="text" placeholder="City" class="form-control input-md" required>
                      <span class="help-block"> </span>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label class=" control-label" for="email">State</label>
                    <div class="">
                      <input id="email" name="email" type="text" placeholder="State" class="form-control input-md">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label class=" control-label" for="email">Postal Code</label>
                    <div class="">
                      <input id="email" name="email" type="text" placeholder="Postal Code" class="form-control input-md">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <br>
                <div class="col-md-12" style="text-align: center;">
                  <br/>
                  <p class="text-muted">If you don't have US credit history but have one overseas, we can refer to your foreign credit history.<br/>
                    Click the button below to attach your foreign credit information to your application.
                  </p>
                  <!-- Make sure to include the NovaConnect button div with id 'nova-button' -->
                  <div id="nova-button"></div>
                  <hr/>
                  <button style="margin: auto;width: 400px;" class="btn btn-primary btn-block">Submit my loan application</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    // Start up the Nova Connect widget
    window.Nova.register({
      publicId: '{{  $novaPublicId }}',
      productId: '{{  $novaProductId }}',
      env: '{{  $novaEnv }}',
      userArgs: '{{  $novaUserArgs }}',
    });
  </script>
  <script src="js/jquery.min.js "></script>
  <script src="js/bootstrap.min.js "></script>
</body>

</html>
