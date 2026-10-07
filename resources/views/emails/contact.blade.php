<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nouveau message de contact</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #2563eb; color: white; padding: 20px; border-radius: 8px 8px 0 0; }
        .content { background: #f9fafb; padding: 30px; border-radius: 0 0 8px 8px; }
        .info { background: white; padding: 15px; margin: 10px 0; border-left: 4px solid #2563eb; }
        .label { font-weight: bold; color: #2563eb; }
        .message { background: white; padding: 20px; margin-top: 20px; border-radius: 8px; border: 1px solid #e5e7eb; }
        .footer { text-align: center; margin-top: 30px; color: #6b7280; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nouveau message de contact</h1>
        </div>
        
        <div class="content">
            <p>Vous avez reçu un nouveau message depuis le formulaire de contact de votre site.</p>
            
            <div class="info">
                <p><span class="label">Nom :</span> {{ $contactData['name'] }}</p>
                <p><span class="label">Email :</span> {{ $contactData['email'] }}</p>
                <p><span class="label">Date :</span> {{ now()->format('d/m/Y à H:i') }}</p>
            </div>
            
            <h3>Message :</h3>
            <div class="message">
                {{ $contactData['message'] }}
            </div>
            
            <p style="margin-top: 20px;">
                <a href="mailto:{{ $contactData['email'] }}" 
                   style="background: #2563eb; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                    Répondre à {{ $contactData['name'] }}
                </a>
            </p>
        </div>
        
        <div class="footer">
            <p>Cet email a été envoyé automatiquement depuis votre formulaire de contact.</p>
        </div>
    </div>
</body>
</html>