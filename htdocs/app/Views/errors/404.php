<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Not Found – 404</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', sans-serif;
            background: #070710;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
            overflow: hidden;
            position: relative;
        }
        body::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(245,164,37,0.1) 0%, transparent 70%);
            z-index: 0;
            pointer-events: none;
        }
        .container {
            position: relative;
            z-index: 1;
            padding: 40px;
            max-width: 500px;
        }
        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 120px;
            font-weight: 700;
            font-style: italic;
            line-height: 1;
            background: linear-gradient(135deg, #f5a425, #f9c56a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 12px;
        }
        p {
            font-size: 14px;
            color: rgba(255,255,255,0.6);
            line-height: 1.6;
            margin-bottom: 32px;
        }
        .btn {
            display: inline-block;
            background: #f5a425;
            color: #000;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 14px 32px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(245,164,37,0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h2>Lost in space?</h2>
        <p>The page you are looking for doesn't exist or has been moved to another coordinate.</p>
        <a href="/" class="btn">Go Back Home</a>
    </div>
</body>
</html>
