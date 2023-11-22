<?php $viewTitle = empty($viewTitle) ? "MPA - Official" : $viewTitle ?>

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
    <!-- watchlist  -->
    <link rel="stylesheet" href="./view/src/css/watchlistNotLogin/watchlist.css">
    <link rel="stylesheet" href="./view/src/css/watchlistNotLogin/mobileapp.css">



    <!-- all  -->
    <link rel="stylesheet" href="./view/src/css/my-style.css">
    <link rel="stylesheet" href="./view/src/css/header.css">
    <link rel="stylesheet" href="./view/src/css/footer.css">
    <link rel="stylesheet" href="./view/src/css/responsive.css">
    <link rel="stylesheet" href="./view/src/css/scrollbar.css">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title><?=$viewTitle?></title>
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
                <div class="align_center g_12px d_none">
                    <img src="./view/src/img/svg/notice.svg" alt="">
                    <a href="?mod=page&act=profile">
                        <img src="./view/src/img/avatar/profile.png" alt="" width="28px">
                    </a>
                </div>
                <div class="flex g_8px">
                    <a href="?mod=page&act=login" class="p_0px_16px fs-12px-fw-700 main-color lh-32px border_main radius-8px pointer">Log In</a>
                    <a href="?mod=page&act=signup" class="p_0px_16px fs-12px-fw-700 text-white lh-32px main-color-bg radius-8px pointer">Sign up</a>
                </div>
            </div>
        </div>
        <div class="line-header"></div>
        <div class="second-header">
            <div class="top-header-wrapper-left d_none">
                <div class="fs-11px-fw-600">
                    <span class="sign-left">Cryptos:</span> <span class="value">0</span>
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
                                        <a href="#" target="_self" class="emb__atag grid p_8px fs-14px-fw-600"><img class="m_inline_end_16px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" width="32px" height="32px" alt="img3">Categories</a>
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
                        <a href="?mod=page&act=watchlistNotLogin" class="fs-12px-fw-400">Portfolio</a>
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