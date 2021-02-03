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
            <div class="carList">
                <h1>소유자 리스트</h1>

                <div>
                    @foreach ($car_info as $item)
                        <div class="carlist">
                            <a href="/car/list/{{ $item->car_id }}/detail">
                                <label>소유자</label>
                                <input type="text" class='owner' name="owner" id="owner" value="{{ $item->owner }}" readonly>
                                <label>연식</label>
                                <input type="text" class='year' name="year" id="year" value="{{ $item->year }}" readonly>
                                <label>차 크기</label>
                                <input type="text" class='size' name="size" id="size" value="{{ $item->size }}" readonly>
                            </a>
                        </div>
                    @endforeach

                    {{-- {{ $car_info->links() }} --}}
                    {!! $car_info->render() !!}

                    <div>
                        <a href="/car">자동차 등록하기</a>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
