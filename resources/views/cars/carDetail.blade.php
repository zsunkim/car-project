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
            <div class="carDetail">
                <h1>자동차 상세 정보</h1>

                <div>
                    <div class="carDetail">
                        <label>자동차 명</label>
                        <input type="text" class='name' name="name" id="name" value="{{ $detail_info->name }}" readonly required>
                        <label>자동차 색상</label>
                        <input type="text" class='color' name="color" id="color" value="{{ $detail_info->color }}" readonly>
                        @if(empty($detail_info->accident_id))
                            <a href="/car/{{ $detail_info->car_id }}/accident">사고이력 등록하기</a>
                        @else
                            <label>사고이력</label>
                            <input type="text" class='accident_status' name="accident_status" id="accident_status" value="{{ $detail_info->accident_status }}" readonly>
                        @endif
                    </div>
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
</script>
