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
            .card-blog {
                box-shadow: 0px 0px 20px rgb(234, 229, 229);
                padding: 1rem 0.5rem;
                padding-right: 2rem;
                border-radius: 20px;
                margin: 0px auto;
                width: 95%;
            }

            .description {
                display: -webkit-box;
                height: 6.5rem;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: normal;
                -webkit-line-clamp: 5;
                line-height: 1.6rem;
            }
        </style>
        <div class="container" id="myApp"  >

            <h2 style="text-align:center; margin: 1.5rem 0px;">Blog</h2>

            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <input type="text" placeholder="Search" style="width:80%;margin:0px auto" class="form-control"
                        id="input-search" v-on:keyup="searchblog">

                </div>
                <div class="col-sm-2">
                </div>
            </div>


            <div v-for="(value,index) in data" :key="index" v-show="value.is_Display">
                <div class=" card-blog" style="margin-top: 2rem;" data-aos="fade-up">
                    <div class="row">
                        <div class="col-sm-5">
                            <img :src=" value.Thumbnail" style="width:15rem;margin-left: 15%; max-height:10rem; "
                                alt="" srcset="">
                        </div>
                        <div class="col" style="padding-left: 2rem;">

                            <h3 v-text="value.Name">Tiêu đề</h3>
                            <div class="description" v-text="value.Description">
                                Màu sắc rực rỡ, selfie đẹp, chụp ảnh chân dung bokeh art độc lạ mà không cần là dân
                                trong
                                nghề,... Đó chính là những điểm mà mình chỉ có thể "say wow" trên chiếc Reno8 5G mới
                                được
                                OPPO cho ra mắt năm này. Cùng 1 mức giá quá là mềm nhỉnh hơn 10 triệu một
                                chút, theo mình thấy, chiếc Reno 8 5G này là chiếc smartphone hướng tới sự phóng khoáng
                                dành
                                cho thế hệ GenZ trẻ trung, chứ không phải siêu phẩm vài chục triệu khác đang có mặt trên
                                thị
                                trường. Vậy thì OPPO Reno8 5G cụ thể
                                sẽ hấp dẫn như thế nào, hãy cùng mình điểm qua những điểm đặc biệt nhé.
                            </div>
                            <br>
                            <div class="row">
                                <div class="col" style="margin-right:-2rem ;">
                                    <span style="font-size: 15pt; margin-left: 1rem;"> <i class="fas fa-eye"></i> <span
                                            v-text="value.View"></span></span>
                                    <span style="font-size: 15pt; margin-left: 1rem;"> <i class="fas fa-comment"></i>
                                        <span v-text="value.comment"></span></span>
                                </div>
                                <div class="col" style="text-align: right;">
                                    <a :href="value.url"> Xem thêm
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>






        </div>

        <script>
            //Load Scoll 
            AOS.init({
                duration: 1200,
            });
        </script>

        <script>
            var App = new Vue({
                el: "#myApp",
                created() {
                    this.load();
                },
                data() {
                    return {
                        data: []

                    }

                },
                methods: {
                    load: function() {

                        data = {!! json_encode($ds, JSON_HEX_TAG) !!}
                        // console.log(data);
                        data.forEach(element => {
                            this.data.push({
                                Id: element["Id"],
                                Description: element["Description"],
                                Name: element["Name"],
                                Thumbnail: element["Thumbnail"],
                                View: element["View"],
                                comment: element["comment"],
                                url: element["url"],
                                is_Display: true,


                            })
                        });



                    },
                    searchblog: function() {
                        str = document.getElementById("input-search").value;
                        strconvert = this.convert(str);

                      for (let i = 0; i <this.data.length ; i++) {
                        str1 =  this.convert(this.data[i]["Name"]);
                        str2 =  this.convert(this.data[i]["Description"]);
                        console.log(str1);
                            
                            if(str1.includes(strconvert) ||str2.includes(strconvert)){
                                this.data[i]["is_Display"]=true;
                            }else{
                                this.data[i]["is_Display"]=false;
                            }
                        
                      }

                        console.log(strconvert);

                    },
                    convert: function(str) {
                        str = str.toLowerCase();
                        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
                        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
                        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
                        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
                        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
                        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
                        str = str.replace(/đ/g, "d");
                        str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
                        str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
                        str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
                        str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
                        str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
                        str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
                        str = str.replace(/Đ/g, "D");
                        // Some system encode vietnamese combining accent as individual utf-8 characters
                        // Một vài bộ encode coi các dấu mũ, dấu chữ như một kí tự riêng biệt nên thêm hai dòng này
                        str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g,
                            ""); // ̀ ́ ̃ ̉ ̣  huyền, sắc, ngã, hỏi, nặng
                        str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // ˆ ̆ ̛  Â, Ê, Ă, Ơ, Ư
                        // Remove extra spaces
                        // Bỏ các khoảng trắng liền nhau
                        str = str.replace(/ + /g, " ");
                        str = str.trim();
                        // Remove punctuations
                        // Bỏ dấu câu, kí tự đặc biệt
                        str = str.replace(
                            /!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g,
                            " ");

                        for (let index = 0; index < 5; index++) {
                            str = str.replace(/ +/g, "");
                        }

                        return str;
                    }


                }

            })
        </script>


    </div>


</body>

</html>
