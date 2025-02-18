<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            padding: 3rem 2rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        }

        .brand {
            text-align: center;
            margin-bottom: 2rem;
        }

        .brand-logo {
            width: 50px;
            height: 50px;
            background: #000;
            border-radius: 50%;
            margin: 0 auto 1rem;
        }

        .brand h1 {
            font-size: 1.75rem;
            color: #1a1a1a;
            margin-bottom: 0.5rem;
        }

        .brand p {
            color: #666;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 2px solid #e1e1e1;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #000;
            box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.1);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .remember-me input[type="checkbox"] {
            width: 16px;
            height: 16px;
            border-radius: 4px;
        }

        .remember-me label {
            color: #666;
            font-size: 0.9rem;
        }

        .forgot-password {
            color: #000;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .login-btn {
            width: 100%;
            padding: 1rem;
            background: #000;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            background: #333;
            transform: translateY(-2px);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .social-login {
            margin-top: 2rem;
            text-align: center;
        }

        .social-login p {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            position: relative;
        }

        .social-login p::before,
        .social-login p::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 45%;
            height: 1px;
            background: #e1e1e1;
        }

        .social-login p::before {
            left: 0;
        }

        .social-login p::after {
            right: 0;
        }

        .social-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .social-btn {
            width: 50px;
            height: 50px;
            border: 2px solid #e1e1e1;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            border-color: #000;
            background: #f5f5f5;
        }

        .signup-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .signup-link a {
            color: #000;
            text-decoration: none;
            font-weight: 600;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        .error {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }

        .shake {
            animation: shake 0.5s ease;
        }
	</style>
</head>
<body>
    <div class="login-card">
        <div class="brand">
            <div class="brand-logo"></div>
            <h1>Welcome To TUK</h1>
            <p>Enter your credentials to access your account</p>
            <?php 
                

                if (!empty($this->session->flashdata('error'))) {
                    echo '<div class="error" role="alert">'.$this->session->flashdata('error').'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
           ?>
        </div>

        <form id="loginForm" method="post" action="<?php echo base_url('admin-authenticate'); ?>">
		    <div class="form-group">
		        <label for="email">Email</label>
		        <input type="email" id="email" name="email" placeholder="name@email.com" value="<?php echo set_value('email'); ?>" required>
		        <div class="error" id="emailError"><?php echo form_error('email'); ?></div>
		    </div>

		    <div class="form-group">
		        <label for="password">Password</label>
		        <input  type="password"  id="password"  name="password" placeholder="Enter your password"  required>
		        <div class="error" id="passwordError"><?php echo form_error('password'); ?></div>
		    </div>

		    <button type="submit" class="login-btn" id="loginButton">Sign in</button>
		</form>


</body>
</html>