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
    <title>عسل - الحصص</title>
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
            <li class="sidebar-list-item"><a href="sessions.php" class="sidebar-link text-muted active"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">الحصص</span></a></li>
            <li class="sidebar-list-item"><a href="quizzes.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">الإمتحانات</span></a></li>
            <li class="sidebar-list-item"><a href="attendance.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">الحضور</span></a></li>
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

    <div class="modal fade" dir="rtl" id="addSessionModal" tabindex="-1" role="dialog" aria-labelledby="addSessionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSessionModalLabel">إضافة حصة</h5>
                    <button type="button" class="close" data-dismiss="modal" style="margin-left: 0" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="addSessionForm" action="#" role="form" method="post" class="addSessionForm" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="inputBody">إسم الحصة</label>
                            <textarea class="form-control" name="inputBody" id="inputBody" rows="2" placeholder="إسم الحصة"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="inputWeek">رقم الاسبوع</label>
                            <input type="number" class="form-control" id="inputWeek" name="inputWeek" placeholder="رقم الاسبوع">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputGroup">المجموعة</label>
                            <select name="inputGroup" id="inputGroup" class="form-control">
                                <option selected>إختر ...</option>
                                <option>...</option>
                            </select>
                        </div>

                        <br/>

                        <button id="addSessionActionButton" type="submit" class="btn btn-primary">إضافة</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="page-holder w-100 d-flex flex-wrap">
        <div id="myDIV" class="container-fluid px-xl-5">
            <section class="py-5">

                <div class="row">
                    <div class="col-lg-2 mb-4">
                        <button id="addSessionButton" class="btn btn-primary addSessionButton" data-toggle="modal" data-target="#addSessionModal">إضافة حصة</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="text-right mb-0">الحصص</h6>
                            </div>
                            <div class="card-body">
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th> أسم الحصة</th>
                                        <th>المجموعة</th>
                                        <th>رقم الاسبوع</th>
                                        <th>التاريخ</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th> أسم الحصة</th>
                                        <th>المجموعة</th>
                                        <th>رقم الاسبوع</th>
                                        <th>التاريخ</th>
                                    </tr>
                                    </tfoot>

                                </table>
                            </div>
                        </div>
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

        $('form').validate({
            rules: {
                inputBody: {
                    required: true
                }

            },
            messages: {
                inputBody: {
                    required: "يجب إدخال التفاصيل"
                }
            },
            highlight: function(element, errorClass){
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element, errorClass){
                $(element).closest('.form-group').removeClass('has-error');
            }
        });

        var dataTable;

        var x = document.getElementById("myDIV");
        x.style.display = "none";

        let modal = $('#passwordModal');
        modal.modal('show');

        $(document).on('submit', '#passwordModal', function(event){
            event.preventDefault();
            var pass = $("#password").val();
            if (pass === '1116'){

                dataTable = $('#example').DataTable(
                    {
                        "processing": true,
                        "serverSide": true,
                        "ajax":{
                            url:"https://3assal.net/scripts/getAllSessions.php",
                            type:"POST"
                        },
                        "columns": [
                            { "data": "session_name" },
                            { "data": "group_name" },
                            { "data": "week_no" },
                            { "data": "date" }
                        ],
                        "language":{
                            "sProcessing":   "جارٍ التحميل...",
                            "sLengthMenu":   "أظهر _MENU_ مدخلات",
                            "sZeroRecords":  "لم يعثر على أية سجلات",
                            "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                            "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
                            "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                            "sInfoPostFix":  "",
                            "sSearch":       "ابحث :  ",
                            "sUrl":          "",
                            "oPaginate": {
                                "sFirst":    "الأول",
                                "sPrevious": "السابق",
                                "sNext":     "التالي",
                                "sLast":     "الأخير"
                            }
                        }
                    });

                x.style.display = "block";
                $('#passwordModal').modal('hide');
            }
            //$('#action').modal('hide');

        });

        $(document).on('click', '.addSessionButton', function(){

            $.ajax({
                url:"https://3assal.net/scripts/getAllGroups.php",
                method:'GET',
                contentType:false,
                processData:false,
                success:function(data)
                {
                    var dropdown = $('#inputGroup');
        
                    var js = JSON.parse(data);
                    //alert(js.data);
                    //empty out the existing options
                    dropdown.empty();
        
                    dropdown.append( $('<option value="0">إختر ...</option>') );
                    //append the values to the drop down
                    jQuery.each( js, function(i, v) {
                        dropdown.append( $('<option value="'+ v.id +'">'+ v.name +' - '+ v.location +' - '+  v.time +'</option>') );
                    });
                },
                error:function(result){
                    //document.getElementById('action').style.visibility = 'visible';
                    alert("process failed!");
                }
            });
            /*jQuery.getJSON( "http://3assal.net/scripts/getAllGroups.php", function( data ) {

                var dropdown = $('#inputGroup');

                //alert(JSON.parse(data));
                //empty out the existing options
                dropdown.empty();

                //append the values to the drop down
                jQuery.each( data, function(i, v) {
                    dropdown.append( $('<option value="'+ v.id +'">'+ v.group_no +'</option>') );
                });
            });*/
        });

        $(document).on('submit', '#addSessionModal', function(event){
            event.preventDefault();
            let form = document.querySelector('#addSessionForm');
            //$('#action').modal('hide');
            $.ajax({
                url:"https://3assal.net/scripts/addSession.php",
                method:'POST',
                data: new FormData(form),
                contentType:false,
                processData:false,
                success:function(data)
                {
                    //$(this).modal('hide');
                    alert("تم إضافة الحصة بنجاح");
                    let modal = $('#addSessionModal');
                    modal.find('#addSessionForm')[0].reset();
                    //form[0].reset();
                    modal.modal('hide');
                    dataTable.ajax.reload();
                },
                error:function(result){
                    //document.getElementById('action').style.visibility = 'visible';
                    alert("حدث خطأ ما!!");
                }
            });
        });

    });

</script>

</body>
</html>