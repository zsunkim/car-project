<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <div class="ownerSearch">
                <h1>소유자 검색</h1>

                <div>
                    <form method="POST" name="searchForm" action='/cars/list'>
                        <div class="ownerInput">
                            <input type="text" class='owner' name="owner" id="owner" maxlength="10">
                        </div>

                        <div class="btn">
                            <button type="button" class="search_form" onclick="search()">입력</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </body>

</html>

<script language="javascript">
    function search() {
        var owner = document.getElementById("owner");

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

        document.searchForm.submit();
    }
</script>
