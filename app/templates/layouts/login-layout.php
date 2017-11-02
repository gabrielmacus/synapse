<!doctype html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

 <style>
   body,html,.main-container
   {
	      height: 100%;
		  font-family:'Roboto',sans-serif;
   
  }
   .login-redes
   {
       margin-top: 10px;
   }
  .main-container
  {
	   display: flex;
    align-items: center;
	
  }

  .main-container form
  {
	  margin:auto;
  }
  .form-block
  {
      width: 100%;
      display: block;
      overflow: hidden;
      margin: auto;
  }

   .form-block:first-child label
   {
       margin: 0;
   }
  label,input
  {margin-top: 10px;
	  width:100%;
	  float:left;
  }
  input{
      background: #E0E0E0;
      padding: 10px;
      border: 0;
      outline: 0;
  }
  button
  {
      outline: 0;
	      margin-top: 10px;
    border: 0;
    background-color: #5C6BC0;
    padding: 10px;
    color: white;
  }

     .error p
     {
         color: #E53935;
         font-weight: 600;
         line-height: 23px;
     }
   form
   {
       width: 15%;
   }
   @media screen and (max-width: 1440px) {
       form
       {
           width: 20%;
       }
   }
   @media screen and (max-width: 1024px) {
       form
       {
           width: 30%;
       }
   }

   @media screen and (max-width: 768px) {
       form
       {
           width: 35%;
       }
   }
   @media screen and (max-width: 640px) {
       form
       {
           width: 40%;
       }
   }
   @media screen and (max-width: 425px) {
       form
       {
           width: 90%;
       }
   }
 </style>
</head>
<body>

<section class="main-container">
    <?php include ($incBody);?>
</section>

</body>
</html>