<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <style>
        body { font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif; margin: 0; background: #f7fafc; }
        .wrap { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 24px; }
        .card { background: #fff; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.08); max-width: 640px; width: 100%; padding: 32px; text-align: center; }
        .icon { font-size: 48px; color: #16a34a; margin-bottom: 12px; }
        h1 { font-size: 28px; margin: 0 0 8px; color: #111827; }
        p { font-size: 16px; color: #4b5563; margin: 0 0 20px; }
        .actions { margin-top: 12px; }
        .btn { display: inline-block; padding: 12px 18px; border-radius: 8px; text-decoration: none; font-weight: 600; }
        .btn-primary { background: #111827; color: #fff; }
        .btn-primary:hover { background: #0b1220; }
    </style>
     <link rel="stylesheet" href="{{ url('assets/css/app.css') }}">

</head>
<body>
<div class="wrap">
    <div class="card">
        <div class="icon">✓</div>
        <h1>Payment Successful</h1>
        <p>Thank you for your purchase. We will reach out to you shortly with the next steps and order details.</p>
        <div class="actions">
            <a href="{{ route('marketplace') }}" class="btn btn-primary">Continue Shopping</a>
        </div>
    </div>
</div>
</body>
</html>