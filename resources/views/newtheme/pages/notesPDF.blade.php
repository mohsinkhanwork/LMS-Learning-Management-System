<!DOCTYPE html>
<html lang="en">
<head>
  <title>Notes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Your Notes</h2>
  <p></p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Note</th>
        <th>Details</th>
        <th>Selected Text</th>
        
      </tr>
    </thead>
    <tbody>
    	<?php $i = 1 ?>
    @foreach($data as $dat)	
      <tr>
        <td>{{'Note'}} {{$i}}</td>
        <td style="line-height: 1.9;">{!! $dat->select_text !!}</td>
        <td style="line-height: 1.9;">{!! $dat->note !!}</td>
        
      </tr>
      <?php $i++ ?>
     @endforeach 
      
    </tbody>
  </table>
</div>

</body>
</html>
