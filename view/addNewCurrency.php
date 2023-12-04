<?php
$result = $user->getUsers($_SESSION["id"]);
?>

<div class="container_admin flex w_100pc">

    <div class="navbar w_15pc p_24px">
        <div class="navbar-right">
            <div class="logo mb_48px">
                <p class="fs-22px-fw-700">Admin Settings</p>
            </div>
            <div class="navigation flex f_column">
                <div class="flex f_column g_32px">
                    <div class="nav-home flex align_center g_24px p_12px_24px radius-8px up_priceBg">
                        <iconify-icon class="fs_24px" icon="tabler:home-2"></iconify-icon>
                        <a href="?mod=admin&act=admin-home" class="fs-14px-fw-600 ">Home</a>
                    </div>
                    <div class="nav-assets flex align_center g_24px">
                        <iconify-icon class="fs_24px" icon="carbon:currency"></iconify-icon>
                        <a href="?mod=admin&act=addcurrency" class="fs-14px-fw-600">Currency</a>
                    </div>
                    <div class="nav-chart flex align_center g_24px">
                        <iconify-icon class="fs_24px" icon="carbon:category"></iconify-icon>
                        <a href="?mod=admin&act=addcategory" class="fs-14px-fw-600">Category</a>
                    </div>
                    <div class="nav-chart flex align_center g_24px">
                        <iconify-icon class="fs_24px" icon="fluent-mdl2:account-management"></iconify-icon>
                        <a href="?mod=admin&act=manageuser" class="fs-14px-fw-600">User Manager</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div style="display: flex; width: 75%;">
        <div style="width: 40%;" class="container_addNewCurr border_main p_32px radius-8px">
            <h3 class="mb_32px">Add new product</h3>


            <!-- <div class="flex align_center mb_16px">
                <div>
                    <label class="mr_16px fs-14px-fw-600" for="">ID</label>
                    <input class="input pointer mr_16px" type="submit" value="Generate">
                </div>
                <div class="id-generate">#123456</div>
            </div> -->

            <div class="flex g_32px">


                <div class="flex f_column g_32px w_50pc">
                    <div class="flex f_column g_8px">
                        <label class="fs-14px-fw-600" for="">Name</label>
                        <input class="input" type="text" placeholder="Bitcoin" spellcheck="false">
                    </div>
                    <div class="flex f_column g_8px">
                        <label class="fs-14px-fw-600" for="">Symbol</label>
                        <input class="input" type="text" placeholder="BTC" spellcheck="false">
                    </div>
                    <div class="flex f_column g_8px">
                        <label class="fs-14px-fw-600" for="">Image</label>
                        <input class="input" type="file" placeholder="" spellcheck="false">
                    </div>
                </div>



                <div class="flex f_column g_32px w_50pc">
                    <div class="flex f_column g_8px">
                        <label class="fs-14px-fw-600" for="">Price</label>
                        <input class="input" type="text" placeholder="$10.000" spellcheck="false">
                    </div>
                    <div class="flex f_column g_8px">
                        <label class="fs-14px-fw-600" for="">Market Cap</label>
                        <input class="input" type="text" placeholder="$721.000.000.000" spellcheck="false">
                    </div>
                    <div class="flex f_column g_8px">
                        <label class="fs-14px-fw-600" for="">Circulating Supply</label>
                        <input class="input" type="text" placeholder="21.000.000" spellcheck="false">
                    </div>
                </div>

            </div>

            <div class="flex g_16px">
                <button class="mt_32px fs-14px-fw-600" name="Add">Add</button>
            </div>

        </div>
        <div style="width: 45%;" class="container_addNewCurr border_main p_32px radius-8px">
            <h3 class="mb_32px">Added Recently</h3>

        </div>

    </div>



    <div class="line_straight"></div>
    <div class="profile w_15pc mt_48px flex f_column g_32px">
        <div class="flex f_column flex_center g_24px">
            <p class="fs-18px-fw-600 center">Overview</p>
            <div style="display: flex; justify-content: center;">
                <img src="./view/src/img/uploads/<?php
                                                    if (isset($_SESSION["avatar"])) {
                                                        echo ($_SESSION["avatar"]);
                                                    } else {
                                                        "default.png";
                                                    }
                                                    ?>" alt="" width="150px" height="150px" style="box-shadow: 0 0 0 10px rgba(0,0,0,0.3); border-radius: 50%; object-fit: cover;">
            </div>
            <p class="flex flex_center align_center fs_24px"><?php if (isset($_SESSION["username"])) echo ($_SESSION["username"]) ?><iconify-icon class="ml_16px" icon="material-symbols-light:star-outline"></iconify-icon></p>
            <div class="center p_12px_24px main-color-bg radius-8px text-white pointer edit_admin_btn">Edit Profile</div>
        </div>

        <!-- modal edit admin  -->
        <div class="modal_edit_admin backdrop_modal_admin">
            <div class="styleModalAdmin modal_edit_admin_main border_300 p_16px radius-8px modal_admin" style="width: 35%;">
                <div style="display: flex; justify-content: end;">
                    <iconify-icon class="closeModalAdmin fs_24px pointer" icon="ph:x-bold"></iconify-icon>
                </div>
                <form enctype="multipart/form-data" action="" method="post" class="flex f_column g_16px">
                    <div class="flex f_column g_16px">
                        <label for="">Update avatar</label>
                        <input id="avatar" class="pointer p_left_16px" type="file" name="avatar">
                    </div>
                    <div class="flex f_column g_16px">
                        <label for="">Username</label>
                        <input id="usernameAdmin" class="input_edit_profile_admin p_left_16px" type="text" name="username" placeholder="<?= $result->getUsername() ?>">
                    </div>

                    <div class="flex f_column g_16px">
                        <label for="">Current password</label>
                        <input id="currentPasswordAdmin" class="input_edit_profile_admin p_left_16px" type="text" name="currentpassword">
                    </div>
                    <div class="flex f_column g_16px">
                        <label for="">New Password</label>
                        <input id="newPasswordAdmin" class="input_edit_profile_admin p_left_16px" type="text" name="newpassword">
                    </div>
                    <div class="flex">
                        <input type="submit" name="submit" value="Update" id="updateAdminProfile" class="p_12px_24px main-color-bg radius-8px text-white pointer border_none">
                    </div>
                </form>
            </div>
        </div>


        <div class="flex f_column g_16px">
            <div>
                <span class="">Joined</span>
                <span class="fs-14px-fw-600"><?= $result->getCreatedDate(); ?>
                </span>
            </div>
            <div>
                <span>Assets Value</span>
                <span>$1,328,240,00</span>
            </div>

        </div>

    </div>

</div>