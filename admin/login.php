<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    /*background: linear-gradient(#2196f3, #e91e63);*/
    overflow: hidden;
}

.wrapper {
    position: relative;
    width: 400px;
    height: 500px;
}

.form-wrapper {
    position: absolute;
    top: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    background: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, .2);
}

.wrapper.animate-signUp .form-wrapper.sign-in {
    transform: rotate(7deg);
    animation: animateRotate .7s ease-in-out forwards;
    animation-delay: .3s;
}

.wrapper.animate-signIn .form-wrapper.sign-in {
    animation: animateSignIn 1.5s ease-in-out forwards;
}

@keyframes animateSignIn {
    0% {
        transform: translateX(0);
    }

    50% {
        transform: translateX(-500px);
    }

    100% {
        transform: translateX(0) rotate(7deg);
    }
}

.wrapper .form-wrapper.sign-up {
    transform: rotate(7deg);
}

.wrapper.animate-signIn .form-wrapper.sign-up {
    animation: animateRotate .7s ease-in-out forwards;
    animation-delay: .3s;
}

@keyframes animateRotate {
    0% {
        transform: rotate(7deg);
    }

    100% {
        transform: rotate(0);
        z-index: 1;
    }
}

.wrapper.animate-signUp .form-wrapper.sign-up {
    animation: animateSignUp 1.5s ease-in-out forwards;
}

@keyframes animateSignUp {
    0% {
        transform: translateX(0);
        z-index: 1;
    }

    50% {
        transform: translateX(500px);
    }

    100% {
        transform: translateX(0) rotate(7deg);
    }
}

h2 {
    font-size: 30px;
    color: #555;
    text-align: center;
}

.input-group {
    position: relative;
    width: 320px;
    margin: 30px 0;
}

.input-group label {
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    font-size: 16px;
    color: #333;
    padding: 0 5px;
    pointer-events: none;
    transition: .5s;
}

.input-group input {
    width: 100%;
    height: 40px;
    font-size: 16px;
    color: #333;
    padding: 0 10px;
    background: transparent;
    border: 1px solid #333;
    outline: none;
    border-radius: 5px;
}

.input-group input:focus~label,
.input-group input:valid~label {
    top: 0;
    font-size: 12px;
    background: #fff;
}

.forgot-pass {
    margin: -15px 0 15px;
}

.forgot-pass a {
    color: #333;
    font-size: 14px;
    text-decoration: none;
}

.forgot-pass a:hover {
    text-decoration: underline;
}

.btn {
    position: relative;
    top: 0;
    left: 0;
    width: 100%;
    height: 40px;
    background: linear-gradient(to right, #2196f3, #e91e63);
    box-shadow: 0 2px 10px rgba(0, 0, 0, .4);
    font-size: 16px;
    color: #fff;
    font-weight: 500;
    cursor: pointer;
    border-radius: 5px;
    border: none;
    outline: none;
}

.sign-link {
    font-size: 14px;
    text-align: center;
    margin: 25px 0;
}

.sign-link p {
    color: #333;
}

.sign-link p a {
    color: #e91e63;
    text-decoration: none;
    font-weight: 600;
}

.sign-link p a:hover {
    text-decoration: underline;
}
</style>

<body>

    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <form action="action.php" method="POST">
                <h2>Admin Login</h2>
                <div class="input-group">
                    <input type="text" name="email" required>
                    <label for="">email</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <div class="forgot-pass">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" name="login_admin" value="login_admin" class="btn">Login</button>
                <div class="sign-link">
                    
                </div>
            </form>
        </div>
    </div>

    <script>
    const wrapper = document.querySelector('.wrapper');
    const signUpLink = document.querySelector('.signUp-link');
    const signInLink = document.querySelector('.signIn-link');

    signUpLink.addEventListener('click', () => {
        wrapper.classList.add('animate-signIn');
        wrapper.classList.remove('animate-signUp');
    });

    signInLink.addEventListener('click', () => {
        wrapper.classList.add('animate-signUp');
        wrapper.classList.remove('animate-signIn');
    });
    </script>
</body>

</html>





