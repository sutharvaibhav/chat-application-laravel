<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
    <title>SampleChat</title>
</head>

<body>
    <section class="msger">
        <header class="msger-header">
            <div class="msger-header-title">
                <i class="fas fa-comment-alt"></i> SampleChat
            </div>
            <div class="msger-header-options">
                <span><i class="fas fa-cog"></i></span>
            </div>
        </header>

        <main class="msger-chat">
            @foreach ($chats as $chat)
                @if ($chat->sender == 'user1')
                    <div class="msg left-msg">
                        <div class="msg-bubble">
                            <div class="msg-info">
                                <div class="msg-info-name">{{ $chat->sender }}</div>
                                <div class="msg-info-time text-muted">{{ $chat->created_at->format('h:i A') }}</div>
                            </div>

                            <div class="msg-text">
                                {{ $chat->message }}
                            </div>
                        </div>
                    </div>
                @endif
                @if ($chat->sender == 'user2')
                    <div class="msg right-msg">
                        <div class="msg-bubble">
                            <div class="msg-info">
                                <div class="msg-info-name">{{ $chat->sender }}</div>
                                <div class="msg-info-time text-muted">{{ $chat->created_at->format('h:i A') }}</div>
                            </div>
                            <div class="msg-text"> {{ $chat->message }}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </main>

        <form class="msger-inputarea" action="{{ route('save.chat') }}" method="POST">
            @csrf
            <input type="text" name="message_box" class="msger-input" placeholder="" />
            <button type="submit" name="sender" value="user1" class="msger-send-btn1">Send</button>
            <button type="submit" name="sender" value="user2" class="msger-send-btn">Send</button>
        </form>
    </section>
</body>

</html>
