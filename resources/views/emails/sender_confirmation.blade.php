<!DOCTYPE html>
<html>
<head>
    <title>Thank You</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 5px; }
        .header { background: #1a2b4c; color: #fff; padding: 15px; text-align: center; font-size: 18px; font-weight: bold; border-radius: 5px 5px 0 0; }
        .content { margin-top: 20px; padding: 10px; }
        .footer { margin-top: 30px; font-size: 12px; color: #777; text-align: center; border-top: 1px solid #eee; padding-top: 10px; }
        .summary { background: #f9f9f9; padding: 15px; border-left: 4px solid #1a2b4c; margin-top: 15px; border-radius: 0 4px 4px 0; }
        .summary-title { font-weight: bold; color: #1a2b4c; margin-bottom: 8px; border-bottom: 1px solid #eee; padding-bottom: 5px; }
        .details-list { margin: 0; padding-left: 20px; color: #555; }
        .details-list li { margin-bottom: 5px; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        We Have Received Your Request!
    </div>
    <div class="content">
        <p>Dear {{ $messageData->name }},</p>
        <p>Thank you for reaching out to us. We have successfully received your quote request regarding
            <strong>
                {{ $messageData->get_service->name ?? '' }}
            </strong>.
        </p>
        <p>Our team is currently reviewing your details and one of our representatives will get back to you within one business day.</p>

        <div class="summary">
            <div class="summary-title">Summary of your request:</div>
            <ul class="details-list">
                <li><strong>Service:</strong>
                    {{ $messageData->get_service->name ?? '' }}
                </li>
                <li><strong>Frequency:</strong> {{ $messageData->frequency ?? 'N/A' }}</li>
                <li><strong>Service Address:</strong> {{ $messageData->street_address }}{{ $messageData->apartment ? ', '.$messageData->apartment : '' }} (Zip: {{ $messageData->zip_code }})</li>
                <li><strong>Phone:</strong> {{ $messageData->phone }}</li>
            </ul>

            @if($messageData->message)
                <p style="margin-top: 12px; margin-bottom: 5px; font-weight: bold; color: #555;">Your Notes:</p>
                <p style="font-style: italic; color: #666; margin: 0; white-space: pre-wrap;">"{{ $messageData->message }}"</p>
            @endif
        </div>
    </div>
    <div class="footer">
        This is an automated confirmation email. Please do not reply directly to this mail.<br>
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </div>
</div>
</body>
</html>
