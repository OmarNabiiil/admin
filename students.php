<?php
session_start();

if ( !isset( $_SESSION['user_id'] ) ) {
    header("Location: index.html");
}
?>

<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>عسل - الطلاب</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <link rel="stylesheet" href="libraries/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">

    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="css/custom.css">

    <link rel="stylesheet" href="css/orionicons.css">

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
            <li class="sidebar-list-item"><a href="students.php" class="sidebar-link text-muted active"><i class="o-user-1 mr-3 text-gray"></i><span style="margin-right: 8px">الطلاب</span></a></li>
            <li class="sidebar-list-item"><a href="guests.php" class="sidebar-link text-muted "><i class="o-user-1 mr-3 text-gray"></i><span style="margin-right: 8px">الزائرين</span></a></li>
            <li class="sidebar-list-item"><a href="groups.php" class="sidebar-link text-muted"><i class="o-user-1 mr-3 text-gray"></i><span style="margin-right: 8px">المجموعات</span></a></li>
            <li class="sidebar-list-item"><a href="announcements.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">الإعلانات المهمة</span></a></li>
            <li class="sidebar-list-item"><a href="payment_report.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">تقرير المدفوعات</span></a></li>
            <li class="sidebar-list-item"><a href="sessions.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">الحصص</span></a></li>
            <li class="sidebar-list-item"><a href="quizzes.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">الإمتحانات</span></a></li>
            <li class="sidebar-list-item"><a href="attendance.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">الحضور</span></a></li>
            <li class="sidebar-list-item"><a href="attendance_history.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span style="margin-right: 8px">تقرير الحضور</span></a></li>

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

    <div class="modal fade" dir="rtl" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">إضافة طالب</h5>
                    <button type="button" class="close" data-dismiss="modal" style="margin-left: 0" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm" action="#" role="form" method="post" class="addUserForm" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputFirstName">الإسم الأول</label>
                                <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" placeholder="الإسم الأول">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputMiddleName">الإسم الثاني</label>
                                <input type="text" class="form-control" id="inputMiddleName" name="inputMiddleName" placeholder="الإسم الثاني">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputLastName">الإسم الأخير</label>
                                <input type="text" class="form-control" id="inputLastName" name="inputLastName" placeholder="الإسم الأخير">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">البريد الإلكتروني</label>
                            <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="البريد الإلكتروني">
                        </div>
                        <div class="form-group">
                            <label for="inputSchool">المدرسة</label>
                            <input type="text" class="form-control" id="inputSchool" name="inputSchool" placeholder="المدرسة">
                        </div>
                        <div class="form-group">
                            <label for="inputMobile">هاتف المحمول</label>
                            <input type="number" class="form-control" id="inputMobile" name="inputMobile" placeholder="هاتف المحمول">
                        </div>
                        <div class="form-group">
                            <label for="inputParentMobile">هاتف ولي الأمر</label>
                            <input type="number" class="form-control" id="inputParentMobile" name="inputParentMobile" placeholder="هاتف ولي الأمر">
                        </div>
                        <div class="form-group">
                            <label for="inputHomeNumber">هاتف المنزل</label>
                            <input type="number" class="form-control" id="inputHomeNumber" name="inputHomeNumber" placeholder="هاتف المنزل">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCategory">الشعبة</label>
                                <select name="inputCategory" id="inputCategory" class="form-control">
                                    <option selected>إختر ...</option>
                                    <option value="0">علمي</option>
                                    <option value="1">أدبي</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputGroup">المجموعة</label>
                                <select name="inputGroup" id="inputGroup" class="form-control">
                                    <option selected>إختر ...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputDiscount">الخصم</label>
                                <input type="number" class="form-control" id="inputDiscount" name="inputDiscount" placeholder="الخصم">
                            </div>
                        </div>
                        <button id="addStudentButton" type="submit" class="btn btn-primary">إضافة</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="userDetailsModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <form method="post" id="user_form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" id="closeDetailsModal" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">تفاصيل الطالب</h4>
                    </div>
                    <div class="modal-body">
                        <label>إسم الطالب كامل</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" readonly />
                        <br />
                        <label>رقم الطالب</label>
                        <input type="text" name="student_no" id="student_no" class="form-control" readonly />
                        <br />
                        <label>البريد الإلكتروني</label>
                        <input type="text" name="mail" id="mail" class="form-control" readonly/>
                        <br />
                        <label>رقم الهاتف</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" readonly/>
                        <br />
                        <label>رقم المجموعة</label>
                        <input type="text" name="group_no" id="group_no" class="form-control" readonly/>
                        <br />
                        <br />
                        <hr />

                        <table id="grades_table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>رقم الإمتحان</th>
                                <th>درجة الطالب</th>
                            </tr>
                            </thead>
                            <tbody>


                            </tbody>
                            <tfoot>
                            <tr>
                                <th>رقم الإمتحان</th>
                                <th>درجة الطالب</th>
                            </tr>
                            </tfoot>

                        </table>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="operation" id="operation" />
                        <button type="button" id="closeDetailsModalButton" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="addDiscountModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="discount_form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">إضافة خصم للطالب</h4>
                    </div>
                    <div class="modal-body">
                        <label for = "inputDiscount">أدخل المبلغ الذي سيتم خصمه</label>
                        <input type="number" name="inputDiscount" id="inputDiscount" class="form-control" />
                        <br />

                    </div>
                    <input type="hidden" name="user_id" id="user_id" />
                    <div class="modal-footer">
                        <button id="addDiscountButton" type="submit" class="btn btn-primary">إضافة</button>
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
                        <button id="addStudentButton" class="btn btn-primary addStudentButton" data-toggle="modal" data-target="#addUserModal">إضافة طالب</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="text-right mb-0">الطلاب</h6>
                            </div>
                            <div class="card-body">
                                <table id="exampless" class="display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>الإسم</th>
                                        <th>الكود</th>
                                        <th>رقم الهاتف</th>
                                        <th>خصم</th>
                                        <th>التفاصيل</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>الإسم</th>
                                        <th>الكود</th>
                                        <th>رقم الهاتف</th>
                                        <th>خصم</th>
                                        <th>التفاصيل</th>
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

<!-- JavaScript files-->

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
                inputFirstName: {
                    required: true
                },
                inputLastName: {
                    required: true
                },
                inputSchool: {
                    required:true
                },
                inputMobile: {
                    required: true,
                    minlength: 11
                }

            },
            messages: {
                inputFirstName: {
                    required: "يجب إدخال الإسم الأول"
                },
                inputLastName: {
                    required: "يجب إدخال الإسم الإخير"
                },
                inputSchool: {
                    required: "يجب إدخال إسم المدرسة"
                },
                inputMobile: {
                    required: "يجب إدخال رقم الهاتف المحمول",
                    minlength: "يجب إدخال 11 رقم للهاتف المحمول"
                }
            },
            highlight: function(element, errorClass){
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element, errorClass){
                $(element).closest('.form-group').removeClass('has-error');
            }
        });

        var x = document.getElementById("myDIV");
        x.style.display = "none";

        let modal = $('#passwordModal');
        modal.modal('show');

        $(document).on('submit', '#passwordModal', function(event){
            event.preventDefault();
            var pass = $("#password").val();
            if (pass === '1234'){

                var dataTable = $('#exampless').DataTable(
                    {
                        "processing": true,
                        "ajax":{
                            url:"https://3assal.net/scripts/getAllStudents.php",
                            type:"POST"
                        },
                        "columns": [
                            { "data": "full_name" },
                            { "data": "student_no" },
                            { "data": "mobile" },
                            { "data": "discount" },
                            { "data": "action" }
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


        $(document).on('click', '.addStudentButton', function(){
            
            $.ajax({
                url:"https://3assal.net/scripts/getAllGroups.php",
                crossDomain: true,
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
                        dropdown.append( $('<option value="'+ v.id +'">'+ v.group_no +'</option>') );
                    });
                },
                error:function(result){
                    //document.getElementById('action').style.visibility = 'visible';
                    alert("process failed!");
                }
            });

            /*jQuery.getJSON( "https://3assal.net/scripts/getAllGroups.php", function( data ) {

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

        $(document).on('click', '.discount', function(){

            var user_id = $(this).attr("id");
            $('#addDiscountModal').modal('show');
            $('#user_id').val(user_id);

        });

        $(document).on('submit', '#addDiscountModal', function(){

            let form = document.querySelector('#discount_form');
            //$('#action').modal('hide');
            $.ajax({
                url:"https://3assal.net/scripts/addDiscountForStudent.php",
                crossDomain: true,
                method:'POST',
                data: new FormData(form),
                contentType:false,
                processData:false,
                success:function(data)
                {
                    alert(data);
                    $('#addDiscountModal')[0].reset();
                    $('#addDiscountModal').modal('hide');
                }
            });

        });

        $(document).on('click', '.details', function(){

            var user_id = $(this).attr("id");
            //alert(user_id);
            $.ajax({
                url:"https://3assal.net/scripts/getStudentMarksAndDetails.php",
                crossDomain: true,
                method:"POST",
                crossDomain: true,
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                    $('#userDetailsModal').modal('show');
                    //alert(data.first_name);
                    if (data === "fail"){
                        $('#full_name').val("");
                        $('#student_no').val("");
                        $('#mail').val("");
                        $('#mobile').val("");
                        $('#group_no').val("");
                    }else {
                        var name = data.first_name;
                        name = name.concat("  ");
                        name = name.concat(data.middle_name);
                        name = name.concat("  ");
                        name = name.concat(data.last_name);
                        $('#full_name').val(name);
                        $('#student_no').val(data.student_no);
                        $('#mail').val(data.email);
                        $('#mobile').val(data.mobile);
                        $('#group_no').val(data.group_no);

                        var response = data.grades;
                        var trHTML = '';
                        $.each(response, function (i, item) {
                            trHTML += '<tr><td>' + item.quiz_no + '</td><td>' + item.grade + '</td></tr>';
                        });
                        $("#grades_table tbody tr").remove();
                        $('#grades_table tbody').append(trHTML);
                    }

                    //alert(res);
                },
                error:function (error) {

                }
            })
        });

        $(document).on('submit', '#addUserModal', function(event){
            event.preventDefault();
            let form = document.querySelector('#addUserForm');
            //$('#action').modal('hide');
            $.ajax({
                url:"https://3assal.net/scripts/addStudent.php",
                crossDomain: true,
                method:'POST',
                data: new FormData(form),
                contentType:false,
                processData:false,
                success:function(data)
                {
                    alert(data);
                    $('#addUserModal')[0].reset();
                    $('#addUserModal').modal('hide');
                    dataTable.ajax.reload();
                },
                error:function(result){
                    //document.getElementById('action').style.visibility = 'visible';
                    alert("process failed!");
                }
            });
        });

    });

</script>

</body>
</html>