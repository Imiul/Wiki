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
                <h1 class="text-md md:text-xl lg:text-3xl font-[800] mb-12">ADMIN / Admins</h1>
                <button onclick="AdminPopUp()" class='bg-[#28427B] text-white rounded px-4 py-2 border-2 border-[#28427B] hover:bg-[#28427B]/70' >Add New Admin</button>
            </div>

            <!-- Page COntent -->
            <div class="mt-8 bg-gray-200 ">     

                <table class="w-full py-2 px-2 rounded display" id="Table" >
                    <thead class="bg-[#28427B] text-white border-2 border-[#28427B]">
                        <tr>
                            <td class="py-4 px-2" >Picture</td>
                            <td class="py-4 px-2">firstName</td>
                            <td class="py-4 px-2">LastName</td>
                            <td class="py-4 px-2">Email</td>
                            <td class="py-4 px-2">Member SInce</td>
                            <td class="py-4 px-2">Last Log In Date</td>
                            <td class="py-4 px-2">Actions</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            foreach($data['AdminData'] as $admin) {

                                echo "<tr class='border-2 border-[#28427B]'>";
                                echo "<td class='py-2 px-2' >";
                                echo "<img  src='". UrlRoot."/public/uploads/users/" . $admin['picture'] ."' class='w-[80px]' >";
                                echo "</td>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>". $admin['firstName'] ."</td>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>". $admin['lastName'] ."</td>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>". $admin['email'] ."</td>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>". $admin['addDate'] ." </td>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>". $admin['lastLoginDate'] ." </td>";
                                echo "<td class='py-2 px-2 border-2 border-[#28427B]'>
                                        <form method='post'>
                                            <button class='bg-red-500 text-white rounded px-4 py-2 border-2 border-red-500 hover:bg-red-500/70' style='transition-duration: 0.5s;' name='deleteUser' value='". $admin['UserId'] ."' >Delete</button>
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
    <div id="addNewAdmin" class="fixed inset-0 flex items-center justify-end bg-black bg-opacity-50 hidden">
        <section class="md:m-5 md:p-5 bg-white rounded-md absolute h-[95vh] w-[95vw] lg:w-[40vw]">

            <!-- CLOSE BTN -->
            <button  onclick="AdminPopUp()" class="bg-red-200 border-2 border-red-500 text-red-500 h-[50px] px-4 py-2 rounded mb-8" >Close</button>
            
            <!-- aDD fORM -->
            <form method="POST" class="w-full" enctype="multipart/form-data" >

                <input type="text" name="firstName" placeholder="First Name" class="w-full mb-2 p-2 border-2 border-gray-600 rounded" />
                <input type="text" name="lastName" placeholder="Last Name" class="w-full mb-2 p-2 border-2 border-gray-600 rounded" />
                <input type="email" name="email" placeholder="Email Address" class="w-full mb-2 p-2 border-2 border-gray-600 rounded" />
                <input type="password" name="password" placeholder="Password" class="w-full mb-2 p-2 border-2 border-gray-600 rounded" />
                <input type="file" name="picture" class="w-full mb-2 p-2 border-2 border-gray-600 rounded">


                <button type="submit" name="addAdmin" class="bg-blue-500 text-white px-4 py-2 rounded">Add Admin</button>
                <button type="reset" class="bg-blue-200 border-2 border-blue-500 text-blue-500 px-4 py-2 rounded">Reset Form</button>
            </form>
        </section>
    </div>


    <!-- Data table -->
    <?php require_once(__DIR__ . "/../incFiles/admin/dataTable.php"); ?>

    <!-- Add New Admin Script -->
    <script>
        var addNewAdmin = document.getElementById('addNewAdmin');
        function AdminPopUp() {addNewAdmin.classList.toggle('hidden');}
    </script>

</body>
</html>