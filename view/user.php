<?php
$user = new UserAccount();
$result = $user->getUsers($_SESSION["id"]);

?>

<div class="container">
    <div class="user_main pt_32px border-bottom">
        <div class="flex">
            <div class="w_16pc mr_32px">
                <div class="flex align_center g_16px p_16px color_gray_200_bg radius-8px mb_6px pointer">
                    <iconify-icon class="fs_20px" icon="iconamoon:profile-light"></iconify-icon>
                    <span class="fs-15px-fw-700">Profile</span>
                </div>
                <div class="flex align_center g_16px p_16px pointer">
                    <iconify-icon class="fs_20px" icon="solar:wallet-line-duotone"></iconify-icon>
                    <span class="fs-15px-fw-500">My Wallet</span>
                </div>
                <div class="flex align_center g_16px p_16px pointer">
                    <iconify-icon class="fs_20px" icon="solar:lock-broken"></iconify-icon>
                    <span class="fs-15px-fw-500">Account Security</span>
                </div>
            </div>
            <div class="w_80pc">
                <div class="border-bottom m_rl_32px pb_32px">
                    <span class="fs-24px-fw-700">Profile</span>
                </div>
                <div style="max-width: 710px;">
                    <div class="p_32px">
                        <div class="mb_16px">
                            <span class="fs-20px-fw-700">About me</span>
                        </div>
                        <form enctype="multipart/form-data" method="post">
                            <div class="mb_16px">
                                <div class="flex mb_6px">
                                    <span class="fs-12px-fw-700">Your Avatar</span>
                                </div>
                                <div class="flex_sp_bt align_center">
                                    <div class="border_300 color_gray_100_bg radius_50 of_hidden" style="width: 80px; height: 80px;">
                                        <img src="./view/src/img/uploads/<?php if (isset($_SESSION["avatar"])) echo ($_SESSION["avatar"]) ?>" width="100px" height="100px" style="object-fit: cover;" alt="">
                                    </div>
                                    <div>
                                        <input id="inputFileUser" type="file" name="avatar" placeholder="Upload" value="Edit Avatar" class="fs-14px-fw-600 p_12px_24px radius-8px pointer">
                                    </div>
                                </div>
                            </div>
                            <div class="user_main_cuustom flex f_column g_16px mb_16px">
                                <div class="flex f_column">
                                    <span class="fs-12px-fw-700 mb_8px">Username</span>
                                    <input name="username" class="fs-14px-fw-500 border_300 p_20px radius-8px outline_main mb_4px" type="text" placeholder="<?= $result->getUsername() ?>">
                                    <span class="fs-12px-fw-700 gray-2nd-color">* Username can only be changed once per 7 days</span>
                                </div>

                                <div class="flex f_column">
                                    <span class="fs-12px-fw-700 mb_8px">Current password</span>
                                    <input name="currentpassword" class="fs-14px-fw-500 border_300 p_20px radius-8px outline_main" type="text" placeholder="Choose your own nickname">
                                </div>
                                <div class="flex f_column">
                                    <span class="fs-12px-fw-700 mb_8px">New password</span>
                                    <input name="newpassword" class="fs-14px-fw-500 border_300 p_20px radius-8px outline_main" type="text" placeholder="Choose your own nickname">
                                </div>
                            </div>
                            <div class="flex f_column">
                                <input type="submit" name="submitEditProfile" value="Save" class="fs-14px-fw-600 text-white border_none main-color-bg p_12px_24px radius-8px fit_cont pointer">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>