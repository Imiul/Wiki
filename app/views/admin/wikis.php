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
            <div class="flex justify-between items-center mb-10">
                <h1 class="text-md md:text-xl lg:text-3xl font-[800]">ADMIN / Wikis</h1>
                <button onclick="WikiPopUp()" class='bg-[#28427B] text-white rounded px-4 py-2 border-2 border-[#28427B] hover:bg-[#28427B]/70' >Add New WIki</button>
            </div>

            <!-- Page COntent -->
            <div class="mt-8 bg-gray-200 ">     

                <table class="w-full py-2 px-2 rounded display" id="Table" >
                    <thead class="bg-[#28427B] text-white border-2 border-[#28427B]">
                        <tr>
                            <td class="py-4 px-2" >Picture </td>
                            <td class="py-4 px-2">Title</td>
                            <td class="py-4 px-2">Description</td>
                            <td class="py-4 px-2">Category</td>
                            <td class="py-4 px-2">Added By</td>
                            <td class="py-4 px-2">Added By</td>
                            <td class="py-4 px-2">Action</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            foreach($data['wikisData'] as $wiki) {

                                echo "<tr class='border-2 border-[#28427B]'>";
                                echo "<td class='py-2 px-2' >";
                                echo "<img  src='". UrlRoot."/public/uploads/wikis/" . $wiki['picture'] ."' class='w-[80px]' >";
                                echo "</td>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B] max-w-[7vw]'>". $wiki['title'] ."</td>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B] max-w-[14vw]'>". $wiki['content'] ."</td>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>". $wiki['categoryId'] ."</td>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>". $wiki['addedBy'] ."</td>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>". $wiki['archived'] ."</td>";
                                echo "<td class='py-2 px-2  min-w-[10vw] flex gap-x-2'>
                                        <form method='post'>
                                            <button class='bg-red-500 text-white rounded px-4 py-2 border-2 border-red-500 hover:bg-red-500/70' style='transition-duration: 0.5s;' name='deleteWiki' value='". $wiki['wikiId'] ."' >Delete</button>
                                        </form>
                                        <form method='post'>
                                            <button class='bg-red-500 text-white rounded px-4 py-2 border-2 border-red-500 hover:bg-red-500/70' style='transition-duration: 0.5s;' name='archiveWiki' value='". $wiki['wikiId'] ."' >archive</button>
                                        </form>
                                    </td>";
                                echo "</tr>";

                                
                            }
                        ?>

                    </tbody>
                </table>

            </div>
        </div>
            
    </section>


    <div id="addNewWiki" class="fixed inset-0 flex items-center justify-end bg-black bg-opacity-50 hidden">
        <section class="md:m-5 md:p-5 bg-white rounded-md absolute h-[95vh] w-[95vw] lg:w-[40vw]">

            <!-- CLOSE BTN -->
            <button  onclick="WikiPopUp()" class="bg-red-200 border-2 border-red-500 text-red-500 h-[50px] px-4 py-2 rounded mb-2" >Close</button>
            
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



    <!-- Data table -->
    <?php require_once(__DIR__ . "/../incFiles/admin/dataTable.php"); ?>
    
    <!-- Add New Tags Script -->
    <script>
        var addNewWiki = document.getElementById('addNewWiki');
        function WikiPopUp() {addNewWiki.classList.toggle('hidden');}
    </script>

</body>
</html>