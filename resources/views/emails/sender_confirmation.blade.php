<!DOCTYPE html>
<html>
<head>
    <title>Thank You</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 5px; }
        .header { background: #2c3e50; color: #fff; padding: 15px; text-align: center; font-size: 18px; font-weight: bold; border-radius: 5px 5px 0 0; }
        .content { margin-top: 20px; padding: 10px; }
        .footer { margin-top: 30px; font-size: 12px; color: #777; text-align: center; border-top: 1px solid #eee; padding-top: 10px; }
        .summary { background: #f9f9f9; padding: 15px; border-left: 4px solid #2c3e50; margin-top: 15px; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        We Have Received Your Message!
    </div>
    <div class="content">
        <p>Dear {{ $messageData->name }},</p>
        <p>Thank you for reaching out to us. We have successfully received your inquiry regarding
            <strong>
                @if($messageData->interest == 1) Electrolite
                @elseif($messageData->interest == 2) Device
                @elseif($messageData->interest == 3) Water Filter
                @else General Enquiry
                @endif
            </strong>.
        </p>
        <p>Our team will review your message and get back to you as soon as possible.</p>

        <div class="summary">
            <strong>A copy of your message:</strong>
            <p style="font-style: italic; color: #555;">"{{ $messageData->message }}"</p>
        </div>
    </div>
    <div class="footer">
        This is an automated confirmation email. Please do not reply directly to this mail.<br>
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </div>
</div>
</body>
</html>
