<?php
  session_start();
  //if user isin login session then user will be logged in 
  if(isset($_SESSION['id'])){
    header("location: index.php");
    exit();
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Clone|Login</title>
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link  href="assets/css/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
    <div class="container">
        <div class="main-container">
           <div class="main-content">
            <div class="slide-container" style="background: url('assets/images/phone1.png') no-repeat;">
                <div class="slide-content" id="slide-content">
                    <img src="assets/images/phone1.png" class="active" alt="screen1" style="width: 230px;"/>
                    <img src="assets/images/phone2.png" alt="screen2" style="width: 230px;"/>
                    <img src="assets/images/phone3.png" alt="screen3" style="width: 230px;"/>
                    <img src="assets/images/phone4.png" alt="screen4" style="width: 230px;"/>
                </div>
            </div>
            <div class="form-container">
                <div class="form-content box">
                    <div class="logo">
                        <img src="assets/images/logo.png" alt="" class="logo-img"/>
                    </div>
                    <form action="includes/process_login.php" class="login-form" id="login-form" method="post">
                        <?php if(isset($_GET['error_message'])){ ?>

                            <p class="text-center alert-danger" id="error_mess">
                                <?php echo $_GET['error_message']?>
                            </p>

                        <?php }?>

                        <div class="form-group">
                            <div class="login-input">
                                <input type="text" name="email" placeholder="nhap email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="login-input">
                                <input type="password" name="password" id="password" placeholder="nhap password" required>
                            </div>
                        </div>
                        <div class="btn-group">
                                <button class="login-btn" id="login_btn" type="submit"name="login_btn">
                                    login
                                </button>
                        </div>
                    </form>
                    <div class="or">
                        <hr>
                            <span>OR</span>
                        <hr>
                    </div>
                    <div class="goto">
                        <p>Don't have account? <a href="signup.php"> Sign UP</a></p>
                    </div>
                    <div class="app-dowload">
                   <p>     Get the app. </p>
                        <div class="store-link">
                            <a href="#">
                                <img src="assets/images/appstore.png" alt="">
                            </a>
                            <a href="#">
                                <img src="assets/images/ggplay.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
           </div>
        </div>
        <div class="footer">
            <div class="links" id="links">
                <a href="">About</a>
                <a href="">Blog</a>
                <a href="">Jobs</a>
                <a href="">Help</a>
                <a href="">Privacy</a>
                <a href="">API</a>
                <a href="">Terms</a>
                <a href="">Top account</a>
                <a href="">HashTags</a>
                <a href="#" id="dark-btn">Dark</a>
            </div>
            <div class="copyright">
                @2024 Instagram from  TRUNG
            </div>
        </div>
    </div>
        <script>
            setInterval(()=> {changImage();},2000)
            function changImage(){
                var images = document.getElementById('slide-content').getElementsByTagName('img');
                var i =0;
                for(i=0;i<images.length;i++){
                    var image = images[i];
                    if(image.classList.contains('active')){
                        //remove active class from this image
                        image.classList.remove('active');
                        if(i== images.length -1){
                            var nextImage = images[0];
                            nextImage.classList.add('active');
                            break;
                        }
                        var nextImage = images[i+1];
                        nextImage.classList.add('active');
                        break;
                    }
                }
            }
           
            function changeMode(){
                var body = document.getElementsByTagName("body")[0];
                var footerLinks = document.getElementById("links").getElementsByTagName("a");
                //datkmode
                if(body.classList.contains("dark")){
                    body.classList.remove("dark");
                    for(let i=0; i<footerLinks.length;i++){
                        footerLinks[i].classList.remove("dark-mode-link");
                    }
                }else{
                    body.classList.add("dark");
                    for(let i=0; i<footerLinks.length;i++){
                        footerLinks[i].classList.add("dark-mode-link");
                    }
                }
            }
            function verifyForm(){
                var password = document.getElementById("password").value;
                var error_mess = document.getElementById("error_mess");
                if(password.length <6) {
                    error_mess.innerHTML="Pass ngan qua";
                    return false;
                }
                return true;
            }
            document.getElementById("dark-btn").addEventListener("click",(e) =>{
                e.preventDefault();
                changeMode();
            });
            // document.getElementById("login-form").addEventListener("submit",(e)=>{
            //     e.preventDefault();
            //     verifyForm();
            // })
            
        </script>
       <!--script-->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" ></script>
</body>
</html>