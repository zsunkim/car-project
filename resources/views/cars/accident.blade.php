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
            <div class="accident">
                <h1>자동차 사고 등록</h1>

                <div>
                    <form method="POST" name="accident" action='/car/{{ $car_id }}/accident'>
                        <input type="hidden" class='car_id' name="car_id" id="car_id" value="{{ $car_id }}">
                        <div>
                            <label>사고이력</label>
                            <input type="text" class='accident_status' name="accident_status" id="accident_status">
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
        var accident_status = document.getElementById("accident_status");

        if(accident_status.value=="") {
            alert("사고이력을 입력해주세요.");
            accident_status.focus();
            return false;
        }

        var statusReg = /^[0-9가-힣]{2,10}$/g;
        if(!statusReg.test(accident_status.value)) {
            alert("형식에 맞게 입력해주세요.");
            accident_status.focus();
            return false;
        }

        document.accident.submit();
    }
</script>
