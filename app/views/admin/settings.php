<!DOCTYPE html>
<html lang="en">
<?php require_once(__DIR__."/../incFiles/website/head.php"); ?>
<body>


    <!-- MAIN -->
    <section class="flex items-center relative">

        <!-- Aside Bar -->
        <?php require_once(__DIR__ . "/../incFiles/admin/sidBar.php"); ?>

        <!-- Dashboard -->
        <div class="w-[70vh] md:w-[80vw] h-[100vh] bg-gray-200 py-[50px] px-8 overflow-y-scroll overflow-x-none" >
            
            <!-- Page Head -->
            <div>
                <h1 class="text-md md:text-xl lg:text-3xl font-[800] mb-12">ADMIN / Settings</h1>
            </div>

            <!-- Page COntent -->
            <div class="mt-8 bg-gray-200 space-y-4">     

                <!-- Update Info --> 
                <div class="py-4 bg-gray-100 px-4 rounded border-2 border-[#415a77]">
                    <h1 class="text-xl font-[700] mb-2" >Update Information !</h1>
                    <?php if ($data['userData']) {
                    
                        echo "<form method='POST' enctype='multipart/form-data' class='flex items-center justify-center flex-col flex-wrap gap-x-[20px] gap-y-[10px] ' >";
                        
                        echo "<div class='w-[100px] h-[100px] rounded-lg border-2 border-blue-900'>";
                        echo "<img src='". UrlRoot."/public/uploads/users/" . $data['userData']['picture'] ."' alt=''>";
                        echo "</div>";
        
                        echo "Generale Information :";
                        echo "<input type='text'  name='Userid' value='". $data['userData']['UserId'] ."' hidden>";
                        echo "<input type='text'  disabled value='Username : ". $data['userData']['username'] ."' class='bg-gray-200 px-[20px] w-full border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none' >";
                        echo "<input type='text'  disabled value='Admin Since : ". $data['userData']['addDate'] ."' class='bg-gray-200 w-full px-[20px] border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none' >";
                        echo "<input type='text'  disabled value='Last Login Date : ". $data['userData']['lastLoginDate'] ."' class='bg-gray-200 w-full px-[20px] border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none' >";
                        
                        echo "You Can Update These Information If You Want:";
                        echo "<input type='text'  name='firstName' value='". $data['userData']['firstName'] ."' class='px-[20px] w-full border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none' >";
                        echo "<input type='text'  name='lastName' value='". $data['userData']['lastName'] ."' class='px-[20px] w-full border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none' >";
                        echo "<input type='text'  name='email' value='". $data['userData']['email'] ."' class='px-[20px] w-full border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none' >";

                        echo "<button class='bg-[#415a77] mt-4 px-4 py-2 rounded text-white' name='updateInfo' type='submit' >Update Data</button>";
                        echo "</form>";

                    } else {
                        echo "<div class='mt-4' >";
                        echo "<span class='border-2 border-[#000] py-[10px] rounded px-[10vw] bg-gray-200' >You Are Not Login In !</span>";
                        echo "</div>";
                    }
                    ?>
                </div>


                <!-- RESET PASSWORD --> 
                <div class="py-4 bg-gray-100 px-4 rounded border-2 border-[#415a77]">
                    <h1 class="text-xl font-[700] mb-2" >Reset Your Password !</h1>
                    <form method="post" class="space-y-2">
                        <input type='text'  name='Userid' value='<?= $_SESSION['UserInfo']['id'] ?>' hidden>
                        <input type="password" name="Newpassword" placeholder="Your New Password" class='w-full px-[20px] border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none'><br>
                        <button class="bg-[#415a77] text-white rounded px-4 py-2 border-2 border-[#415a77] hover:bg-[#415a77]/70" style="transition-duration: 0.5s;" name="updatePassword" type="submit" >Update Password</button>
                    </form>
                </div>

            </div>
    </section>



    <!-- Data table -->
    <?php require_once(__DIR__ . "/../incFiles/admin/dataTable.php"); ?>


</body>
</html>