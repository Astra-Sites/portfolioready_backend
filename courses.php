<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- style css -->
     <link rel="stylesheet" href="Assets/CSS/styles.css">
     <link rel="stylesheet" href="Assets/CSS/course.css">


        <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">


    <!-- Boostarp css -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/bsb-btn-circle/bsb-btn-circle.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/margin/margin.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/padding/padding.css">
</head>
<body>


    
<header data-bs-theme="dark">
    <nav class="navbar navbar-expand-md fixed-top bg-light">
        <div class="container-fluid">
           
            <!-- Logo -->
        <a href="#" class="navbar-brand">
          <img src="assets/img/logo-1.png" class="logo" alt="Company Logo">
        </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                    <path stroke="black" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"/>
                </svg>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto ms-auto mb-2 mb-md-0">
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link text-dark" href="index.php">Home</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link text-dark" href="courses.php">Courses</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link text-dark" href="#">Blog</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link text-dark" href="#">Shop</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link text-dark" href="#">Pages</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link text-dark" href="#">Events</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <button class="btn btn-light me-2" onclick="window.location='login.html'" type="button">Login</button>
                    <button class="btn btn-primary" onclick="window.location='sign-up.html'" type="button">Signup</button>
                </form>
            </div>
        </div>
    </nav>
</header>

<style>
    .navbar {
      padding: 0; /* Remove default padding that might affect layout */
      background-color:#04016C;
      box-shadow: 0px 10px 15px -3px rgba(f,f,f,0.3);
  }

  .navbar .logo {
      max-height: 98%; /* Fit the logo within the navbar height */
      max-width: 150px; /* Adjust to desired width */
      height: auto; /* Maintain aspect ratio */
  }
</style>



    <!-- Service 9 - Bootstrap Brain Component -->
<section class="bg-light py-3 py-md-5 py-xl-8 mt-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-7 text-center col-xxl-6">
            <span class="text-muted">Courses</span>
            <h2 class="text-center mb-4" style="font-family:rowdies;">Our <span style="color: #24b49a;">Courses</span></h2>
          <!-- <h2 class="mb-4 display-5 text-center">Our Services</h2> -->
          <p class="text-center">Our comprehensive range of services caters to cyclists of all levels, whether you're a casual rider, a commuter, or a seasoned enthusiast.</p>
          <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
        </div>
      </div>
    </div>
  
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="container-fluid">
            <div class="row gy-3 gy-md-4">
              <div class="col-12 col-md-6 col-lg-4">
                <div class="card border-dark">
                  <div class="card-body text-center p-4 p-xxl-5">
                    <div class="amount amount-1">Ksh. 3,000/=</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-box-fill text-primary mb-4" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z" />
                    </svg>
                    <h4 class="mb-4">PHP Developer</h4>
                    <p class="mb-4 text-secondary">We specialize in expert wheel truing services to ensure our customers' smooth, stable, and safe rides.</p>
                    <a href="#!" class="btn btn-primary text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707z"/>
                      </svg>
                      Enroll
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="card border-dark">
                  <div class="card-body text-center p-4 p-xxl-5">
                    <div class="amount amount-2">Ksh. 3,000/=</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-capsule text-primary mb-4" viewBox="0 0 16 16">
                      <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429z" />
                    </svg>
                    <h4 class="mb-4">Node.js Developer</h4>
                    <p class="mb-4 text-secondary">We proudly offer specialized brake adjustment services tailored to enhance braking performance.</p>
                    <a href="#!" class="btn btn-primary text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707z"/>
                      </svg>
                      Enroll
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="card border-dark">
                  <div class="card-body text-center p-4 p-xxl-5">
                    <div class="amount amount-3">Ksh. 3,000/=</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-clipboard-check-fill text-primary mb-4" viewBox="0 0 16 16">
                      <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                      <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                    </svg>
                    <h4 class="mb-4">Django Developer</h4>
                    <p class="mb-4 text-secondary">Our skilled technicians have extensive expertise in handling various bicycle drivetrain systems.</p>
                    <a href="#!" class="btn btn-primary text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707z"/>
                      </svg>
                      Enroll
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="card border-dark">
                  <div class="card-body text-center p-4 p-xxl-5">
                    <div class="amount amount-4">Ksh. 3,000/=</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-diamond-half text-primary mb-4" viewBox="0 0 16 16">
                      <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM8 .989c.127 0 .253.049.35.145l6.516 6.516a.495.495 0 0 1 0 .7L8.35 14.866a.5.5 0 0 1-.35.145z" />
                    </svg>
                    <h4 class="mb-4">Web-Design With Figma</h4>
                    <p class="mb-4 text-secondary">Our suspension tuning process begins with a complete assessment of your bike's current setup.</p>
                    <a href="#!" class="btn btn-primary text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707z"/>
                      </svg>
                      Enroll
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="card border-dark">
                  <div class="card-body text-center p-4 p-xxl-5">
                    <div class="amount amount-5">Ksh. 3,000/=</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-eraser-fill text-primary mb-4" viewBox="0 0 16 16">
                      <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828zm.66 11.34L3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293z" />
                    </svg>
                    <h4 class="mb-4">React Full-stack Developer</h4>
                    <p class="mb-4 text-secondary">Our bicycle workshop offers a technical frame alignment service to ensure the bike rides smoothly.</p>
                    <a href="#!" class="btn btn-primary text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707z"/>
                      </svg>
                      Enroll
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="card border-dark">
                  <div class="card-body text-center p-4 p-xxl-5">
                    <div class="amount amount-6">Ksh. 3,000/=</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-front text-primary mb-4" viewBox="0 0 16 16">
                      <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2zm5 10v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1h-2v5a2 2 0 0 1-2 2z" />
                    </svg>
                    <h4 class="mb-4">Full-stack Developer</h4>
                    <p class="mb-4 text-secondary">Our pedal installation service includes testing to guarantee a secure fit and reliable performance.</p>
                    <a href="#!" class="btn btn-primary text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707z"/>
                      </svg>
                      Enroll
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  
<!-- Footer 11 - Bootstrap Brain Component -->
<footer class=" py-sm-3 py-md-4 py-xl-6">
    <div class="container-fluid bg-dark py-3 py-md-6 py-xl-9 py-xxl-10">
      <div class="row justify-content-center">
        <div class="col-11">
  
          <!-- Widgets - Bootstrap Brain Component -->
          <section class="mb-4 mb-md-5 mb-xl-9 mb-xxl-10">
            <div class="row gy-4 gy-md-0">
              <div class="col-6 col-md-3">
                <div class="link-wrapper">
                  <h4 class="mb-3 fs-6 text-light">Clients</h4>
                  <ul class="m-0 list-unstyled">
                    <li class="mb-1">
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Templates
                      </a>
                    </li>
                    <li class="mb-1">
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Enterprise
                      </a>
                    </li>
                    <li class="mb-1">
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Extensions
                      </a>
                    </li>
                    <li class="mb-1">
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Managers
                      </a>
                    </li>
                    <li>
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        How to Hire
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-6 col-md-3">
                <div class="link-wrapper">
                  <h4 class="mb-3 fs-6 text-light">Talent</h4>
                  <ul class="m-0 list-unstyled">
                    <li class="mb-1">
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Operations
                      </a>
                    </li>
                    <li class="mb-1">
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Marketing
                      </a>
                    </li>
                    <li class="mb-1">
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Finance
                      </a>
                    </li>
                    <li class="mb-1">
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Product
                      </a>
                    </li>
                    <li>
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Support
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-6 col-md-3">
                <div class="link-wrapper">
                  <h4 class="mb-3 fs-6 text-light">Resources</h4>
                  <ul class="m-0 list-unstyled">
                    <li class="mb-1">
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Community
                      </a>
                    </li>
                    <li class="mb-1">
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Resources
                      </a>
                    </li>
                    <li class="mb-1">
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Learning
                      </a>
                    </li>
                    <li class="mb-1">
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Webinars
                      </a>
                    </li>
                    <li>
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Customers
                      </a>
                    </li>
  
                  </ul>
                </div>
              </div>
              <div class="col-6 col-md-3">
                <div class="link-wrapper">
                  <h4 class="mb-3 fs-6 text-light">Company</h4>
                  <ul class="m-0 list-unstyled">
                    <li class="mb-1">
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        About us
                      </a>
                    </li>
                    <li class="mb-1">
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Leadership
                      </a>
                    </li>
                    <li class="mb-1">
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Careers
                      </a>
                    </li>
                    <li class="mb-1">
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Services
                      </a>
                    </li>
                    <li class="mb-1">
                      <a href="#!" class="link-opacity-75 link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Contact Us
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </section>
  
          <!-- Link - Bootstrap Brain Component -->
          <div class="mb-3">
            <div class="row">
              <div class="col-12">
                <div class="link-wrapper">
                  <ul class="m-0 list-unstyled d-flex justify-content-center justify-content-md-start gap-3">
                    <li>
                      <a href="#!" class="fs-7 link-underline-opacity-0 link-opacity-75-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Terms
                      </a>
                    </li>
                    <li>
                      <a href="#!" class="fs-7 link-underline-opacity-0 link-opacity-75-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Privacy
                      </a>
                    </li>
                    <li>
                      <a href="#!" class="fs-7 link-underline-opacity-0 link-opacity-75-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Advertise
                      </a>
                    </li>
                    <li>
                      <a href="#!" class="fs-7 link-underline-opacity-0 link-opacity-75-hover link-underline-opacity-100-hover link-offset-1 link-light">
                        Media
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
  
          <!-- Copyright - Bootstrap Brain Component -->
          <div class="border-top border-dark-subtle pt-3">
            <div class="row gy-3 align-items-center">
              <div class="col-12 col-md-6">
                <div class="copyright-wrapper d-block mb-1 fs-8 text-light text-center text-md-start">
                  &copy; 2024. All Rights Reserved.
                </div>
                <div class="credit-wrapper d-block text-secondary fs-9 text-light text-center text-md-start">
                  Terms<a href="https://bootstrapbrain.com/" class="link-light text-decoration-none">
                    And Conditions</a> Apply <span class="text-primary"></span>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="social-media-wrapper">
                  <ul class="m-0 list-unstyled d-flex gap-3 justify-content-center justify-content-md-end">
                    <li>
                      <a href="#!" class="link-opacity-75-hover link-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                          <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a href="#!" class="link-opacity-75-hover link-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                          <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a href="#!" class="link-opacity-75-hover link-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                          <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15" />
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a href="#!" class="link-opacity-75-hover link-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                          <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a href="#!" class="link-opacity-75-hover link-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="" height="22" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                          <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>



</body>
</html>