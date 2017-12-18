<script type="text/javascript">

    var Modal = function () {

        this.opened = ko.observable(false);
        this.text = ko.observable("");
        this.template = ko.observable({});



    }

    var modal = new Modal();

</script>



<div class="modal" data-bind="css: {open: modal.opened}">



    <div class="modal-content" data-bind="template: modal.template">



    </div>


</div>