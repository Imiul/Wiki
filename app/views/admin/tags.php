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
                <button class='bg-[#28427B] text-white rounded px-4 py-2 border-2 border-[#28427B] hover:bg-[#28427B]/70' >Add New Tag</button>
            </div>

            <!-- Page COntent -->
            <div class="mt-8 bg-gray-200 ">     

                <table class="w-full py-2 px-2 rounded display" id="Table" >
                    <thead class="bg-[#28427B] text-white ">
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
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>
                                        <form method='post'>
                                            <button class='bg-red-500 text-white rounded px-4 py-2 border-2 border-red-500 hover:bg-red-500/70' style='transition-duration: 0.5s;' name='deleteTag' value='". $tag['tagId'] ."' >Delete</button>
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


    <!-- Data table -->
    <?php require_once(__DIR__ . "/../incFiles/admin/dataTable.php"); ?>

</body>
</html>