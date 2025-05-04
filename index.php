<?php
// bookworm-landing.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookworm</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .blue-background {
      background-color: #4475F2;
      position: absolute;
      top: 0;
      right: 0;
      width: 40%;
      height: 100%;
      z-index: -1;
      clip-path: polygon(40% 0, 100% 0, 100% 100%, 0 100%);
    }body {
            font-family: 'Inter', sans-serif;
        }
        .hero-section {
            background-color: #f8fafc;
        }
        .footer {
            background-color: #4475F2;
        }
    </style>
</head>

<body class="relative overflow-x-hidden">
        <img src="images/hero_bg.svg" alt="bg" class="absolute top-0 right-0 h-[1000px] w-[975px] " />

  <!-- Header -->
  <header class="flex items-center justify-between p-6 relative z-10">
    <div class="flex items-center space-x-2">
      <img src="images/logo_blue.svg" alt="logo" class="w-[260px] h-[95px] ml-7"> <!-- Logo image -->
    </div>
    <nav class="space-x-5 ml-[-380px] text-sm font-medium text-gray-500">
      <a href="#" class="text-[#4475F2] border-b-2 border-blue-600">Feature</a>
      <a href="#services" class="text-[#000]">Service</a>
      <a href="#review" class="text-[#000]">Review</a>
    </nav>
    <a href="signin.php" class="bg-white  text-[black] px-9 py-2 rounded-lg font-normal">Login</a>
  </header>
  
  <!-- Main Section -->
  <section class="flex flex-col h-[70vh] lg:flex-row items-center justify-between px-8 lg:px-20 relative z-10">
    <div class="lg:w-1/2">
      <h1 class="text-[76px] font-extrabold leading-tight text-gray-900 mb-6">
        Search & review<br>
        your <span class="text-[#4475F2] underline">fav book</span><br>
        effortlessly
      </h1>
      <p class="text-gray-600 text-[16px] mb-6 max-w-md">
        Embark on a literary journey like never before with our revolutionary library application! Introducing a seamless experience that transcends traditional boundaries, where you can effortlessly search your favorite books.✨
      </p>
      <a href="signin.php" class="bg-[#4475F2] hover:bg-blue-600 text-white px-9 py-4 rounded-lg font-normal transition inline-block">Start now ➜</a>
    </div>
    
    <div class="lg:w-1/2 flex justify-center relative h-96">
      <!-- Book 1 - "Dompet Ayah Sepatu Ibu" -->
      <div class="absolute left-4 bottom-4 transform hover:scale-105 transition">
        <img src="images/image-4.png" alt="Dompet Ayah Sepatu Ibu by Is Khairen" class="w-64 h-atuo rounded-lg ">
      </div>
      
      <!-- Book 2 - "Talking to Strangers" -->
      <div class="absolute top-[-150px] left-1/2 transform -translate-x-1/2 hover:scale-105 transition">
        <img src="images/image-3.png" alt="Talking to Strangers by Malcolm Gladwell" class="w-56 auto rounded-lg ">
      </div>
      
      <!-- Book 3 - Ocean/underwater scene -->
      <div class="absolute right-8 top-1/2 transform -translate-y-1/2 hover:scale-105 transition">
        <img src="images/image-2.png" alt="Ocean-themed book" class="w-56 h-auto rounded-lg ">
      </div>
      
      <!-- Book 4 - "The Visual MBA" -->
      <div class="absolute bottom-[-200px] right-1/4 hover:scale-105 transition">
        <img src="images/image-1.png" alt="The Visual MBA by Jason Barron" class="w-48 h-auto rounded-lg ">
      </div>
    </div>
  </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <p class="text-[#4475F2] font-bold text-[20px] ml-3">Features</p>
             <h2 class="text-2xl font-bold mb-12 flex items-center">
        <span class="mr-2">🤔</span>
        <span class="text-black mr-2">•</span> 
        What You Can Do?
    </h2>
           <div class="grid grid-cols-1 md:grid-cols-3 gap-8"> 
  <!-- Feature 1 -->
  <div class="text-center">
    <a href="search-book.html">
      <div class="bg-[#4475F2] h-[90px] w-[90px] rounded-lg flex items-center justify-center mx-auto mb-4 hover:bg-blue-600 transition">
        <i class="fas fa-search text-white text-[40px]"></i>
      </div>
    </a>
    <h3 class="text-xl font-semibold mb-2">Search Book</h3>
    <p class="text-gray-600 text-[16px]">Effortlessly find your next<br> read with our powerful and intuitive<br> book search.</p>
  </div>

  <!-- Feature 2 -->
  <div class="text-center">
    <a href="review-book.html">
      <div class="bg-[#4475F2] h-[90px] w-[90px] rounded-lg flex items-center justify-center mx-auto mb-4 hover:bg-blue-600 transition">
        <i class="fas fa-book text-white text-[40px]"></i>
      </div>
    </a>
    <h3 class="text-xl font-semibold mb-2">Review Book</h3>
    <p class="text-gray-600 text-[16px]">Discover insightful critiques and<br> share your thoughts on diverse<br> literary masterpieces effortlessly.</p>
  </div>

  <!-- Feature 3 -->
  <div class="text-center">
    <a href="wishlist-book.html">
      <div class="bg-[#4475F2] h-[90px] w-[90px] rounded-lg flex items-center justify-center mx-auto mb-4 hover:bg-blue-600 transition">
        <i class="fas fa-star text-white text-[40px]"></i>
      </div>
    </a>
    <h3 class="text-xl font-semibold mb-2">Wishlist Book</h3>
    <p class="text-gray-600 text-[16px]">Curate your literary<br> dreams–wishlist books for future<br> adventures and discoveries.</p>
  </div>
</div>

        </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 bg-gray-50" id="services">
        <div class="container mx-auto px-6">
            <h2 class="text-[48px] font-bold mb-12 flex items-center">
                <span class="mr-2">🚀</span>
                <span class=" mr-3">•</span> The Services for You
            </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Service Image -->
        <div class="flex justify-center">
                    <img src="images/Service.svg" alt="Library" class="rounded-lg  ml-[-80px] object-cover w-[600] h-[399]">
                </div>
                <!-- Service Text -->
        <div class="max-w-xl mx-auto text-left mt-12 px-4">
         <h2 class="text-[32px] font-semibold text-gray-900 mb-4">
         <span class="text-[#4475F2] font-bold">Rent</span> your favorite book<br>
         fairly easy on <span class="text-[#4475F2] font-bold">Lidia</span>!
         </h2>
       <p class="text-gray-600 mb-3 text-[20px]">
       Viewing, rent, and organize your favorite books has<br> never been easier. An integrated digital library rent<br>  that’s simple to use, Lidia lets you spend less time<br>  managing your work and more time actually doing it!
      </p>
       <p class="text-gray-600 text-[20px]">
       Effortless rentals, personalized shelves—Lidia<br>  transforms book management, enhancing your<br>  reading experience~
       </p>
      </div>
     </div>

            <!-- Quick Book Review -->
            <div class="container mx-auto px-6 ml-[-110px]">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="max-w-xl mx-auto text-left mt-12 px-4  ml[-100px]">
         <h2 class="text-[32px] font-semibold text-gray-900 mb-4">Quick Book Rentals: <br>
         <span class="text-[#4475F2] font-bold">Dive</span> into <span class="text-[#4475F2] font-bold">Reading</span>  Instantly
         </h2>
       <p class="text-gray-600 mb-3 text-[20px]">Discover instant literary delight. Access a vast library,<br>borrow your favorite reads, and dive into captivating <br>stories within minutes. Reading made quick and easy,<br>just a click away!
      </p>
       <p class="text-gray-600 text-[20px]">Unlock a world of stories effortlessly.<br> Browse genres, choose, rent in minutes. <br>Seamlessly manage your reading adventures <br>with our intuitive platform~       </p>
      </div>
      <div class="flex justify-center">
        <img src="images/Reading.svg" alt="Library" class="rounded-lg object-cover ml-[200px] w-[600] h-[399]">
      </div>
     </div></div>
    </section>

    <!-- Reviews Section -->
    <section class="py-16 bg-white" id="review">
        <div class="container mx-auto px-6">
    <p class="text-[#4475F2] font-bold text-[20px] ml-3">Reviews</p>
    <h2 class="text-[48px] font-bold mb-12 flex items-center">
         <span class="mr-2">📝</span>
        <span class="mr-3">•</span>Reviews of others
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Review 1 -->
        <div class="bg-white p-6 rounded-lg shadow-lg border">
            <div class="flex flex-col items-center mb-6">
                <img src="images/cover-1.png" alt="Mishal" class="w-24 h-24 rounded-full mb-4">
                <p class="text-center text-gray-700">Engaging plot, vivid characters;<br> a captivating read that <br>lingers in your thoughts.</p>
            </div>
            <div class="text-center">
                <h4 class="font-semibold text-[#4475F2]">MISHAL</h4>
                <p class="text-gray-500">College Student</p>
            </div>
        </div>
        
        <!-- Review 2 -->
        <div class="bg-white p-6 rounded-lg shadow-lg border">
            <div class="flex flex-col items-center mb-6">
                <img src="images/cover-2.png" alt="Rahul Sharma" class="w-24 h-24 rounded-full mb-4">
                <p class="text-center text-gray-700">Thought-provoking narrative<br> and rich prose. A must-read for<br> any avid book lover!</p>
            </div>
            <div class="text-center">
                <h4 class="font-semibold text-[#4475F2]">RAHUL SHARMA</h4>
                <p class="text-gray-500">School Student</p>
            </div>
        </div>
        
        <!-- Review 3 -->
        <div class="bg-white p-6 rounded-lg shadow-lg border">
            <div class="flex flex-col items-center mb-6">
                <img src="images/cover-3.png" alt="Angel" class="w-24 h-24 rounded-full mb-4">
                <p class="text-center text-gray-700">Immersive storytelling!<br> An enriching literary experience<br> worth savoring and sharing.</p>
            </div>
            <div class="text-center">
                <h4 class="font-semibold text-[#4475F2]">Angel</h4>
                <p class="text-gray-500">ERP Developer</p>
            </div>
        </div>
    </div>
</div>
    </section>

    <!-- Footer -->
   <footer class="bg-[#4475F2] text-white pt-16 pb-8 relative overflow-hidden">
    <div class="absolute top-0 right-0  ">
        <img src="images/top.png" alt="BookWorm Icon" class="h-[447px]">

    </div>
    <div class="absolute bottom-0 left-0 w-[300px] h-[300px] ">
                <img src="images/bottom.png" alt="BookWorm Icon" class="h-[447px]">

    </div>
    <div class="container mx-auto px-8">
        <!-- Logo -->
        <div class="flex justify-center mb-12">
            <div class="text-center">
                <div class="flex justify-center mb-2">
                    <img src="images/footer-logo.png" alt="BookWorm Icon" class="h-[90px] w-[100px]">
                </div>
                <h2 class="text-4xl font-light">BookWorm</h2>
                <p class="text-sm tracking-widest">LIBRARY</p>
            </div>
        </div>
        
        <!-- Main footer content -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <!-- Left Column -->
            <div>
                <h3 class="font-bold text-sm mb-6 tracking-wider">LIFT MEDIA</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="hover:text-blue-100">Inicio</a></li>
                    <li><a href="#" class="hover:text-blue-100">Quiénes somos</a></li>
                    <li><a href="#" class="hover:text-blue-100">Contacto</a></li>
                    <li><a href="#" class="hover:text-blue-100">Política de Privacidad</a></li>
                </ul>
            </div>
            
            <!-- Middle Column -->
            <div>
                <h3 class="font-bold text-sm mb-6 tracking-wider">LEGAL</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="hover:text-blue-100">Condiciones generales</a></li>
                    <li><a href="#" class="hover:text-blue-100">Política de Cookies</a></li>
                    <li><a href="#" class="hover:text-blue-100">Prensa</a></li>
                </ul>
            </div>
            
            <!-- Right Column -->
            <div>
                <h3 class="font-bold text-sm mb-6 tracking-wider">CONTACT</h3>
                <ul class="space-y-4">
                 <a href="#"><li class="flex items-center">
                        <span class="bg-white bg-opacity-20 w-8 h-8 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-phone-alt text-sm"></i>
                        </span>
                        123 456 789
                    </li></a>
                    <a href="#"><li class="flex items-center">
                        <span class="bg-white bg-opacity-20 w-8 h-8 rounded-full flex items-center justify-center mr-3">
                            <i class="fab fa-whatsapp text-lg"></i>
                        </span>
                        Whatsapp
                    </li></a>
                   <a href="#"><li class="flex items-center">
                        <span class="bg-white bg-opacity-20 w-8 h-8 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-envelope text-sm"></i>
                        </span>
                        hola@Liftmedia.com
                    </li></a> 
                   <a href="#"><li class="flex items-center">
                        <span class="bg-white bg-opacity-20 w-8 h-8 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-clock text-sm"></i>
                        </span>
                        <div>
                            Lunes a Viernes<br>
                            09:00 a 20:00 horas
                        </div>
                    </li></a> 
                </ul>
            </div>
        </div>
        
        <!-- Social media links -->
        <div class="flex justify-center space-x-4 mb-8">
            <a href="#" class="bg-white bg-opacity-20 w-8 h-8 rounded-full flex items-center justify-center hover:bg-opacity-30">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="bg-white bg-opacity-20 w-8 h-8 rounded-full flex items-center justify-center hover:bg-opacity-30">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="#" class="bg-white bg-opacity-20 w-8 h-8 rounded-full flex items-center justify-center hover:bg-opacity-30">
                <i class="fab fa-facebook-f"></i>
            </a>
        </div>
        
        <!-- Copyright and address -->
        <div class="text-center text-s mb-8">
            <p>© 2019 Lift media Online S.L.</p>
            <p class="mt-1">Ronda Sant Pere 52, 08010 Barcelona.</p>
            <p class="mt-1">Inscripción en el Registro Mercantil de Barcelona. Tomo 46606. Folio 37. Hoja 525271.</p>
        </div>
        
        <!-- Two columns of Lorem Ipsum text -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-s leading-relaxed mb-8">
            <div>
                <p class="mb-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it t.</p>
                <p>El funcionamiento de la plataforma es muy sencillo. Se debe completar la solicitud, esta información se envía a las entidades financieras a tiempo real con el fin de que la herramienta compare, negocie y escanes las mejores ofertas. Una vez aceptada la propuesta, se ingresa el dinero directamente en la cuenta del cliente.</p>
            </div>
            <div>
                <p class="mb-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it t.</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it. Lorem Ipsum is simply dummy text of the printin.</p>
            </div>
        </div>
        
        <!-- Final text -->
        <div class="text-center text-m">
            <p>Lift no cobra comisiones de ningún tipo.</p>
        </div>
    </div>
</footer>

    <script>
        // Any JavaScript functionality can be added here
    </script>
</body>
</html>