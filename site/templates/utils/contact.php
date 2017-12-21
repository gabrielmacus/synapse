
<div data-bind="css: contact.status">
    <form  data-bind="submit: contact.send">

        <div class="form-block" onclick="clearError('name')" >

            <!-- ko if: contact.error() && contact.error().name -->
            <span class="validation-error"><p data-bind="text: contact.error().name"></p></span>
            <!-- /ko -->

            <label class="animated">Nombre</label>

            <input class="animated"  data-bind="value: contact.name"  type="text">



        </div>

        <div class="form-block" onclick="clearError('from')" >

            <!-- ko if: contact.error() && contact.error().from -->
            <span class="validation-error"><p data-bind="text: contact.error().from"></p></span>
            <!-- /ko -->

            <label class="animated">Email</label>

            <input class="animated" data-bind="value: contact.from"  type="text">

        </div>

        <div class="form-block" onclick="clearError('subject')" >

            <!-- ko if: contact.error() && contact.error().subject -->
            <span class="validation-error"><p data-bind="text: contact.error().subject"></p></span>
            <!-- /ko -->

            <label class="animated">Asunto</label>

            <input class="animated"  data-bind="value: contact.subject"  type="text">

        </div>


        <div class="form-block" onclick="clearError('message')" >

            <!-- ko if: contact.error() && contact.error().message -->
            <span class="validation-error"><p data-bind="text: contact.error().message"></p></span>
            <!-- /ko -->


            <label class="animated" >Mensaje</label>

            <textarea class="animated" data-bind="value: contact.message"  rows="4"></textarea>


        </div>

        <div class="form-block submit">

            <div class="error-msg" data-bind="if: !contact.error().isValidationError" >

                <p data-bind="text: contact.error"></p>

            </div>
            <button type="submit">Enviar</button>

        </div>


    </form>


    <div class="success-msg" >

        <p data-bind="text: contact.success"></p>

    </div>



    <div class="loading"   >
        <?php include SITE_TEMPLATE_PATH."/svg/circle.php";?>
    </div>

</div>


<script type="text/javascript">
    var Contact = function () {

        this.name = ko.observable("");

        this.subject= ko.observable("");
        this.email = ko.observable("");
        this.message= ko.observable("");

        this.status=ko.observable("");
        this.error=ko.observable(false);
        this.success=ko.observable(false);


        this.send=function (form) {



            var contactJSON = ko.toJS(this);

            delete contactJSON.sending;
            delete contactJSON.send;
            delete contactJSON.error;
            delete contactJSON.status;

            contact.status("sending");

            atomic.ajax(
                {
                    "url":"<?php echo $_ENV["website"]["url"];?>/synapse/<?php echo $language ;?>/email?act=true",
                    "data":contactJSON,
                    "type":"POST"
                }
            )
                .success(function (data,xhr) {


                    contact.status("success");
                    contact.success("<?php echo $_SITE_LANG["contact.success"]?>");

                })
                .error(function (data,xhr) {

                    console.log(data);
                    contact.status("error");
                    contact.error(data);




                })
                .always(function () {


                });


        }



    }

    function clearError(attr) {

       var errors= contact.error();

       delete errors[attr];

       contact.error(errors);

    }

    var contact= new Contact();

    ko.applyBindings(contact);


</script>