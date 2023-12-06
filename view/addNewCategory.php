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
                    <a href="?mod=admin&act=admin-home" class="navLeft flex align_center g_24px">
                        <iconify-icon class="fs_24px" icon="tabler:home-2"></iconify-icon>
                        <div class="fs-14px-fw-600 ">Home</div>
                    </a>
                    <a href="?mod=admin&act=addcurrency" class="navLeft flex align_center g_24px">
                        <iconify-icon class="fs_24px" icon="carbon:currency"></iconify-icon>
                        <siv class="fs-14px-fw-600">Currency</siv>
                    </a>
                    <a href="?mod=admin&act=addcategory" class="navLeft active flex align_center g_24px">
                        <iconify-icon class="fs_24px" icon="carbon:category"></iconify-icon>
                        <div class="fs-14px-fw-600">Category</div>
                    </a>
                    <a href="?mod=admin&act=manageuser" class="navLeft flex align_center g_24px">
                        <iconify-icon class="fs_24px" icon="fluent-mdl2:account-management"></iconify-icon>
                        <div class="fs-14px-fw-600">User Manager</div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div style="display: flex; width: 75%;">
        <div style="width: 40%;" class="container_addNewCurr border_main p_32px radius-8px">
            <h3 class="mb_32px">Add New Category</h3>

            <form method="post" class="flex f_column g_16px">

                <div class="flex g_32px w_100pc">
                    <div class="flex f_column g_32px">
                        <div class="flex_sp_bt w_100pc g_16px">
                            <div class="flex f_column g_8px w_100pc">
                                <label class="fs-14px-fw-600" for="">Name</label>
                                <input class="input" type="text" placeholder="Best Time" spellcheck="false" name="name">
                            </div>
                            <div class="flex f_column g_8px">
                                <label class="fs-14px-fw-600" for="">Title</label>
                                <input class="input" type="text" placeholder="Category is the best" spellcheck="false" name="title">
                            </div>
                        </div>
                        <div class="flex f_column g_8px">
                            <label class="fs-14px-fw-600" for="">Description</label>
                            <textarea class="input" style="height: 80px; padding-top: 10px;" placeholder="this is description" spellcheck="false" name="desc"></textarea>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="submit" class="fs-14px-fw-600" name="submitAdd" value="Add">
                </div>
            </form>
        </div>

        <div style="display: flex; width: 100%; height: 500px; overflow-y: scroll; padding: 32px 0;">
            <div class="container_manageUser radius-8px">
                <div class="flex_sp_bt align_center mb_32px">
                    <h3 class="">Added Recently ( 10 Category latest )</h3>
                    <!-- <a href="#" class="fs-14px-fw-700 main-color pointer">See more</a> -->
                </div>
                <div style="padding-bottom: 32px;">
                    <?php
                    foreach ($getLatestCateg as $key => $value) {
                    ?>
                        <div class="flex f_column" style="margin-bottom: 32px; box-shadow: var(--box-shadow); padding: 8px 24px;">
                            <div class="flex align_center">
                                <div style="width: 5%;"><?= $key + 1 ?></div>
                                <div class="flex g_8px align_center" style="width: 85%;">
                                    <a href="?mod=page&act=home&categoryid=<?=$value["id"]?>" target="_blank" style="width: 30%;"><?= $value["name"] ?></a>
                                    <span style="width: 70%; text-align: start;"><?= $value["title"] ?></span>
                                </div>
                                <div class="pointer flex editDetailBtn" style="width: 10%; padding: 6px 12px; justify-content: center;">
                                    <iconify-icon icon="uil:edit"></iconify-icon>
                                </div>
                                <div>
                                    <!-- modal edit 10 items latest  -->
                                    <div class="modal_edit_admin backdrop_modal_CurrLatest">
                                        <div class="styleModalAdmin modal_edit_admin_main border_300 p_16px radius-8px modal_CurrLatest" style="width: 35%;">
                                            <div style="display: flex; justify-content: end;">
                                                <iconify-icon class="closeModalCurrLatest fs_24px pointer" icon="ph:x-bold"></iconify-icon>
                                            </div>
                                            <form enctype="multipart/form-data" action="" method="post" class="flex f_column g_16px">
                                                <div class="flex f_column g_16px">
                                                    <input type="text" class="input_edit_profile_admin p_left_16px" placeholder="Id: <?= $value["id"] ?>" disabled>
                                                </div>
                                                <div class="flex f_column g_16px">
                                                    <label for="">Name</label>
                                                    <input id="usernameAdmin" class="input_edit_profile_admin p_left_16px" type="text" name="Name" placeholder="<?= $value["name"] ?>">
                                                </div>
                                                <div class="flex f_column g_16px">
                                                    <label for="">Title</label>
                                                    <input id="currentPasswordAdmin" class="input_edit_profile_admin p_left_16px" placeholder="<?= $value["title"] ?>" type="text" name="Title">
                                                </div>
                                                <div class="flex f_column g_16px">
                                                    <label for="">Description</label>
                                                    <input id="newPasswordAdmin" class="input_edit_profile_admin p_left_16px" placeholder="<?= $value["description"] ?>" type="text" name="Description">
                                                </div>
                                                <div class="flex">
                                                    <input type="hidden" name="updateCategId" value="<?= $value["id"] ?>">
                                                    <input type="submit" name="updateCategByAdmin" value="Update" id="updateAdminProfile" class="p_12px_24px main-color-bg radius-8px text-white pointer border_none">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <form method="post" class="flex" style="justify-content: center; align-items: center;">
                                    <input type="hidden" name="categoryId" value="<?= $value["id"] ?>">
                                    <button style="background-color: transparent; border: none; padding: 0;" type="submit" name="deleteUser">
                                        <iconify-icon class="fs_24px" icon="ic:baseline-delete"></iconify-icon>
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php
                    }
                    if (isset($_POST["categoryId"])) {
                        $idToDelete = $_POST["categoryId"];
                        $category->deleteCategory($idToDelete);
                    }
                    ?>
                </div>
            </div>
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