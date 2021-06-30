<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <!--START NAVBAR -->
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

            </div>
            <!--END NAVBAR -->
            @if(Session::get('loggedUser'))
                <div>
                    <img src="{{ Auth::user()->avatar }}" alt="Facebook Avatar" height="64" width="64">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="/user/{{ Auth::user()->id }}">Converts History</a>
                    <br>
                    <a href="/logout">Logout</a>
                </div>
            @endif
        </div>
    </div>
    <!--END NAVBAR -->

    <!--START BODY -->
    <form action="/convert" method="POST">
        @csrf
        <div>
            @if(Session::get('loggedUser'))
                <input name="user_id" id="user_id" type="hidden" value="{{ Auth::user()->id }}">
            @endif
        </div>
        <div>
            <label>Original Text</label>
            <div>
                <textarea name="str" id="str" cols="30" rows="10">感じ取れたら手を繋ごう、重なるのは人生のライン and レミリア最高！</textarea>
            </div>
            <div class="option">
                <label>To </label>
                <div class="select">
                    <select id="to" name="to" tabindex="2">
                        <option value="hiragana" selected>hiragana</option>
                        <option value="katakana">katakana</option>
                        <option value="romaji">romaji</option>
                    </select>

                </div>
            </div>
            <div class="option">
                <label>Mode </label>
                <div class="select">
                    <select id="mode" name="mode" tabindex="1">
                        <option value="normal"  {{old('mode') == 'normal' ? 'selected' : ''}}>normal</option>
                        <option value="spaced" {{old('mode' == 'normal' ? 'selected': '')}} >spaced</option>
                        <option value="okurigana" {{old('mode') == 'okurigana' ? 'selected' : ''}} >okurigana</option>
                        <option value="furigana" {{old('mode' == 'normal' ? 'selected': '')}} >furigana</option>
                    </select>

                </div>
            </div>
            <div id="romajiOption" class="option" style="display:none" >
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
            <button type="submit" class="btn btn-primary" id="btnConvert">Convert</button>
            <br>
            <div id="output">
                <p>Result: </p>
                @if(isset($content))
                    @foreach($content as $result)
                        <div id="">
                            <p>{{$result}}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </form>
    <!--END BODY -->

</div>
</body>
</html>
