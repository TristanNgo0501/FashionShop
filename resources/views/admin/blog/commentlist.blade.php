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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <style>
            #boder-outside {
                box-shadow: 0px 0px 10px rgb(233, 232, 232);
                border-radius: 10px
            }
            #delete-button{
                color: red;
            }
            #delete-button:hover{
                color: rgb(232, 66, 66);
            }
        </style>




        <div class="container">

            <h2 style="text-align:center; margin:2rem 0px">Comment List</h2>


            @foreach ($ds as $item )
                
         
            <div class="row" style="margin-top: 3rem">
                <div class="col">

                    <div class="col-sm-2"> </div>

                    <div class="col">
                        <div class="row">
                            <div class="col-sm-2" style="margin: 0px  auto">
                                <div style="margin-bottom: 0.5rem;font-weight:bold">{{ $item["Name"] }}</div>

                                <img src="https://ps.w.org/user-avatar-reloaded/assets/icon-256x256.png?rev=2540745"
                                    style="width:50px; height:50px;Background-size: cover ">
                            </div>

                            <div class="col" id="boder-outside">

                                <div style="margin-top: 0.8rem; margin-left:2rem">
                                  
                                    <div class="row">

                                        <div class="col-sm-8" id="Title">

                                            <b>{{ $item["NameBlog"] }}</b>
                                            
                                        </div>

                                        <div class="col-sm-3" id="Time">	{{ $item["created_at"] }}
                                            <i class="far fa-clock"></i>    
                                        </div>
                                        <div class="col-sm-1" id="Delete">
                                            <a href="{{ asset("/admin/blog/deletecomment?id=".$item["Id"]) }}" onclick="return confirm('Do you want to delete?')">
                                                <i class="fas fa-window-close fa-2x"  id="delete-button"></i>
                
                                            </a>
                                            
                                        </div>
                                    </div>

                                </div>

                                <hr>

                                <div id="Content_comment"  style="margin:2rem ">
                                    {{ $item["Content"] }}
                                </div>

                            </div>
                        </div>



                    </div>

                    <div class="col-sm-2"> </div>

                </div>

            </div>

            
            @endforeach

        </div>




    </div>

</body>

</html>
