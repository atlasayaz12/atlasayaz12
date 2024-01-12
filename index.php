<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>yapay zeka işte </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <style>
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 'Poppins', sans-serif;
            background-color: #f9f9fa;
        }
        .container {
            justify-content: center;
            max-height: 80%;
            padding: 12px 20px;
            width: 500px;
        }
        .media-chat {
            display: block;
            padding: 8px 10px;
            margin: 6px 0;
            background-color: #f5f6f7;
            border: 1px solid #41414120;
            border-radius: 6px;
            color: #414141;
            font-weight: 400;
        }
        .media-chat-reverse {
            background-color: #7c84cf;
            color: white;
        }
        .publisher {
            position: relative;
            display: flex;
            align-items: center;
            padding: 4px 6px;
            background-color: #41414120;
        }
        .chat-input {
            border: none;
            flex-grow: 1;
            outline: none;
            height: 100%;
            padding: 9px 8px;
        }
        .chat-box {
            overflow-y: scroll;
            height: 450px;
        }

    </style>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <span>ChatGPT & ı am</span>
            </div>
            <div class="p-4 chat-box" id="chat-box">
                <div class="media-chat">
                    <p>
                        <b>AI:</b>
                        Merhaba ben ChatGPT size nasıl yardımcı olabilirim?
                    </p>
                </div>
                <div tabindex="0" style="top:0;"></div>
            </div>
            <div class="publisher border-ligth">
                <input type="text" class="chat-input" id="input-msg" placeholder="Mesajınızı Giriniz...">
                <button class="btn btn-primary" id="send-btn">Gönder</button>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

var input = $('#input-msg');
var btn = $('#send-btn');
var chat = $('#chat-box');

btn.click('on',function(){
    if(input.val().length == 0){
        alert('Litfen Bir şeyler girin !');
    }
    else{
        var value = input.val();
        chat.append(`
            <div class="media-chat media-chat-reverse">
                <p>
                    <b>Human:</b>
                    ` + value + `
                </p>
            </div>
        `);
        input.val('');
        $.ajax({
            type: "POST",
            url: "/chat-api.php",
            data: {prompt: value},
            dataType: "json",
            success:function(response){
                var data = JSON.parse(response);
                chat.append(`
                    <div class="media-chat">
                        <p>
                            <b>AI:</b>
                            ` + data.choices[0].text + `
                        </p>
                    </div>
                `);
                console.log(data);
            },
            error:function(e){
                console.error('Hata Oluştu:' + e);
            }
        });
    }
});

setInterval(() => {
    chat.scrollTop(chat.prop('scrollHeight'));
}, 200);

</script>
</body>
</html>