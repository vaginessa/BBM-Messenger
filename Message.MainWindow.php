<? session_start();
if (empty($_SESSION['user'])) { header("Location: index.php");   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Black Belt Messager App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="Profile-modal/modal.css">
 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <style>
  .span10 {
    padding-left:300px;
    padding-right:20px; 
    padding-top:20px;
    padding-bottom:90px; 
    background-color:white;
  }
  </style>
</head>
<body onload="moveWindow()">
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2"><? include "side-bar.php"; ?></div>
    <div class="span10"><? include "Right.Side.GetMessages.php"; ?></div>
  </div>
</div>
<script type="text/javascript" language="javascript">
    function moveWindow (){window.location.hash="mylocation";}
</script>
</body>
</html>
