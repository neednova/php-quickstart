<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard for Borrow Loan Company</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Merriweather:300,300i,400,400i,700,700i"
   rel="stylesheet">
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
          <a href="/">Applicant Loan Page</a>
        </div>
        <div class="col-md-6">
          <a href="/dashboard" class="underlined">Internal Company Dashboard</a>
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
                    <h1>Borrow Loan Company Dashboard</h1>
                  </div>
                    @if (!$receivedReportData)
                      <div class="section-title mb60 text-center">
                        <h3>No data received yet</h3>
                        <p>
                          This page will show sample report data once you have filled out the NovaConnect widget.
                          <br/> You can find the widget by navigating to your root domain.
                          <br/> Refresh this page if you just completed NovaConnect.
                        </p>
                      </div>
                    @else
                      <div class="row">
                        <div class="col-md-4">
                          <div>
                            <strong>Borrow Loan Company ID:</strong>
                          </div>
                        </div>
                        <div class="col-md-6">
                          {{ $receivedReportData['userArgs'] }}
                          <span style="font-size: 11px;"><br/>You can set a different Borrow Loan Company ID in the serverside logic</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div>
                            <strong>Nova Credit Public Token:</strong>
                          </div>
                        </div>
                        <div class="col-md-6">
                          {{ $receivedReportData['publicToken'] }}
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col-md-4">
                          <div>
                            <strong>Applicant Full Name:</strong>
                          </div>
                        </div>
                        <div class="col-md-6">
                          {{ $receivedReportData['applicantName'] }}
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div>
                            <strong>Applicant Email:</strong>
                          </div>
                        </div>
                        <div class="col-md-6">
                          {{ $receivedReportData['applicantEmail'] }}
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col-md-4">
                          <div>
                            <strong>Nova Score:</strong>
                          </div>
                        </div>
                        <div class="col-md-6">
                          {{ $receivedReportData['novaScore'] }}
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div>
                            <strong>Borrow Loan Company Decision:</strong>
                          </div>
                        </div>
                        <div class="col-md-6">
                          {{ $receivedReportData['borrowLoanDecision'] }}
                          <span style="font-size: 11px;"><br/>(try changing the serverside logic that calculates this decision!)</span>
                        </div>
                      </div>
                      <br/><br/><br/>
                      <div class="centered">
                        <p>
                          Return to the <a href="/">applicant loan page</a> and enter a different Nova sandbox applicant&apos;s data into NovaConnect to try another example!
                        </p>
                      </div>
                    @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery.min.js "></script>
  <script src="js/bootstrap.min.js "></script>
</body>

</html>
