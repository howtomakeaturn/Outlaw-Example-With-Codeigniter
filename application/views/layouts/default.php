<!DOCTYPE html>
<html>
	<head>
    <meta charset='utf8' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title><?php echo $template['title']; ?></title>
		<?php echo $template['metadata']; ?>
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/bootstrap.min.css"> 
    <script type="text/javascript" src="/assets/js/jquery-1.10.2.min.js"></script> 
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>      

    <style>
        body{
            background-color: black;
            color: white;
        }
      
        #background {
            width: 100%; 
            height: 100%; 
            position: fixed; 
            left: 0px; 
            top: 0px; 
            z-index: -1; /* Ensure div tag stays behind content; -999 might work, too. */
        }

        .stretch {
            width:100%;
        //    height:100%;
        }           
        
        .container{
          //  background-color: #9c27b0;
        }
    </style>

	</head>
	<body>
    <div id="background">
        <img src="/assets/img/guitar.jpg" class="stretch" alt="" />
    </div>    
    
    <div class='container'>
        <div class='row'>
        
            <h1><?php echo $template['title']; ?></h1>
            <?php echo $template['body']; ?>
        
        
        </div>    
    </div>


	</body>
</html>
