<!DOCTYPE html>
<html>
<head>
    <title>New Contact Message</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 5px; }
        .header { background: #1a2b4c; color: #ffffff; padding: 15px; text-align: center; font-size: 18px; font-weight: bold; border-radius: 5px 5px 0 0; }
        .content { margin-top: 20px; }
        .table { width: 100%; border-collapse: collapse; }
        .table td { padding: 10px; border-bottom: 1px solid #ddd; vertical-align: top; }
        .table td.label { font-weight: bold; width: 35%; color: #555; }
        .message-box { background: #f4f4f4; padding: 15px; border-radius: 4px; margin-top: 10px; white-space: pre-wrap; border-left: 3px solid #1a2b4c; }
        .badge { display: inline-block; padding: 3px 8px; font-size: 12px; font-weight: bold; border-radius: 3px; }
        .badge-success { background-color: #d4edda; color: #155724; }
        .badge-danger { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        New Quote Request / Message Received
    </div>
    <div class="content">
        <table class="table">
            <tr>
                <td class="label">Name:</td>
                <td>{{ $messageData->name }}</td>
            </tr>
            <tr>
                <td class="label">Email:</td>
                <td><a href="mailto:{{ $messageData->email }}">{{ $messageData->email }}</a></td>
            </tr>
            <tr>
                <td class="label">Phone:</td>
                <td>{{ $messageData->phone ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="label">Zip Code:</td>
                <td>{{ $messageData->zip_code ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="label">Address:</td>
                <td>
                    {{ $messageData->street_address }}
                    @if($messageData->apartment)
                        <br><small class="text-muted">Apt/Suite: {{ $messageData->apartment }}</small>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="label">Frequency:</td>
                <td>{{ $messageData->frequency ?? 'N/A' }}</td>
            </tr>
            {{--<tr>
                <td class="label">SMS Opt-In:</td>
                <td>
                    @if($messageData->sms_opt_in == 1)
                        <span class="badge badge-success">Yes (Agreed)</span>
                    @else
                        <span class="badge badge-danger">No</span>
                    @endif
                </td>
            </tr>--}}
            <tr>
                <td class="label">Interest / Service:</td>
                <td>
                    {{-- যদি $messageData->service রিলেশন করা থাকে তবে নিচের লাইনটি ব্যবহার করতে পারেন --}}
                     {{ $messageData->get_service->name ?? '' }}
                </td>
            </tr>
        </table>

        @if($messageData->message)
            <p style="margin-top: 20px; font-weight: bold;">Additional Message/Notes:</p>
            <div class="message-box">
                {{ $messageData->message }}
            </div>
        @endif
    </div>
</div>
</body>
</html>
