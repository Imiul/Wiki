    <header class="w-full h-[80px] bg-blue-100/70" >

        <div class="w-[90%] mx-auto h-[80px] flex justify-between items-center" >

            <!-- Logo -->
            <a href="/Wiki/Pages/home">
                <img src="<?= UrlRoot. "/img/logo/Wiki.png" ?>" alt="Wiki Logo" width="100px" class="lg:w-[130px]" >
            </a>

            <div class="navBar flex space-x-2 xl:space-x-4">
                <a href='/Wiki/Users/myInfo' class='bg-[#28427B] border-2 border-[#28427B] hover:bg-[#28427B]/80 focus:bg-[#404E6C] py-[4px] lg:py-[8px] px-[15px] lg:px-[20px] rounded text-white' >My Info</a>
                <a href='/Wiki/Users/wikis' class='bg-[#28427B]/80 border-2 hover:bg-[#28427B] border-[#28427B] focus:bg-[#404E6C] py-[4px] lg:py-[8px] px-[15px] lg:px-[20px] rounded text-white'>My Wikis</a>
                <a href='/Wiki/Authentification/logout' class='bg-red-500/80 border-2 hover:bg-red-500 border-red-500 focus:bg-red-500 py-[4px] lg:py-[8px] px-[15px] lg:px-[20px] rounded text-white'>Log Out</a>
            </div>
        </div>
    </header>

    