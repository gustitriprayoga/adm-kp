<!DOCTYPE html>
<html>
  <head>
    <title>Facebook chat (HTML &amp; CSS)</title>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />

    <link rel="stylesheet" href="{{asset('chat.css')}}">
  </head>

  <body>
    <div class="container">
        <div id="app">
            <div class="message-group-received">
              <div>
                <img src="https://api.adorable.io/avatars/100/webdeveducation.png" />
              </div>
              <div>
                <div class="message-received">
                  <div class="message-received-text">
                    Hey man! How's it going?
                  </div>
                </div>
                <div class="message-received">
                  <div class="message-received-text">
                    Hey man! How's it going?
                  </div>
                </div>
                <div class="message-received">
                  <div class="message-received-text">
                    Hey man! How's it going?
                  </div>
                </div>
              </div>
            </div>
            <div class="message-group-sent">
              <div class="message-sent">
                <div class="message-sent-text">
                  Hey man! How's it going?
                </div>
                <div class="message-sent-status"></div>
              </div>
              <div class="message-sent">
                <div class="message-sent-text">
                  Hey man! How's it going?
                </div>
                <div class="message-sent-status"></div>
              </div>
              <div class="message-sent">
                <div class="message-sent-text">
                  Hey man! How's it going?
                </div>
                <div class="message-sent-status">
                  <img
                    src="https://api.adorable.io/avatars/100/webdeveducation.png"
                  />
                </div>
              </div>
            </div>
            <div class="message-group-received">
             
              <div>
                <div class="message-received">
                  <div class="message-received-text">
                    Hey man! How's it going?
                  </div>
                </div>
                <div class="message-received">
                  <div class="message-received-text">
                    Hey man! How's it going?
                  </div>
                </div>
                <div class="message-received">
                  <div class="message-received-text">
                    Hey man! How's it going?
                  </div>
                </div>
              </div>
            </div>
            <div class="message-group-sent">
              <div class="message-sent">
                <div class="message-sent-text">
                  Hey man! How's it going?
                </div>
              </div>
              <div class="message-sent">
                <div class="message-sent-text">
                  Hey man! How's it going?
                </div>
                
              </div>
              <div class="message-sent">
                <div class="message-sent-text">
                  Hey man! How's it going?
                </div>
                
              </div>
            </div>
        </div>
        <div id="colom-chat">
            <form action="" method="post">
                <input class="chat" type="text" name="chat">
                <button class="tombol" type="submit"> Kirim</button>
            </form>
        </div>

    </div>
    

    {{-- <script src="src/index.js"></script> --}}
  </body>
</html>
