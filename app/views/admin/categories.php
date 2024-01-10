<!DOCTYPE html>
<html lang="en">
<?php require_once(__DIR__."/../incFiles/website/head.php"); ?>
<body>


    <!-- MAIN -->
    <section class="flex items-center relative">

        <!-- Aside Bar -->
        <?php require_once(__DIR__ . "/../incFiles/admin/sidBar.php"); ?>

        <main class="bg-gray-100 flex-grow h-[100vh] relative pt-2">
            <div class="md:m-5 md:p-5">

                <!-- Dashboard Head -->
                <?php require_once(__DIR__ . "/../incFiles/admin/pageHead.php"); ?>

                <!-- Dashboard DataTable -->
                <div class="rounded-lg overflow-hidden mt-3">
                    <table class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 " id="Table" style="width:100%">
                        <thead>
                            <tr class="bg-[#1d3557] text-white h-[50px] ">
                                <td class="pl-4 border-2 border-[#1d3557]">Picture </td>
                                <td class="pl-4 border-2 border-[#1d3557]">Name </td>
                                <td class="pl-4 border-2 border-[#1d3557]">Description </td>
                                <td class="pl-4 border-2 border-[#1d3557]">AddDate </td>
                                <td class="pl-4 border-2 border-[#1d3557]">Action </td>
                            </tr>
                        </thead>
                        <tbody class="sm:w-full">
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </main>
            
    </section>

</body>
</html>