<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .btn button {
                width: 100px;
                height: 20px;
                margin-top: 20px;
            }
            .content {margin-left: 200px;}
        </style>
    </head>
    <body>
        <div class="content">
            <div class="insertCarDetail">
                <h1>자동차 디테일 등록</h1>

                <div>
                    <form method="POST" name="detailForm" action='/car/detail'>
                        <input type="hidden" class='car_id' name="car_id" id="car_id" value="{{ $car_id }}">
                        <div>
                            <label>자동차 이름</label>
                            <input type="text" class='name' name="name" id="name">
                        </div>
                        <div>
                            <label>자동차 색상</label>
                            <input type="text" class='color' name="color" id="color">
                        </div>

                        <div class="btn">
                            <button type="button" onclick="enroll()">입력</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </body>

</html>

<script language="javascript">
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }

    function enroll() {
        var name = document.getElementById("name");
        var color = document.getElementById("color");

        if(name.value=="") {
            alert("자동차명을 입력해주세요.");
            name.focus();
            return false;
        }

        var nameReg = /^[a-zA-Z가-힣]{2,10}$/g;
        if(!nameReg.test(name.value)) {
            alert("형식에 맞게 입력해주세요.");
            name.focus();
            return false;
        }

        if(color.value=="") {
            alert("색상을 입력해주세요.");
            color.focus();
            return false;
        }

        document.detailForm.submit();
    }
</script>
