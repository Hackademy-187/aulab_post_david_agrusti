<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiornamento Candidatura</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    
    <div style="text-align: center; margin-bottom: 30px;">
        <h1 style="color: #dc3545;">The Aulab Post</h1>
    </div>

    <p>Ciao <strong>{{ $user->name }}</strong>,</p>

    <p>Ti scriviamo in merito alla tua recente richiesta per il ruolo di <strong>{{ $role }}</strong> sulla nostra piattaforma.</p>

    <p>Dopo un'attenta valutazione da parte dell'amministrazione, siamo spiacenti di doverti comunicare che la tua richiesta non è stata accettata in questo momento.</p>

    @if($reason)
        <div style="background-color: #f8f9fa; border-left: 4px solid #dc3545; padding: 15px; margin: 20px 0;">
            <p style="margin: 0;"><strong>Motivazione dell'amministratore:</strong></p>
            <p style="margin: 10px 0 0 0; font-style: italic;">"{{ $reason }}"</p>
        </div>
    @endif

    <p>Ti ringraziamo comunque per l'interesse mostrato e per il tuo contributo alla community di The Aulab Post. Potrai eventualmente riproporre la tua candidatura in futuro.</p>

    <p>Cordiali saluti,<br>
    <strong>Il team di The Aulab Post</strong></p>

</body>
</html>
