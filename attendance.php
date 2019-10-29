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
    <title>عسل - الحضور</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <link rel="stylesheet" href="libraries/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">

    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="css/custom.css">
    <!-- orion icons-->
    <link rel="stylesheet" href="css/orionicons.css">
    <!-- Custom stylesheet - for your changes-->

    <!--    <link rel="stylesheet" type="text/css" href="libraries/css/dataTables.bootstrap4.min.css">-->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
</head>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
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
            <li class="sidebar-list-item"><a href="home.php" class="sidebar-link text-muted"><i class="o-home-1 mr-3 text-gray"></i><span style="margin-right: 8px">الرئيسية</span></a></li>
            <li class="sidebar-list-item"><a href="students.php" class="sidebar-link text-muted"><i class="o-user-1 mr-3 text-gray"></i><span style="margin-right: 8px">الطلاب</span></a></li>
            <li class="sidebar-list-item"><a href="guests.php" class="sidebar-link text-muted "><i class="o-user-1 mr-3 text-gray"></i><span style="margin-right: 8px">الزائرين</span></a></li>
            <li class="sidebar-list-item"><a href="groups.php" class="sidebar-link text-muted"><i class="o-user-1 mr-3 text-gray"></i><span style="margin-right: 8px">المجموعات</span></a></li>
            <li class="sidebar-list-item"><a href="announcements.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">الإعلانات المهمة</span></a></li>
            <li class="sidebar-list-item"><a href="model-answers.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">نماذج الإجابات</span></a></li>
            <li class="sidebar-list-item"><a href="payment_report.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">تقرير المدفوعات</span></a></li>
            <li class="sidebar-list-item"><a href="sessions.php" class="sidebar-link text-muted "><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">الحصص</span></a></li>
            <li class="sidebar-list-item"><a href="quizzes.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">الإمتحانات</span></a></li>
            <li class="sidebar-list-item"><a href="attendance.php" class="sidebar-link text-muted active"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">الحضور</span></a></li>
            <li class="sidebar-list-item"><a href="attendance_history.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">تقرير الحضور</span></a></li>
            <li class="sidebar-list-item"><a href="absence_report.php" class="sidebar-link text-muted "><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">تقرير الغياب</span></a></li>
        </ul>

    </div>

    <div class="modal" dir="rtl" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordModalLabel">كلمة السر</h5>
                    <button type="button" class="close" data-dismiss="modal" style="margin-left: 0" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="passwordForm" action="#" role="form" method="post" class="passwordForm" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="password">كلمة السر</label>
                            <input type="password" id="password" name="password" placeholder="كلمة السر" class="form-control border-0 shadow form-control-lg text-violet">
                        </div>

                        <br/>
                        <hr/>

                        <button id="passwordButtonAction" type="submit" class="btn btn-primary">دخول</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" dir="rtl" id="addStudentAttendanceModal" tabindex="-1" role="dialog" aria-labelledby="addStudentAttendanceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentAttendanceModalLabel">إضافة طالب</h5>
                    <button type="button" class="close" data-dismiss="modal" style="margin-left: 0" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="addStudentAttendanceForm" action="#" role="form" method="post" class="addStudentAttendanceForm" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="inputStudentID">رقم الطالب</label>
                            <input type="number" name="inputStudentID" id="inputStudentID" class="form-control" />
                            <br />
                        </div>

                        <!--

                        <h5>أو</h5><br />

                        <div class="form-group">
                            <label for="inputStudentEmail">البريد الإلكتروني</label>
                            <input type="email" name="inputStudentEmail" id="inputStudentEmail" class="form-control" />
                            <br />
                        </div>-->

                        <button id="addStudentAttendanceActionButton" type="submit" class="btn btn-primary">إضافة</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" dir="rtl" id="addGuestAttendanceModal" tabindex="-1" role="dialog" aria-labelledby="addGuestAttendanceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addGuestAttendanceModalLabel">إضافة طالب</h5>
                    <button type="button" class="close" data-dismiss="modal" style="margin-left: 0" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="addGuestAttendanceForm" action="#" role="form" method="post" class="addGuestAttendanceForm" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="inputGuestName">إسم الطالب</label>
                            <input type="text" name="inputGuestName" id="inputGuestName" class="form-control" />
                            <br />
                        </div>
                        <div class="form-group">
                            <label for="inputGuestMobile">هاتف الطالب</label>
                            <input type="number" name="inputGuestMobile" id="inputGuestMobile" class="form-control" />
                            <br />
                        </div>

                        <!--

                        <h5>أو</h5><br />

                        <div class="form-group">
                            <label for="inputStudentEmail">البريد الإلكتروني</label>
                            <input type="email" name="inputStudentEmail" id="inputStudentEmail" class="form-control" />
                            <br />
                        </div>-->

                        <button id="addGuestAttendanceActionButton" type="submit" class="btn btn-primary">إضافة</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div id="deleteStudentModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="delete_form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">هل انت متأكد أنك تريد مسح الطالب ؟</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="user2_id" id="user2_id" class="form-control" />
                    </div>
                    <div class="modal-footer">
                        <button id="deleteStudentButton" type="submit" class="btn btn-primary">مسح</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="page-holder w-100 d-flex flex-wrap">
        <div id="myDIV" class="container-fluid px-xl-5">
            <section class="py-5">

                <div class="row">
                    <div class="col-lg-2 mb-4">
                        <button id="addStudentAttendanceButton" class="btn btn-primary addStudentAttendanceButton" data-toggle="modal" data-target="#addStudentAttendanceModal">إضافة حضور طالب</button>
                    </div>
                    <div class="col-lg-2 mb-4">
                        <button id="addGuestAttendanceButton" class="btn btn-primary addGuestAttendanceButton" data-toggle="modal" data-target="#addGuestAttendanceModal">إضافة حضور زائر</button>
                    </div>
                </div>

                <div class="row">
                    <div id="data" class="col-lg-12 mb-4">


                    </div>
                </div>
            </section>

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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="vendor/popper.js/umd/popper.min.js"> </script>
<script src="libraries/js/jquery.js"></script>
<script src="libraries/js/jquery.validate.js"></script>
<script src="libraries/js/jquery.dataTables.min.js"></script>
<script src="libraries/js/bootstrap.min.js"></script>
<!--<script src="libraries/js/dataTables.bootstrap4.min.js"></script>-->
<script src="js/front.js"></script>

<script>

    $(document).ready( function () {

        var x = document.getElementById("myDIV");
        x.style.display = "none";

        let modal = $('#passwordModal');
        modal.modal('show');

        $(document).on('submit', '#passwordModal', function(event){
            event.preventDefault();
            var pass = $("#password").val();
            if (pass === '1111'){

                $(function() {
                    reloadData();
                });

                x.style.display = "block";
                $('#passwordModal').modal('hide');
            }
            //$('#action').modal('hide');

        });

        function reloadData() {
            var url = "https://3assal.net/scripts/fetchAttendees.php?t=" + (new Date()).getTime();
            jQuery("#data").load(url);
            //window.scrollBy(0,500);
        }
        jQuery(function() {
            setInterval(reloadData, 5000);
        });

        $(document).on('click', '.pay', function(){
            var attendance_id = $(this).attr("id");
            //alert(attendance_id);
            $.ajax({
                url:"https://3assal.net/scripts/payForSession.php",
                method:"POST",
                data:{attendance_id:attendance_id, action:"pay"},
                success:function(data)
                {
                    reloadData();
                },
                error:function(data){
                    alert(data);
                }
            })
        });

        $(document).on('submit', '#addStudentAttendanceModal', function(event){
            event.preventDefault();
            let form = document.querySelector('#addStudentAttendanceForm');
            //$('#action').modal('hide');
            $.ajax({
                url:"https://3assal.net/scripts/addStudentAttendance.php",
                method:'POST',
                data: new FormData(form),
                contentType:false,
                processData:false,
                success:function(data)
                {
                    alert(data);
                    $('#addStudentAttendanceModal')[0].reset();
                    $('#addStudentAttendanceModal').modal('hide');
                    reloadData();
                    //dataTable.ajax.reload();
                },
                error:function(result){
                    //document.getElementById('action').style.visibility = 'visible';
                    alert("process failed!");
                }
            });
        });

        $(document).on('submit', '#addGuestAttendanceModal', function(event){
            event.preventDefault();
            let form = document.querySelector('#addGuestAttendanceForm');
            //$('#action').modal('hide');
            $.ajax({
                url:"https://3assal.net/scripts/addGuestAttendance.php",
                method:'POST',
                data: new FormData(form),
                contentType:false,
                processData:false,
                success:function(data)
                {
                    alert(data);
                    $('#addGuestAttendanceModal')[0].reset();
                    $('#addGuestAttendanceModal').modal('hide');
                    reloadData();
                    //dataTable.ajax.reload();
                },
                error:function(result){
                    //document.getElementById('action').style.visibility = 'visible';
                    alert("process failed!");
                }
            });
        });

        $(document).on('click', '.delete', function(){

            var user_id = $(this).attr("id");
            //alert(user_id);
            $('#deleteStudentModal').modal('show');
            $('#user2_id').val(user_id);

        });

        $(document).on('submit', '#deleteStudentModal', function(event){
            event.preventDefault();
            //let form = document.querySelector('#delete_form');
            var attendance_id = $('#user2_id').val();
            //alert(user_id);
            //$('#action').modal('hide');
            $.ajax({
                url:"https://3assal.net/scripts/deleteStudentFromAttendance.php",
                method:'POST',
                data:{attendance_id:attendance_id},
                crossDomain:true,
                success:function(data)
                {
                    alert("تم مسح الطالب بنجاح");
                    $('#deleteStudentModal').modal('hide');
                    reloadData();
                }
            });

        });

    });

</script>

</body>
</html>