{{-- <header class="main-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg main-nav px-0">
                <a class="navbar-brand" href="/dashboard">
                    <img src="/images/loogo-modified.png" alt="Med U Clinic Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar icon-bar-1"></span>
                    <span class="icon-bar icon-bar-2"></span>
                    <span class="icon-bar icon-bar-3"></span>
                </button>
                <div class="collapse navbar-collapse " id="mainMenu">
                    <ul class="navbar-nav ml-auto text-uppercase f1">
                        <li>
                        <a href="#home" class="active active-first">Home</a>
                        </li>
                        <li>
                        <a href="#">Patients</a>
                        </li>
                        <li>
                        <a href="#">Services</a>
                        </li>
                        <li>
                        <a href="#">Doctors</a>
                        </li>
                        <li>
                        <a href="#">Appointments</a>
                        </li>
                        <li>
                        <a href="#">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
    </div>
</header>

<style scoped>

[data-target="#mainMenu"] {
  position: relative;
  z-index: 999;
}


#mainMenu li > a {
  font-size: 15px;
  letter-spacing: 1px;
  color: #3869bd;
  font-weight: 400;
  position: relative;
  z-index: 1;
  text-decoration: none;
  /* justify-content: flex-end; */

}

.main-header.fixed-nav #mainMenu li > a {
  color: #3869bd;
  text-decoration: none;
}

#mainMenu li:not(:last-of-type) {
  margin-right: 30px;
}

#mainMenu li > a::before {
  position: absolute;
  content: "";
  width: calc(100% - 1px);
  height: 1px;
  background: #3869bd;
  bottom: -6px;
  left: 0;


  -webkit-transform: scale(0, 1);
  -ms-transform: scale(0, 1);
  transform: scale(0, 1);
  -webkit-transform-origin: right center;
  -ms-transform-origin: right center;
  transform-origin: right center;
  z-index: -1;

  -webkit-transition: transform 0.5s ease;
  transition: transform 0.5s ease;
}

#mainMenu li > a:hover::before,
#mainMenu li > a.active::before {
  -webkit-transform: scale(1, 1);
  -ms-transform: scale(1, 1);
  transform: scale(1, 1);
  -webkit-transform-origin: left center;
  -ms-transform-origin: left center;
  transform-origin: left center;
}

.main-header.fixed-nav #mainMenu li > a::before {
  background: #000;
}

.main-header {
  position: fixed;
  top: 25px;
  left: 0;
  z-index: 99;
  width: 100%;
  -webkit-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.main-header.fixed-nav {
  top: 0;
  background: #3869bd;
  -webkit-box-shadow: 0 8px 12px -8px rgba(0, 0, 0, 0.09);
  box-shadow: 0 8px 12px -8px rgba(0, 0, 0, 0.09);
  -webkit-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.main-header.fixed-nav .navbar-brand > img:last-of-type {
  display: block;

}

.main-header.fixed-nav .navbar-brand > img:first-of-type {
  display: none;

}
.navbar-brand {
  color: #3869bd;

}
.main-header .navbar-brand img {
  max-width: 40px;
  animation: fadeInLeft 0.4s both 0.4s;
}
/* main-header end */
@media (max-width: 991px) {
  /*header starts*/
  .collapse.in {
    display: block !important;
    padding: 0;
    clear: both;
  }

  .navbar-toggler {
    margin: 0;
    padding: 0;
    width: 40px;
    height: 40px;
    position: absolute;
    top: 25px;
    right: 0;
    border: none;
    border-radius: 0;
    outline: none !important;
  }

  .main-header .navbar {
    float: none;
    width: 100%;
    padding-left: 0;
    padding-right: 0;
    text-align: center;

  }

  .main-header .navbar-nav {
    margin-top: 70px;

  }

  .main-header .navbar-nav li .nav-link {
    text-align: center;
    padding: 20px 15px;
    border-radius: 0px;

  }

  /**/
  .main-header .navbar-toggler .icon-bar {
    background-color: #fff;
    margin: 0 auto 6px;
    border-radius: 0;
    width: 30px;
    height: 3px;
    position: absolute;
    right: 0;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
  }

  .main-header .navbar .navbar-toggler .icon-bar:first-child {
    margin-top: 3px;
  }

  .main-header .navbar-toggler .icon-bar-1 {
    width: 10px;
    top: 0px;
  }

  .main-header .navbar-toggler .icon-bar-2 {
    width: 16px;
    top: 12px;
  }

  .main-header .navbar-toggler .icon-bar-3 {
    width: 20px;
    top: 21px;
  }

  .main-header .current .icon-bar {
    margin-bottom: 5px;
    border-radius: 0;
    display: block;
  }

  .main-header .current .icon-bar-1 {
    width: 18px;
  }

  .main-header .current .icon-bar-2 {
    width: 30px;
  }

  .main-header .current .icon-bar-3 {
    width: 10px;
  }

  .main-header .navbar-toggler:hover .icon-bar {
    background-color: #fff;
  }

  .main-header .navbar-toggler:focus .icon-bar {
    background-color: #fff;
  }

  /*header ends*/
}

</style> --}}

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top ">
    <div class="container">
      <a class="navbar-brand" href="#"
        ><img
          id="MDB-logo"
          src="images/loogo-modified.png"
          alt="MDB Logo"
          draggable="false"
          height="30"
      /></a> MED U Clinic
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link mx-2" href="#!"><i class="fa-solid fa-house"></i>Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="#!"><i class="fa-solid fa-hospital-user"></i>Patients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="#!"><i class="fa-solid fa-calendar-check"></i>Appointments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="#!"><i class="fas fa-heart pe-2"></i>Logs</a>
          </li>
          <li class="nav-item ms-3">
            <a class="btn btn-black btn-rounded" href="#!">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <style scope>
    .navbar-light .navbar-nav .nav-link {
  color: #000;
}
</style>
