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
            <div>
                <h1>사고 이력</h1>

                <div>
                    @foreach($accident_info as $info)
                    <div class="accidentlist">
                        <label>사고이력</label>
                        <input type="text" class='accident_status' name="accident_status" id="accident_status" value="{{ $info->accident_status }}" readonly>
                    </div>
                    @endforeach
                    <div>
                        <a href="/car/{{ $car_id }}/accident">사고이력 등록하기</a>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
