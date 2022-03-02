<!--
* v_login
* Display show Login
* @input    -
* @output   Login
* @author   Kittipod
* @Create Date  2564-11-11
*/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Vote</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!-- <link rel="icon" href="http://localhost/code_team4/Assets/img/icon.ico" type="image/x-icon" /> -->

    <!-- Fonts and icons -->
    <script src="http://localhost/code_team4/Assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
    WebFont.load({
        google: {
            "families": ["Lato:300,400,700,900"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                "simple-line-icons"
            ],
            urls: ['http://localhost/code_team4/Assets/css/fonts.min.css']
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="http://localhost/code_team4/Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/code_team4/Assets/css/atlantis.min.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="http://localhost/code_team4/Assets/css/demo.css">

    <!-- Font Awesome 4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Font Awesome 5 -->
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Semantic UI CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
        integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Semantic UI JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"
        integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Daterange -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    

    <link rel="stylesheet" href="http://localhost/code_team4/Assets/css/main.css">
</head>

<style>
    *{
        margin: 0;
        padding: 0;
    }

    .bg_cdms {
        height: 100%;
        background: url("../../Assets/img/picture_camp.png");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
    }

    .blur {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(8px);
        height: 100%;
        width: 100%;
    }

    .container {
        background-color: #F1F5F9;
        border-radius: 10px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        text-align: center;
        display: flex;
        width: 60%;
        padding: 0 !important; 
        max-width: 920px !important;
    }

    .img_cdms {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        object-fit: cover;
        width: 50%;
    }

    label {
        float: left;
        font-size: 20px !important;
        font-weight: bold !important;
        margin-bottom: 10px;
        color:#000 !important;
    }

    .input {
        width: 100%;
        /* background-color: #000; */
    }

    .content {
        padding: 40px;
        width: 35%;
        height: 70%;
        padding-top: 80px;
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 10px;
        position: absolute;
        transform: translate(-50%,-50%);
        text-align: center;
        /* display: flex; */
        top: 45%;
        left: 50%;
    }

    .button {
        border-radius: 50px !important;
        padding: 20px !important;
        width: 80%;
        background-color: #000 !important;
        color: #fff !important;
    }

    .fa_eye{
        padding: 10px 10px 0 0;
        position: absolute;
        right: 0;
    }

    #hide {
        display: none;
    }

    #invalid {
        color: red;
    }

    @media only screen and (max-width: 768px) {
        /* .img_cdms {
            display: none;
        } */
        .content {
            width: 50%;
        }
        .container {
            width: 50%;
        }
        .title{
            font-size: 1.5rem;
        }
        label {
            font-size: 15px !important;
        }
        input::-webkit-input-placeholder {
            font-size: 10px;
        }
    }

</style>

<body>
    <div class="bg_cdms">
        <div class="blur"></div>
    </div>

    <!-- <div class="container"> -->

            <!-- <img class="img_cdms" src="../../Assets/img/login_image.jpg" alt="Paris"> -->

            <div class="content">
                <!-- <img class="logo_cdms" src="../../Assets/img/icon.ico"> -->
                <h1 class="title" style="color:#000; font-size:40px "> LOGIN </h1>
                <form id="login_form" action="<?php echo base_url() . '/Login/login' ?>" method="POST">
                    <div class="field">
                        <p><label for="username">USERNAME</label></p>
                        <div class="ui left icon input">
                            <input placeholder="Enter username" type="text" name="username" id="username" value="<?php echo $_SESSION['fail']; ?>">
                            <i class="far fa-user icon"></i>
                        </div>
                    </div>
                    <div class="field mb-3">
                        <p><label for="password" >PASSWORD</label></p>
                        <div class="ui left icon input">
                            <input placeholder="Enter password" type="password" name="password" id="password">
                            <i class="fas fa-lock icon"></i>
                            <div class="fa_eye">
                                <i class="far fa-eye-slash" id="show" onclick="show_eye()"></i>
                                <i class="far fa-eye" id="hide" onclick="show_eye()"></i>
                            </div>
                        </div>
                    </div>
                    <?php if($_SESSION['invalid_password'] == true){ ?>
                    <p id="invalid"> <?php echo 'Invalid username or password' ?> </p>
                    <?php } ?>
                    <input type="submit" class="ui  button mt-2" value="LOGIN">
                </form>
            </div>

    <!-- </div> -->
</body>

<script>
    /*
    * show_eye
    * change eye
    * @input    -
    * @output   change eye hide password
    * @author   Kittipod
    * @Create Date  2564-11-18
    */
    function show_eye() {
        var input_password = $('#password').attr('type');
        if(input_password === "password") {
            $("#password").prop("type", "text")
            $('#hide').css("display", "inline-block");
            $('#show').css("display", "none");
        }else{
            $("#password").prop("type", "password")
            $('#hide').css("display", "none");
            $('#show').css("display", "inline-block");
        }

    }

</script>

</html>