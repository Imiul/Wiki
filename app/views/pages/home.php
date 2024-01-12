<!DOCTYPE html>
<html lang="en">
<?php require_once(__DIR__."/../incFiles/website/head.php"); ?>
<body>
    
    <!-- header --> 
    <?php require_once(__DIR__."/../incFiles/website/header.php"); ?>

    <!-- Page Hero -->
    <section>
        <div class="w-[90%] mx-auto mt-[60px] lg:mt-[20px] m-h-[50vh]" >
            
            <div class="flex flex-col py-[5%] items-center">
                <h1 class="text-3xl font-[900] mb-4 text-center" >Introducing <span class="text-[#28427B] underline">Wiki</span> ! The BEST Place To Read Online !!</h1>
                <h2 class="text-xl font-[500] text-center lg:flex" >Your New Social Blog Is Right Here<span class="hidden lg:block">, Developed In Morocco, Safi</span></h2>

                <div class="w-[95%] lg:w-[65%] h-[250px] bg-gray-200 mt-[25px]">
                    <img src="" alt="Hero Img" width="100%">
                </div>

                <!-- Buttons -->
                <div class="mt-8 lg:mt-4" >
                    <a href="/Wiki/Pages/wikis" class="bg-[#28427B] border-2 border-[#28427B] hover:bg-[#28427B]/80 focus:bg-[#404E6C] py-[8px] px-[8px] lg:py-[8px] lg:px-[20px] rounded text-white">Start Exploring Wikis Today</a>
                    <a href="/Wiki/Authentification/register" class="border-2 border-[#28427B] hover:bg-[#28427B]/80 hover:text-white focus:bg-[#404E6C] py-[8px] px-[8px] lg:py-[8px] lg:px-[20px] rounded text-[#28427B]">Join Us Today</a>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Categories -->
    <section class="mt-[120px]" >
        <div class="w-[90%] mx-auto mt-[50px]" >

            <!-- Section Head -->
            <?php require_once(__DIR__."/../incFiles/website/section-head.php"); ?>

            <div class="flex items-center justify-center flex-col flex-wrap gap-x-[20px] gap-y-[10px] mt-[30px] md:flex-row" >
                <!-- HOW A CATEGORY SHOULD LOOK -->
                <?php
                    foreach($data['LatestCategory'] as $ctg) {
                        echo "<div class='border-2 border-[#28427B] w-[90%] md:w-[40%] lg:w-[30%] xl:w-[20%] rounded flex justify-center items-center bg-blue-100/70 py-[10px]'>";
                        echo "<div class='hw-[100%] rounded  relative flex justify-center' ><img width='100px'  src='". UrlRoot."/public/uploads/ctg/" . $ctg['picture'] ."' ></div>";
                        echo "<div class='ml-[20px]'>";
                        echo "<h1 class='font-[500] text-[18px]'>". $ctg['name'] ."</h1>";
                        echo "<span class='text-sm'>";
                        echo "<a href='/Wiki/Pages/wikis?category=". $ctg['categoryId'] ."'>Discover Related Articles !</a>";
                        echo "</span>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>

            </div>

            <div class="w-full h-[40px] mt-[35px] flex justify-center items-center">
                <a href="/Wiki/Pages/categories" class="border-2 border-[#28427B] w-[50%] md:w-[20%] text-center rounded py-[5px] text-[#28427B] hover:bg-[#28427B] hover:text-white" >Explore More</a>
            </div>
        </div>
    </section>


    <!-- Article --> 
    <section>
        <div class="w-[90%] mx-auto mt-[60px]" >
                
                <!-- Section Title -->
                <div class="text-center">
                    <h1 class="text-xl lg:text-2xl font-[600] text-[#28427B] mb-[5px]"> 
                        <span class="mr-2">- - - </span> Wiki Title <span class="ml-2" >- - - </span> 
                    </h1>
                    <h1 class="text-m lg:text-xl font-[500]" > View Wiki Details & Information  </h1>
                </div>

                <div class="flex items-center justify-center flex-col flex-wrap gap-x-[20px] gap-y-[10px] mt-[30px] md:flex-row" >
                    <!-- How An Article SHould LoK lIKE --> 
                    <?php
                        foreach($data['LatestWikis'] as $wiki) {
                            echo "<div class='border-2 border-[#28427B] w-[95%] md:w-[40%] lg:w-[30%] xl:w-[20%] rounded bg-blue-100/70 px-[30px] py-[20px]'>";
                            echo "<div class='hw-[100%] rounded bg-gray-200 relative flex justify-center p-2' ><img width='250px'  src='". UrlRoot."/public/uploads/wikis/" . $wiki['picture'] ."' ></div>";
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

                <div class="w-full h-[40px] mt-[35px] flex justify-center items-center">
                    <a href="/Wiki/Pages/wikis" class="border-2 border-[#28427B] w-[50%] md:w-[20%] text-center rounded py-[5px] text-[#28427B] hover:bg-[#28427B] hover:text-white" >Explore More</a>
                </div>
        </div>
    </section>
    
    <!-- Footer --> 
    <?php require_once(__DIR__."/../incFiles/website/footer.php"); ?>

    <!-- Burger Menu Code --> 
    <script src="<?= UrlRoot. "/public/js/auth/pages/burger-menu.js" ?>" ></script>

</body>
</html>