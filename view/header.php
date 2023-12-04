<?php
$viewTitle = empty($viewTitle) ? "MPA - Official" : $viewTitle;

?>
<!-- logout -->
<?php
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $classUser->reqlogout();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./view/src/img/avatar/Jupiter.png">
    <!-- admin  -->
    <link rel="stylesheet" href="./view/src/css/admin.css">
    <!-- home  -->
    <link rel="stylesheet" href="./view/src/css/home.css">
    <!-- user  -->
    <link rel="stylesheet" href="./view/src/css/user.css">
    <!-- signin  -->
    <link rel="stylesheet" href="./view/src/css/signin.css">
    <!-- signup  -->
    <link rel="stylesheet" href="./view/src/css/signup.css">
    <!-- orders  -->
    <link rel="stylesheet" href="./view/src/css/orders.css">
    <!-- funds  -->
    <link rel="stylesheet" href="./view/src/css/funds.css">
    <!-- transaction history  -->
    <link rel="stylesheet" href="./view/src/css/transaction.css">
    <!-- category  -->
    <link rel="stylesheet" href="./view/src/css/category.css">
    <!-- currency  -->
    <link rel="stylesheet" href="./view/src/css/currency/currency.css">
    <link rel="stylesheet" href="./view/src/css/currency/currency_rss.css">
    <!-- watchlist  -->
    <link rel="stylesheet" href="./view/src/css/watchlistNotLogin/watchlist.css">
    <link rel="stylesheet" href="./view/src/css/watchlistNotLogin/mobileapp.css">



    <!-- all  -->
    <link rel="stylesheet" href="./view/src/css/defined.css">
    <link rel="stylesheet" href="./view/src/css/my-style.css">
    <link rel="stylesheet" href="./view/src/css/header.css">
    <link rel="stylesheet" href="./view/src/css/footer.css">
    <link rel="stylesheet" href="./view/src/css/responsive.css">
    <link rel="stylesheet" href="./view/src/css/scrollbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title><?= $viewTitle ?></title>
</head>

<body>

    <!-- Start header  -->

    <div class="header">

        <div class="top-header">
            <div class="top-header-left">
                <div class="fs-11px-fw-600">
                    <span class="sign-left">Cryptos:</span> <span class="value">0</span>
                </div>
                <div class="fs-11px-fw-600">
                    <span class="sign-left">Exchanges:</span> <span class="value">0</span>
                </div>
                <div class="fs-11px-fw-600">
                    <span class="sign-left">Market Cap:</span> <span class="value">0</span>
                </div>
                <div class="fs-11px-fw-600">
                    <span class="sign-left">Dominance:</span> <span class="value">0</span>
                </div>
                <div class="fs-11px-fw-600">
                    <span class="sign-left">ETH Gas:</span> <span class="value">0</span>
                </div>
                <div class="fs-11px-fw-600">
                    <span class="sign-left">Fear & Greed:</span> <span class="value">0</span>
                </div>
            </div>
            <div class="top-header-right">
                <div class="top-header-right-half">
                    <div class="top-header-right-group">
                        <span class="fs-12px-fw-700">English</span>
                        <iconify-icon icon="icon-park-solid:down-one" class="fs_14px"></iconify-icon>
                    </div>
                    <div class="item-unit">
                        <div class="top-header-right-group">
                            <img src="./view/src/img/svg/icon.svg" alt="">
                        </div>
                        <span class="fs-12px-fw-700">USD</span>
                        <iconify-icon icon="icon-park-solid:down-one" class="fs_14px"></iconify-icon>
                    </div>
                </div>
                <div class="top-header-right-line-straight"></div>
                <img src="./view/src/img/svg/diamond-icon 1.svg" alt="">

                <?php

                if ((isset($_SESSION["username"]) && !empty($_SESSION["username"])) && (isset($_SESSION["password"]) && !empty($_SESSION["password"]))) {

                ?>
                    <div class="header_profile flex align_center g_12px relative">
                        <?php

                        if ($_SESSION["role_user"] == 0) {
                        ?>
                            <a href="?mod=page&act=admin">
                                <img src="./view/src/img/uploads/<?php
                                                                    if (isset($_SESSION["avatar"]) && $_SESSION["avatar"]) {
                                                                        echo $_SESSION["avatar"];
                                                                    } else {
                                                                        echo "default.png";
                                                                    }
                                                                    ?>" alt="" width="28px">
                            </a>
                            <ul class="drop_profile d_none">
                                <li onclick="window.location='?mod=page&act=admin' " class="pointer fs-12px-fw-600 no_wrap">Admin Settings</li>
                                <li onclick="window.location='?mod=page&act=home&action=logout' " class="pointer fs-12px-fw-600">Log out</li>
                            </ul>
                        <?php
                        } else if ($_SESSION["role_user"] == 1) {
                        ?>
                            <a href="?mod=page&act=profile">
                                <img src="./view/src/img/uploads/<?php
                                                                    if (isset($_SESSION["avatar"]) && $_SESSION["avatar"]) {
                                                                        echo $_SESSION["avatar"];
                                                                    } else {
                                                                        echo "default.png";
                                                                    }
                                                                    ?>" alt="" width="28px">
                            </a>
                            <ul class="drop_profile d_none">
                                <li onclick="window.location='?mod=page&act=profile' " class="pointer fs-12px-fw-600">Settings</li>
                                <li onclick="window.location='?mod=page&act=home&action=logout' " class="pointer fs-12px-fw-600">Log out</li>
                            </ul>
                        <?php
                        }
                        ?>
                    </div>

                <?php } else {
                ?>

                    <div class="flex g_8px">

                        <div class="btnAction p_0px_16px fs-12px-fw-700 main-color lh-32px border_main radius-8px pointer switchform" btn-type="body-form-login">Log In</div>
                        <div class="btnAction p_0px_16px fs-12px-fw-700 text-white lh-32px main-color-bg radius-8px pointer switchform" btn-type="body-form-signup">Sign up</div>

                        <!-- modal login / signin  -->

                        <div id="wrapperModal" class="backdrop-wrapper">
                            <div class="modal active container_signin p_20px radius-16px" style="width: 420px; max-height: 58%;">
                                <div class="">
                                    <div class="mb_32px flex">
                                        <div class="flex flex_center w_100pc">
                                            <div class="flex flex_center pt_8px g_32px">
                                                <div class="switchform label-bottom active fs-22px-fw-700 text-2nd-color pb_12px pointer body-form-login" btn-type="body-form-login">Log In</div>
                                                <div class="switchform label-bottom fs-22px-fw-700 text-2nd-color pointer body-form-signup" btn-type="body-form-signup">Sign Up</div>
                                            </div>
                                        </div>
                                        <iconify-icon class="x-close fs_24px pointer" icon="ph:x-bold"></iconify-icon>
                                    </div>

                                    <!-- login  -->
                                    <div class="body-form body-form-login">
                                        <div class="flex f_column mb_20px">
                                            <p class="fs-12px-fw-700 mb_8px">Username</p>
                                            <input id="login_username" class="fs-14px-fw-500 border_300 p_20px radius-8px outline_main" name="username" spellcheck="false" type="text" placeholder="Enter your username...">
                                        </div>
                                        <div class="flex f_column mb_20px">
                                            <p class="fs-12px-fw-700 mb_8px">Password</p>
                                            <input id="login_password" class="fs-14px-fw-500 border_300 p_20px radius-8px outline_main" name="password" spellcheck="false" type="password" placeholder="Enter your password...">
                                        </div>
                                        <div id="loginBtn" class="fs-14px-fw-600 p_16px_24px main-color-bg text-white center radius-8px mb_24px pointer" onmousedown="return false">Log in</div>
                                    </div>

                                    <!-- signup  -->
                                    <div class="body-form body-form-signup">
                                        <div class="flex f_column mb_20px">
                                            <p class="fs-12px-fw-700 mb_8px">Email Address</p>
                                            <input id="signup_email" class="signup_field fs-14px-fw-500 border_300 p_20px radius-8px outline_main" spellcheck="false" type="text" placeholder="Enter your email address...">
                                            <span class="fs-11px-fw-400 mt_8px second-text-color">Optional</span>
                                        </div>
                                        <div class="flex f_column mb_20px">
                                            <p class="fs-12px-fw-700 mb_8px">Username</p>
                                            <input id="signup_username" class="signup_field fs-14px-fw-500 border_300 p_20px radius-8px outline_main" spellcheck="false" type="text" placeholder="Enter your username...">
                                        </div>
                                        <div class="flex f_column mb_20px">
                                            <p class="fs-12px-fw-700 mb_8px">Password</p>
                                            <input id="signup_password" class="signup_field fs-14px-fw-500 border_300 p_20px radius-8px outline_main" spellcheck="false" type="password" placeholder="Enter your password...">
                                        </div>
                                        <div class="flex f_column mb_20px">
                                            <p class="fs-12px-fw-700 mb_8px">Re-type Password</p>
                                            <input id="signup_retypepass" class="signup_field fs-14px-fw-500 border_300 p_20px radius-8px outline_main" spellcheck="false" type="password" placeholder="Re-type your password...">
                                            <span id="error-text" class="mt_8px" style="color: red;"></span>
                                        </div>
                                        <div id="signupbtn" class="fs-14px-fw-600 p_16px_24px main-color-bg text-white radius-8px center mb_24px pointer" onmousedown="return false">Create an account</div>
                                    </div>

                                </div>

                                <div class="flex flex_center">
                                    <p class="fs-16px-fw-600 p_0_8px">OR</p>
                                </div>

                                <div class="mt_24px">
                                    <div class="flex flex_center g_12px border_300 p_12px radius-8px mb_16px">
                                        <iconify-icon icon="fa6-solid:g"></iconify-icon>
                                        <p class="fs-14px-fw-600">Continue with Google</p>
                                    </div>
                                    <div class="flex flex_center g_12px border_300 p_12px radius-8px mb_16px">
                                        <iconify-icon icon="ph:wallet-fill"></iconify-icon>
                                        <p class="fs-14px-fw-600">Continue with Wallet</p>
                                    </div>
                                    <div class="fs-12px-fw-600 center">By proceeding, you agree to MarketPlaceAsset's Terms<br>of Use & Privacy Policy.</div>
                                </div>

                            </div>
                        </div>

                        <!-- modal login / signin  -->

                    </div>
                <?php
                } ?>
            </div>

            <!-- toast message  -->

            <div id="toast"></div>

            <!-- toast message  -->

        </div>
        <div class="line-header"></div>
        <div class="second-header">
            <div class="top-header-wrapper-left d_none">
                <div class="fs-11px-fw-600">
                    <span class="sign-left">Cryptos:</span><span class="value">0</span>
                </div>
            </div>
            <div class="second-header-left">
                <a href="?mod=page&act=home" class="second-header-left-logo">
                    <img src="./view/src/img/svg/MarketPlaceAsset.svg" alt="">
                </a>
                <div class="second-header-left-menuBar">
                    <div style="position: relative;">
                        <div class="each_menubar">Cryptocurrencies</div>
                        <div class="dropdown d_none">
                            <div class="menubar__dropdown grid p_32px_24px radius-8px">
                                <div class="grid_row1 m_rl_12px">
                                    <div class="emb__nameTitle m_inline_start_8px mb_8px fs-14px-fw-600">
                                        CRYPTOCURRENCIES
                                    </div>
                                    <div class="flex f_column">
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img">Ranking</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img2">Recently Added</a>
                                        <a href="?mod=category&act=list-category" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img3">Categories</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img4">Spotlight</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img5">Gainers & Losers</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img6">Global Charts</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img7">Historical Snapshots</a>
                                        <div class="border-bottom" style="margin: 12px 0;"></div>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img7">Legal Tender Countries</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img7">Fiats / Companies Rankings</a>
                                    </div>
                                </div>
                                <div class="grid_row2 m_rl_12px">
                                    <div class="emb__nameTitle m_inline_start_8px mb_8px fs-14px-fw-600">
                                        NFT
                                    </div>
                                    <div class="flex f_column">
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img">Overall NFT Stats</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img2">Top Collections</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img3">Upcoming Sales</a>
                                    </div>
                                </div>
                                <div class="grid_row3 m_rl_12px">
                                    <div class="emb__nameTitle m_inline_start_8px mb_8px fs-14px-fw-600">
                                        On Chain Data
                                    </div>
                                    <div class="flex f_column">
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img">Ranking</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img2">Recently Added</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="position: relative;">
                        <div class="each_menubar">Exchanges</div>
                        <div class="dropdown d_none">
                            <div class="menubar__dropdown p_16px radius-8px">
                                <div class="grid_row1 m_rl_12px">
                                    <div class="flex f_column">
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img">Spot</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img2">Derivatives</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img3">DEX</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="position: relative;">
                        <div class="each_menubar">Community</div>
                        <div class="dropdown d_none">
                            <div class="menubar__dropdown p_16px radius-8px">
                                <div class="grid_row1 m_rl_12px">
                                    <div class="flex f_column">
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img">Feeds</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img2">Topics</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img3">Lives</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img3">Articles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="position: relative;">
                        <div class="each_menubar">Products</div>
                        <div class="dropdown d_none">
                            <div class="menubar__dropdown flex p_32px_24px radius-8px">
                                <div class="grid_row1 m_rl_12px">
                                    <div class="emb__nameTitle m_inline_start_8px mb_8px fs-14px-fw-600">
                                        PRODUCTS
                                    </div>
                                    <div class="flex f_column">
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600">
                                            <img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img">Converter</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600">
                                            <img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img2">Blockchain Explorer</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600">
                                            <img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img3">Telegram Bot</a>
                                        <div class="border-bottom" style="margin: 12px 0;"></div>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600">
                                            <img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img7">Crypto API</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600">
                                            <img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img7">Site Widgets</a>
                                    </div>
                                </div>
                                <div class="grid_row2 m_rl_12px">
                                    <div class="emb__nameTitle m_inline_start_8px mb_8px fs-14px-fw-600">
                                        CAMPAIGNS
                                    </div>
                                    <div class="flex f_column">
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600">
                                            <img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img">Airdrops</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600">
                                            <img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img2">Diamond Rewards</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600">
                                            <img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img3">Learn and Earn</a>
                                    </div>
                                </div>
                                <div class="grid_row3 m_rl_12px">
                                    <div class="emb__nameTitle m_inline_start_8px mb_8px fs-14px-fw-600">
                                        CALENDARS
                                    </div>
                                    <div class="flex f_column">
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600">
                                            <img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img">ICO Calendar</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600">
                                            <img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img2">Events Calendar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="position: relative;">
                        <div class="each_menubar">Learn</div>
                        <div class="dropdown d_none">
                            <div class="menubar__dropdown p_16px radius-8px">
                                <div class="grid_row1 m_rl_12px">
                                    <div class="flex f_column">
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600">
                                            <img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img">News</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600">
                                            <img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img2">Academy</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600">
                                            <img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img3">Research</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600">
                                            <img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img3">Videos</a>
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600">
                                            <img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img3">Glossary</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="second-header-right">
                <div class="second-header-right-items">
                    <div class="second-header-right-item">
                        <iconify-icon class="fs_16px color_gray_400" icon="clarity:star-solid"></iconify-icon>
                        <a href="?mod=page&act=watchlistNotLogin" class="fs-12px-fw-400">Watchlist</a>
                    </div>
                    <div class="second-header-right-item">
                        <iconify-icon class="fs_16px color_gray_400" icon="fa6-solid:chart-pie"></iconify-icon>
                        <a href="?mod=page&act=orders" class="fs-12px-fw-400">Orders History</a>
                    </div>
                </div>
                <div class="second-header-right-searchbar">
                    <iconify-icon class="fs_20px color_gray_400" icon="iconamoon:search"></iconify-icon>
                    <input class="header-right-searchbar" type="text" placeholder="Search">
                    <span class="header-right-searchbar-prompt gray-bg">/</span>
                </div>
            </div>
            <div class="second-header-right-rss d_none">
                <div class="flex pointer fs_24px m_inline_start_16px">
                    <iconify-icon icon="mingcute:search-line"></iconify-icon>
                </div>
                <img class="pointer m_inline_start_16px" src="./view/src/img/svg/diamond-icon 1.svg" alt="" width="24px">
                <div class="flex pointer fs_26px m_inline_start_16px">
                    <iconify-icon icon="ic:round-menu"></iconify-icon>
                </div>
            </div>
        </div>
        <div class="line-header"></div>
        <div class="top-header-wrapper">
            <div class="top-header-rss">
                <div class="fs-11px-fw-600">
                    <span class="sign-left">Cryptos:</span> <span class="value">0</span>
                </div>
                <div class="fs-11px-fw-600">
                    <span class="sign-left">Exchanges:</span> <span class="value">0</span>
                </div>
                <div class="fs-11px-fw-600">
                    <span class="sign-left">Market Cap:</span> <span class="value">0</span>
                </div>
                <div class="fs-11px-fw-600">
                    <span class="sign-left">Dominance:</span> <span class="value">0</span>
                </div>
                <div class="fs-11px-fw-600">
                    <span class="sign-left">ETH Gas:</span> <span class="value">0</span>
                </div>
                <div class="fs-11px-fw-600">
                    <span class="sign-left">Fear & Greed:</span> <span class="value">0</span>
                </div>
            </div>
        </div>

    </div>

    <!-- End header  -->