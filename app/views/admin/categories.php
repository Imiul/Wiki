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
                <h1 class="text-md md:text-xl lg:text-3xl font-[800]">ADMIN / Category</h1>
                <button onclick="CateogryPopUp()" class='bg-[#28427B] text-white rounded px-4 py-2 border-2 border-[#28427B] hover:bg-[#28427B]/70' >Add New Category</button>
            </div>

            <!-- Page COntent -->
            <div class="mt-8 bg-gray-200 ">     

                <table class="w-full py-2 px-2 rounded display" id="Table" >
                    <thead class="bg-[#28427B] text-white border-2 border-[#28427B]">
                        <tr>
                            <td class="py-4 px-2" >Category Id</td>
                            <td class="py-4 px-2" >Picture </td>
                            <td class="py-4 px-2">Name</td>
                            <td class="py-4 px-2">Description</td>
                            <td class="py-4 px-2">Add Date</td>
                            <td class="py-4 px-2">Action</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            foreach($data['categoriesData'] as $ctg) {

                                echo "<tr class='border-2 border-[#28427B]'>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>". $ctg['categoryId'] ."</td>";
                                echo "<td class='py-2 px-2' >";
                                echo "<img  src='". UrlRoot."/public/uploads/ctg/" . $ctg['picture'] ."' class='w-[80px]' >";
                                echo "</td>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>". $ctg['name'] ."</td>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>". $ctg['description'] ."</td>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>". $ctg['addDate'] ."</td>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>
                                        <form method='post'>
                                            <button class='bg-red-500 text-white rounded px-4 py-2 border-2 border-red-500 hover:bg-red-500/70' style='transition-duration: 0.5s;' name='deleteCategory' value='". $ctg['categoryId'] ."' >Delete</button>
                                        
                                            <a class='bg-blue-500 text-white rounded px-4 py-2 border-2 border-blue-500 hover:bg-blue-500/70' href='?update=". $ctg['categoryId'] ."' >Update</a>
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


    <!-- ADD NEW WIKIS -->
    <div id="addNewCategory" class="fixed inset-0 flex items-center justify-end bg-black bg-opacity-50 hidden">
        <section class="md:m-5 md:p-5 bg-white rounded-md absolute h-[95vh] w-[95vw] lg:w-[40vw]">

            <!-- CLOSE BTN -->
            <button  onclick="CateogryPopUp()" class="bg-red-200 border-2 border-red-500 text-red-500 h-[50px] px-4 py-2 rounded mb-8" >Close</button>
            
            <!-- aDD fORM -->
            <form method="POST" class="w-full" enctype="multipart/form-data" >

                <input type="text" name="categoryName" placeholder="Category Name" class="w-full mb-2 p-2 border-2 border-gray-600 rounded">
                <textarea name="categoryDescription" placeholder="Category Description" class="w-full mb-2 p-2 border-2 border-gray-600 rounded" ></textarea>

                <input type="file" name="picture" class="w-full mb-2 p-2 border-2 border-gray-600 rounded">

                <button type="submit" name="addCategory" class="bg-blue-500 text-white px-4 py-2 rounded">Add Category</button>
                <button type="reset" class="bg-blue-200 border-2 border-blue-500 text-blue-500 px-4 py-2 rounded">Reset Form</button>
            </form>
        </section>
    </div>


    <?php
        if (isset($_GET['update'])) {
            echo "<div id='editCategory' class='fixed inset-0 flex items-center justify-end bg-black bg-opacity-50 hidden' >";
            echo "<section class='md:m-5 md:p-5 bg-white rounded-md absolute h-[95vh] w-[95vw] lg:w-[40vw]'>";

            /* CLOSE BTN */ 
            echo "<button onclick='closeEditCategory()' class='bg-red-200 border-2 border-red-500 text-red-500 h-[50px] px-4 py-2 rounded mb-8' >Close</button>";
            echo "<form method='POST' class='w-full' enctype='multipart/form-data' >";

            echo "<input type='text' name='categoryId' value='". $data['categoryData']['categoryId'] ."' hidden >";
            echo "<input type='text' name='categoryName' value='". $data['categoryData']['name'] ."' class='w-full mb-2 p-2 border-2 border-gray-600 rounded'>";
            echo "<input type='text' name='categoryDescription' value='". $data['categoryData']['description'] ."' class='w-full mb-2 p-2 border-2 border-gray-600 rounded'>";
            
            echo "If You Want To CHange The Picture, Select Another One :";
            echo "<input type='file' name='categoryPicture' class='w-full mb-2 p-2 border-2 border-gray-600 rounded'>";

            echo "<button type='submit' name='updateCategory' class='bg-blue-500 text-white px-4 py-2 rounded'>Update Tag</button>";

            echo "</form>";
            echo "</section>";
            echo "</div>";
        }
    ?>



    <!-- Data table -->
    <?php require_once(__DIR__ . "/../incFiles/admin/dataTable.php"); ?>
    
    <!-- Add New Tags Script -->
    <script>
        var addNewCategory = document.getElementById('addNewCategory');
        function CateogryPopUp() {addNewCategory.classList.toggle('hidden');}

        function closeEditCategory() {
            document.getElementById('editCategory').classList.add('hidden');
        }

    </script>

</body>
</html>