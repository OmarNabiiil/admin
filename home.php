<?php
session_start();

if ( !isset( $_SESSION['user_id'] ) ) {
    header("Location: index.html");
}
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>عسل - الرئيسية</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png?3">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>

  <body>
    <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
        <a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a>
        <a href="home.php" class="navbar-brand font-weight-bold text-uppercase text-base">3assal</a>
        <div class="dropdown-divider"></div><a href="logout.php" class="dropdown-item">خروج</a>
      </nav>
    </header>

    <div class="d-flex align-items-stretch">
      <div id="sidebar" class="sidebar py-3">

        <div class="text-gray-500 px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">القائمة الرئيسية</div>

        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="home.php" class="sidebar-link text-muted active"><i class="o-home-1 mr-3 text-gray"></i><span style="margin-right: 8px">الرئيسية</span></a></li>
              <li class="sidebar-list-item"><a href="students.php" class="sidebar-link text-muted"><i class="o-user-1 mr-3 text-gray"></i><span style="margin-right: 8px">الطلاب</span></a></li>
              <li class="sidebar-list-item"><a href="groups.php" class="sidebar-link text-muted"><i class="o-user-1 mr-3 text-gray"></i><span style="margin-right: 8px">المجموعات</span></a></li>
              <li class="sidebar-list-item"><a href="announcements.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">الإعلانات المهمة</span></a></li>
              <li class="sidebar-list-item"><a href="payment_report.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">تقرير المدفوعات</span></a></li>
              <li class="sidebar-list-item"><a href="sessions.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">الحصص</span></a></li>
              <li class="sidebar-list-item"><a href="quizzes.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">الإمتحانات</span></a></li>
              <li class="sidebar-list-item"><a href="attendance.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">الحضور</span></a></li>
          <li class="sidebar-list-item"><a href="attendance_history.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">تقرير الحضور</span></a></li>

        </ul>

      </div>

      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">

          <div class="pr-lg-5"><img src="img/illustration.svg" alt="" class="img-fluid"></div>

        </div>
        <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
          <div class="container-fluid">
            <div class="row">
              <!--<div class="col-md-6 text-center text-md-left text-primary">
                <p class="mb-2 mb-md-0">Your company &copy; 2018-2020</p>
              </div>
              <div class="col-md-6 text-center text-md-right text-gray-400">
                <p class="mb-0">Design by <a href="https://bootstrapious.com/admin-templates" class="external text-gray-400">Bootstrapious</a></p>
              </div>-->
            </div>
          </div>
        </footer>
      </div>

    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>

  </body>
</html>