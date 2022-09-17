<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <div class="content">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" >
        <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" ></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        

     
        

        <div class="container">

            <h2 style="text-align:center; margin-top:1rem">Blog List</h2>

            <div class="row" style="margin: 2rem 0%">
                <div class="col">
                    <a class="btn btn-primary" href="{{ asset("/admin/blog/create") }}">Create new Blog</a>
                    <a class="btn btn-success" href="{{ asset("/admin/blog/comment?id=") }}">Comment list</a>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <table id="selectedColumn" class="table table-striped table-bordered table-sm" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr >
                                <th class="th-sm" style="text-align: center">#
                                </th>
                                <th class="th-sm" style="text-align: center">Name
                                </th>
                                <th class="th-sm" style="text-align: center">Description
                                </th>
                                <th class="th-sm" style="text-align: center">Image
                                </th>
                                <th class="th-sm" style="text-align: center">Create Date
                                </th>
                                <th class="th-sm" style="text-align: center">Status
                                </th>
                                <th class="th-sm" style="text-align: center">Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $count=0;
                                ?>
                            @foreach ($ds as $item )
                                
                           
                            <tr>
                                <td>{{ $count+=1  }}</td>
                                <td>{{ $item["Name"]  }}</td>
                                <td>{{ $item["Description"]   }}</td>
                                <td><img src="{{ asset("".$item["Thumbnail"]) }}" style="width:100px" alt="" srcset=""></td>
                                <td>{{ $item["created_at"]  }}</td>
                                @if ($item["Is_active"])
                                <td  class="text-success">Active</td>
                                
                                @else
                                <td  class="text-danger">Not Active</td>
                                @endif
                                <td >
                                    <div class="dropdown show">
                                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Action
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                          <a class="dropdown-item" href="{{ asset("/admin/blog/comment?id=".$item["Id"]) }}">Comment List</a>
                                          <a class="dropdown-item" href="{{ asset("/admin/blog/edit?id=".$item["Id"]) }}">Edit Blog</a>
                                          <a class="dropdown-item" href="{{ asset("/admin/blog/setstatus?id=".$item["Id"]) }}">{{ $item["Is_active"] ?"Lock  Blog":"Open Blog" }}</a>
                                          <a class="dropdown-item"  onclick="return confirm('Do you want to delete?')" href="{{ asset("/admin/blog/delete?id=".$item["Id"]) }}">Delete Blog</a>
                                        </div>
                                      </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>

        </div>


        <script>
            $(document).ready(function() {
                $('#selectedColumn').DataTable();
                $('.dataTables_length').addClass('bs-select');
            });
        </script>

    </div>

</body>

</html>
