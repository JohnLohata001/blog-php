<!DOCTYPE html>
<html>
<head>
    <title>Service Temporarily Unavailable</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .error-box {
            background: white;
            max-width: 500px;
            margin: 100px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .error-icon {
            font-size: 48px;
            color: #dc3545;
            margin-bottom: 20px;
        }
        .error-title {
            color: #dc3545;
            margin-bottom: 15px;
            animation: flash 2s infinite;
        }
        .error-description {
            color: #666;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .action-buttons {
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        .btn-primary {
            background: #007bff;
            color: white;
        }
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        .btn-info {
            background: #0683a8ff;
            color: white;
        }
        
        /* Flash/Twinkle Animation */
        @keyframes flash {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            25% {
                opacity: 0.7;
                transform: scale(1.02);
            }
            50% {
                opacity: 0.4;
                transform: scale(1);
            }
            75% {
                opacity: 0.7;
                transform: scale(1.02);
            }
        }
        
        /* Alternative Pulsing Animation */
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
                color: #dc3545;
            }
            50% {
                opacity: 0.6;
                color: #ff6b7a;
            }
        }
        
        /* Twinkle/Blink Animation */
        @keyframes twinkle {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
        }
        
        /* Choose one animation style by changing the animation property */
        .error-title {
            /* animation: flash 1.5s infinite; Flash effect */
            /* animation: pulse 2s infinite; /*Pulse effect */
             animation: twinkle 1s infinite;  /* Simple blink effect */
        }
    </style>
</head>
<body>
    <div class="error-box">
        <div class="error-icon">⚠️</div>
        <h1 class="error-title">Oops! Something went wrong</h1>
        <div class="error-description">
            We're experiencing some technical issues. Our team has been notified and we're working to fix it.
            <br><br>
            Please try again in a few minutes.
        </div>
        <div class="action-buttons">
            <button class="btn btn-primary" onclick="window.location.reload()">Try Again</button>
            <a href=""  onclick="alert('Homepage is currently unavailable due to technical issues. Please try again later.')" class="btn btn-secondary">Go to Homepage</a>
            <a href="mailto:support@yoursite.com" class="btn btn-info">Contact Support</a>
        </div>
    </div>
</body>
</html>