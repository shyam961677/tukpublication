<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Ultimate Knowledge - Email</title>
    <style>
        /* General Styles */
        body {
            background-color: #f4f7fb;
			color: #333333;
			font-family: Arial, sans-serif;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
		.header {
		    background-color: #f4f7fb;
		    padding: 20px 10px;
		    text-align: center;
		    border-radius: 8px 8px 0 0;
		}

		.header-logo {
		    max-width: 200px;
		    height: auto;
		    display: block;
		    margin: 0 auto;
		}

		@media (max-width: 600px) {
		    .header-logo {
		        max-width: 150px;
		    }
		}

        .content {
            padding: 30px;
            line-height: 1.6;
        }


        .footer {
            text-align: center;
            font-size: 12px;
            padding: 15px;
            background-color: #f4f7fb;
            margin-top: 20px;
            border-radius: 0 0 8px 8px;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
		    <img src="https://www.tukpublications.com/assets/images/tuk_logo.png" alt="TUK Publications Logo" class="header-logo">
		</div>
        <!-- Body Section -->
        <div class="content">
            <h4>Dear <?= !empty($name) ? $name : 'Subscriber' ?> , </h4>
            <p>Welcome to <strong>The Ultimate Knowledge</strong>, your go-to source for insightful articles and expert knowledge. We're excited to have you with us!</p>

            <p><?= ($dynamic_content) ?? 'Discover amazing content that will broaden your horizons and boost your knowledge.' ?></p>

        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>Best regards,</p>
            <p><strong>The Ultimate Knowledge Team</strong></p>
            <p><a href="https://www.tukpublications.com">Visit our website</a> for more exciting content.</p>
         
        </div>
    </div>
</body>
</html>
