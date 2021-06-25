<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form action="/convert" method="POST">
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
                        <option value="normal" selected>normal</option>
                    </select>

                </div>
            </div>
            <div id="romajiOption" class="option" style="display:none">
                <label> Romaji System </label>
                <div class="select">
                    <select id="romajiSystem" name="romajiSystem" tabindex="3">
                        <option value="nippon" selected>nippon</option>
                    </select>
                </div>
            </div>
            <br>

            <div id="output">
                <p>Result</p>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Convert</button>
    </form>
</div>
</body>
</html>
