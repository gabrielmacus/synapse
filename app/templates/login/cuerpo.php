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

            <div class="g-signin2" data-onsuccess="onSignInGoogle"></div>

            <script>

                //gapi.auth2.getAuthInstance().isSignedIn.get()

                var googleUser=false;
                function gpLoaded() {
                 // gapi.auth2.getAuthInstance().disconnect();

                }
                function onSignInGoogle(gUser) {


                    googleUser=gUser;
                    signInGoogle();
                }

                function signInGoogle() {
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
                    /*
                     var profile = googleUser.getBasicProfile();
                     console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
                     console.log('Name: ' + profile.getName());
                     console.log('Image URL: ' + profile.getImageUrl());
                     console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
                     var id_token = googleUser.getAuthResponse().id_token;
                     console.log(id_token);*//*
                     var xhr = new XMLHttpRequest();
                     xhr.open('POST', 'https://yourbackend.example.com/tokensignin');
                     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                     xhr.onload = function() {
                     console.log('Signed in as: ' + xhr.responseText);
                     };
                     xhr.send('idtoken=' + id_token);*/
                }
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