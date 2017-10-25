<div class="modal-container flex center scale-fade-in" data-ng-if="modal.yesNo">
    <div class="modal-box flex center">
        <span class="close" data-ng-click="closeModal()"><i class="material-icons">&#xE5CD;</i></span>
        <div class="modal-message">
            <p>{{modal.message}}</p>

        </div>
        <footer class="controls">

            <div class="form-block button submit">
                <button data-ng-click="closeModal()" class="no padding"><?php echo $_LANG["modal.cancelar"]?></button>
                <button data-ng-click="acceptModal()" class="yes padding"><?php echo $_LANG["modal.aceptar"]?></button>
            </div>
        </footer>

     
    </div>
</div>