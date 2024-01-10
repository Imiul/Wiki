<!DOCTYPE html>
<?php require_once(__DIR__."/../incFiles/website/head.php"); ?>
<body>
    
    <!-- Error Section -->
    <section class="w-full h-[100vh] flex justify-center items-center">

        <div class="text-center w-[90vw] lg:w-[50vw] bg-[#eaf4f4] py-[4%] px-[2.5%] rounded border-2 border-[#415a77] flex flex-col space-y-2 justify-center" >
            <div class="flex items-center justify-center space-x-[20px] mb-[10px]" >
                <img src="<?= UrlRoot . "/img/icons/notFound.png" ?>" alt="img" width="60px">
                <h1 class="text-2xl font-[900]">NOT FOUND</h1>
            </div>
            <h3 class="font-[500]">
                The Page You Are Loking For Does Not Exists !! <br>
                <span class="bg-[#eaf4f4] font-900">
                    <a href="/Wiki/" >   Return Home Now !</a>
                </span>
            </h3>
        </div>
    </section>

</body>
</html>