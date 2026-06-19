<!DOCTYPE html>
<html>
<head>
    <title>New Contact Message</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 5px; }
        .header { background: #f8f9fa; padding: 15px; text-align: center; font-size: 18px; font-weight: bold; }
        .content { margin-top: 20px; }
        .table { width: 100%; border-collapse: collapse; }
        .table td { padding: 10px; border-bottom: 1px solid #ddd; }
        .table td.label { font-weight: bold; width: 30%; }
        .message-box { background: #f4f4f4; padding: 15px; border-radius: 4px; margin-top: 10px; white-space: pre-wrap; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        New Contact Message Received
    </div>
    <div class="content">
        <table class="table">
            <tr>
                <td class="label">Name:</td>
                <td>{{ $messageData->name }}</td>
            </tr>
            <tr>
                <td class="label">Email:</td>
                <td>{{ $messageData->email }}</td>
            </tr>
            <tr>
                <td class="label">Phone:</td>
                <td>{{ $messageData->phone ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="label">Interest:</td>
                <td>
                    @if($messageData->interest == 1) Electrolite
                    @elseif($messageData->interest == 2) Device
                    @elseif($messageData->interest == 3) Water Filter
                    @else General Enquiry
                    @endif
                </td>
            </tr>
        </table>

        <p><strong>Message:</strong></p>
        <div class="message-box">
            {{ $messageData->message }}
        </div>
    </div>
</div>
</body>
</html>
