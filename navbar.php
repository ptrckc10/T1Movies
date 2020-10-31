<!-- header -->

<header class="container-fluid" style="margin-bottom: 96px">
    <nav class="navbar navbar-expand-md navbar-custom fixed-top px-5 py-0">
      <a class="navbar-brand logo" href="index.php">
        <img src="images/T1_Logo_Test2.svg" alt="T1 Movies" class="mx-auto my-2" style="height: 70px">
      </a>
      <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon "></span>
      </button>
      
      <div class="collapse navbar-collapse my-2 py-2" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto my-auto">
          <li class="nav-item active"><a class="nav-link mx-1 px-3" href="index.php">HOME</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mx-1 px-3" href="#" id="navbardrop" data-toggle="dropdown">MOVIES </a>
            <div class="dropdown-menu py-0 my-2">
              <a class="dropdown-item mx-0 my-2 px-3" href="#">NOW SHOWING</a>
              <a class="dropdown-item mx-0 my-2 px-3" href="#">COMING SOON</a>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link mx-1 px-3" href="theaters.php">THEATERS</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mx-1 px-3" href="#" id="navbardrop" data-toggle="dropdown">ACCOUNT </a>
            <div class="dropdown-menu py-0 my-3">
              <a class="dropdown-item mx-0 my-2 px-3" href="profile.php">PROFILE</a>
              <button class="dropdown-item mx-0 my-2 px-3" onclick="document.getElementById('id01').style.display='block'">LOGIN/SIGN UP</button>
            </div>
          </li>
        </ul>
      </div>
      <div id="id01" class="modal">
        <?php include('login_form.php'); ?>
      </div>
    </nav>
</header>

<script>
    // Modal call
    let modal = document.getElementById('id01');

    //Close when clicked outside
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>