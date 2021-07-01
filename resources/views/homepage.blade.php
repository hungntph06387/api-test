<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="/css/main.css">
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src= "https://malsup.github.io/jquery.blockUI.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">

    <div class="my-header">
        <div class="mycontainer">
            <!--START NAVBAR -->
            <div class="navbar">
                <div class="logo">
                    <img src="/images/logo.jpg" alt="" width="125px">
                </div>
                <nav class="">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="/login">Login</a></li>
                    </ul>
                </nav>

                @if(Session::get('loggedUser'))
                    <a href="#">{{Auth::user()->name}}</a> / <a href="/logout">Logout</a>
                    {{--<img src="{{ Auth::user()->avatar }}" alt="Facebook Avatar" height="64" width="64">--}}
                @endif
            </div>
        </div>
    </div>

    <div class="formControll">
        <form id="submitForm">
            @csrf
            <meta name="csrf_token" content="{{ csrf_token() }}" />
            <div>
                @if(Session::get('loggedUser'))
                    <input name="user_id" id="user_id" type="hidden" value="{{ Auth::user()->id }}">
                @endif
            </div>
            <input type="hidden" id="id" name="id">
            <div class="form-group">
                <label for="exampleFormControlTextarea4">Original Text</label>
                <div>
                    <textarea class="form-control" name="str" id="str" cols="30" rows="10">感じ取れたら手を繋ごう、重なるのは人生のライン and レミリア最高！</textarea>
                </div>
                <div class="option">
                    <label for="exampleFormControlSelect1">To</label>
                    <div class="select">
                        <select class="form-control" id="to" name="to" tabindex="2">
                            <option value="hiragana" selected>hiragana</option>
                            <option value="katakana">katakana</option>
                            <option value="romaji">romaji</option>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Mode</label>
                    <div class="select">
                        <select class="form-control" id="mode" name="mode" tabindex="1">
                            <option value="normal"  {{old('mode') == 'normal' ? 'selected' : ''}}>normal</option>
                            <option value="spaced" {{old('mode' == 'normal' ? 'selected': '')}} >spaced</option>
                            <option value="okurigana" {{old('mode') == 'okurigana' ? 'selected' : ''}} >okurigana</option>
                            <option value="furigana" {{old('mode' == 'normal' ? 'selected': '')}} >furigana</option>
                        </select>

                    </div>
                </div>
                <div id="romajiOption" class="form-group" style="display:none" >
                    <label> Romaji System </label>
                    <div class="select">
                        <select id="romajiSystem" name="romajiSystem" tabindex="3">
                            <option value="nippon" selected >nippon</option>
                            <option value="passport" >passport</option>
                            <option value="hepburn" >hepburn</option>
                        </select>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Convert</button>
                @if(Session::get('loggedUser'))
                <a id="history" class="btn btn-primary" role="button" at="{{ Auth::user()->id }}" href="/user/{{ Auth::user()->id }}">Converts History</a>
                @endif
                <br>
                <div class="form-group">

                    <div class="form-group">
                        <label class="lable">Result: </label>
                        <p style="color: aqua" id="result"></p>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="myfooter">
        <div class="mycontainer">
            <div class="myrow">
                <div class="footer-col-1">
                    <h3>Dowload Our App</h3>
                    <p>Download App for Android and Ios mobile phone.</p>
                    <div class="app-logo">
                    </div>
                </div>

                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow US</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtobe</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="coppyright">Copyright 2021 | Translate</p>
        </div>
    </div>

</div>


    <script>
        $("#submitForm").submit(function (e){
            e.preventDefault();

            $.blockUI({message:"Converting..."});

            let str = $("#str").val();
            let to = $("#to").val();
            let mode = $("#mode").val();
            let romajiSystem = $("#romajiSystem").val();
            let user_id = $("#user_id").val();
            let _token = $("input[name=_token]").val();

            $.ajax({
                url: "{{route('convert')}}",
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                dataType: 'json',
                // contentType: 'application/json',
                data: {
                    str: str,
                    to:to,
                    mode:mode,
                    romajiSystem:romajiSystem,
                    user_id:user_id,
                    _token:_token
                },
                success:function (response)
                {
                    // console.log(response.result)
                    $("#result").text(response.result);
                    setTimeout($.unblockUI)
                }
            });
        });

        {{--$("#history").click(function (e){--}}
        {{--    e.preventDefault();--}}
        {{--    let history = $("#history").attr('at');--}}

        {{--    $.ajax({--}}
        {{--        url: "{{route('history')}}",--}}
        {{--        type: "GET",--}}
        {{--        data: {--}}
        {{--            history:history--}}
        {{--        },--}}
        {{--        success:function (response) {--}}
        {{--            // console.log(response);--}}
        {{--        }--}}
        {{--    });--}}
        {{--})--}}
    </script>

</body>
</html>
