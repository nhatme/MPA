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
                    <a href="?mod=admin&act=admin-home" class="navLeft active flex align_center g_24px">
                        <iconify-icon class="fs_24px" icon="tabler:home-2"></iconify-icon>
                        <div class="fs-14px-fw-600 ">Home</div>
                    </a>
                    <a href="?mod=admin&act=addcurrency" class="navLeft flex align_center g_24px">
                        <iconify-icon class="fs_24px" icon="carbon:currency"></iconify-icon>
                        <siv class="fs-14px-fw-600">Currency</siv>
                    </a>
                    <a href="?mod=admin&act=addcategory" class="navLeft flex align_center g_24px">
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


    <div class="main w_70pc mt_48px">

        <div class="mb_48px">
            <div class="main-title flex_sp_bt mb_32px">
                <span class="fs-32px-fw-700">Top Users</span>
                <div class="flex align_center g_16px">
                    <span class="fs-16px-fw-400 main-color">More</span>
                    <iconify-icon class="fs_24px main-color" icon="lucide:move-right"></iconify-icon>
                </div>
            </div>
            <div class="flex_sp_bt" style="display: grid; grid-template-columns: 32% 32% 32%;">
                <div>
                    <div class="fs-18px-fw-600 mb_16px main-color">Bitcoin</div>
                    <div class="main-board-info border_main p_16px radius-8px">
                        <div>
                            $1820
                        </div>
                        <div>
                            <span>Profit</span>
                            <span>Loss</span>
                            <span>Netral</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="fs-18px-fw-600 mb_16px main-color">Bitcoin</div>
                    <div class="main-board-info border_main p_16px radius-8px">
                        <div>
                            $1820
                        </div>
                        <div>
                            <span>Profit</span>
                            <span>Loss</span>
                            <span>Netral</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="fs-18px-fw-600 mb_16px main-color">Bitcoin</div>
                    <div class="main-board-info border_main p_16px radius-8px">
                        <div>
                            $1820
                        </div>
                        <div>
                            <span>Profit</span>
                            <span>Loss</span>
                            <span>Netral</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-activity">
            <div class="main-title flex_sp_bt mb_32px">
                <span class="fs-32px-fw-700">ACTIVITY</span>
                <div class="flex align_center g_16px">
                    <span class="fs-16px-fw-400 main-color">More</span>
                    <iconify-icon class="fs_24px main-color" icon="lucide:move-right"></iconify-icon>
                </div>
            </div>


            <div class="border_main radius-8px" style="height: 500px; overflow-y: scroll;">

                <?php
                foreach ($getAllorders as $key => $value) {
                    $idCrypto = $coin->getDetailCoin($value["id_crypto"]);
                ?>
                    <div class="activity-detail  p_16px " style="display: grid; grid-template-columns: 30% 15% 15% 10% 10% 20%;">
                        <div>
                            <div class="border-bottom pb_16px fs-14px-fw-700">Transactions</div>
                            <div class="flex align_center g_8px pt_16px">
                                <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/<?= $idCrypto["id"] . ".png" ?>" alt="" width="32px" height="32px" style="border-radius: 50px;">
                                <div class="fs-14px-fw-600">
                                    <span><?= $idCrypto["name_product"] ?></span>
                                    <span style="margin-left: 8px;"><?= $idCrypto["symbol"] ?></span>
                                </div>
                            </div>
                            <div style="font-weight: bold; margin-top: 8px;">UID: <?= $value["id_user"] ?></div>
                        </div>
                        <div>
                            <div class="border-bottom pb_16px fs-14px-fw-700">Amount</div>
                            <div class="pt_16px"><?= number_format($value["amount"], 2) ?></div>
                        </div>
                        <div>
                            <div class="border-bottom pb_16px fs-14px-fw-700">Total</div>
                            <div class="pt_16px">$<?= number_format(($idCrypto["price"]) * ($value["amount"]), 2) ?></div>
                        </div>
                        <div>
                            <div class="border-bottom pb_16px fs-14px-fw-700">Type</div>
                            <div class="pt_16px"><?= $value["type"] ?></div>
                        </div>
                        <div>
                            <div class="border-bottom pb_16px fs-14px-fw-700" style="width: 100px; text-align: center;">Status</div>
                            <div class="pt_16px" style="width: 100px; font-weight: bold;<?php switch ($value["status"]) {
                                                                                            case "Confirmed":
                                                                                                echo "color: green";
                                                                                                break;
                                                                                            case "Cancelled":
                                                                                                echo "color: red";
                                                                                                break;
                                                                                        } ?>; text-align: center;">
                                <?php if ($value["status"] == "Pending") {
                                ?>
                                    <form method="post">
                                        <div style="color: orange"><?= $value["status"] ?></div>
                                        <div>
                                            <input style="margin-top: 8px; min-width: 80px;" class="pointer" type="submit" name="submitConfirm[<?= $value['id'] ?>]" value="Confirm ?">
                                            <input style="margin-top: 8px; min-width: 80px;" class="pointer" type="submit" name="submitCancel[<?= $value['id'] ?>]" value="Cancel ?">
                                        </div>
                                    </form>
                                <?php
                                    if (isset($_POST["submitConfirm"][$value['id']])) {
                                        $orders->confirmedOrder($value["id"], $_SESSION["id"]);
                                        $orders->transHistory($_SESSION["id"]);
                                    } else if (isset($_POST["submitCancel"][$value['id']])) {
                                        $orders->canceledOrder($value["id"], $_SESSION["id"]);
                                        $orders->transHistory($_SESSION["id"]);
                                    }
                                } else {
                                    echo $value["status"];
                                } ?>
                            </div>
                        </div>
                        <div>
                            <div class="border-bottom pb_16px fs-14px-fw-700" style="text-align: center;">Date</div>
                            <div class="pt_16px" style="text-align: center;"><?= $value["created_at"] ?></div>
                        </div>
                    </div>
                <?php } ?>

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