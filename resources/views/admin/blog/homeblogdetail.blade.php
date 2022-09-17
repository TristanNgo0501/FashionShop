<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <!--CND VueJs-->
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.25.0/axios.min.js"></script>

        <style>
            .table-border-blog {
                box-shadow: 0px 0px 20px rgb(234, 229, 229);
                border-radius: 10px;
                padding: 2rem;
            }

            .border-comment {
                box-shadow: 0px 0px 20px rgb(234, 229, 229);
                padding: 1.5rem;
                border-radius: 20px
            }
            #dots:hover{
                cursor: pointer;
                color: rgb(95, 91, 91);
            }
            #comment-text{
                box-shadow: 0px 0px 20px rgb(234, 229, 229);
                border-radius: 20px;
                padding: 1.5rem;
                border: none;
            }
        </style>



        <div class="container" style="margin-top:2rem; margin-bottom:2rem" id="myApp">



            <div class="row">

                <div class="col table-border-blog">
                    <div class="row">

                        <div class="col">
                            <a href="{{ asset('/blog') }}">
                                <i class="fas fa-angle-left"></i>
                                Back to menu</a>
                        </div>

                    </div>

                    <h3 style="width:60%; margin:0px auto; text-align:center">
                        {{ $ds['Name'] }}
                    </h3>
                    <br>

                    <div style="padding-left:1rem ">
                        <div style="padding-left:2rem ">
                            <span style="margin-right: 1rem"><i class="far fa-calendar-alt"></i> {{ $ds['created_at'] }}
                            </span>
                            <span><i class="fas fa-eye"></i> {{ $ds['View'] }}</span>
                        </div>
                        <br>

                        <div id="content">

                        </div>
                        <br>
                        <br>
                        <h3>Comment</h3>
                        <br>

                        @foreach ($ds1 as $item)
                            <div class="comment" style=" display: flex; margin:0px auto; margin-top:1.5rem">
                                <div style="width:10%;margin:0px auto "></div>
                                <div style="width:20%;margin:0px auto ">
                                    <b>{{ $item['Name'] }}</b>
                                    <br>
                                    <img src="https://ps.w.org/user-avatar-reloaded/assets/icon-256x256.png?rev=2540745"
                                        style="width:50px; height:50px;Background-size: cover ">

                                </div>
                                <div style="width:60%;margin:0px auto" class="border-comment">
                                    {{ $item['Content'] }}
                                    <br>
                                    <br>
                                    <i class="far fa-clock" style="margin-left:1rem;"></i> {{ $item['created_at'] }}
                                </div>
                                <div style="width:20%;margin:0px auto ">
                                    <div class="dropdown">
                                        <i class="fas fa-ellipsis-v" id="dots" style="margin-left:1rem;" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ asset("/blog/deletecomment?id=".$item['Id']) }}">Delete</a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                            <br>
                            <br>
                            <form  method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-7">
                                        <input type="text" name="id" hidden value="{{ $ds['Id'] }}">
                                        <textarea name="comment-text" id="comment-text" cols="70" rows="3"></textarea>
                                    </div>

                                    <div class="col-sm-2">
                                    <input type="submit" style="margin-top: 2rem" value="Comment" class="btn btn-success">
                                    </div>
                                </div>
                            </form>
                      





                    </div>


                </div>

            </div>



        </div>

        <script>
            var App = new Vue({
                el: "#myApp",
                created() {
                    this.load();
                },
                data() {
                    return {
                        content: []

                    }

                },
                methods: {
                    load: function() {
                        data = {!! json_encode($ds, JSON_HEX_TAG) !!}

                        document.getElementById("content").innerHTML = data["Content"];
                        url = data["url"] + "?id=" + data["Id"]

                        axios.get(url)
                            .then(response => {

                            })
                            .catch(e => {
                                this.errors.push(e)
                            })

                        console.log(url);


                    },



                }

            })
        </script>




    </div>


</body>

</html>
