<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5 - Implementing datatables tutorial using yajra package</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
   
</head>
<body>

<div class="container">
  <table id="use" class="table table-hover table-condensed" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Post Title</th>
            <th>Category</th>
            <th>Tag</th>
        </tr>
    </thead>
  </table>
</div>

<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#use').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{url('getposts')}}",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'category', name: 'category'},
            {data: 'tag', name: 'tag'}
        ]
    });
});
</script>
</body>
</html>