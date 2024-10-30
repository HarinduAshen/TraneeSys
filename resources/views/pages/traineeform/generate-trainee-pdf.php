<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 { color: #3490dc; }
    </style>
</head>
<body>
    <h2>Arthur C. Clarke Institute for Modern Technologies</h2>
    <br>
  
    <br>
    
<h1><?php echo($title); ?></h1>


<table class="table table">
<thead>
  <tr>
  <th>Reg. no</th>
    <th>Name</th>
    <th>End Date</th>
  </tr>
</thead>
<tbody>
<?php foreach($Traineeform as $item): ?>
    <tr>
    <td><?php echo $item->registration_number; ?></td>
        <td><?php echo $item->name; ?></td>
        <td><?php echo $item->end_date; ?></td>
    </tr>
<?php endforeach; ?>

</tbody>
</table>

</body>
</html>
