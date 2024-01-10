    <section class="bg-blue-100/70">
        <header class="w-[90%] mx-auto h-[80px] flex justify-between items-center" >

            <!-- Logo -->
            <a href="home">
                <img src="<?= UrlRoot. "/img/logo/Wiki.png" ?>" alt="Wiki Logo" width="100px" class="lg:w-[130px]" >
            </a>

            <div class="navBar flex">
                <!-- Prs Btns -->
                <div class="flex items-center space-x-2 xl:space-x-4">
                    
                    <a href='/Wiki/Authentification/login' class='bg-[#28427B] border-2 border-[#28427B] hover:bg-[#28427B]/80 focus:bg-[#404E6C] py-[4px] lg:py-[8px] px-[15px] lg:px-[20px] rounded text-white' >Login</a>
                    <a href='/Wiki/Authentification/register' class='bg-[#28427B]/80 border-2 hover:bg-[#28427B] border-[#28427B] focus:bg-[#404E6C] py-[4px] lg:py-[8px] px-[15px] lg:px-[20px] rounded text-white'>Sign Up</a>
                
                    <button class="w-auto h-auto" id="burgerMenu">
                        <img src="<?= UrlRoot. "/img/icons/bar-2.png" ?>" alt="Burger Menu Icon" width="30px" class="lg-w-[40px]">
                    </button>
                </div>

                <ul class="fixed left-[-100%] top-0 w-[60%] lg:w-[30%] bg-[#28427B] h-[100vh] px-[50px] py-[4%]" id="menu" style="transition-duration: 1s;" >
                    <li class="mb-4"><a href="home" class="text-white font-[500] text-xl lg:text-2xl">Home</a></li>
                    <li class="mb-4"><a href="categories" class="text-white font-[500] text-xl lg:text-2xl">Categories</a></li>
                    <li class="mb-4"><a href="wikis" class="text-white font-[500] text-xl lg:text-2xl">Wikis</a></li>
                </ul>
            </div>
        </header>
    </section>
    