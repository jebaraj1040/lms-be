
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mailData['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            border: 2px solid #ddd; /* Add border */
        }

        h1, h2, h3, h4, h5, h6 {
            color: #333;
            margin: 0 0 10px;
        }

        p {
            color: #666;
            margin: 0 0 15px;
        }

        ul {
            margin: 0;
            padding: 0 0 0 20px;
        }

        li {
            color: #666;
            margin-bottom: 5px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Dear {{ $mailData['name'] }},</h2>
        <p>We are pleased to inform you that your registration on our platform was successful.</p>
        <p>Welcome aboard! Here are your registration details:</p>
        <ul>
            <li><strong>Name:</strong> {{ $mailData['name'] }}</li>
            <li><strong>Email:</strong> {{ $mailData['email'] }}</li>
        </ul>
        <p>Thank you for choosing our platform. If you have any questions or need assistance, feel free to contact us.</p>
        <p>Best regards,</p>
        <p>Your Company Name</p>
    </div>
    <div class="footer">
        <p>This is an automated message. Please do not reply to this email.</p>
    </div>
</body>
</html>