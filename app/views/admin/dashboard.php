<!DOCTYPE html>
<html lang="en">
<?php require_once(__DIR__."/../incFiles/website/head.php"); ?>
<body>


    <!-- MAIN -->
    <section class="flex items-center relative">

        <!-- Aside Bar -->
        <?php require_once(__DIR__ . "/../incFiles/admin/sidBar.php"); ?>

        <!-- Dashboard -->
        <div class="w-[70vh] md:w-[80vw] h-[100vh] bg-gray-200 py-[50px] px-8" >
            
            <!-- Page Head -->
            <div>
                <h1 class="text-md md:text-xl lg:text-3xl font-[800] mb-8">ADMIN / Dashboard</h1>
                <div class="w-full bg-blue-100 border-2 border-blue-900 rounded py-8 px-4">
                    <h1 class="text-md md:text-xl lg:text-xl font-[500]" >Welcome Back <u class="px-4" ><?= $_SESSION['UserInfo']['username'] ?></u> ! Take Full Control Of Wiki Data</h1>
                </div>
            </div>

            <!-- Page COntent -->
            <!-- <h1 class="mt-8 font-[800] text-md md:text-xl lg:text-2xl mb-2" >Wiki Statistic </h1> -->
            <div class="mt-8 bg-gray-200 flex flex-wrap justify-between gap-4">

                <div class="w-[45%] md- bg-blue-200/30 rounded p-8 rounded  border-2 border-blue-800 text-center" >
                    <h1 class="font-[900] text-md md:text-2xl" ><?= $data['AuthorsNumber']['Count'] ?></h1>
                    <h1 class="font-[900] text-md md:text-2xl mt-2" ><a href="/Wiki/Admin/users">Wiki Users</a></h1>
                </div>

                <div class="w-[45%] bg-blue-200/30 rounded p-8 rounded  border-2 border-blue-800 text-center" >
                    <h1 class="font-[900] text-md md:text-2xl" ><?= $data['AdminsNumber']['Count'] ?></h1>
                    <h1 class="font-[900] text-md md:text-2xl mt-2" ><a href="/Wiki/Admin/users">Admins</a></h1>
                </div>

                <div class="w-[45%] bg-blue-200/30 rounded p-8 rounded  border-2 border-blue-800 text-center" >
                    <h1 class="font-[900] text-md md:text-2xl" ><?= $data['CategoryNumber']['Count'] ?></h1>
                    <h1 class="font-[900] text-md md:text-2xl mt-2" ><a href="/Wiki/Admin/categories">Categories</a></h1>
                </div>

                <div class="w-[45%] bg-blue-200/30 rounded p-8 rounded  border-2 border-blue-800 text-center" >
                    <h1 class="font-[900] text-md md:text-2xl" ><?= $data['TagsNumber']['Count'] ?></h1>
                    <h1 class="font-[900] text-md md:text-2xl mt-2" ><a href="/Wiki/Admin/tags">Tags</a></h1>
                </div>

                <div class="w-[100%] md:w-[45%] bg-blue-200/30 rounded p-8 rounded  border-2 border-blue-800 text-center" >
                    <h1 class="font-[900] text-md md:text-2xl" ><?= $data['WikisNumber']['Count'] ?></h1>
                    <h1 class="font-[900] text-md md:text-2xl mt-2" ><a href="/Wiki/Admin/wikis">Wikis Writed</a></h1>
                </div>

            </div>
        </div>
            
    </section>

</body>
</html>