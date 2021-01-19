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
            <div class="carEnroll">
                <h1>자동차 등록</h1>

                <div>
                    <form method="POST" name="carEnroll" action='/car'>
                        <div>
                            <label>소유자 이름</label>
                            <input type="text" class='owner' name="owner" id="owner">
                        </div>
                        <div>
                            <label>자동차 연식</label>
                            <input type="text" class='year' name="year" id="year">
                        </div>
                        <div>
                            <label>자동차 사이즈</label>
                            <select name="size" id="size">
                                <option value="소형">소형</option>
                                <option value="중형">중형</option>
                                <option value="대형">대형</option>
                            </select>
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
        var owner = document.getElementById("owner");
        var year = document.getElementById("year");
        var size = document.getElementById("size");

        if(owner.value=="") {
            alert("소유자를 입력해주세요.");
            owner.focus();
            return false;
        }

        var ownerReg = /^[가-힣]{2,10}$/g;
        if(!ownerReg.test(owner.value)) {
            alert("형식에 맞게 입력해주세요.");
            owner.focus();
            return false;
        }

        if(year.value=="") {
            alert("연식을 입력해주세요.");
            year.focus();
            return false;
        }

        var yearReg = /^[0-9]{2,10}$/g;
        if(!yearReg.test(year.value)) {
            alert("형식에 맞게 입력해주세요.");
            year.focus();
            return false;
        }

        if(size.value=="") {
            alert("사이즈를 입력해주세요.");
            size.focus();
            return false;
        }

        document.carEnroll.submit();
    }
</script>
