<!DOCTYPE html>
<html lang="en">
<?php require_once(__DIR__."/../incFiles/website/head.php"); ?>
<body>

    <!-- header --> 
    <?php require_once(__DIR__."/../incFiles/website/header.php"); ?>

        


    <!-- HEAD SECTION-->
    <section class="mt-[60px]">
        <?php require_once(__DIR__."/../incFiles/website/section-head.php"); ?>
    </section>


    <!-- Blog Details -->
    <section class="w-full flex flex-col items-center gap-y-[25px]">

        <!-- IMage --> 
        <div class="w-[95%] lg:w-[65%] min-h-[250px] h-auto bg-gray-200 mt-[35px]">
            <img src="" alt="Hero Img" width="100%">
        </div>


        <?php
            /* Title */
            echo "<h1 class='text-2xl font-[600]' >". $data['ArticleData']['title'] ."</h1>";
            
            /* Article Information */ 
            echo "<div class='flex w-[95%] lg:w-[65%] flex-col justify-center lg:flex-row'>";
                
                /* Author Information */ 
                echo "<div class='border-2 border-[#000] py-2 px-[25px]'>";
                    echo "<h1 class='font-[500] underline' > Autheur : </h1>";
                    echo "<span>". $data['ArticleData']['addedBy'] ."</span>";
                echo "</div>";
                
                /* Category Information */ 
                echo "<div class='border-2 border-[#000] py-2 px-[25px]'>";
                    echo "<h1 class='font-[500] underline' > Category : </h1>";
                    echo "<span>". $data['ArticleData']['categoryId'] ."</span>";
                echo "</div>";

                /* Add Date Information */ 
                echo "<div class='border-2 border-[#000] py-2 px-[25px]'>";
                    echo "<h1 class='font-[500] underline' > Add Date : </h1>";
                    echo "<span>". $data['ArticleData']['addDate'] ."</span>";
                echo "</div>";

                /* Tags Information */ 
                echo "<div class='border-2 border-[#000] py-2 px-[25px] max-w-[100%] lg:max-w-[45%]'>";
                    echo "<h1 class='font-[500] underline' > Tags : </h1>";
                    echo "<div class='flex flex-wrap gap-x-[5px] gap-y-[5px]' >";
                        echo "<span>". $data['ArticleData']['categoryId'] ."</span>";
                    echo "</div>";
                echo "</div>";

            echo "</div>";

            echo "<p class='ext-md font-[400] w-[95%] lg:w-[55%] text-justify'>";
            echo $data['ArticleData']['content'];
            echo "</p>";
            ?>


    </section>

    <!-- Article --> 
    <section>
        <div class="w-[90%] mx-auto mt-[60px]" >
                
                <!-- Section Title -->
                <div class="text-center">
                    <h1 class="text-xl lg:text-2xl font-[600] text-[#28427B] mb-[5px]"> 
                        <span class="mr-2">- - - </span> View More <span class="ml-2" >- - - </span> 
                    </h1>
                    <h1 class="text-m lg:text-xl font-[500]" > Ones Of The Best Articles You Can Read  </h1>
                </div>

                <div class="flex items-center justify-center flex-col flex-wrap gap-x-[20px] gap-y-[10px] mt-[30px] md:flex-row" >
                    <!-- How An Article SHould LoK lIKE --> 
                    <?php
                        foreach($data['LatestWikis'] as $wiki) {
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
                    ?>

                </div>
        </div>
    </section>

    <!-- Footer --> 
    <?php require_once(__DIR__."/../incFiles/website/footer.php"); ?>

    <!-- Burger Menu Code --> 
    <script src="<?= UrlRoot. "/public/js/auth/pages/burger-menu.js" ?>" ></script>

</body>
</html>