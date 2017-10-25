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