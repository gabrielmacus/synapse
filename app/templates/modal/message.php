<div class="modal-container flex center  scale-fade-in" data-ng-if="modal.message" >
    <div class="modal-box flex center">
        <span class="close" data-ng-click="closeModal()"><i class="material-icons">&#xE5CD;</i></span>
        <div class="{{modal.class}} modal-message">
            <p>{{modal.text}}</p>
            
        </div>
    

    </div>
</div>