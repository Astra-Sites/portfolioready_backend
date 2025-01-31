<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/main.css" type="text/css">
    <script defer src="./scripts/main.js"></script>
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>
</head>
<body>


    <!-- SVG Importing -->
    <svg class="hidden">
        <symbol id="bars" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </symbol>
        <symbol id="arrow-right-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm4.28 10.28a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 1 0-1.06 1.06l1.72 1.72H8.25a.75.75 0 0 0 0 1.5h5.69l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3Z" clip-rule="evenodd" />
        </symbol>
        <symbol id="check-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
        </symbol> 
        <symbol id="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
        </symbol>
        <symbol id="home" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
        </symbol>
        <symbol id="users" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
        </symbol>
        <symbol id="envelope" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
        </symbol>
        <symbol id="gear" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </symbol>
        <symbol id="rss" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 19.5v-.75a7.5 7.5 0 0 0-7.5-7.5H4.5m0-6.75h.75c7.87 0 14.25 6.38 14.25 14.25v.75M6 18.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
        </symbol>
        <symbol id="shop" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
        </symbol>
        <symbol id="close-mark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </symbol>
        <symbol id="user" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
        </symbol>
        <symbol id="envelope" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
        </symbol>                                                                 
        <symbol id="pencil-square" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
        </symbol>                         
    </svg>

        <!-- Header -->
        <header class="h-[100px]">
            <div class="container flex items-center h-full">
                <div class="flex justify-between items-center h-12 w-full">
                    <!-- Header Logo -->
                    <a href="#" class="logo flex items-center gap-4">
                        <img src="./assets/images/gree.png" alt="Site-Logo" style="width: auto; height: 36px;">
                        <span style="font-size: 1.5rem; font-weight: 800;"><span style="color: #71c55d;">Portfolio</span>Ready</span>
                    </a>
                    <!-- Header Menu -->
                    <nav class="hidden lg:block">
                        <ul class="flex gap-x-10 xl:gap-x-12 text-slate-800 text-sm font-bold child:transition-colors child:delay-75 child-hover:text-primary">
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="pricing.php">Pricing</a>
                            </li>
                            <li>
                                <a href="#service">Courses</a>
                            </li>
                            <li>
                                <a href="#service">Docs</a>
                            </li>
                            <li>
                                <a href="#contact">Contact Us</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- Header Button -->
                    <a class="hidden lg:block h-full w-44 border  text-indigo-800  text-sm font-bold text-center leading-[3rem] rounded-xl transition-colors" href="#contact" style="border: 1px solid #71c55d;" ><i class="bi bi-stars" style="margin-right: .7rem; color: #71c55d;"></i>Ask Astra</a>
                    <a class="hidden lg:block h-full w-44  text-white text-sm font-bold text-center leading-[3rem] rounded-xl transition-colors hover:bg-indigo-800" href="auth/signin.php" style="background-color: #71c55d;">Get Started Today</a>
                    <!-- Mobile Menu -->
                    <div class="lg:hidden relative">
                        <!-- Mobile Menu Toggle Icon -->
                        <button id="mobile-menu-toggle" type="button">
                            <svg class="w-8 h-8">
                                <use href="#bars"></use>
                            </svg>
                        </button>
                        <!-- Menu background overlay -->
                        <div id="mobile-menu-overlay" class="hidden fixed inset-0 bg-black/40 transition-all z-[999]">
                        </div>
                        <!-- Mobile menu container --> 
                        <div id="mobile-menu-container" class="w-80 bg-white fixed top-0 -left-80 bottom-0 transition-all flex flex-col z-[999]">
                            <!-- Logo & Close Button -->
                            <div class="flex items-center justify-between p-4 border-b border-b-gray-100/50">
                                <img src="./assets/images/logo.png"  style="width: auto; height: 36px;" alt="">
                                <button type="button" id="close-button">
                                    <svg class="w-5 h-5">
                                        <use href="#close-mark"></use>
                                    </svg>
                                </button>
                            </div>
                            <!-- Mobile menu nav -->
                            <nav class="p-4 grow">
                                <!-- menu List -->
                                <ul class="flex flex-col gap-y-5 text-slate-800 text-sm font-medium child:transition-colors child:delay-75 child-hover:text-primary">
                                    <!-- menu item -->
                                    <li>
                                        <a class="flex items-center gap-x-1" href="#">
                                            <svg class="w-5 h-5">
                                                <use href="#home"></use>
                                            </svg>
                                            Home
                                        </a>
                                    </li>
                                    <!-- menu item -->
                                    <li>
                                        <a class="flex items-center gap-x-1" href="#">
                                            <svg class="w-5 h-5">
                                                <use href="#gear"></use>
                                            </svg>
                                            Courses
                                        </a>
                                    </li>
                                    <!-- menu item -->
                                    <li>
                                        <a class="flex items-center gap-x-1" href="#">
                                            <svg class="w-5 h-5">
                                                <use href="#shop"></use>
                                            </svg>
                                            Products
                                        </a>
                                    </li>
                                    <!-- menu item -->
                                    <li>
                                        <a class="flex items-center gap-x-1" href="#">
                                            <svg class="w-5 h-5">
                                                <use href="#rss"></use>
                                            </svg>
                                            Blog
                                        </a>
                                    </li>
                                    <!-- menu item -->
                                    <li>
                                        <a class="flex items-center gap-x-1" href="#">
                                            <svg class="w-5 h-5">
                                                <use href="#users"></use>
                                            </svg>
                                            About Us
                                        </a>
                                    </li>
                                    <!-- menu item -->
                                    <li>
                                        <a class="flex items-center gap-x-1" href="#">
                                            <svg class="w-5 h-5">
                                                <use href="#envelope"></use>
                                            </svg>
                                            Contact Us
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- Button -->
                            <div class="p-4">
                                <a class="block w-full h-12 leading-[2.8rem] bg-primary text-white text-sm font-bold text-center rounded-xl transition-colors hover:bg-indigo-800" href="#">Book appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    <section id="pricing" class="pricing-content section-padding">
        <div class="container">					
            <div class="section-title text-center">
                <h2 class="my-5">Pricing Plans</h2>
                <p class="my-4">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            </div>				
            <div class="row text-center">									
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp mb-5" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="pricing_design">
                        <div class="single-pricing">
                            <div class="price-head">		
                                <h2>Free Tier</h2>
                                <h1 class="h3">$0</h1>
                                <span>/Monthly</span>
                            </div>
                            <ul>
                                <li class="text-center"> Access to free courses<span class="bi bi-info-circle ms-2"></span></li>
                                <li>Ai tutor (<b>Text-based</b>)</li>
                                <li>Community support</li>
                                <li>Weekly coding challenges</li>
                                <li><b>Code.org</b> Certification</li>
                                <li><b>Unlimited</b> Support</li>
                            </ul>
                            <div class="pricing-price">
    
                            </div>
                            <a href="#" class="price_btn">Apply Now</a>
                        </div>
                    </div>
                </div><!--- END COL -->	
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp mb-5" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="pricing_design">
                        <div class="single-pricing">
                            <div class="price-head">		
                                <h2>Starter</h2>
                                <h1 class="price h3">$29</h1>
                                <span>/Monthly</span>
                            </div>
                            <ul>
                                <li>Everything in free tier</li>
                                <li>Ai Tutor (<b>Full Access</b>)</li>
                                <li>PortfolioReady + code.org (<b>Roadmap</b>)</li>
                                <li>Access to Premium courses</li>
                                <li>PortfolioReady Certification</li>
                                <li><b>Unlimited</b> Support</li>
                            </ul>
                            <div class="pricing-price">
                                
                            </div>
                            <a href="#" class="price_btn">Apply Now</a>
                        </div>
                    </div>
                </div><!--- END COL -->	
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp mb-5" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <div class="pricing_design">
                        <div class="single-pricing">
                            <div class="price-head">		
                                <h2>Ultimate</h2>
                                <h1 class="price h3">$49</h1>
                                <span>/Monthly</span>
                            </div>
                            <ul>
                                <li>Everything in Starter plan</li>
                                <li>Personalized <b>Learning Path</b></li>
                                <li>Personalized Projects</li>
                                <li>1-on-1 Mentorship @ Monthly</li>
                                <li>Real World Projects</li>
                                <li><b>Unlimited</b> Support</li>
                            </ul>
                            <div class="pricing-price">
                                
                            </div>
                            <a href="#" class="price_btn">Apply Now</a>
                        </div>
                    </div>
                </div><!--- END COL -->			  
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp mb-5" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <div class="pricing_design">
                        <div class="single-pricing">
                            <div class="price-head">		
                                <h2>Elite</h2>
                                <h1 class="price h3">$99</h1>
                                <span>/Monthly</span>
                            </div>
                            <ul>
                                <li>Everything in Ultimate plan</li>
                                <li>Job/Internship Placement</li>
                                <li>AI Tutor(<b>Advanced Support</b>)</li>
                                <li>Premium Bootcamps</li>
                                <li>Interview Coaching</li>
                                <li><b>Unlimited</b> Support</li>
                            </ul>
                            <div class="pricing-price">
                                
                            </div>
                            <a href="#" class="price_btn">Apply Now</a>
                        </div>
                    </div>
                </div><!--- END COL -->			  
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp mb-5" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <div class="pricing_design">
                        <div class="single-pricing">
                            <div class="price-head">		
                                <h2>Corporate (<b>B2B</b>) </h2>
                                <h1 class="price h3">$1000</h1>
                                <span>/Monthly</span>
                            </div>
                            <ul>
                                <li>Custom training Programs</li>
                                <li>White labled AI Tutor</li>
                                <li>Dedicated Instructors</li>
                                <li>Custom Certification</li>
                                <li>Employee Assessment</li>
                                <li><b>Unlimited</b> Support</li>
                            </ul>
                            <div class="pricing-price">
                                
                            </div>
                            <a href="#" class="price_btn">Apply Now</a>
                        </div>
                    </div>
                </div><!--- END COL -->			  
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp mb-5" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <div class="pricing_design">
                        <div class="single-pricing">
                            <div class="price-head">		
                                <h2>Add-on Services</h2>
                                 <!-- <h1 class="price h3">$1000</h1> -->
                                <span>(One time Payment)</span>
                            </div>
                            <ul>
                                <li>Certification (Exam only) - <b>$49/=</b></li>
                                <li>Portfolio Website Setup - <b>$199/=</b></li>
                                <li>Internship - <b>$200/=</b></li>
                                <li>AI Tutor API - <b>from $200</b></li>
                                <li> Private Community Access (Networking, AMA sessions) - <b>$12/month</b></li>
                                <li><b>Unlimited</b> Support</li>
                            </ul>
                            <div class="pricing-price">
                                
                            </div>
                            <a href="#" class="price_btn">Apply Now</a>
                        </div>
                    </div>
                </div><!--- END COL -->			  
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>

    

    <style>
        .pricing-content{position:relative;}
        .pricing_design{
            position: relative;
            margin: 0px 15px;
        }
        .pricing_design .single-pricing{
            background:#71c55d;
            padding: 60px 40px;
            border-radius:30px;
            box-shadow: 0 10px 40px -10px rgba(0,64,128,.2);
            position: relative;
            z-index: 1;
        }
        .pricing_design .single-pricing:before{
            content: "";
            background-color: #fff;
            width: 100%;
            height: 100%;
            border-radius: 18px 18px 190px 18px;
            border: 1px solid #eee;
            position: absolute;
            bottom: 0;
            right: 0;
            z-index: -1;
        }
        .price-head{}
        .price-head h2 {
            margin-bottom: 20px;
            font-size: 26px;
            font-weight: 600;
        }
        .price-head h1 {
            font-weight: 600;
            margin-top: 30px;
            margin-bottom: 5px;
        }
        .price-head span{}

        .single-pricing ul{list-style:none;margin-top: 30px;}
        .single-pricing ul li {
            line-height: 36px;
        }
        .single-pricing ul li i {
            background: #71c55d;
            color: #fff;
            width: 20px;
            height: 20px;
            border-radius: 30px;
            font-size: 11px;
            text-align: center;
            line-height: 20px;
            margin-right: 6px;
        }
        .pricing-price{}

        .price_btn {
            background: #71c55d;
            padding: 10px 30px;
            color: #fff;
            display: inline-block;
            margin-top: 20px;
            border-radius: 2px;
            -webkit-transition: 0.3s;
            transition: 0.3s;
        }
        .price_btn:hover{background:#029811;}
        a{
        text-decoration:none;    
        }

        .section-title {
            margin-bottom: 60px;
        }
        .text-center {
            text-align: center!important;
        }

        .section-title h2 {
            font-size: 45px;
            font-weight: 600;
            margin-top: 0;
            position: relative;
            text-transform: capitalize;
        }
    </style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
    
</body>
</html>