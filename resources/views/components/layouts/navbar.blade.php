<nav class="bg-white text-black dark:bg-blue-950 dark:text-white md:fixed md:top-0 md:w-full md:z-50">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          <img class="h-8 w-auto sm:hidden" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4 navlink">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
           
            <a href="{{route('index')}}" >Inicio</a>
            <a href="{{route('grids')}}" @if($navindex=='1')class="active"@endif aria-current="page">Layout</a>
            <a href="{{route('colors')}}" @if($navindex=='2')class="active"@endif >Colors</a>
            <a href="{{route('animations')}}" @if($navindex=='3')class="active"@endif>Animation</a>
            
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <button id="darkModeToggle" class="w-16 h-8 shadow-lg mx-4 bg-gray-300 rounded-full p-1 duration-300 ease-in-out">
          <div id="darkModeIndicator" class="w-6 h-6 bg-white text-black rounded-full shadow-md transform duration-300 ease-in-out"><i class="fa-solid fa-sun" id="iconDarkMode"></i></div>
      </button>
        <a href="https://github.com/Dev-KendallAF" class="relative rounded-full bg-indigo-500 p-2 shadow-md shadow-indigo-500/50 text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
          Dev Kendall Fern&aacute;ndez          
        </a>     
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>
      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Team</a>
      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Projects</a>
      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Calendar</a>
    </div>
  </div>
</nav>


<div class="grid md:grid-cols-2 h-screen bg-gray-700 bg-cover bg-center md:bg-cover md:bg-right" style="background-image: url('{{$url}}')">
<div class="h-full flex items-center backdrop-blur-sm bg-black/30  text-white">
  <div class="px-10">
    <p class="text-sm p-1 rounded-full inline px-3 font-semibold bg-gradient-to-r from-indigo-500 to-cyan-500 ">{{$navsubtitle}}</p>
    <h1 class="text-7xl font-bold ">{{$navtitle}}</h1>
    <p class="py-5">{{$navtext}}</p>
  </div>

</div>
</div>

<script>
        //Visual
        const darkModeButton = document.getElementById("darkModeToggle");
        const darkModeIndicator = document.getElementById("darkModeIndicator");
        const icon = document.getElementById("iconDarkMode");
        
        function IconToggle()
        { 
            darkModeButton.classList.toggle("bg-gray-300");
            darkModeButton.classList.toggle("bg-cyan-300");
            darkModeIndicator.classList.toggle("bg-white");
            darkModeIndicator.classList.toggle("bg-black");
            darkModeIndicator.classList.toggle("text-black");
            darkModeIndicator.classList.toggle("text-white");
            icon.classList.toggle("fa-moon");
            icon.classList.toggle("fa-sun");

        }


        //Theme Vars
        const userTheme = localStorage.getItem("theme")
        const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;

        function ThemeSwitch()
        {
            if(document.documentElement.classList.contains("dark"))
            {
                document.body.classList.remove('darkMode')
                document.documentElement.classList.remove("dark");
                localStorage.setItem("theme","light")
                document.body.classList.add('lightMode')
                darkModeIndicator.style.transform = "translateX(0)";

                IconToggle();
                return;
            }
            document.body.classList.remove('lightMode')
            document.documentElement.classList.add("dark")
            document.body.classList.add('darkMode')

            localStorage.setItem("theme","dark")
            darkModeIndicator.style.transform = "translateX(100%)";
            IconToggle();
        }

        function ThemeCheck()
        {
            if(userTheme==="dark" || (!userTheme && systemTheme))
            {
                console.log('estas dentro')
                document.documentElement.classList.add("dark")
                darkModeIndicator.style.transform = "translateX(100%)";
                document.body.classList.add('darkMode')
                IconToggle();
                return;
            }
            document.body.classList.add('lightMode')
            darkModeIndicator.style.transform = "translateX(0)";
        }

    // Initialize dark mode based on user preference
    ThemeCheck();

    // Add click event listener to the button
    document.getElementById("darkModeToggle").addEventListener("click", ThemeSwitch);
</script>