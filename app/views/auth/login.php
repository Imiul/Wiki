<!DOCTYPE html>
<html lang="en">
<?php require_once(__DIR__."/../incFiles/website/head.php"); ?>
<body>
    
    <section class="w-full h-[100vh] flex justify-center items-center" >

        <!-- Login Form -->
        <form 
            method="POST" 
            class="w-[90vw] md:w-[70vw] lg:w-[40vw] bg-[#eaf4f4] py-[8%] lg:py-[4%] md:px-[2.5%] px-[4%] md:px-[2.5%] rounded border-2 border-[#415a77] flex flex-col space-y-[5px] justify-center" 
            />

            <div class="flex items-center mb-4">
                <a href="/Wiki/Pages/home"><img src="<?= UrlRoot. "/img/logo/Wiki.png" ?>" alt="Wiki Logo" width="90px" class="md:w-[120px]" ></a>
                <h1 class="ml-4 mt-2">/ Login </h1>
            </div>
            
            <!-- Email INput --> 
            <input type="email" name="email" placeholder="Email Address" class="px-[20px] border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none" />
            <span class="errorMessage w-full bg-red-500 text-white rounded px-[20px]"></span>
            
            <!-- Password Input -->
            <input type="password" name="password" placeholder="Password" class="px-[20px] border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none" />
            <span class="errorMessage bg-red-500 text-white rounded px-[20px]"></span>

            <!-- Form Button -->
            <div class="w-full relative flex justify-between items-center" >
                <button 
                    type="submit" name="login"
                    class="w-[65%] py-[5px] bg-[#415a77] text-white border-2 border-[#415a77] rounded hover:bg-[#415a77]/50 hover:text-[#415a77] focus:bg-[#284b63] focus:text-white" />Login</button>
                <a href="register" class="w-[30%] py-[5px] bg-[#778da9]/50 text-[#415a77] border-2 border-[#415a77] rounded text-center hover:text-white hover:bg-[#415a77]">Register</a>
            </div>

        </form>
    </section>

    <!-- Form Validation Script --> 
    <script src="<?= UrlRoot. "/js/auth/login.js" ?>" ></script>

</body>
</html>