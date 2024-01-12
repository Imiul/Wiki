<aside class="h-[100vh] min-w-[28vw] md:min-w-[20vw] md:w-[20vw] bg-[#28427B]" >
    <ul class="flex flex-col my-[50px] mx-8 gap-y-4" >

        <li class="mb-8">
            <a href="/Wiki">
                <img src="<?= UrlRoot."/public/img/logo/Wiki_white.png" ?>" alt="" width="120px">
            </a>
        </li>

        <li>
            <h1 class="text-xl font-[500] text-white bg-blue-100/20 rounded py-[10px] px-8 flex items-center gap-x-4 ">
                <img src="<?= UrlRoot."/public/img/icons/analytics.png" ?>" alt="" width="30px">
                <a href="/Wiki/Admin/dashboard" class="hidden lg:block">Dashboard</a>
            </h1>
        </li>

        <li>
            <h1 class="text-xl font-[500] text-white bg-blue-100/10 rounded py-[10px] px-8 flex items-center gap-x-4">
                <img src="<?= UrlRoot."/public/img/icons/users_1.png" ?>" alt="" width="30px">
                <a href="/Wiki/Admin/users" class="hidden lg:block">Users</a>
            </h1>
        </li>

        <li>
            <h1 class="text-xl font-[500] text-white bg-blue-100/10 rounded py-[10px] px-8 flex items-center gap-x-4">
                <img src="<?= UrlRoot."/public/img/icons/admin.png" ?>" alt="" width="30px">
                <a href="/Wiki/Admin/admins" class="hidden lg:block">Admins</a>
            </h1>
        </li>

        <li>
            <h1 class="text-xl font-[500] text-white bg-blue-100/10 rounded py-[10px] px-8 flex items-center gap-x-4">
                <img src="<?= UrlRoot."/public/img/icons/tags.png" ?>" alt="" width="30px">
                <a href="/Wiki/Admin/tags" class="hidden lg:block">Tags</a>
            </h1>
        </li>

        <li>
            <h1 class="text-xl font-[500] text-white bg-blue-100/10 rounded py-[10px] px-8 flex items-center gap-x-4">
                <img src="<?= UrlRoot."/public/img/icons/categories.png" ?>" alt="" width="30px">
                <a href="/Wiki/Admin/categories" class="hidden lg:block">Categories</a>
            </h1>
        </li>

        <li>
            <h1 class="text-xl font-[500] text-white bg-blue-100/10 rounded py-[10px] px-8 flex items-center gap-x-4">
                <img src="<?= UrlRoot."/public/img/icons/article.png" ?>" alt="" width="30px">
                <a href="/Wiki/Admin/wikis" class="hidden lg:block">Wikis</a>
            </h1>
        </li>

        <li class="mt-8">
            <h1 class="text-xl font-[500] text-white bg-blue-100/10 rounded py-[10px] px-8 flex items-center gap-x-4">
                <img src="<?= UrlRoot."/public/img/icons/settings.png" ?>" alt="" width="30px">
                <a href="/Wiki/Admin/settings" class="hidden lg:block">Settings</a>
            </h1>
        </li>

        <li>
            <h1 class="text-xl font-[500] text-red-600 bg-red-300/70 border-2 border-red-600 rounded py-[10px] px-8 flex items-center gap-x-4">
                <img src="<?= UrlRoot."/public/img/icons/logout.png" ?>" alt="" width="30px" style="transform: rotate(-180deg);">
                <a href="/Wiki/Authentification/logout" class="hidden lg:block">Log out</a>
            </h1>
        </li>


    </ul>
</aside>