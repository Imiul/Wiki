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
                <h1 class="text-md md:text-xl lg:text-3xl font-[800]">ADMIN / Tags</h1>
                <button onclick="TagPopUp()" class='bg-[#28427B] text-white rounded px-4 py-2 border-2 border-[#28427B] hover:bg-[#28427B]/70' >Add New Tag</button>
            </div>

            <!-- Page COntent -->
            <div class="mt-8 bg-gray-200 ">     

                <table class="w-full py-2 px-2 rounded display" id="Table" >
                    <thead class="bg-[#28427B] text-white border-2 border-[#28427B]">
                        <tr>
                            <td class="py-4 px-2" >Tag Id</td>
                            <td class="py-4 px-2">Name</td>
                            <td class="py-4 px-2">Add Date</td>
                            <td class="py-4 px-2">Action</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            foreach($data['tagsData'] as $tag) {

                                echo "<tr class='border-2 border-[#28427B]'>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>". $tag['tagId'] ."</td>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>". $tag['name'] ."</td>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>". $tag['addDate'] ."</td>";
                                echo "<td class='py-2 px-2 flex gap-x-2 '>
                                        <form method='post' >
                                            <button class='bg-red-500 text-white rounded px-4 py-2 border-2 border-red-500 hover:bg-red-500/70' style='transition-duration: 0.5s;' name='deleteTag' value='". $tag['tagId'] ."' >Delete</button>
                                        </form>

                                        <a class='bg-blue-500 text-white rounded px-4 py-2 border-2 border-blue-500 hover:bg-blue-500/70' href='?update=". $tag['tagId'] ."' >Update</a>
                                    </td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
            
    </section>


    <!-- ADD NEW WIKIS -->
    <div id="addNewTag" class="fixed inset-0 flex items-center justify-end bg-black bg-opacity-50 hidden">
        <section class="md:m-5 md:p-5 bg-white rounded-md absolute h-[95vh] w-[95vw] lg:w-[40vw]">

            <!-- CLOSE BTN -->
            <button  onclick="TagPopUp()" class="bg-red-200 border-2 border-red-500 text-red-500 h-[50px] px-4 py-2 rounded mb-8" >Close</button>
            
            <!-- aDD fORM -->
            <form method="POST" class="w-full">

                <input type="text" name="tagName" placeholder="Tag Name" class="w-full mb-2 p-2 border-2 border-gray-600 rounded">
                <button type="submit" name="addTag" class="bg-blue-500 text-white px-4 py-2 rounded">Add Tag</button>
                <button type="reset" class="bg-blue-200 border-2 border-blue-500 text-blue-500 px-4 py-2 rounded">Reset Form</button>
            </form>
        </section>
    </div>


    <?php
        if (isset($_GET['update'])) {
            echo "<div id='editTag' class='fixed inset-0 flex items-center justify-end bg-black bg-opacity-50 hidden' >";
            echo "<section class='md:m-5 md:p-5 bg-white rounded-md absolute h-[95vh] w-[95vw] lg:w-[40vw]'>";

            /* CLOSE BTN */ 
            echo "<button onclick='closeEditTag()' class='bg-red-200 border-2 border-red-500 text-red-500 h-[50px] px-4 py-2 rounded mb-8' >Close</button>";
            echo "<form method='POST' class='w-full'>";

            echo "<input type='text' name='tagId' value='". $data['tagData']['tagId'] ."' hidden >";
            echo "<input type='text' name='tagName' value='". $data['tagData']['name'] ."' class='w-full mb-2 p-2 border-2 border-gray-600 rounded'>";

            echo "<button type='submit' name='updateTag' class='bg-blue-500 text-white px-4 py-2 rounded'>Update Tag</button>";

            echo "</form>";
            echo "</section>";
            echo "</div>";
        }
    ?>



    <!-- Data table -->
    <?php require_once(__DIR__ . "/../incFiles/admin/dataTable.php"); ?>
    
    <!-- Add New Tags Script -->
    <script>
        var addNewTag = document.getElementById('addNewTag');
        function TagPopUp() {addNewTag.classList.toggle('hidden');}

        function closeEditTag() {
            document.getElementById('editTag').classList.add('hidden');
        }
    </script>



</body>
</html>