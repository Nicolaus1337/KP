
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('') }}vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('') }}vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('') }}vendor/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="https://unpkg.com/element-plus/dist/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS for this page only -->
    @stack('css')
    <style>
    .scrollable-checkbox-list {
        max-height: 200px; /* Set the maximum height for the scrollable list */
        overflow-y: auto; /* Add vertical scrollbar when content overflows */
        border: 1px solid #ccc; /* Optional: Add a border for styling */
        padding: 10px; /* Optional: Add padding for spacing */
}

.btnlogout{
    padding-top: 5px;
    padding-right: 2px;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url('/storage/img/pkt.png');
    background-size: cover;
    background-position: center;
}

.wrapper{
    width: 800px;
    background: rgba(0, 0, 255, 0.3); 
    
    border: 2px solid rgba(255, 255, 255, .2);
    backdrop-filter: blur(3px);
    box-shadow: 0 0 10px rgba(0, 0, 0, .2);
    color: #fff;
    border-radius: 10px;
    padding: 30px 40px;

}

.wrapper h1{
    font-size: 36px;
}

.wrapper .input-box{
    position: relative;
    width: 100%;
    height: 50px;
  
    margin: 30px 0;
}

.input-box input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 1px solid rgba(255, 255, 255, 2);
    border-radius: 30px;
    font-size: 16px;
    color: #fff;
    padding: 20px 45px 20px 20px;
}

.input-box input::placeholder{
    color: #fff;
}

.input-box i {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 20px;
}

.wrapper .btn{
    margin-top: 20px;
    margin-bottom: 10px;
    width: 100%;
    height: 45px;
    background: #fff;
    border: none;
    outline: none;
    border-radius: 30px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    cursor: pointer;
    font-size: 16px;
    color: #333;
    font-weight: 600;
}

.wrapper .onboarding{
    margin-top: 30px;
    margin-bottom: -50px;
}
    </style>
    <!-- End CSS  -->

    
    
  
</head>

<body>
    <div id="app">
        <div class="shadow-header"></div>
        
                                
        <div class="wrapper">
        <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row g-2"> 
            <div class="col-md-5">
            <h1 class="text-center">Login</h1>
            <div class="input-box">
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <i class='bx bxs-user'></i>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-box">
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <i class='bx bxs-lock-alt' ></i>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn">Login</button>
            </div>
            
            <div class="col-md-7 text-end">
                <div class="onboarding">
                    <h1 class="">Onboarding</h1>
                    <h1 class="">Karyawan Baru</h1>
                </div>
            <img  style=" object-fit: contain;width: 80%;height: 200px;" src="{{asset('storage/onboarding_image/logodasar.png')}}">
            </div>




        </div>
        </form>
        </div>

        <footer>
        </footer>
        <div class="overlay action-toggle">
        </div>
    </div>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="{{ asset('') }}vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="{{ asset('') }}vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="https://unpkg.com/element-plus"></script>
    <!-- js for this page only -->
    @stack('js')
    <!-- ======= -->
    <script src="{{ asset('') }}assets/js/main.min.js"></script>
    <script>
        Main.init()
    </script>
</body>

</html>