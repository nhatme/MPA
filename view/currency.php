<!-- ================================================================== -->

<!-- start container  -->

<div class="container_currency border-bottom">
    <div class="grid_table">

        <div class="p_24px">
            <div class="coin_stats ">
                <?php
                $getIdCoin = $classCoin->getDetailCoin($id);
                if (isset($id) && $id == $getIdCoin["id"]) {
                ?>
                    <div class="coin_stats_header p_24px">
                        <div class="csh__top grid">

                            <img src="<?= $getIdCoin["logo"] ?>" width="24px" height="24px" alt="img_coin">
                            <div class="">
                                <span class="m_right_8px fs-18px-fw-700"><?= $getIdCoin["name_product"] ?></span>
                                <span class="fs-12px-fw-500 second-text-color"><?= $getIdCoin["symbol"] ?></span>
                            </div>
                            <button class="p_8px border_none coin_stats_fav radius-8px color_gray_200_bg">
                                <iconify-icon class="fs_16px flex gray-2nd-color" icon="ph:star-bold"></iconify-icon>
                            </button>
                            <button class="p_8px border_none coin_stats_share radius-8px color_gray_200_bg">
                                <iconify-icon class="fs_16px flex gray-2nd-color" icon="material-symbols:share"></iconify-icon>
                            </button>
                        </div>
                        <div class="csh__bottom flex align_center mt_12px g_8px">
                            <span class="fs-32px-fw-700">$<?= number_format($getIdCoin["price"], 2) ?></span>
                            <div>
                                <div class="fs-16px-fw-600 flex align_center g_4px">
                                    <?php
                                    if ((float)($getIdCoin["change_24h"]) < 0) {
                                    ?>
                                        <iconify-icon class="fs_14px down-price" icon="icon-park-solid:down-one"></iconify-icon>
                                        <div>
                                            <span class="down-price"><?= number_format((float)($getIdCoin["change_24h"]), 2, '.', ''); ?>%</span>
                                            <span class="down-price">(24h)</span>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <iconify-icon class="fs_14px up-price" icon="icon-park-solid:up-one"></iconify-icon>
                                        <div>
                                            <span class="up-price"><?= number_format((float)($getIdCoin["change_24h"]), 2, '.', ''); ?>%</span>
                                            <span class="up-price">(24h)</span>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="coin_stats_detail flex f_column g_32px">

                        <div>
                            <span class="flex fs-12px-fw-700">Amount</span>
                            <div class="toUSDConvert grid color_gray_200_bg radius-8px mt_12px p_4px">
                                <div class="toUSDConvertLeft bg_white flex_sp_bt p_5px_8px">
                                    <span class="w_30pc fs-12px-fw-600 second-color-body"><?= $getIdCoin["symbol"] ?></span>
                                    <input class="w_60pc border_none outline_none" type="text" name="" id="inputcrypto" placeholder="0" value="1" dir="rtl" spellcheck="false">
                                </div>
                                <div class="toUSDConvertRight bg_white flex_sp_bt p_5px_8px">
                                    <span class="w_30pc fs-12px-fw-600 second-color-body">USD</span>
                                    <input class="w_60pc border_none outline_none" type="text" name="" id="inputUSD" placeholder="0" coinPrice-value="<?= (float)($getIdCoin["price"]) ?>" value="<?= (float)($getIdCoin["price"]) ?>" dir="rtl" spellcheck="false">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="flex_sp_bt align_center p_8px_16px color_gray_200_bg radius-8px pointer">
                                <div class="flex align_center g_8px">
                                    <iconify-icon class="fs_32px flex gray-2nd-color" icon="lets-icons:order"></iconify-icon>
                                    <span class="fs-32px-fw-700 gray-2nd-color">Add to Order</span>
                                </div>
                                <iconify-icon class="fs_32px gray-2nd-color" icon="ic:round-plus"></iconify-icon>
                            </div>
                        </div>

                        <div class="flex f_column g_24px">
                            <div class="coin_stats_scroll flex f_column g_16px">

                                <!-- ================================================== -->
                                <div>
                                    <div class="flex_sp_bt align_center">
                                        <div class="flex align_center">
                                            <span class="fs-12px-fw-700 second-color-body mr_4px">Market cap</span>
                                            <iconify-icon class="flex fs_16px color_gray_400" icon="material-symbols:info-outline"></iconify-icon>
                                        </div>
                                        <div class="flex align_center g_8px m_inline_start_8px">
                                            <div class="flex align_center">
                                                <iconify-icon class="fs_12px up-price" icon="icon-park-solid:up-one"></iconify-icon>
                                                <span class="fs-11px-fw-600 up-price">1.29%</span>
                                            </div>
                                            <div class="fs-12px-fw-600">$<?= number_format($getIdCoin["market_cap"], 2) ?></div>
                                        </div>
                                    </div>

                                </div>

                                <!-- ================================================== -->
                                <div>
                                    <div class="flex_sp_bt align_center">
                                        <div class="flex align_center">
                                            <div class="flex align_center m_inline_end_8px">
                                                <span class="fs-12px-fw-700 second-color-body mr_4px">Volume (24h)</span>
                                                <iconify-icon class="flex fs_16px color_gray_400" icon="material-symbols:info-outline"></iconify-icon>
                                            </div>
                                            <iconify-icon icon="mingcute:right-line"></iconify-icon>
                                        </div>
                                        <div class="flex align_center g_8px m_inline_start_8px">
                                            <div class="flex align_center">
                                                <iconify-icon class="fs_12px down-price" icon="icon-park-solid:down-one"></iconify-icon>
                                                <span class="fs-11px-fw-600 down-price">37.83%</span>
                                            </div>
                                            <div class="fs-12px-fw-600">$<?= number_format($getIdCoin["volume_24h"], 2) ?></div>
                                        </div>
                                    </div>

                                </div>

                                <!-- ================================================== -->

                                <div>
                                    <div class="flex_sp_bt align_center">
                                        <div class="flex align_center">
                                            <span class="fs-12px-fw-700 second-color-body mr_4px">Circulating supply</span>
                                            <iconify-icon class="flex fs_16px color_gray_400" icon="material-symbols:info-outline"></iconify-icon>
                                        </div>
                                        <div class="g_8px m_inline_start_8px">
                                            <div class="">
                                                <span class="fs-12px-fw-600"><?= number_format($getIdCoin["circulating_supply"], 2) ?> <span><?= $getIdCoin["symbol"] ?></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ================================================== -->
                                <div>
                                    <div class="flex_sp_bt align_center">
                                        <div class="flex align_center">
                                            <span class="fs-12px-fw-700 second-color-body mr_4px">Max. supply</span>
                                            <iconify-icon class="flex fs_16px color_gray_400" icon="material-symbols:info-outline"></iconify-icon>
                                        </div>
                                        <div class="m_inline_start_8px">
                                            <div class="flex">
                                                <span class="fs-12px-fw-600">
                                                    <?php $getIdCoin["max_supply"] || print_r("--") ?> <?= $getIdCoin["symbol"] ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ================================================== -->

                            </div>

                            <div>
                                <span class="fs-12px-fw-700">
                                    Official links
                                </span>
                                <div class="flex align_center g_8px mt_12px">
                                    <div class="offLinks_btn flex align_center p_4px_8px color_gray_200_bg radius-8px g_4px"><iconify-icon class="fs_16px second-color-body" icon="mingcute:earth-2-line"></iconify-icon><span class="fs-12px-fw-700">Website</span></div>
                                    <div class="offLinks_btn flex align_center p_4px_8px color_gray_200_bg radius-8px g_4px"><iconify-icon class="fs_16px second-color-body" icon="akar-icons:paper"></iconify-icon><span class="fs-12px-fw-700">Whitepaper</span></div>
                                    <div class="offLinks_btn flex align_center p_4px_8px color_gray_200_bg radius-8px g_4px"><iconify-icon class="fs_16px second-color-body" icon="mdi:github"></iconify-icon><span class="fs-12px-fw-700">GitHub</span></div>
                                </div>
                            </div>

                            <div>
                                <span class="fs-12px-fw-700">
                                    Socials
                                </span>
                                <div class="flex align_center g_8px mt_12px">
                                    <div class="flex align_center p_4px_8px color_gray_200_bg radius-8px g_4px socibtn"><iconify-icon class="second-color-body" icon="ic:baseline-reddit"></iconify-icon><span class="fs-12px-fw-700">Reddit</span></div>
                                </div>
                            </div>



                            <div class="">
                                <div class="flex align_center">
                                    <span class="fs-12px-fw-700">Rating</span>
                                    <span class="fs-12px-fw-700 m_rl_8px">.</span>
                                    <span class="fs-11px-fw-500 second-color-body">Based on 3 institutional ratings</span>
                                </div>
                                <div class="flex align_center mt_12px">
                                    <span>4.5</span>
                                    <span class="flex align_center">
                                        <iconify-icon class="fs_16px star_bg" icon="ic:round-star"></iconify-icon>
                                        <iconify-icon class="fs_16px star_bg" icon="ic:round-star"></iconify-icon>
                                        <iconify-icon class="fs_16px star_bg" icon="ic:round-star"></iconify-icon>
                                        <iconify-icon class="fs_16px star_bg" icon="ic:round-star"></iconify-icon>
                                        <iconify-icon class="fs_16px star_bg" icon="ic:round-star-half"></iconify-icon>
                                    </span>
                                    <iconify-icon class="flex fs_16px color_gray_400" icon="material-symbols:info-outline"></iconify-icon>
                                </div>
                            </div>

                            <div>
                                <span class="fs-12px-fw-700">Network information</span>
                                <div class="flex g_8px mt_12px">
                                    <div class="netInfo_btn flex align_center g_4px p_4px_8px color_gray_200_bg radius-8px">
                                        <iconify-icon class="second-color-body fs_16px" icon="iconamoon:search-bold"></iconify-icon>
                                        <span class="fs-12px-fw-600">Chain explorers</span>
                                        <iconify-icon class="second-color-body fs_16px" icon="mingcute:down-line"></iconify-icon>
                                    </div>
                                    <div class="netInfo_btn flex align_center g_4px p_4px_8px color_gray_200_bg radius-8px">
                                        <iconify-icon class="second-color-body fs_16px" icon="solar:wallet-broken"></iconify-icon>
                                        <span class="fs-12px-fw-600">Supported wallets</span>
                                        <iconify-icon class="second-color-body fs_16px" icon="mingcute:down-line"></iconify-icon>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <span class="fs-12px-fw-700">UCID</span>
                                <div class="flex mt_12px">
                                    <div class="flex align_center g_4px p_4px_8px color_gray_200_bg radius-8px">
                                        <span class="fs-12px-fw-600">1</span>
                                        <iconify-icon class="fs_16px second-color-body" icon="fluent:copy-24-regular"></iconify-icon>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <span class="flex fs-12px-fw-700">Tags</span>
                            <div class="mt_12px flex g_8px align_center">
                                <span class="fs-12px-fw-600 second-color-body p_5px_8px color_gray_200_bg radius-8px">Minable</span>
                                <span class="fs-12px-fw-600 second-color-body p_5px_8px color_gray_200_bg radius-8px">PoW</span>
                                <span class="fs-12px-fw-600 second-color-body p_5px_8px color_gray_200_bg radius-8px">SHA-256</span>
                                <span class="fs-12px-fw-600 main-color">Show all</span>
                            </div>
                        </div>
                        <div class="flex_sp_bt align_center p_8px_16px bg_color_2 radius-8px">
                            <span class="fs-12px-fw-800">Do you own this project?</span>
                            <div class="flex align_center g_4px height_32px">
                                <iconify-icon class="main-color" icon="solar:pen-broken"></iconify-icon>
                                <span class="fs-12px-fw-700 main-color">Update Token Info</span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="main_area border-left border-right">
            <div class="paddinglr_5pc coin_chart_navBar border-bottom">
                <div class="pt_24px flex">
                    <div class="navBar_category fs-14px-fw-600 bb_main_2px main-color">Chart</div>
                    <div class="navBar_category fs-14px-fw-600 ">Markets</div>
                    <div class="navBar_category fs-14px-fw-600 ">News</div>
                    <div class="navBar_category fs-14px-fw-600 ">About</div>
                    <div class="navBar_category fs-14px-fw-600 ">Analytics</div>
                </div>
            </div>
            <div class="coin_chart paddinglr_5pc pt_32px">
                <div class="chart_realtime">
                    <div class="flex align_center g_8px mb_24px">
                        <div class="chart_type_control flex g_8px">
                            <div class="chart_style flex g_8px">
                                <div class="chart_type flex p_4px color_gray_200_bg radius-6px">
                                    <span class="fs-12px-fw-600 gray-2nd-color lh-24px bg_white p_0_8px radius-6px">Price</span>
                                    <span class="fs-12px-fw-600 gray-2nd-color lh-24px p_0_8px radius-6px ml_4px no_wrap">Market cap</span>
                                </div>
                                <div class="line_type flex color_gray_200_bg p_4px radius-6px">
                                    <iconify-icon class="fs_20px flex align_center second-color-body p_0_8px h_24px bg_white radius-6px" icon="material-symbols-light:show-chart-rounded"></iconify-icon>
                                    <iconify-icon class="fs_20px flex align_center second-color-body p_0_8px h_24px ml_4px" icon="material-symbols-light:candlestick-chart-rounded"></iconify-icon>
                                </div>
                            </div>
                            <div class="technical_group flex g_8px">
                                <div class="p_4px color_gray_200_bg radius-6px">
                                    <div class="flex align_center g_6px p_0_8px">
                                        <iconify-icon class="fs_16px second-color-body" icon="ci:chart-line"></iconify-icon>
                                        <span class="fs-12px-fw-600 gray-2nd-color lh-24px">TradingView</span>
                                    </div>
                                </div>
                                <div class="flex p_4px color_gray_200_bg radius-6px">
                                    <div class="flex align_center p_0_8px">
                                        <input class="compare_with outline_none border_none trans_bg gray-2nd-color fs-12px-fw-600" type="text" placeholder="Search" value="Compare with">
                                        <iconify-icon class="fs_16px second-color-body" icon="mingcute:down-line"></iconify-icon>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="period flex align_center p_4px color_gray_200_bg radius-6px">
                            <div class="flex align_center">
                                <span class="fs-12px-fw-600 gray-2nd-color lh-24px radius-6px bg_white p_0_8px">1D</span>
                                <span class="fs-12px-fw-600 gray-2nd-color lh-24px radius-6px p_0_8px">7D</span>
                                <span class="fs-12px-fw-600 gray-2nd-color lh-24px radius-6px p_0_8px">1M</span>
                                <span class="fs-12px-fw-600 gray-2nd-color lh-24px radius-6px p_0_8px">1Y</span>
                                <span class="fs-12px-fw-600 gray-2nd-color lh-24px radius-6px p_0_8px">All</span>
                                <div class="flex p_0_8px">
                                    <iconify-icon class="fs_14px second-color-body" icon="solar:calendar-broken"></iconify-icon>
                                </div>
                            </div>
                            <div class="flex p_0_8px border-left-400 border-right-400">
                                <span class="fs-12px-fw-600 gray-2nd-color">LOG</span>
                            </div>
                            <div class="flex p_0_8px">
                                <iconify-icon class="fs_16px second-color-body" icon="octicon:download-16"></iconify-icon>
                            </div>
                        </div>
                    </div>
                    <div class="chart_detail" style="width: 100%; height: 100%;">
                        <!-- <canvas width="919" height="370"></canvas> -->
                        <img src="./view/src/img/png/BTC_1D_graph_coinmarketcap.png" alt="" width="100%">
                    </div>
                </div>
            </div>
            <div class="paddinglr_5pc">
                <div class="coin_markets">
                    <span class="fs-32px-fw-700">
                        Bitcoin markets
                    </span>
                </div>
            </div>
            <div class="paddinglr_5pc">
                <div class="coin_news">
                    <span class="fs-32px-fw-700">
                        Bitcoin news
                    </span>
                </div>
            </div>
        </div>

        <div>
            <div class="coin_community">
                <div class="thread_topic flex align_center g_8px">
                    <a class="" href="#">
                        <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/1.png" width="32px" height="32px" alt="">
                    </a>
                    <div class="flex_110 flex f_column g_4px">
                        <a class="flex align_center g_4px" href="#">
                            <span class="fs-14px-fw-700">Bitcoin</span>
                            <iconify-icon class="main-color" icon="bxs:badge-check"></iconify-icon>
                        </a>
                        <span class="fs-12px-fw-600 gray-2nd-color">581K Followers</span>
                    </div>
                    <div class="p_8px_16px main-color-bg radius-6px">
                        <span class="flex fs-12px-fw-700 text-white">+ Follow</span>
                    </div>
                </div>
                <div class="pb_16px">
                    <div class="flex align_center g_8px p_left_24px mb_8px">
                        <div class="flex">
                            <iconify-icon class="fs_16px second-color-body" icon="mingcute:announcement-line"></iconify-icon>
                        </div>
                        <span class="fs-12px-fw-700">Project's announcements</span>
                    </div>

                    <div class="main_thread m_rl_24px color_gray_100_bg radius-6px">
                        <div class="p_16px">
                            <div class="special_event grid h_84px relative">
                                <a href="#">
                                    <img src="https://s3.coinmarketcap.com/static-gravity/image/289753e054404f929c5f73030fb9a2b9.png" height="84px" alt="">
                                </a>
                                <div class="p_12px scroll_y">
                                    <span class="fs-14px-fw-700">Bitcoin Halving 2024</span>
                                    <p class="link_desc mt_6px fs-12px-fw-600 gray-2nd-color">Use our Bitcoin halving countdown to see the estimated date for 2024. Learn about the Bitcoin halving cycle, the previous dates, and the block reward schedule.</p>
                                </div>
                                <div class="absolute link_more">
                                    <iconify-icon class="text-white" icon="solar:link-bold-duotone"></iconify-icon>
                                    <a class="fs-12px-fw-600 text-white" href="#">Link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top color_bg_1">
                    <div class="p_16px_24px">
                        <div class="p_4px color_gray_200_bg flex radius-6px">
                            <span class="fs-14px-fw-600 second-color-body p_4px_24px flex_110 center lh-24px radius-6px bg_white">Top</span>
                            <span class="fs-14px-fw-600 second-color-body p_4px_24px flex_110 center lh-24px radius-6px">Latest</span>
                        </div>
                    </div>
                    <div class="p_0px_24px mt_16px">
                        <div class="flex g_8px mb_8px">
                            <a class="flex radius_50 of_hidden" href="">
                                <img src="https://s3.coinmarketcap.com/static-gravity/image/4c31caafa68b48de86784451ab75b579.jpg" width="20px" height="20px" alt="">
                            </a>
                            <div class="flex g_8px">
                                <div class="flex align_center g_4px">
                                    <span class="fs-14px-fw-600">Jimmyboss</span>
                                    <iconify-icon class="main-color" icon="bxs:badge-check"></iconify-icon>
                                </div>
                                <div class="flex align_center g_4px">
                                    <span class="fs-11px-fw-500 econd-color-body">@ Jimmyboss</span>
                                    <span class="fs-11px-fw-500 econd-color-body">.</span>
                                    <span class="fs-11px-fw-500 econd-color-body">20h</span>
                                </div>
                            </div>
                            <div class="flex align_center g_4px p_2px_6px up_priceBg radius-6px">
                                <iconify-icon class="fs_12px text-white" icon="icon-park-solid:up-one"></iconify-icon>
                                <span class="fs-11px-fw-600 text-white">Bullish</span>
                            </div>
                        </div>
                        <div>
                            <span class="fs-14px-fw-500">Be brave like </span>
                            <a class="fs-14px-fw-500 main-color" href="">$BTC</a>
                            <span class="fs-14px-fw-500"> Bitcoin and do not give up despite all the governments. Despite all the empty talk and manipulation, buy and don't sell, just wait. Just wait for that great day.</span>
                        </div>
                        <div class="mt_10px">
                            <img src="https://media0.giphy.com/media/IXWqceoF995QxrBnL0/giphy.gif?cid=42724ffai9yg8sivc0oy16ziqgfvc8qb9lww73ty0cbnu1pl&ep=v1_gifs_gifId&rid=giphy.gif&ct=g" width="100%" alt="">
                        </div>
                        <div class="flex f_column g_6px pt_12px">
                            <div class="flex g_6px">
                                <div class="flex align_center g_6px h_24px border_300 p_0_8px radius-32px">
                                    <iconify-icon class="fs_12px" icon="basil:like-outline"></iconify-icon>
                                    <span class="fs-12px-fw-600">97</span>
                                </div>
                                <div class="flex align_center g_6px h_24px border_300 p_0_8px radius-32px">
                                    <iconify-icon class="fs_12px" icon="flat-color-icons:like"></iconify-icon>
                                    <span class="fs-12px-fw-600">487</span>
                                </div>
                                <div class="flex align_center g_6px h_24px border_300 p_0_8px radius-32px">
                                    <iconify-icon class="fs_12px" icon="cryptocurrency-color:hodl"></iconify-icon>
                                    <span class="fs-12px-fw-600">38</span>
                                </div>
                                <div class="flex align_center g_6px h_24px border_300 p_0_8px radius-32px">
                                    <iconify-icon class="fs_12px" icon="material-symbols:build"></iconify-icon>
                                    <span class="fs-12px-fw-600">29</span>
                                </div>
                                <div class="flex align_center g_6px h_24px border_300 p_0_8px radius-32px">
                                    <iconify-icon class="fs_12px" icon="carbon:person-favorite"></iconify-icon>
                                    <span class="fs-12px-fw-600">16</span>
                                </div>
                                <div class="flex align_center g_6px h_24px border_300 p_0_8px radius-32px">
                                    <iconify-icon class="fs_12px" icon="streamline:inbox-favorite-solid"></iconify-icon>
                                    <span class="fs-12px-fw-600">13</span>
                                </div>
                            </div>
                            <div>
                                <div class="flex">
                                    <div class="flex align_center g_6px h_24px border_300 p_0_8px radius-32px">
                                        <iconify-icon class="fs_12px" icon="mdi:network-favorite"></iconify-icon>
                                        <span class="fs-12px-fw-600">16</span>
                                    </div>
                                </div>
                            </div>
                            <div class="react_icon flex_sp_bt align_center border-bottom">
                                <div class="flex align_center g_6px">
                                    <iconify-icon class="fs_20px second-color-body" icon="basil:chat-outline"></iconify-icon>
                                    <span class="fs-14px-fw-600 second-color-body">45</span>
                                </div>
                                <div class="flex align_center g_6px">
                                    <iconify-icon class="fs_20px second-color-body" icon="ion:share-outline"></iconify-icon>
                                    <span class="fs-14px-fw-600 second-color-body">10</span>
                                </div>
                                <div class="flex align_center g_6px">
                                    <iconify-icon class="fs_20px second-color-body" icon="lucide:smile"></iconify-icon>
                                    <span class="fs-14px-fw-600 second-color-body">696</span>
                                </div>
                                <div class="flex align_center g_6px">
                                    <iconify-icon class="fs_20px second-color-body" icon="tabler:dots"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- End container  -->

<!-- ================================================================== -->