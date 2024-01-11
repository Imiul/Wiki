<!DOCTYPE html>
<html lang="en">
<?php require_once(__DIR__."/../incFiles/website/head.php"); ?>
<body>
    
    <!-- header --> 
    <?php require_once(__DIR__."/../incFiles/website/header.php"); ?>

    <!-- Categories -->
    <section class="mt-[120px]" >
        <div class="w-[90%] mx-auto mt-[50px]" >

            <!-- Section Head -->
            <?php require_once(__DIR__."/../incFiles/website/section-head.php"); ?>

            <!-- <div class="w-full flex-col flex justify-center items-center mt-4 gap-y-2">
                <input type="search" name="searchInput"  placeholder="Search Category" class="w-[90%] lg:w-[50%] px-[20px] border-2 border-[#415a77] rounded h-[40px] placeholder:text-[#415a77] outline-none">
            </div> -->

            <div class="flex items-center justify-center flex-col flex-wrap gap-x-[20px] gap-y-[10px] mt-[30px] md:flex-row" >
                <!-- HOW A CATEGORY SHOULD LOOK -->
                <?php

                    if ($data['CategoryData']) {
                        
                        foreach($data['CategoryData'] as $ctg) {
                            echo "<div class='border-2 border-[#28427B] w-[90%] md:w-[40%] lg:w-[30%] xl:w-[20%] rounded flex justify-center items-center bg-blue-100/70 py-[10px]'>";
                            echo "<div class='h-[80px] w-[80px] md:h-[90px] md:w-[90px] rounded bg-gray-200 border-2 border-[#28427B]'></div>";
                            echo "<div class='ml-[20px]'>";
                            echo "<h1 class='font-[500] text-[18px]'>". $ctg['name'] ."</h1>";
                            echo "<span class='text-sm'>";
                            echo "<a href='/Wiki/Pages/wikis?category=". $ctg['categoryId'] ."'>Discover Related Articles !</a>";
                            echo "</span>";
                            echo "</div>";
                            echo "</div>";
                        } 
                    } else {
                        echo "<div class='mt-4' >";
                        echo "<span class='border-2 border-[#000] py-[10px] rounded px-[10vw] bg-gray-200' >There Is Not Categories ! We're Sorry</span>";
                        echo "</div>";
                    }
                ?>

            </div>
        </div>
    </section>

    
    <!-- Footer --> 
    <?php /* require_once(__DIR__."/../incFiles/website/footer.php"); */ ?>

    <!-- Burger Menu Code --> 
    <script src="<?= UrlRoot. "/public/js/auth/pages/burger-menu.js" ?>" ></script>

</body>
</html>