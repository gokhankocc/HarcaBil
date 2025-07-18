<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kaydol - Harcabil</title>

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- inject:css-->
    <link rel="stylesheet" href="/site/assets/vendor/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="/site/assets/css/style.css">
    <!-- endinject -->
    <link rel="icon" type="image/png" sizes="16x16" href="/site/assets/img/favicon.svg">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.0.8/css/line.min.css">

    <script>
        // Render localStorage JS:
        if (localStorage.theme) document.documentElement.setAttribute("data-theme", localStorage.theme);
        if (localStorage.layout) document.documentElement.setAttribute("data-nav", localStorage.navbar);
        if (localStorage.layout) document.documentElement.setAttribute("dir", localStorage.layout);
    </script>
</head>

<body class="geex-dashboard authentication-page">
<main class="geex-content">
    <div class="geex-content__authentication">
        <div class="geex-content__authentication__content">
            <div class="geex-content__authentication__content__wrapper">
                <div class="geex-content__authentication__content__logo">
                    <a href="index.html">
                        <img class="logo-lite" src="/site/assets/img/harcabillogo.png" width="271" alt="logo">
                        <img class="logo-dark" src="/site/assets/img/logo-lite.svg" alt="logo">
                    </a>
                </div>
                <form id="signInForm" action="{{ route('user.userStore') }}" class="geex-content__authentication__form" method="post" style="max-width: 661px">@csrf
                    <h2 class="geex-content__authentication__title">Yeni Hesap Oluştur 👋</h2>
                    <div class="col-lg-12 row">
                        <div class="col-lg-6">
                            <div class="geex-content__authentication__form-group">
                                <label for="emailSignIn">Ad Soyad</label>
                                <input type="text" id="emailSignIn" name="name" required>
                                <i class="user-img"></i>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="geex-content__authentication__form-group">
                                <label for="emailSignIn">Email</label>
                                <input type="email" id="emailSignIn" name="email" required>
                                <i class="uil-envelope"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 row">
                        <div class="col-lg-6">
                            <div class="geex-content__authentication__form-group">
                                <div class="geex-content__authentication__label-wrapper">
                                    <label for="loginPassword">Şifre</label>
                                </div>
                                <input type="password" id="loginPassword" name="password" required>
                                <i class="uil-eye toggle-password-type"></i>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="geex-content__authentication__form-group">
                                <div class="geex-content__authentication__label-wrapper">
                                    <label for="loginPassword">Şifre Tekrar</label>
                                </div>
                                <input type="password" id="loginPassword" name="password_again" required>
                                <i class="uil-eye toggle-password-type"></i>
                            </div>
                        </div>
                    </div>
                    <div class="geex-content__authentication__form-group custom-checkbox">
                        <input type="checkbox" class="geex-content__authentication__checkbox-input" id="rememberMe">
                        <label class="geex-content__authentication__checkbox-label" for="rememberMe">Bir hesap oluşturarak <a href="#">şartlar koşullar ve gizlilik politikamızı</a> kabul etmiş olursunuz</label>
                    </div>
                    <button type="submit" class="geex-content__authentication__form-submit">Kaydol</button>
                    <span class="geex-content__authentication__form-separator">Ya da</span>
                    <div class="geex-content__authentication__form-social">
                        <a href="#" class="geex-content__authentication__form-social__single">
                            <img src="/site/assets/img/icon/google.svg" alt="">Google
                        </a>
                        <a href="#" class="geex-content__authentication__form-social__single">
                            <svg width="15" height="19" viewBox="0 0 15 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.9133 0H11.0427C11.1465 1.2826 10.6569 2.24096 10.062 2.93497C9.47815 3.62419 8.67872 4.29264 7.38574 4.19122C7.29949 2.92698 7.78985 2.0397 8.38403 1.34729C8.93508 0.701997 9.94535 0.127781 10.9133 0ZM14.8274 13.3499V13.3859C14.464 14.4864 13.9457 15.4296 13.3132 16.3048C12.7358 17.0995 12.0282 18.1689 10.7647 18.1689C9.67302 18.1689 8.94786 17.4669 7.82898 17.4477C6.64541 17.4285 5.99452 18.0347 4.91238 18.1872H4.54341C3.74877 18.0722 3.10747 17.4429 2.64027 16.8759C1.26264 15.2003 0.19806 13.0361 0 10.2664V9.4526C0.0838563 7.47039 1.04701 5.85876 2.32721 5.0777C3.00285 4.66241 3.93166 4.30861 4.96589 4.46674C5.40913 4.53543 5.86195 4.68717 6.25887 4.83731C6.63503 4.98186 7.10542 5.23822 7.55106 5.22464C7.85294 5.21586 8.15322 5.05853 8.4575 4.94752C9.34877 4.62567 10.2225 4.2567 11.3741 4.43001C12.7581 4.63925 13.7404 5.25419 14.3474 6.20297C13.1766 6.94809 12.251 8.07096 12.4091 9.98848C12.5497 11.7303 13.5624 12.7493 14.8274 13.3499Z" fill="black"/>
                            </svg>
                            Apple
                        </a>
                    </div>
                    <div class="geex-content__authentication__form-footer">
                        Zaten hesabınız var mı? <a href="{{ route('user.login') }}">Giriş Yap</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="geex-content__authentication__img">
            <img src="/site/assets/img/authentication.svg" alt="">
        </div>
    </div>
</main>

<!-- inject:js-->
<script src="/site/assets/vendor/js/jquery/jquery-3.5.1.min.js"></script>
<script src="/site/assets/vendor/js/jquery/jquery-ui.js"></script>
<script src="/site/assets/vendor/js/bootstrap/bootstrap.min.js"></script>
<script src="/site/assets/js/main.js"></script>
<!-- endinject-->
</body>

</html>
