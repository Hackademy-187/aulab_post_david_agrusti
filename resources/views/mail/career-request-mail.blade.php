<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuova Candidatura</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background-color: #2c3e50;
            color: #ffffff;
            text-align: center;
            padding: 30px 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 26px;
            letter-spacing: 1px;
        }
        .content {
            padding: 40px 30px;
            color: #333333;
            line-height: 1.6;
        }
        .content p {
            margin-bottom: 20px;
            font-size: 16px;
        }
        .info-box {
            background-color: #e9ecef;
            border-left: 4px solid #18bc9c;
            padding: 15px 20px;
            margin-bottom: 30px;
            border-radius: 4px;
        }
        .info-box strong {
            display: inline-block;
            width: 60px;
            color: #2c3e50;
        }
        .message-box {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 20px;
            border-radius: 6px;
            font-style: italic;
            color: #555555;
            white-space: pre-wrap;
        }
        .footer {
            background-color: #ecf0f1;
            text-align: center;
            padding: 20px;
            font-size: 13px;
            color: #7f8c8d;
            border-top: 1px solid #e2e6e8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>The Aulab Post</h1>
        </div>
        <div class="content">
            <p>Ciao Amministratore,</p>
            <p>È appena arrivata una nuova richiesta di collaborazione da parte di un utente sulla piattaforma.</p>
            
            <div class="info-box">
                <p style="margin: 5px 0;"><strong>Ruolo:</strong> <span style="text-transform: capitalize; color: #18bc9c; font-weight: bold;">{{ $info['role'] }}</span></p>
                <p style="margin: 5px 0;"><strong>Email:</strong> {{ $info['email'] }}</p>
            </div>

            <h3 style="color: #2c3e50; margin-bottom: 15px;">Messaggio di presentazione:</h3>
            <div class="message-box">"{{ $info['message'] }}"</div>
            
            <p style="margin-top: 40px; font-size: 14px;">Puoi gestire questa richiesta direttamente dalla tua Dashboard Amministratore.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} The Aulab Post - Portale di Amministrazione
        </div>
    </div>
</body>
</html>
