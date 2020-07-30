<?php


include('header.php');

?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v6.0&appId=610126246246207&autoLogAppEvents=1"></script>
<div class="container">

    <div class=" row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class=" card" style="margin-top:100px;">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form method="post" id="user_login_form" action="sqllogin.php">
                        <div class="form-group">
                            <label>Enter Username</label>
                            <input type="text" name="name" id="name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Password</label>
                            <input type="password" name="password" id="password" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="user_login" id="user_login" class="btn btn-info" value="Login" name="submit" />


                        </div>
                        <div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width="" scope="public_profile,email" onlogin="checkLoginState();"></div>
                    </form>
                    <div align="center" class="my-4">
                        <a href="register.php">Register </a>
                    </div>
                    <div id="status">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>

</body>

<!-- <script>
    window.fbAsyncInit = function() {
        FB.init({
            appId: '559521311655226',
            cookie: true,
            xfbml: true,
            version: 'v6.0'
        });
        FB.getLoginStatus(function(response) {
            if (response.status == 'connected') {
                alert("Logged in and Authorized");
            } else if (response.status == 'not_autorized') {
                alert("logged in but not authorized");
            } else {
                alert("not logged in");
            }
        });
        FB.AppEvents.logPageView();

    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script> -->
<script>
    function statusChangeCallback(response) { // Called with the results from FB.getLoginStatus().
        console.log('statusChangeCallback');
        console.log(response); // The current login status of the person.
        if (response.status === 'connected') { // Logged into your webpage and Facebook.
            testAPI();
        }
    }


    function checkLoginState() { // Called when a person is finished with the Login Button.
        FB.getLoginStatus(function(response) { // See the onlogin handler
            statusChangeCallback(response);
        });
    }


    window.fbAsyncInit = function() {
        FB.init({
            appId: '559521311655226',
            cookie: true, // Enable cookies to allow the server to access the session.
            xfbml: true, // Parse social plugins on this webpage.
            version: 'v6.0' // Use this Graph API version for this call.
        });


        FB.getLoginStatus(function(response) { // Called after the JS SDK has been initialized.
            statusChangeCallback(response); // Returns the login status.
        });
    };


    (function(d, s, id) { // Load the SDK asynchronously
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));


    function testAPI() { // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function(response) {

            console.log('Successful login for: ' + response.name);



            function createCookie(name, value, days) {
                var expires;
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toGMTString();
                } else {
                    expires = "";
                }
                document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
            }
            createCookie("cust_name", response.name, "10");




            document.getElementById('status').innerHTML =
                'Thanks for logging in, ' + response.name + '!';
            window.open("http://localhost/internship_project3_TMS/fbregister.php", "_self");
        });
    }
</script>

</html>