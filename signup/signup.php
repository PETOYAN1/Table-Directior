<?php 
    require_once 'connect_db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <title>Sign Up for Employee</title>
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap{
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        </style>
</head>
<body>
    <div class="wrapper">
        <h1>Sign Up for Employee</h1>
        <form class="form-horizontal" action='' method="post">
            <div class="control-group">
            <!-- Full name -->
            <label class="control-label"  for="fname">Full Name</label>
            <div class="controls">
            <input type="text" id="fname" name="fname"  pattern="[a-zA-Z\s]+" title="Full name must contain letters only" class="input-xlarge" required>
            <p class="help-block">Username can contain any letters or numbers, without spaces</p>
            </div>
            </div>
                <div class="control-group">
                <!-- Username -->
                <label class="control-label"  for="username">Username</label>
                <div class="controls">
                    <input type="text" id="username" name="username" onBlur="checkUsernameAvailability()"  pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" title="User must be alphanumeric without spaces 6 to 12 chars" class="input-xlarge" required>
            <!-- Message for username availability-->
            <span id="username-availability-status" style="font-size:12px;"></span>
                    <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                </div>
                </div>
                <div class="control-group">
                <!-- E-mail -->
                <label class="control-label" for="email">E-mail</label>
                <div class="controls">
                    <input type="email" id="email" name="email" placeholder="" onBlur="checkEmailAvailability()" class="input-xlarge" required>
                        <!-- Message for Email availability-->
            <span id="email-availability-status" style="font-size:12px;"></span>
                    <p class="help-block">Please provide your E-mail</p>
                </div>
                </div>
                <div class="control-group">
                <!-- Mobile Number -->
                <label class="control-label" for="mobilenumber">Mobile Number </label>
                <div class="controls">
                    <input type="text" id="mobilenumber" name="mobilenumber" pattern="[0-9]{10}" maxlength="10"  title="10 numeric digits only"   class="input-xlarge" required>
                    <p class="help-block">Mobile Number Contain only numeric values,net</p>
                </div>
                </div>
                <div class="control-group">
                <!-- Password-->
                <label class="control-label" for="password">Password</label>
                <div class="controls">
                    <input type="password" id="password" name="password" pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 4 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;"  required class="input-xlarge">
                    <p class="help-block">Password should be at least 4 characters</p>
                </div>
                </div>
                <div class="control-group">
                <!-- Confirm Password -->
                <label class="control-label"  for="password_confirm">Password (Confirm)</label>
                <div class="controls">
                    <input type="password" id="password_confirm" name="password_confirm" pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '')""  class="input-xlarge">
                    <p class="help-block">Please confirm password</p>
                </div>
                </div>
            <div class="control-group">
                <!-- Button -->
                <div class="controls">
                    <button class="btn btn-success" type="submit" name="signup">Signup </button>
                </div>
        </form>
    </div>
    <script>
        function checkUsernameAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_availability.php",
        data:'username='+$("#username").val(),
        type: "POST",
        success:function(data){
        $("#username-availability-status").html(data);
        $("#loaderIcon").hide();
        },
        error:function (){
        }
        });
        }
    </script>
    <script>
        function checkEmailAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_availability.php",
        data:'email='+$("#email").val(),
        type: "POST",
        success:function(data){
        $("#email-availability-status").html(data);
        $("#loaderIcon").hide();
        },
        error:function (){
        event.preventDefault();
        }
        });
        }
    </script>
</body>
</html>