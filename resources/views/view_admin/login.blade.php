
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>SUN RISE ADMIN</title>
  
  
     
      <link rel="stylesheet" href="{{url('public/adsite')}}/css/style.css">

  
</head>

<body>
  <div id="clouds">
	<div class="cloud x1"></div>
	<!-- Time for multiple clouds to dance around -->
	<div class="cloud x2"></div>
	<div class="cloud x3"></div>
	<div class="cloud x4"></div>
	<div class="cloud x5"></div>
</div>

 <div class="container">


      <div id="login">

        <form method="post" name="login" action="userlogin">
            @csrf
          <fieldset class="clearfix">

            <p><span class="fontawesome-user"></span><input type="text"  name="user" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fontawesome-lock"></span><input type="password" name="pass"  value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
            <p><input type="submit" name="sub"  value="Login"></p>

          </fieldset>

        </form>
        
       

      </div> <!-- end login -->

    </div>
    <div class="bottom">  <h3><a href="../">SUN RISE HOMEPAGE</a></h3></div>
  <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        header("location: admin");

    }
  
  
  ?>
  
</body>
</html>

