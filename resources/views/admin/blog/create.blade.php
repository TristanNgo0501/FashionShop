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





        <div class="container">

            <h2 style="text-align:center; margin-top:1rem">Create Blog</h2>


            <form method="post" onsubmit="return checkvalidate()"  enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputBlogName">Blog Name</label>
                            <input type="text" class="form-control" id="exampleInputBlogName"
                                aria-describedby="nameHelp" placeholder="Enter Blog Name"  name="exampleInputBlogName">
                            <small id="nameHelp" hidden class="form-text text-danger">Blog name cannot blank</small>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>


                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputDescription">Blog Description</label>
                            <textarea type="text" rows="4" class="form-control" id="exampleInputDescription"
                                aria-describedby="descriptionHelp" placeholder="Enter Description" name="exampleInputDescription"></textarea>
                            <small id="descriptionHelp" hidden class="form-text text-danger">Blog Description cannot
                                blank</small>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>


                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputContent">Content</label>
                            <textarea type="text" rows="4" class="form-control ckeditor" id="exampleInputContent"
                                aria-describedby="descriptionContent" placeholder="Enter Content" name="exampleInputContent"></textarea>
                            <small id="ContentHelp" hidden class="form-text text-danger">Blog Content cannot
                                blank</small>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>

                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col">
                        <div class="form-group">
                            {{-- <label for="exampleInputDescription">Blog Image</label> --}}

                            <input type="file" class="custom-file-input" name="file" id="photoQuestion"
                                onchange="validationPhotoQuestion()" class="form-control" />

                            <label class="custom-file-label" id="image_label" for="">Add Thumbnail</label>

                            <small id="eror-image" class="form-text text-danger font-italic"> </small>

                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>

                <div class="row" id="div-image">
                    <div class="col-sm-2"></div>
                    <div class="col">
                        <img src="" id="imageavt" height="200px" />
                    </div>

                    <div class="col-sm-2"></div>
                </div>


                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col" style="text-align: center">
                        <input type="submit" value="Create new Blog" class="btn btn-success">
                    </div>
                    <div class="col-sm-2"></div>
                </div>

            </form>



            <script>
                function validationPhotoQuestion() {

                    var fileName = $('#photoQuestion').val().split("\\").pop();

                    daucham = fileName.lastIndexOf(".");

                    size = Number($('#photoQuestion')[0].files[0].size);



                    duoifile = fileName.slice(daucham + 1, fileName.length);
                    duoifile = duoifile.toLowerCase();

                    if (((duoifile == "jpg") || (duoifile == "png") || (duoifile == "jpeg")) && (size <= 10485760)) {

                        $('#photoQuestion').siblings("#image_label").addClass("selected").html(fileName);


                        var reader = new FileReader();
                        reader.onload = function(e) {
                            // get loaded data and render thumbnail.


                            document.getElementById("imageavt").src = e.target.result;
                            document.getElementById("div-image").hidden = false;
                            chooseimg = true;
                        };

                        // read the image file as a data URL.
                        reader.readAsDataURL($('#photoQuestion')[0].files[0]);
                        document.getElementById("eror-image").innerText = "";

                    } else {
                        document.getElementById("eror-image").innerText =
                            "Please select the correct image format (jpg, png, jpeg) and less than 10Mb";

                    }

                }
            </script>

            <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('.ckeditor').ckeditor();
                });
            </script>

            <script>
                function checkvalidate() {

                    // console.log(document.getElementById("exampleInputBlogName").value);

                    name = document.getElementById("exampleInputBlogName").value;
                    description = document.getElementById("exampleInputDescription").value;
                    content = document.getElementById("exampleInputContent").value;

                    console.log(description);

                    check = true;

                    if (name == "" || name == null) {
                        document.getElementById("nameHelp").hidden = false
                        check = false
                    } else {
                        document.getElementById("nameHelp").hidden = true;

                    }

                    if (description == "" || description == null) {
                        document.getElementById("descriptionHelp").hidden = false
                        check = false
                    } else {
                        document.getElementById("descriptionHelp").hidden = true;

                    }
                    for (instance in CKEDITOR.instances) {
                        //element id 
                        if (CKEDITOR.instances['exampleInputContent'].getData() == "") {

                            document.getElementById("ContentHelp").hidden = false
                            check = false

                        } else {
                            document.getElementById("ContentHelp").hidden = true;
                        }
                    }


                    var fileName = $('#photoQuestion').val();

                    if (fileName == "" || fileName == null) {
                        document.getElementById("eror-image").innerText =
                            "Image Not blank";

                        check = false
                    } else {
                        document.getElementById("eror-image").innerText = "";
                        daucham = fileName.lastIndexOf(".");

                        size = Number($('#photoQuestion')[0].files[0].size);



                        duoifile = fileName.slice(daucham + 1, fileName.length);
                        duoifile = duoifile.toLowerCase();

                        if (((duoifile == "jpg") || (duoifile == "png") || (duoifile == "jpeg")) && (size <= 10485760)) {

                            $('#photoQuestion').siblings("#image_label").addClass("selected").html(fileName);


                            var reader = new FileReader();
                            reader.onload = function(e) {
                                // get loaded data and render thumbnail.


                                document.getElementById("imageavt").src = e.target.result;
                                document.getElementById("div-image").hidden = false;
                                chooseimg = true;
                            };

                            // read the image file as a data URL.
                            reader.readAsDataURL($('#photoQuestion')[0].files[0]);
                            document.getElementById("eror-image").innerText = "";

                        } else {
                            document.getElementById("eror-image").innerText =
                                "Please select the correct image format (jpg, png, jpeg) and less than 10Mb";
                                check = false
                        }

                    }

                    if(check == true){
                        return true;

                    }else{
                        return false;
                    }


                    
                }
            </script>

        </div>




    </div>

</body>

</html>
