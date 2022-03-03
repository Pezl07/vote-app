<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet" />
    <title>Document</title>
</head>
<style>

body {
    margin: 0;
    padding: 0;
}

.divider:after,
.divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
}

.h-custom {
    height: calc(100% - 73px);
}

.container .h-custom{
    width: 100%;
    min-width: 300px;
    margin: auto auto;
    max-width: 500px;
}

.sub_container{
    margin-top: 30px;
    padding: 30px 30px;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 50px;
    border: 1px solid rgb(0, 0, 0, 0.9);
    /* box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; */
    box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}

.fa_eye{
    position: absolute;
    top: 10px;
    right: 10px;
}

/* @media (max-width: 450px) {
    .h-custom {
        height: 100%;
    }
} */

.main {
    overflow: hidden;
    position: relative;
    height: 100%;
}

.image {
    opacity: 0.4;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.container {
    position: relative;
}

#hide {
    display: none;
}

.password-input {
    display: flex;
}
</style>

<body>
    <div class="main">
        <img class="image" src="../../Assets/img/picture_camp.png " alt="">
        <section class="vh-100 container">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class='sub_container'>
                        <div class="logo text-center">
                            <img src="../../Assets/img/picture_camp.png" width="300" height="300">
                        </div>
                        <h2 class=" text-center">OSSD CAMP #10</h2>
                        <h4 class=" text-center">Login</h4>
                        <form id="login_form" action="<?php echo base_url() . '/Login/login' ?>" method="POST">

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input class="form-control form-control-lg"
                                placeholder="Enter username" type="text" name="username" id="username" value="<?php echo $_SESSION['fail']; ?>" />
                                <label class="form-label" for="username">Username</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3 password-input">
                                <input class="form-control form-control-lg"
                                placeholder="Enter password" type="password" name="password" id="password" />
                                <label class="form-label" for="password">Password</label>
                                <div class="fa_eye">
                                    <i class="far fa-eye-slash" id="show" onclick="show_eye()"></i>
                                    <i class="far fa-eye" id="hide" onclick="show_eye()"></i>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#!" class="text-body">Forgot password?</a>
                            </div>
                            <?php if($_SESSION['invalid_password'] == true){ ?>
                            <p id="invalid"> <?php echo '<div class="text-center" style="color:red">Invalid username or password</div>' ?> </p>
                            <?php } ?>
                            <!-- <div class="text-center pt-3" style="color:red">Invalid username or password</div> -->
                            <div class="text-center pt-2 align-items-center">
                                <button type="submit" class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>

</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
<!-- jQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
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