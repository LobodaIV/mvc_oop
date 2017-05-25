<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">

  </head>

  <body>
    <?php $title="Title in php" ?>

    <form id="form" method="post">
    <div id="userDiv"><label>UserId</label>
         <input type="text" name="userId" id="userId" placeholder="UserId"/> <br></div>
    <button type="button" id="btn" class="btn btn-info" data-toggle="modal" data-target="#myModal">Send Data</button>
    </form>

    <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= $title ?></h4>
      </div>
      <div class="modal-body">
        <div id="bingo"></div>

      </div>
    </div>
   </div>
  </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#btn").click(function(){
            var vUserId = $("#userId").val();
         if(vUserId=='')
         {
             alert("Please enter UserId");
         }
         else{
            $.post("result.php", //Required URL of the page on server
               { // Data Sending With Request To Server
                  user:vUserId,
               },
         function(response,status){ // Required Callback Function
             $("#bingo").html(response);//"response" receives - whatever written in echo of above PHP script.
             $("#form")[0].reset();
          });
        }
     });
   });
</script>
  </body>
</html>