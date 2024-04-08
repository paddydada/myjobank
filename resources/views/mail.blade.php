<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
            color: #333333;
        }
        .item {
            margin-bottom: 10px;
        }
        .item b {
            font-weight: bold;
        }
        .item p {
            margin: 0;
        }
        .footer {
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
            border-radius: 0 0 8px 8px;
        }
    </style>
</head>
<body>
   <div class="container">
    <div class="header">
        <h2>New Contact Email</h2>
    </div>
    <div class="content">
        <div class="item">
            <b>Name:</b>
            <p>{{ isset($formData['name']) ? $formData['name'] : 'N/A' }}</p>
        </div>
        <div class="item">
            <b>Email:</b>
            <p>{{ isset($formData['email']) ? $formData['email'] : 'N/A' }}</p>
        </div>
        <div class="item">
            <b>Phone:</b>
            <p>{{ isset($formData['phone']) ? $formData['phone'] : 'N/A' }}</p>
        </div>
        <div class="item">
            <b>Subject:</b>
            <p>{{ isset($formData['subject']) ? $formData['subject'] : 'N/A' }}</p>
        </div>
        <div class="item">
            <b>Resume:</b>
            <p>{{ isset($formData['resume']) ? $formData['resume'] : 'N/A' }}</p>
        </div>
    </div>
    <div class="footer">
        <p>Thank you for your inquiry.</p>
    </div>
</div>

</body>
</html>
