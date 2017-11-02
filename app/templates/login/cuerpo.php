<form class="login"  method="post">
    <div class="form-block">
        <label><?php echo $_LANG["login.usuario"];?></label>
        <input name="user" type="text">
    </div>
    <div class="form-block">
        <label><?php echo $_LANG["login.contrasena"];?></label>
        <input name="password" type="password">
    </div>
    <div class="form-block form-button">
        <button type="submit"><?php echo $_LANG["login.aceptar"];?></button>
    </div>

    <div class="login-redes">
        <?php
        if(!empty($_ENV["auth"]["gp"]) && !empty($_ENV["auth"]["gp"]["active"]))
        {
            ?>
            <script src="https://apis.google.com/js/api:client.js"></script>
            <script>

                var startGoogleLogin = function() {
                    gapi.load('auth2', function(){
                        // Retrieve the singleton for the GoogleAuth library and set up the client.
                        auth2 = gapi.auth2.init({
                            client_id: "<?php echo $_ENV["auth"]["gp"]["clientId"];?>",
                            cookiepolicy: 'single_host_origin',
                            scope: '<?php echo $_ENV["auth"]["gp"]["scope"];?>'
                        });
                        attachSignin(document.getElementById('google-sign-in'));
                    });
                };

                function attachSignin(element) {

                    auth2.attachClickHandler(element, {},
                        function(googleUser) {

                            signInGoogle(googleUser);

                        }, function(error) {
                            alert(JSON.stringify(error, undefined, 2));
                        });
                }



                function signInGoogle(googleUser) {
                    var profile = googleUser.getBasicProfile();
                    var id_token = googleUser.getAuthResponse().id_token;



                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '<?php echo "{$_ENV["website"]["url"]}/{$language}/{$_ENV["website"]["panelAccess"]}/user/login?act=gp"?>');
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


                    xhr.onreadystatechange = function() {



                        if (this.status == 200) {

                            location.reload();

                        }
                        else if( this.status >0)
                        {
                            if(this.responseText!="")
                            {
                                document.querySelector(".error p").innerHTML=JSON.parse(this.responseText);
                            }

                        }
                    };
                    xhr.send('idtoken=' + id_token+"&name="+profile.getGivenName()+"&surname="+profile["wea"]+"&email="+profile.getEmail());

                }
            </script>
            <style type="text/css">



                #google-sign-in {
                    display: inline-block;
                    background: white;
                    color: #444;
                    width: 100%;
                    -webkit-transition: all 150ms;
                    -moz-transition: all 150ms;;
                    -ms-transition: all 150ms;;
                    -o-transition: all 150ms;;
                    transition: all 150ms;;
                    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                    white-space: nowrap;

                }

                #google-sign-in:hover {
                    cursor: pointer;
                }
                #google-sign-in:active
                {
                    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.04);
                }

                span.label {
                    font-family: serif;
                    font-weight: normal;
                }
                span.icon {
                    background: url('https://developers.google.com/identity/sign-in/g-normal.png') transparent 5px 50% no-repeat;
                    display: inline-block;
                    vertical-align: middle;
                    width: 42px;
                    height: 42px;
                }
                span.buttonText {
                    display: inline-block;
                    vertical-align: middle;
                    /*
                    padding-left: 42px;
                    padding-right: 42px;*/
                    font-size: 14px;
                    font-weight: bold;
                    text-align: center;
                    width: calc(100% - 42px);
                    font-family: 'Roboto', sans-serif;
                }
            </style>


            <div id="gSignInWrapper">
                <div id="google-sign-in" class="customGPlusSignIn">
                    <span class="icon"></span>
                    <span class="buttonText"><?php echo $_LANG["login.gp"];?></span>
                </div>
            </div>

            <script>startGoogleLogin();</script>



            <?php
        }

        if(!empty($_ENV["auth"]["fb"]) && !empty($_ENV["auth"]["fb"]["active"]))
        {
            ?>
            <style>

                .fbSignIn
                {     cursor: pointer;

                    background: #3b5998;
                    width: 100%;
                    display: flex;
                    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                    align-items: center;
                    margin-top: 10px;
                }
                .fbSignIn .logo
                {
                    width: 32px;
                    display: flex;
                    margin: 0;
                    /* box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24); */
                    padding: 5px;
                }
                .fbSignIn .logo img
                {
                    width: 100%;
                    height: 100%;
                }
                .fbSignIn .text
                {
                    width: calc(100% - 42px);
                    text-align: center;
                    font-weight: 600;
                    color: white;
                    letter-spacing: 1px;
                    font-size: 14px;
                }
            </style>
            <div class="fbSignInWrapper">
                <a onclick="fbLogin()" class="fbSignIn">
                    <figure class="logo">
                        <img src="<?php echo $_ENV["website"]["root"]?>/static/images/FB-f-Logo__blue_50.png">
                    </figure>
                    <span class="text"><?php echo $_LANG["login.fb"];?></span>
                </a>
            </div>
            <script>
                function fbLogin() {
                    FB.login(function(response) {
                        if (response.authResponse) {
                            var token=response.authResponse.accessToken;


                            FB.api('/me',{"fields":"first_name,last_name,email"}, function(response) {

                                var xhr = new XMLHttpRequest();
                                xhr.open('POST', '<?php echo "{$_ENV["website"]["url"]}/{$language}/{$_ENV["website"]["panelAccess"]}/user/login?act=fb"?>');
                                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


                                xhr.onreadystatechange = function() {



                                    if (this.status == 200) {

                                        location.reload();

                                    }
                                    else if( this.status >0)
                                    {
                                        if(this.responseText!="")
                                        {
                                            document.querySelector(".error p").innerHTML=JSON.parse(this.responseText);
                                        }

                                    }
                                };
                                xhr.send('idtoken=' + token+"&name="+response.first_name+"&surname="+response.last_name+"&email="+response.email);


                            });
                        } else {
                            console.log('User cancelled login or did not fully authorize.');
                        }
                    }, {scope: '<?php echo $_ENV["auth"]["fb"]["scopes"]?>'});
                }
                window.fbAsyncInit = function() {
                    FB.init({
                        appId            : '<?php echo $_ENV["auth"]["fb"]["appId"]?>',
                        autoLogAppEvents : true,
                        xfbml            : true,
                        version          : '<?php echo $_ENV["auth"]["fb"]["version"]?>'
                    });
                    FB.AppEvents.logPageView();
                };

                (function(d, s, id){
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) {return;}
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>
            <?php
        }

        ?>
    </div>

    <div class="error">
        <p></p>
    </div>
</form>

<script>
    window.onload=function () {
        document.querySelector("form").addEventListener("submit",function (e) {

            e.preventDefault();
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {

                console.log(this.status );
                if (this.status == 200) {

                    location.reload();

                }
                else if( this.status >0)
                {
                    if(this.responseText!="")
                    {
                        document.querySelector(".error p").innerHTML=JSON.parse(this.responseText);
                    }

                }
            };
            xhttp.open("POST", "?act=true", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("user="+document.querySelector("[name='user']").value+"&password="+document.querySelector("[name='password']").value);


        })
    }

</script>