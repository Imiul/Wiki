<!DOCTYPE html>
<html lang="en">
<?php require_once(__DIR__."/../incFiles/website/head.php"); ?>
<body>

    <!-- HEADER -->
    <?php require_once(__DIR__."/../incFiles/user/header.php"); ?>

    <!-- WIKIS -->
    <div class="mt-8 mb-[90px] flex flex-col items-center" >
        <!-- PAGE HEAD -->
        <?php require_once(__DIR__."/../incFiles/website/section-head.php"); ?>

        <!-- Add New -->
        <div class="flex justify-center">
            <button onclick="addNewWikiPopUp()" class="bg-[#28427B] px-8 rounded text-white py-2 mt-4" >Add New Wiki Now</button>
        </div>


            <!-- WIKIS  -->
            <div class="w-[90%] flex items-center justify-center flex-col flex-wrap gap-x-[20px] gap-y-[10px] mt-[30px] md:flex-row" >
                <?php
                    if ($data['userWikis']) {

                        foreach($data['userWikis'] as $wiki) {

                            echo "<div class='border-2 border-[#28427B] w-[95%] md:w-[40%] lg:w-[30%] xl:w-[20%] rounded bg-blue-100/70 px-[30px] py-[20px]'>";
                            echo "<div class='h-[200px] w-[100%] rounded bg-gray-200 border-2 border-[#28427B]' ></div>";
                            echo "<div class='mt-[10px] flex flex-col items-center'  >";
                            echo "<h1 class='font-[500] text-[18px]' >". $wiki['title'] ."</h1>";
                            echo "<span class='text-sm text-center'>";
                            echo "<a href='/Wiki/Pages/wikiDetails?wikiId=". $wiki['wikiId'] ."'>View Wiki Details & Information</a>";
                            echo "</span>";

                            echo "<div class='flex mt-4 gap-x-2' >";
                            echo "<form action='' method='POST'> ";
                            echo "<button class='bg-red-500 py-2 px-4 rounded text-white font-[600]' value='". $wiki['wikiId'] ."' type='submit' name='delete' >Delete</button>";
                            echo "</form>";
                            echo "<button class='bg-blue-500 py-2 px-4 rounded text-white font-[600]' onclick='showPopup()' >Edit </button>";
                            echo "</div>";

                            echo "</div>";
                            echo "</div>";

                        } 
                        
                    } else {
                        echo "<div class='mt-4' >";
                        echo "<span class='border-2 border-[#000] py-[10px] rounded px-[10vw] bg-gray-200' >You Still Have No Wikis</span>";
                        echo "</div>";
                    }
                ?>
            </div>

        </div>
    </div>


    <!-- EDIT FORM -->
    <div id="popupContainer" class="fixed inset-0 flex items-center justify-end bg-black bg-opacity-50 hidden">
        <section class="md:m-5 md:p-5 bg-white rounded-md absolute h-[95vh] w-[40vw]">
            
        <button  onclick="hiddPopup()" class="bg-red-200 border-2 border-red-500 text-red-500 h-[50px] px-4 py-2 rounded mb-2" >Close</button>
                        
            <form method="POST" class="w-full" enctype="multipart/form-data" >

                <input type="text" name="description" placeholder="Title" class="w-full mb-2 p-2 border-2 border-gray-600 rounded">
                <input type="text" name="description" placeholder="Content" class="w-full mb-2 p-2 border-2 border-gray-600 rounded">

                <input type="file" name="picture" class="w-full mb-2 p-2 border-2 border-gray-600 rounded">

                <select name="" class="w-full mb-2 p-2 border-2 border-gray-600 rounded">
                    <option value="">Select Category</option>
                </select>

                <button type="submit" name="addArticle" class="bg-blue-500 text-white px-4 py-2 rounded">Update Wiki</button>
                <button type="reset" class="bg-blue-200 border-2 border-blue-500 text-blue-500 px-4 py-2 rounded">Reset Form</button>
                </form>
        </section>
    </div>


    <!-- ADD NEW WIKIS -->
    <div id="addNewWiki" class="fixed inset-0 flex items-center justify-end bg-black bg-opacity-50 hidden">
        <section class="md:m-5 md:p-5 bg-white rounded-md absolute h-[95vh] w-[95vw] lg:w-[40vw]">

            <!-- CLOSE BTN -->
            <button  onclick="hideAddNewWiki()" class="bg-red-200 border-2 border-red-500 text-red-500 h-[50px] px-4 py-2 rounded mb-2" >Close</button>
            
            <!-- aDD fORM -->
            <form method="POST" class="w-full" enctype="multipart/form-data" >

                <input type="text" name="title" placeholder="Title" class="w-full mb-2 p-2 border-2 border-gray-600 rounded">
                <input type="text" name="content" placeholder="content" class="w-full mb-2 p-2 border-2 border-gray-600 rounded">
                <select name="category" class="w-full mb-2 p-2 border-2 border-gray-600 rounded">
                    <option selected disabled>Select Related Category</option>
                    <?php
                        foreach($data['categoryData'] as $ctg) {
                            echo "<option value='". $ctg['categoryId'] ."' >". $ctg['name'] ."</option>";
                        }
                    ?>
                </select>

                <select name="tags[]" multiple class="w-full mb-2 p-2 border-2 border-gray-600 rounded">
                    <option selected disabled>Select Related Tags</option>
                    <?php
                        foreach($data['tagsData'] as $tags) {
                            echo "<option value='". $tags['tagId'] ."' >". $tags['name'] ."</option>";
                        }
                    ?>
                </select>

                <input type="file" name="picture" placeholder="Title" class="w-full mb-2 p-2 border-2 border-gray-600 rounded">

                <button type="submit" name="addWiki" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Wiki</button>
                <button type="reset" class="bg-blue-200 border-2 border-blue-500 text-blue-500 px-4 py-2 rounded">Reset Form</button>
            </form>
        </section>
    </div>



    <!-- SCRIPT -->
    <script>
        var popupContainer = document.getElementById('popupContainer');
        function showPopup() {popupContainer.classList.toggle('hidden');}
        function hiddPopup() {popupContainer.classList.toggle('hidden');}

        var addNewWiki = document.getElementById('addNewWiki');
        function addNewWikiPopUp() {addNewWiki.classList.toggle('hidden');}
        function hideAddNewWiki() {addNewWiki.classList.toggle('hidden');}
    </script>

</body>
</html>