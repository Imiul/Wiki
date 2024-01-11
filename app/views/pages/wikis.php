<!DOCTYPE html>
<html lang="en">
<?php require_once(__DIR__."/../incFiles/website/head.php"); ?>
<body>
    
    <!-- header --> 
    <?php require_once(__DIR__."/../incFiles/website/header.php"); ?>

    
    <!-- Article --> 
    <section>
        <div class="w-[90%] mx-auto mt-[60px] mb-[90px]" >
                
                <!-- Section Title -->
                <div class="text-center">
                    <h1 class="text-xl lg:text-2xl font-[600] text-[#28427B] mb-[5px]"> 
                        <span class="mr-2">- - - </span> Wiki Title <span class="ml-2" >- - - </span> 
                    </h1>
                    <h1 class="text-m lg:text-xl font-[500]" > View Wiki Details & Information  </h1>
                </div>

                <div class="w-full flex-col flex justify-center items-center mt-4 gap-y-2">
                    <input type="search" name="searchInput"  placeholder="Search Category" class="w-[90%] lg:w-[50%] px-[20px] border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none">
                                
                    <div>
                        <button class="py-[5px] px-4 bg-[#415a77] text-white border-2 border-[#415a77] rounded hover:bg-[#415a77]/50 hover:text-[#415a77] focus:bg-[#284b63] focus:text-white" >Order By Date</button>
                        <button class="py-[5px] px-4 bg-[#415a77] text-white border-2 border-[#415a77] rounded hover:bg-[#415a77]/50 hover:text-[#415a77] focus:bg-[#284b63] focus:text-white">Order By Name</button>
                    </div>
                </div>


                <div class="flex items-center justify-center flex-col flex-wrap gap-x-[20px] gap-y-[10px] mt-[30px] md:flex-row" >

                    <?php
                        if ($data['WikisData']) {

                            foreach($data['WikisData'] as $wiki) {
                                echo "<div class='border-2 border-[#28427B] w-[95%] md:w-[40%] lg:w-[30%] xl:w-[20%] rounded bg-blue-100/70 px-[30px] py-[20px]'>";
                                echo "<div class='h-[200px] w-[100%] rounded bg-gray-200 border-2 border-[#28427B]' ></div>";
                                echo "<div class='mt-[10px] flex flex-col items-center'  >";
                                echo "<h1 class='font-[500] text-[18px]' >". $wiki['title'] ."</h1>";
                                echo "<span class='text-sm text-center'>";
                                echo "<a href='/Wiki/Pages/wikiDetails?wikiId=". $wiki['wikiId'] ."'>View Wiki Details & Information</a>";
                                echo "</span>";
                                echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "<div class='mt-4' >";
                            echo "<span class='border-2 border-[#000] py-[10px] rounded px-[10vw] bg-gray-200' >There Is Not Wikis ! We're Sorry</span>";
                            echo "</div>";
                        }
                    ?>
                </div>
        </div>
    </section>

    <!-- Burger Menu Code --> 
    <script src="<?= UrlRoot. "/public/js/auth/pages/burger-menu.js" ?>" ></script>

</body>
</html>