<?php
 header("Content-type: text/css; charset: UTF-8");

?>

    /* http://meyerweb.com/eric/tools/css/reset/
   v2.0 | 20110126
   License: none (public domain)
*/

    @font-face {
        font-family: 'Material Icons';
        font-style: normal;
        font-weight: 400;
        src: url(icons/MaterialIcons-Regular.eot); /* For IE6-8 */
        src: local('Material Icons'),
        local('MaterialIcons-Regular'),
        url(icons/MaterialIcons-Regular.woff2) format('woff2'),
        url(icons/MaterialIcons-Regular.woff) format('woff'),
        url(icons/MaterialIcons-Regular.ttf) format('truetype');
    }
    .material-icons {
        font-family: 'Material Icons';
        font-weight: normal;
        font-style: normal;
        font-size: 24px; /* Preferred icon size */
        display: inline-block;
        line-height: 1;
        text-transform: none;
        letter-spacing: normal;
        word-wrap: normal;
        white-space: nowrap;
        direction: ltr;

        /* Support for all WebKit browsers. */
        -webkit-font-smoothing: antialiased;
        /* Support for Safari and Chrome. */
        text-rendering: optimizeLegibility;

        /* Support for Firefox. */
        -moz-osx-font-smoothing: grayscale;

        /* Support for IE. */
        font-feature-settings: 'liga';
    }
    .main-container
    {

        width: 70%;
        margin: auto;
        <?php
         if(!empty($_GET["embed"]))
             {
                 ?>
        margin-top: 1.5vw;
        width: 95%;
        <?php
             }
         ?>

        height: 100%;

        position: relative;
        left:0;

    }
    .main-header
    {
        width: 100%;
    }


    form
    {
        width:100%;
    }

    body.embed
    {
        padding-bottom: 60px;

    }

    body.embed.file-list footer .btn.add
    {
     display: none;
    }

    .form-block
    {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
    }
    .form-block label
    {
        margin-top: 15px;
        font-size: 20px;
        width: 100%;
    }
    .form-block input,.form-block textarea,.form-block select
    {  margin-top: 15px;
        outline: none;
        width: 100%;
        border: 0;
        padding: 10px;
        background-color: #E0E0E0;
        font-size: 18px;

    }
    .form-block button,input[type='button'],.button
    {

        float: right;
        padding: 10px;
        font-size: 15px;
        margin-top: 15px;
        margin-right: 10px;
        border: 0;
        background-color: #3F51B5;
        outline: 0;
        color: white;
    }
    .form-block button:active
    {
        background-color: #5C6BC0;
    }


    .form-block button:first-child
    {
        margin-right: 0;
    }

    .messages
    {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
    }

    .messages .messages-list li
    {
        padding: 10px;
        color: white;
        text-align: center;
    }

    .modal-box .error p
    {
        color: #F44336!important;
    }

    .modal-box .warning p
    {
        color: #FFC107 !important;
    }
    .modal-box .success p
    {
        color: #4CAF50!important;
    }
    .base-header
    {
        width: 100%;
        font-size: 30px;
        padding-left: 0px!important;
    }
    .base-list
    {
        width: 100%;
    }
    .padding{
        padding: 20px;
    }
    .base-list li
    {
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        width: 100%;
        font-size: 20px;
        margin-bottom: 5px;
        align-items: center;
        display: flex;
        flex-wrap: wrap;
        background-color: #E0E0E0;
    }
    .base-list li .thumbnail
    {
        width: 15%;
    }
    .base-list li .thumbnail img
    {
        width: 100%;
        height:100%;
        object-fit: cover;
    }

    .base-list li .data
    {

        height: 100%;
        width: 100%;
    }

    .base-list li.with-image .data
    {
        width: 85%;
        padding-left: 20px;
    }



    .base-list li .text
    {
        font-size: 15px;
        margin-top: 10px;
        color: grey;
        line-height: 18px;
    }
    .base-list li:last-child
    {
        margin-bottom: 0;
    }
    .base-list li .controls
    {
        float: right;
    }
    .base-list li a
    {
        width: 70%;
        line-height: 25px;
    }
    .base-list li .controls
    {
        width: 30%;
        float: right;
        text-align: right;
    }
    [data-ng-click],[onclick]{
        cursor: pointer;
    }
    body > header
    {
        background-color: #3949AB;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    }
    nav
    {
        width: 100%;
    }
    nav .avatar
    {     margin-right: auto;
        display: flex;
        color: white;
        align-items: center;
        margin-left: 20px;
    }
    nav .avatar .wrapper
    {
        display: flex;
        position: relative;
        align-items: center;
        margin: auto;
    }
    nav .avatar figure
    {
        height: 36px;
        background: white;
        border-radius: 50%;
        overflow: hidden;
    }
    nav .avatar .username
    {
        margin-right: 20px;
        /* font-weight: 600; */
        display: flex;
        align-items: center;
        letter-spacing: 1px;
    }
    nav .avatar figure img
    {
        height: 100%;
    }
    nav a
    {
        position: relative;
        color: white!important;
    }
    .base-list li
    {
        position: relative;
    }
    .base-list li.active
    {
        background: #7986CB;
        color: white;
    }



    .base-list li:after
    {
        content: "";
        width: 4px;
        background: #212121;
        position: absolute;
        left: -6px;
        opacity: 0;
        height: 100%;
        -webkit-transition: all 250ms;
        -moz-transition: all 250ms;;
        -ms-transition: all 250ms;;
        -o-transition: all 250ms;;
        transition: all 250ms;;

    }
    .base-list li:hover:after
    {
        left: 0px;
        opacity: 1;
    }

    /*
    .base-list li:hover
    {
        border-left: 6px solid #212121;
    }*/
    .empty
    {
        width:100%;
        background-color: #E0E0E0;
    }

    .streaming-list .base-list li.active .play
    {
        display: none;
    }
    .streaming-list .base-list li:not(.active) .stop
     {
         display: none;
     }
    .watch-video
    {  height: 70vh;
        width: 100%;
        position: relative;
    }
    .watch-video video
    {
        height: 100%;
        width:100%;
        background-color: black;
    }
    .watch-video .fullscreen
    {
        position: absolute;
        bottom: 10px;
        right: 10px;
        font-size: 0px;
    }
    .watch-video .fullscreen i
    {
        color: white;
        font-size: 50px;
    }
    .center{
        align-items: center;
    }
    .streaming-not-ready
    {
        position: absolute;
        color: white;
        margin: auto;
        width: 100%;
        text-align: center;
        font-size: 40px;
        animation:0.8s linear scaleInOut infinite alternate;
    }
    .streaming-not-ready i
    {
        color: #9E9E9E;
        font-size: 150px;
    }
    @keyframes scaleInOut {
        0%{transform: scale(1)}
        100%{transform: scale(1.1)}

    }
    a{
        color:inherit;
        text-decoration:none;
    }
    a:visited
    {color:inherit;
    }
	
	@media screen and (max-width: 425px)
	{
		.main-container
    {
		width:90%;
	}
	}
	
	.welcome
	{
	margin-top: 20px;  
	width: 100%;
    font-size: 25px;
    background: #E0E0E0;
	}
	.form-block.submit
    {
        display: block;
    }
	a.btn
	{
        border-bottom: 1px solid white;
        padding-bottom: 1px;
	}

.base-footer
{

    margin-top: 20px;
    width: 100%;
    background: #212121;
    color: white;
}
    .base-footer a{
        float: right;
    }

    .error
    {
        margin-top: 5px;
        color: #E53935;
        font-size: 15px;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .error p
    {
        margin-bottom: 5px;
    }
    .error p:last-child
    {
        margin-bottom: 0px;
    }

    .animated{
        -webkit-transition: all 350ms;
        -moz-transition: all 350ms;
        -ms-transition: all 350ms;
        -o-transition: all 350ms;
        transition: all  350ms;
    }

    .modal-container
    {
        position: fixed;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        z-index: 100000;
        background-color: rgba(0,0,0,0.6);
    }
    .modal-container .modal-box
    {
        position: relative;
        width: 20%;

        padding: 30px;
        background: white;
        margin: auto;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.4);
    }

    .modal-container .modal-box .close
    {
        position: absolute;
        top: 10px;
        right: 10px;
    }
    .modal-container .modal-box .modal-message
    {
        width: 100%;
        /* box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24); */
        text-align: center;
    }
    .modal-container .modal-box p
    {
        line-height: 25px;
        letter-spacing: 1px;
        color: #3949AB;
        /* box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24); */
        /* font-weight: 600; */
        font-size: 20px;
    }
    button{
        transition: all 200ms;
    }
    button:hover
    {
      box-shadow:   0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.4)
    }
    .modal-container .controls
    {
        width: 100%;
    }
    .modal-container .controls .no
    {
        background: #E53935;

    } .modal-container .controls .yes
      {
          background: #4CAF50;

      }

      .mobile-header
      {
          display: none;
      }
    @media screen and (max-width: 1024px ) {


        .modal-container .modal-box
        {
            width: 60%;
        }
    }
      @media screen and (max-width: 768px ) {
          .category-add{
              width: 100%;
          }

          .category-add .form-block:nth-child(1)
          {
              width: 90%;
          }
          .category-add .form-block:nth-child(1) input
          {
              width: 100%;
          }
          .category-add .form-block:nth-child(2)
          {
              top: 18px;
              position: relative;

              width:10%
          }
          .category-add .form-block:nth-child(2) input
          {
              margin-right: 0;
          }


          .modal-container .modal-box
          {
              width: 75%;
          }

          body > header
          {    overflow: scroll;
              position: fixed;
              height: 100%;
              width: 65%!important;
              left: -65%;
          }
          body > header nav
          {
              display: block;
              display: block!important;
              background-color: #3949AB;

              position: absolute;
              /* margin-top: 70px; */
              height: 100%;

          }
          body > header.active
          {
              left: 0;
          }
          body > header .avatar
          {
              margin-left: 0px;

              background-color: #5C6BC0;
              padding: 20px;
          }
          body > header.active + .main-container
          {
              left: 65%;
          }
          body > header nav .active:after
          {
              width:100%;
              right: 0%;
              height: 2px;
          }
          body > header nav a
          {
              width: 100%;
              display: flex;
              flex-wrap: wrap;
              align-items: center;
          }
          .mobile-header
          {
              display: block;
              height: 60px;
              background-color: #3949AB;;
              width: 100%;

          }
          .hamburguer
          {
              color: white;
              /* font-size: 30px; */
              float: right;
              /* font-size: 50px; */
              top: 4px;
              right: 10px;
              position: relative;
          }
          .hamburguer i
          {
              font-size: 50px;
          }
      }
	  
	  @media screen and (max-height: 450px)
	  {
          .modal-container .modal-box
          {
              width: 90%;
          }

          .watch-video
		  {
			  height:60vh;
		  }
	  }
	   @media screen and (max-height: 320px)
	  {
		   .watch-video
		  {
			  height:55vh;
		  }
	  }
    nav .menu
    {
        position: absolute;
        background: #E0E0E0;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        top: 50px;
        padding: 10px;
        right: 0px;
        z-index: 1000;
    }
    nav .menu a{

        font-weight: 600;
        color: #3F51B5!important;
    }
    .triangle
    {
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 10px 10px 10px;
        border-color: transparent transparent #E0E0E0 transparent;
        position: absolute;
        top: -8px;
        right: 10px;
    }
    nav a.active::after
    {
        content: "";
       width: 100%;
        position: absolute;
        bottom: 0;
        right:0;
        background-color: white;
        height:4px;
    }
.checkbox
{
    margin-right: 10px;
    position: relative;
}
.file-list .checkbox{
    position: absolute;
    top: 5px;
    left: 5px;
}
.checked,.unchecked
{
    display: none;

    -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
    -khtml-user-select: none; /* Konqueror HTML */
    -moz-user-select: none; /* Firefox */
    -ms-user-select: none; /* Internet Explorer/Edge */
    user-select: none;
}
.checkbox [type='checkbox']
{
    display: none;
}
.checkbox [type='checkbox']:checked + label .unchecked
{
    display: block;
}
.checkbox [type='checkbox']:not(:checked) + label .checked
{
    display: block;
}
.associated a
{
    margin-left: auto;
    text-decoration: underline;
    padding-top: 10px;
}

.iframe iframe
{
    width: 100%;
    height: 100%;
}
.iframe .modal-box
{
    padding:0px;
    width: 40%;
    height: 40vh;
}

.associated .empty
{    width: 100%;
    margin-top: 10px;
    padding-top: 20px;
    /* padding: 0; */
    padding-bottom: 20px;
    margin-bottom: 10px;
    text-align: center;

}
.associated ul
{

    background-color: #E0E0E0;
    padding:10px;
    width: 100%;

    margin-top: 10px;
}

.associated ul li .wrapper
{
    display: flex;
    text-align: center;
    width: 100%;

}
.associated ul li .info
{
    display: flex;
    text-align: center;
}
.associated ul li:not(.empty)
{
    background-color: white;
    min-height: 80px;
    display: flex;
    align-items: center;
    position: relative;
    flex-wrap: wrap;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}
.associated ul li .delete
{
    position: absolute;
    top: 5px;
    right: 5px;

}

.associated ul li figure
{
    width: 40%;
    height: 10vh;
}
.associated ul li.has-image .info
{
    width: 70%;
    text-align: center;
}
.associated ul li .info
{
    width: 100%;
    text-align: center;
}




.associated ul li figure img
{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.associated ul li .info h3
{
    width: 90%;
    margin: auto;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.uploads figure
{
    box-shadow: 0 1px 3px rgba(0,0,0,0.5), 0 1px 2px rgba(0,0,0,0.24);
    height: 200px;
}
.uploads li{
    margin-top: 10px;
    position: relative;
}
[uploader].drop-zone
{
    background: #E0E0E0;
    width: 100%;
    height: 100px;
    align-items: center;
    display: flex;
    margin-bottom: 10px;
}
[uploader][nv-file-over]
{
    margin: auto;
    width: 97.3%;
    height: 70%;
    border: dashed 3px #6d6c6c;
    display: flex;
    align-items: center;
}
[uploader][nv-file-over] p
{
    margin: auto;
    display: flex;
    align-items: center;
    font-weight: 600;
    color: #6d6c6c;
}
[uploader][nv-file-over] p .material-icons
{
    position: relative;
    margin-left: 10px;


}
[uploader][nv-file-over].dragging-file p .material-icons
{

    
    animation: onDragFile 0.3s alternate infinite;
}
[uploader][nv-file-over].dragging-file p
{
    color: #212121;;
    
}
[uploader][nv-file-over].dragging-file
{
    border-color: #212121;

}

.uploads .delete
{
    right: 5px;
    position: absolute;
    top: 5px;
    color: #E53935;
}
.uploads .delete i
{
    font-weight: 600;
    font-size: 25px;
}
.uploads .deleted-overlay
{
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(33, 33, 33,0.8);

    display: flex;
    align-items: center;
}
.uploads .deleted-overlay i
{
    color: white;
    font-size: 100px;
    margin: auto;
}
.uploads + .empty
{
    padding: 10px;
    text-align: center;
    color: black;
    background: white;
    letter-spacing: 1px;
    font-weight: 600;
}
.uploads + .empty p
{
    font-size: 20px;
    margin-top: 20px;
}
@keyframes onDragFile {
    0%{bottom: 0px;transform: scale(1);}
    100%{bottom: 7px;transform: scale(1.2);}
}
.portada-list li.active .unselect
{
    display: inline;
}

.portada-list li.active .select
{
    display: none;
}

.portada-list li:not(.active) .unselect
{
    display: none;
}

.portada-list li:not(.active) .select
{
    display: inline;
}
.categories-tree
{
    background: #E0E0E0;
    padding: 10px;
    width: 100%;
}
.categories-tree .data
{
    background: white;
    margin-bottom: 10px;
    border-left:3px solid black;
    padding: 10px;
    font-weight: 100;

}
.categories-tree .edit-mode
{
    width: 10%;
    font-size: 18px;
    padding: 5px;
    margin-top: 0;
    max-width: 60%;
}
.categories-tree .confirm i
{
    font-size: 24px;
}
.category-list .new-category
{
    margin-bottom: 10px;
    margin-top: 10px;
    width: auto;
    padding: 5px;
}
.category-list .empty
{
    height: 70px;
    display: flex;
    align-items: center;
}
.category-list .empty p
{
    margin: auto;
}

.category-add .form-block
{
    width: auto;
    display: block;
    float: left;
}


.category-add label
{
    margin-right: 10px;
    font-size: 18px;
}
.category-add [type='button']{
    padding: 7px;
    font-size: 17px;
}
.category-list .delete
{
    position: absolute;
    top: 7px;
    right: 10px;
}
.category-list .edit
{
    position: absolute;
    top: 7px;
    right: 45px;
}
.category-list .edit i
{
    font-size: 22px;
}


trix-toolbar
{
    margin-top: 10px;
}
trix-editor
{
    width: 100%;
    border-radius: 0;
}

.modal-box .submit
{
    margin-bottom: 0;
    background: transparent;
    margin-top: 0;
    padding: 0;
}

.radio-select
{
    width: 100%;
    margin-top: 10px;
    max-height: 200px;
    overflow-y: scroll;
}
.radio-select li
{       padding: 10px;
    /* margin-top: 10px; */
    /* padding-bottom: 15px; */
    /* padding-left: 15px; */
    border-bottom: 1px solid #BDBDBD;
    background: #EEEEEE;
    /* display: flex; */
    /* align-items: center; */
    position: relative;
    /* bottom: 10px; */
    float: left;
    display: block;
    width: 100%;
}
.radio-select li .data
{
    float: left;
    display: block;
    position: relative;
    top: 4px;
    color: #3F51B5;
    /* font-weight: 600; */
    letter-spacing: 1px;
    margin-left: 30px;
}
.radio-select li .options
{
    float: right;
}

.radio-select input[type="radio"]
{
    width:auto;
}
.radio-select li.selected
{
    background-color: #5C6BC0
;
}
.radio-select li.selected .data,.radio-select li.selected .label
{

    color: #ffffff;



}

.radio-select .selected,.radio-select .unselected
{display: none}

.radio-select li input[type="checkbox"]:checked ~ .selected
{
    display: block;
}

.radio-select li input[type="checkbox"]
{
    position: absolute;
    left: -100000px;
}

.radio-select li input[type="checkbox"]:not(:checked) ~ .unselected
 {
     display: block;
 }
.radio-select li .check
{
    position: absolute;
    bottom: 6px;

}.noselect {
     -webkit-touch-callout: none; /* iOS Safari */
     -webkit-user-select: none; /* Safari */
     -khtml-user-select: none; /* Konqueror HTML */
     -moz-user-select: none; /* Firefox */
     -ms-user-select: none; /* Internet Explorer/Edge */
     user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome and Opera */
 }



.radio-select li input[type="checkbox"]:checked ~ .selected
{
    display: block;
}

.radio-select li input[type="checkbox"],.radio-select li input[type="radio"]
{
    position: absolute;
    left: -100000px;
}


.radio-select li input[type="radio"] ~ label
{
    padding: 2px;
    font-size: 18px;
    position: relative;
}

.radio-select li input[type="radio"] ~ label .unselected,
.radio-select li input[type="radio"] ~ label .selected
{
    position: relative;
    top: 3px;font-size: 20px;
}



.radio-select li input[type="radio"]:not(:checked) ~ label .unselected
{
    display: inline;
}
.radio-select li input[type="radio"]:checked ~ label .selected
{
    display: inline;
}

.radio-select li input[type="radio"]:checked ~ label
{
    background: #5C6BC0;
    color:white;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

@media screen and (max-width: 1159px) {
    .radio-select .data
    {
        margin-left: 0px!important;
    }
    .radio-select .options
    {
        width: 100%;
    }

    .radio-select .radio
    {
        width: 100%;
        display: block;
    }

    .radio-select label
    {
        display: block;
    }
    .radio-select .check
    {
        top: -8px;
        right: 5px;
    }


}

.handle
{
    position: absolute;
    left: 5px;
    top: 5px;
    cursor: move;
}
.profile-results
{
    height: 30px;
    display: flex;
    align-items: center;
    position: fixed;
    bottom: 0;
    left: 0;
    background: #EEEEEE;
    width: 100%;
}
.profile-results .unit
{    padding: 10px;
    /* display: block; */
    color: #F57C00;

}

.pagination
{
    width: 100%;
    margin-top: 35px;
    display: flex;
    justify-content: center;
}

.pagination .page a
{
    -webkit-transition: all 100ms;
    -moz-transition: all 100ms;;
    -ms-transition: all 100ms;;
    -o-transition: all 100ms;;
    transition: all 100ms;;
    margin-right: 10px;
    padding: 10px;
    border-bottom: 2px solid #212121;

}
.pagination .page:nth-last-child(2) a
{
    margin-right: 0;
}
.pagination .page.active a
{
    color:#5C6BC0;
    border-bottom: 2px solid #5C6BC0;
}
.pagination .page:hover a
{
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    background: #5C6BC0;
    color: white;
    border: 0;
}
.pagination .next
{
    margin-left: 20px;
}
.pagination .prev
{
    margin-right: 20px;
}

.pagination .next.disabled, .pagination .prev.disabled{
opacity: 0.2;
}
.pagination .next:not(.disabled):hover,.pagination .prev:not(.disabled):hover
{
    color:#5C6BC0;
    transform: scale(1.3);
}
