<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="เข้าสู่ระบบ TARAD.com - Backoffice">
    <meta name="author" content="Coderthemes">
    <!-- App Favicon icon -->
    <link rel="shortcut icon" href="https://new-backoffice.tarad.com/assets/images/favicon.ico">
    <!-- App Title -->
    <title>BA&IT</title>
    <link rel="stylesheet" href="https://new-backoffice.tarad.com/assets/css/base.css">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="//oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    <script src="https://new-backoffice.tarad.com/assets/js/modernizr.min.js"></script>
</head>
<body>
    <!-- Page-Title -->
    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page login-ld">
        <div class=" card-box">
            <div class="panel-heading">
                <div class="text-center m-t-15"><strong></strong></div>
                <div class="text-custom logo-title"><img src="http://bait.rmutsb.ac.th/bait/coopwasukri/images/logonewbait.png"></div>
            </div>
            <div class="panel-body">
                <form id="login-form" method="post" role="form" class="form-horizontal bv-form" action="login_submit" data-toggle="validator" novalidate="novalidate"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                    <div class="form-group has-feedback">
                        <div class="col-xs-12">
                            <input name="username" id="username" class="form-control" type="text"  placeholder="Username" data-bv-field="username"><i class="form-control-feedback bv-no-label" data-bv-icon-for="username" style="display: none;"></i>
                        <small class="help-block" data-bv-validator="stringLength" data-bv-for="username" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a value with valid length</small><small class="help-block" data-bv-validator="notEmpty" data-bv-for="username" data-bv-result="NOT_VALIDATED" style="display: none;">กรุณากรอก Username</small></div>
                    </div>
                    <div class="form-group has-feedback">
                        <div class="col-xs-12">
                            <input name="password" id="password" class="form-control" type="password"  placeholder="Password" data-bv-field="password"><i class="form-control-feedback bv-no-label" data-bv-icon-for="password" style="display: none;"></i>
                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="password" data-bv-result="NOT_VALIDATED" style="display: none;">กรุณากรอก Password</small></div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="remember" type="checkbox" name="access">
                                <label for="remember"> จดจำการเข้าระบบ </label>
                            </div>
                        </div>
                    </div>
                                        <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-default btn-block text-uppercase waves-effect waves-light" id="login" type="button">เข้าสู่ระบบ</button>
                        </div>
                    </div>
                    
                        <!-- <div class="col-sm-6"> 
                            <a href="https://new-backoffice.tarad.com/register/registers/us" target="_blank" class="text-dark">
                                <i class="fa fa-lock m-r-5"></i> 
                                เปิดร้านค้าออนไลน์
                            </a>
                        </div> -->
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <!--div class="col-sm-12 text-center">
      <p>ยังไม่มีบัญชีผู้ใช้มาก่อน ? <a href="//bof.tarad.com/landingpage/register" target="_blank" class="text-danger m-l-5"><b>สมัครสมาชิก</b></a></p>
    </div-->
        </div>
    </div>
    <!-- jQuery  -->
    <script src="https://new-backoffice.tarad.com/assets/js/jquery.min.js"></script>
    <script src="https://new-backoffice.tarad.com/assets/js/bootstrap.min.js"></script>
    <script src="https://new-backoffice.tarad.com/assets/js/detect.js"></script>
    <script src="https://new-backoffice.tarad.com/assets/js/fastclick.js"></script>
    <script src="https://new-backoffice.tarad.com/assets/js/jquery.slimscroll.js"></script>
    <script src="https://new-backoffice.tarad.com/assets/js/jquery.blockUI.js"></script>
    <script src="https://new-backoffice.tarad.com/assets/js/waves.js"></script>
    <script src="https://new-backoffice.tarad.com/assets/js/wow.min.js"></script>
    <script src="https://new-backoffice.tarad.com/assets/js/jquery.nicescroll.js"></script>
    <script src="https://new-backoffice.tarad.com/assets/js/jquery.scrollTo.min.js"></script>

    <script src="https://new-backoffice.tarad.com/assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="https://new-backoffice.tarad.com/assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="https://new-backoffice.tarad.com/assets/js/bootstrapValidator.js"></script>

    <script src="https://new-backoffice.tarad.com/assets/js/jquery.core.js"></script>
    <script src="/assets/js/myscript.js"></script>
    

    <script>
        $(document).ready(function() { //ตรวจสอบว่าหน้าเว็บแลนเดอร์เสร็จหรือยัง
            $('#login').on('click',function(){  //สั่งให้ปุ่มทำงาน
                Helper.ajax('/login','POST',{
                    username:$('#username').val(),
                    password:$('#password').val(),  //ดึงค่าจากฟอร์มต่างๆ
                    remember:$('#remember').val(),
                },function(response){
                    window.location.href='/';
                })
            })
            /** $('#login-form').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    username: {
                        validators: {
                            stringLength: {
                                min: 3,
                            },
                            notEmpty: {
                                message: 'กรุณากรอก Username'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'กรุณากรอก Password'
                            }
                        }
                    }

                }
            })**/
        });
    </script>




</body>
    </html>