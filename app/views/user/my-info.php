<!DOCTYPE html>
<html lang="en">
<?php require_once(__DIR__."/../incFiles/website/head.php"); ?>
<body>

    <!-- HEADER -->
    <?php require_once(__DIR__."/../incFiles/user/header.php"); ?>

    <!-- WIKIS -->
    <div class="mt-8 mb-[90px] flex flex-col  items-center" >

        <!-- PAGE HEAD -->
        <?php require_once(__DIR__."/../incFiles/website/section-head.php"); ?>

        <!-- USER PROFILE -->
        <section class="w-[90%] mt-8 flex flex-col lg:flex-row items-center justify-center gap-x-8 gap-y-8" >

            <!-- UPDATE PROFILE  -->
            <div class="w-[95%] md:w-[30%] mt-[50px] border-2 border-[#415a77] rounded px-[20px] py-[40px]" >
                <?php if ($data['userData']) {
                    
                        echo "<form method='POST' class='flex items-center justify-center flex-col flex-wrap gap-x-[20px] gap-y-[10px] ' >";
                        echo "<div class='w-[100px] h-[100px] bg-gray-200 rounded'>";
                        echo "<img src='". $data['userData']['picture'] ."' alt=''>";
                        echo "</div>";
        
                        echo "<input type='text'  disabled value='". $data['userData']['UserId'] ."' class='bg-gray-200 px-[20px] w-full border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none' >";
                        
                        echo "<input type='text'  disabled value='". $data['userData']['username'] ."' class='bg-gray-200 px-[20px] w-full border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none' >";
                        
                        echo "<input type='text'  name='firstName' value='". $data['userData']['firstName'] ."' class='px-[20px] w-full border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none' >";
                        
                        echo "<input type='text'  name='lastName' value='". $data['userData']['lastName'] ."' class='px-[20px] w-full border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none' >";
                        
                        echo "<input type='text'  name='email' value='". $data['userData']['email'] ."' class='px-[20px] w-full border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none' >";
                        
                        echo "<input type='text'  disabled value='". $data['userData']['addDate'] ."' class='bg-gray-200 w-full px-[20px] border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none' >";
                        
                        echo "<input type='text'  disabled value='". $data['userData']['lastLoginDate'] ."' class='bg-gray-200 w-full px-[20px] border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none' >";
                        
                        echo "<button class='bg-[#415a77] mt-4 px-4 py-2 rounded text-white' name='updateInfo' value='submit' >Update Data</button>";
                        echo "</form>";

                    } else {
                        echo "<div class='mt-4' >";
                        echo "<span class='border-2 border-[#000] py-[10px] rounded px-[10vw] bg-gray-200' >You Are Not Login In !</span>";
                        echo "</div>";
                    }
                ?>
            </div>

            <!-- DELETE PROFILE -->
            <div class="py-4 bg-red-100 px-4 rounded border-2 border-red-500">
                <h1 class="text-xl font-[700] mb-2" >Danger Zone!</h1>
                <h1 class="text-md font-[400] mb-4" >BY, Deleating Your Account You DATA Will Be Deleated Permantly !</h1>
                <form method="post">
                    <button class="bg-red-500 text-white rounded px-4 py-2 border-2 border-red-500 hover:bg-red-500/70" style="transition-duration: 0.5s;" name="deleteAccount" value="<?= $data['userData']['UserId'] ?>" >Delete Account</button>
                </form>
            </div>

        </section>
    </div>

</body>
</html>