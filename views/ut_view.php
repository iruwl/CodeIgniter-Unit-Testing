<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>CodeIgniter Unit Testing</title>
      <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>
      <div class="container-fluid">
         <div class="page-header">
            <h1>CodeIgniter Unit Testing</h1>
            <p class="lead">An easier way to construct your unit testing and pass it to a really nice looking page.</p>
         </div>
         <table border="1" width="100%" class="table table-striped table-bordered">
            <thead>
               <tr>
                  <th width="04%"><center>No.</center></th>
                  <th width="30%"><center>Test Name</center></th>
                  <th width="55%"><center>Notes</center></th>
                  <th width="07%"><center>Result</center></th>
                  <th width="04%"><center>Line</center></th>
               </tr>
            </thead>
            <?php $i=1; foreach ($tests as $test): ?>
            <tr>
               <td><center><?php echo $i++; ?></center></td>
               <td><?php echo $test['Test Name']; ?></td>
               <td><?php echo $test['Notes']; ?></td>
               <td>
                  <center>
                  <span class="label <?php if ($test['Result'] == 'Passed'): ?>label-success<?php else: ?>label-danger<?php endif;?>">
                     <?php echo $test['Result']; ?>
                  </span>
                  </center>
               </td>
               <td><center><?php echo $test['Line Number']; ?></center></td>
            </tr>
            <?php endforeach;?>
         </table>
         <?php if ($failed > 0): ?>
         <div class="offset3 span5 alert alert-danger" style="text-align: center;">
            <b>Not Good!</b> <?php echo $failed ?> of <?php echo $count ?> tests failed!
         </div>
         <?php else: ?>
         <div class="offset3 span5 alert alert-success" style="text-align: center;">
            <b>Success!</b> Of the <?php echo $count ?> tests ran, all of them passed!
         </div>
         <?php endif;?>
      </div>
   </body>
</html>