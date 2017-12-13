<form data-bind="submit: contact.send" data-bind="visible: !contact.sending">

    <div class="form-block">
        <label>Nombre</label>
        <input  data-bind="value: contact.name"  type="text">


    </div>

    <div class="form-block">
        <label>Email</label>
        <input  data-bind="value: contact.email"  type="text">
    </div>

    <div class="form-block">
        <label>Asunto</label>
        <input  data-bind="value: contact.subject"  type="text">
    </div>


    <div class="form-block">
        <label>Mensaje</label>
        <textarea  data-bind="value: contact.message"  rows="4"></textarea>

    </div>

    <div class="form-block">

        <button type="submit">Enviar</button>

    </div>


</form>

<div class="error"  >

    <p data-bind="text: contact.error"></p>

</div>

<div class="success" >

    <p data-bind="text: contact.success"></p>

</div>



<div class="loading"   >
    <?php include SITE_TEMPLATE_PATH."/svg/circle.php";?>
</div>

<script type="text/javascript">
    var Contact = function () {

        this.name = ko.observable("");

        this.subject= ko.observable("");
        this.email = ko.observable("");

        this.message= ko.observable("");
        this.sending = ko.observable(false);
        this.error=ko.observable(false);
        this.success=ko.observable(false);


        this.send=function (form) {


            contact.sending(true);

            var contactJSON = ko.toJS(this);

            delete contactJSON.sending;
            delete contactJSON.send;
            delete contactJSON.error;
            delete contactJSON.success;

            atomic.ajax(
                {
                    "url":"http://localhost/synapse/<?php echo $language ;?>/email?act=true",
                    "data":contactJSON,
                    "type":"POST"
                }
            )
                .success(function (data,xhr) {

                    contact.error(false);
                    contact.success("<?php echo $_SITE_LANG["contact.success"]?>");

                })
                .error(function (data,xhr) {


                    contact.success(false);
                    contact.error(data);


                })
                .always(function () {

                    contact.sending(false);

                });


        }



    }

    var contact= new Contact();

    ko.applyBindings(contact);


</script>