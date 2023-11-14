<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/mpa/src/img/avatar/Jupiter.png">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./component/css/my-style.css">
    <link rel="stylesheet" href="./component/css/header.css">
    <link rel="stylesheet" href="./component/css/footer.css">
    <link rel="stylesheet" href="./component/css/responsive.css">
    <link rel="stylesheet" href="./component/css/scrollbar.css">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>MPA - Official</title>
</head>

<body>

    <!-- Start header  -->

    <div class="header">
        <?php include "./component/header.php" ?>
    </div>

    <!-- End header  -->
    
    <!-- start container  -->
    <div class="container">
        <div class="ctn__top__highlights__slider w_100pc">
            <div class="ctn-top">
                <div class="ctn-highlights">
                    <div class="ctn-highlights-info">
                        <div class="fs-24px-fw-700">
                            <div class="title_big">Today's Cryptocurrency Prices by Market Cap</div>
                        </div>
                        <div class="flex_wrap ctn-highlights-update-detail">
                            <div class="fs-14px-fw-400 text-2nd-color ctnhlid__re">The global crypto market cap is</div>
                            <span class="fs-14px-fw-600 text-2nd-color ctnhlid__bo">$1.05T</span>
                            <span class="fs-14px-fw-400 text-2nd-color ctnhlid__re">, a</span>
                            <iconify-icon class="fs_14px down-price" icon="icon-park-solid:down-one"></iconify-icon>
                            <div class="fs-14px-fw-600 down-price ctnhlid__bo">0.37%</div>
                            <div class="fs-14px-fw-400 text-2nd-color ctnhlid__re">decrease over the last day.</div>
                            <div class="no_wrap ctn-highlights-readmore gray fs-14px-fw-400 ctnhlid__re">Read More</div>
                        </div>
                    </div>
                    <div class="ctn-highlights-switch">
                        <p class="fs-14px-fw-400 text-2nd-color">Highlights</p>
                        <img src="../src/img/svg/switch-btn.svg" alt="" width="45px">
                    </div>
                </div>
            </div>
            <div class="ctn-bottom w_100pc">

                <!-- =========================== -->

                <div class="ctn-bottom-box">

                    <!-- =========================== -->

                    <div class="ctn-bottom-box-title">
                        <div class="ctn-bottom-box-title-trending">
                            <img src="../src/img/svg/fire-trending.svg" alt="">
                            <p class="fs-16px-fw-700">Trending</p>
                        </div>
                        <div class="ctn-bottom-box-title-more">
                            <p class="fs-12px-fw-700 main-color">More</p>
                            <img src="../src/img/svg/right.svg" alt="">
                        </div>
                    </div>

                    <!-- =========================== -->

                    <div class="ctn-bottom-box-detail">
                        <div class="ctn-bottom-box-detail-info">
                            <p class="fs-12px-fw-400 gray-2nd-color">1</p>
                            <div class="ctn__bbdi__avatar__name">
                                <img class="ctn__bbdi__img" src="../src/img/avatar/img2.png" alt="" width="24px" height="24px">
                                <p class="truncate fs-12px-fw-600">Kathryn Memorial</p>
                            </div>
                            <p class="truncate no_wrap fs-12px-fw-400 gray-2nd-color">Stage Excellent</p>
                        </div>
                        <div class="ctn__bbd__realtime-price">
                            <iconify-icon class="fs_14px up-price" icon="icon-park-solid:up-one"></iconify-icon>
                            <p class="fs-12px-fw-400 up-price">2%</p>
                        </div>
                    </div>

                    <!-- =========================== -->

                    <div class="ctn-bottom-box-detail">
                        <div class="ctn-bottom-box-detail-info">
                            <p class="fs-12px-fw-400 gray-2nd-color">2</p>
                            <div class="ctn__bbdi__avatar__name">
                                <img class="ctn__bbdi__img" src="../src/img/avatar/img3.png" alt="" width="24px" height="24px">
                                <p class="truncate fs-12px-fw-600">Wendy Bitch</p>
                            </div>
                            <p class="truncate no_wrap fs-12px-fw-400 gray-2nd-color">Interaction 3D Model</p>
                        </div>
                        <div class="ctn__bbd__realtime-price">
                            <iconify-icon class="fs_14px up-price" icon="icon-park-solid:up-one"></iconify-icon>
                            <p class="fs-12px-fw-400 up-price">2%</p>
                        </div>
                    </div>

                    <!-- =========================== -->

                    <div class="ctn-bottom-box-detail">
                        <div class="ctn-bottom-box-detail-info">
                            <p class="fs-12px-fw-400 gray-2nd-color">3</p>
                            <div class="ctn__bbdi__avatar__name">
                                <img class="ctn__bbdi__img" src="../src/img/avatar/img.png" alt="" width="24px" height="24px">
                                <p class="truncate fs-12px-fw-600">Gloria Fade in</p>
                            </div>
                            <p class="truncate no_wrap fs-12px-fw-400 gray-2nd-color">Industrial Product </p>
                        </div>
                        <div class="ctn__bbd__realtime-price">
                            <iconify-icon class="fs_14px up-price" icon="icon-park-solid:up-one"></iconify-icon>
                            <p class="fs-12px-fw-400 up-price">2%</p>
                        </div>
                    </div>

                    <!-- =========================== -->

                    <div class="ctn__bb__slider">
                        <img src="../src/img/svg/dot-blue.svg" alt="" class="ctn__bb__dot">
                        <img src="../src/img/svg/dot-white.svg" alt="" class="ctn__bb__dot">
                    </div>

                </div>


                <!-- =========================== -->


                <div class="ctn-bottom-box">

                    <!-- =========================== -->

                    <div class="ctn-bottom-box-title">
                        <div class="ctn-bottom-box-title-trending">
                            <img src="../src/img/svg/star-top.svg" alt="">
                            <p class="truncate fs-16px-fw-700">Top Community Accounts</p>
                        </div>
                        <div class="ctn-bottom-box-title-more">
                            <p class="fs-12px-fw-700 main-color">More</p>
                            <img src="../src/img/svg/right.svg" alt="">
                        </div>
                    </div>

                    <!-- =========================== -->

                    <div class="ctn__bb__slide">
                        <div class="ctn-bottom-box-detail">
                            <div class="ctn-bottom-box-detail-info">
                                <div class="ctn__bbdi__avatar__name">
                                    <img class="ctn__bbdi__img" src="../src/img/avatar/img.png" alt="" width="24px" height="24px">
                                    <p class="truncate fs-12px-fw-600">Henry, Titanic Jack</p>
                                </div>
                                <iconify-icon class="main-color fs_14px" icon="bxs:badge-check"></iconify-icon>
                                <p class="truncate fs-12px-fw-400 gray-2nd-color">@samwise</p>
                            </div>
                            <div class="ctn__bbd__follow">
                                <div class="xx_small p_right_4px">
                                    <iconify-icon class="fs_16px flex" icon="ic:round-plus"></iconify-icon>
                                </div>
                                <div class="fs-12px-fw-600">
                                    Follow
                                </div>
                            </div>
                        </div>

                        <!-- =========================== -->

                        <div class="ctn-bottom-box-detail">
                            <div class="ctn-bottom-box-detail-info">
                                <div class="ctn__bbdi__avatar__name">
                                    <img class="ctn__bbdi__img" src="../src/img/avatar/img3.png" alt="" width="24px" height="24px">
                                    <p class="truncate fs-12px-fw-600">My heart</p>
                                </div>
                                <iconify-icon class="main-color fs_14px" icon="bxs:badge-check"></iconify-icon>
                                <p class="truncate fs-12px-fw-400 gray-2nd-color">@oliverking</p>
                            </div>
                            <div class="ctn__bbd__follow">
                                <div class="xx_small p_right_4px">
                                    <iconify-icon class="fs_16px flex" icon="ic:round-plus"></iconify-icon>
                                </div>
                                <div class="fs-12px-fw-600">
                                    Follow
                                </div>
                            </div>
                        </div>

                        <!-- =========================== -->

                        <div class="ctn-bottom-box-detail">
                            <div class="ctn-bottom-box-detail-info">
                                <div class="ctn__bbdi__avatar__name">
                                    <img class="ctn__bbdi__img" src="../src/img/avatar/img2.png" alt="" width="24px" height="24px">
                                    <p class="truncate fs-12px-fw-600">Henry, Arthurok</p>
                                </div>
                                <iconify-icon class="main-color fs_14px" icon="bxs:badge-check"></iconify-icon>
                                <p class="truncate fs-12px-fw-400 gray-2nd-color">@sophiagreenok</p>
                            </div>
                            <div class="ctn__bbd__follow">
                                <div class="xx_small p_right_4px">
                                    <iconify-icon class="fs_16px flex" icon="ic:round-plus"></iconify-icon>
                                </div>
                                <div class="fs-12px-fw-600">
                                    Follow
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- =========================== -->

                    <div class="ctn__bb__slider">
                        <img src="../src/img/svg/dot-blue.svg" alt="" class="ctn__bb__dot">
                        <img src="../src/img/svg/dot-white.svg" alt="" class="ctn__bb__dot">
                        <img src="../src/img/svg/dot-white.svg" alt="" class="ctn__bb__dot">
                    </div>

                </div>

                <!-- =========================== -->

                <div class="ctn-bottom-box">

                    <!-- =========================== -->

                    <div class="ctn-bottom-box-title">
                        <div class="ctn-bottom-box-title-fear-greed">
                            <p class="fs-16px-fw-700">Fear & Greed Index</p>
                            <img src="../src/img/svg/info.svg" alt="" width="14px">
                        </div>
                        <div class="ctn-bottom-box-title-more">
                            <p class="fs-12px-fw-700 main-color">More</p>
                            <img src="../src/img/svg/right.svg" alt="">
                        </div>
                    </div>

                    <!-- =========================== -->

                    <div class="ctn__bb__fear__greed">
                        <img class="ctn__bb__fear__greed__svg" src="../src/img/svg/fear-greed.svg" alt="">
                    </div>

                    <!-- =========================== -->

                </div>

                <!-- =========================== -->

            </div>
        </div>

        <div class="ctn__lists">
            <div class="ctn__lists__filter no_wrap scroll_x" draggable="true">
                <div class="ctn__lf__left">
                    <div class="ctn__lfl__cur__categ">
                        <div class="ctn__lflcc__cur">
                            <img src="../src/img/svg/cryptocurrency.svg" alt="">
                            <span class="fs-12px-fw-600 ctn__lflccc__currency">Leslie Alexander</span>
                        </div>
                        <div class="ctn__lflcc__categ">
                            <img src="../src/img/svg/category.svg" alt="">
                            <span class="fs-12px-fw-600 ctn__lflccc__category text-2nd-color">Darrell Steward</span>
                        </div>
                    </div>

                    <div class="ctn__lfl__lineStraight"></div>

                    <div class="ctn__lfl__hot">
                        <div class="ctn__lflh__1">
                            <img src="../src/img/svg/burning-hot.svg" alt="">
                            <span class="fs-12px-fw-600 text-2nd-color">Savannah Nguyen</span>
                        </div>
                        <div class="ctn__lflh__1">
                            <img src="../src/img/svg/burning-hot.svg" alt="">
                            <span class="fs-12px-fw-600 text-2nd-color">Guy Hawkins</span>
                        </div>
                        <div class="ctn__lflh__1">
                            <img src="../src/img/svg/burning-hot.svg" alt="">
                            <span class="fs-12px-fw-600 text-2nd-color">Courtney Henry</span>
                        </div>
                        <div class="ctn__lflh__1">
                            <img src="../src/img/svg/burning-hot.svg" alt="">
                            <span class="fs-12px-fw-600 text-2nd-color">Cody Fisher</span>
                        </div>
                    </div>
                </div>
                <div class="ctn__lf__right">

                    <p class="no_wrap fs-12px-fw-400 ctnlfr_show_rows">Show rows</p>

                    <div class="ctn__showrows">
                        <span class="fs-12px-fw-600">20</span>
                        <img src="../src/img/svg/dropdown-down.svg" alt="">
                    </div>

                    <div class="ctn__lfrsr__btn">
                        <img src="../src/img/svg/filter.svg" alt="">
                        <span class="fs-12px-fw-600">Filters</span>
                    </div>

                    <div class="ctn__lfrsr__btn">
                        <img src="../src/img/svg/customize.svg" alt="">
                        <span class="fs-12px-fw-600">Customize</span>
                    </div>

                    <div class="ctn__lfr__listorsquare">
                        <img class="ctn__lfrls__selected" src="../src/img/svg/three-line.svg" alt="">
                        <img class="ctn__lfrls__square" src="../src/img/svg/four-squares.svg" alt="">
                    </div>
                </div>
            </div>

            <div class="table-wrapper" style="position: relative;">
                <div class="scroll_x no_wrap">
                    <table>
                        <thead>

                            <tr>
                                <th class="ctn__list__th fs-12px-fw-700 fs-12px-fw-700"></th>
                                <th class="ctn__list__th fs-12px-fw-700 ctn__lists__table__td__left">#</th>
                                <th class="ctn__list__th fs-12px-fw-700 ctn__lists__table__td__left tb-fixed">Name</th>
                                <th class="ctn__list__th fs-12px-fw-700 ctn__lists__table__td__right">Price</th>
                                <th class="ctn__list__th fs-12px-fw-700 ctn__lists__table__td__right">1h %</th>
                                <th class="ctn__list__th fs-12px-fw-700 ctn__lists__table__td__right">24h %</th>
                                <th class="ctn__list__th fs-12px-fw-700 ctn__lists__table__td__right">7d %</th>
                                <th class="ctn__lists__table__td__right">
                                    <div class="ctn__list__th__icon">
                                        <span class="fs-12px-fw-700">Market Cap</span>
                                        <img src="../src/img/svg/info-italic.svg" alt="">
                                    </div>
                                </th>
                                <th class="ctn__lists__table__td__right">
                                    <div class="ctn__list__th__icon">
                                        <span class="fs-12px-fw-700">Volume(24h)</span>
                                        <img src="../src/img/svg/info-italic.svg" alt="">
                                    </div>
                                </th>
                                <th class="ctn__lists__table__td__right">
                                    <div class="ctn__list__th__icon">
                                        <span class="fs-12px-fw-700">Circulating Supply</span>
                                        <img src="../src/img/svg/info-italic.svg" alt="">
                                    </div>
                                </th>
                                <th class="ctn__list__th fs-12px-fw-700 ctn__lists__table__td__right">Last 7 Days</th>
                            </tr>

                        </thead>

                        <tbody class="list-coin">
                            <tr>
                                <td class="ctn__list__td__star">
                                    <img src="../src/img/svg/star-stroke.svg" alt="">
                                </td>
                                <td class="ctn__list__td fs-14px-fw-500 fs-12px-fw-700 text-2nd-color">0</td>
                                <td class="ctn__list__td">
                                    <div class="ctn__list__td__info">
                                        <img src="../src/img/avatar/img.png" alt="">
                                        <span class="fs-14px-fw-600">0</span>
                                        <span class="fs-14px-fw-500 gray-2nd-color">0</span>
                                    </div>
                                </td>
                                <td class="ctn__list__td fs-14px-fw-500 ctn__lists__table__td__right">0</td>
                                <td class="ctn__list__td fs-14px-fw-500 ctn__lists__table__td__right">
                                    <div class="ctn__list__td__percentIndex">
                                        <iconify-icon class="fs_14px up-price" icon="icon-park-solid:up-one"></iconify-icon>
                                        <span class="up-price">0</span>
                                    </div>
                                </td>
                                <td class="ctn__list__td fs-14px-fw-500 ctn__lists__table__td__right">
                                    <div class="ctn__list__td__percentIndex">
                                        <iconify-icon class="fs_14px up-price" icon="icon-park-solid:up-one"></iconify-icon>
                                        <span class="up-price">0</span>
                                    </div>
                                </td>
                                <td class="ctn__list__td fs-14px-fw-500 ctn__lists__table__td__right">
                                    <div class="ctn__list__td__percentIndex">
                                        <iconify-icon class="fs_14px up-price" icon="icon-park-solid:up-one"></iconify-icon>
                                        <span class="up-price">0</span>
                                    </div>
                                </td>
                                <td class="ctn__list__td fs-14px-fw-500 ctn__lists__table__td__right">0</td>
                                <td class="ctn__list__td fs-14px-fw-500 ctn__lists__table__td__right">
                                    <div class="ctn__list__td__totalVolume">
                                        <span>0</span>
                                        <span class="text-2nd-color fs-12px-fw-500">360,056 BTC</span>
                                    </div>
                                </td>
                                <td class="ctn__list__td fs-14px-fw-500 ctn__lists__table__td__right">
                                    <span>0</span>
                                    <span>0</span>
                                </td>
                                <td class="ctn__list__td fs-14px-fw-500 ctn__lists__table__td__right">Line chart</td>
                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>

        </div>

        <div class="pages__rows">
            <div class="pr__pages">
                <p class="pr__pages__p fs-12px-fw-400">Showing 1 - 20 out of 9056</p>
                <div class="pages__count__list">
                    <img class="pc__count fs-15px-fw-600 pc__control" src="../src/img/svg/arrow-left.svg" alt="">
                    <div class="pagination" style="display: flex;">
                        <a href="#" class="page pc__count fs-15px-fw-600 main-color text-white radius-6px">1</a>
                        <div class="pc__count fs-15px-fw-600" page="">2</div>
                        <a href="#" class="pc__count fs-15px-fw-600">3</a>
                        <a href="#" class="pc__count fs-15px-fw-600">4</a>
                        <a href="#" class="pc__count fs-15px-fw-600">5</a>
                        <a href="#" class="pc__count fs-15px-fw-600">6</a>
                        <a href="#" class="pc__count fs-15px-fw-600">...</a>
                        <a href="#" class="pc__count fs-15px-fw-600">500</a>
                    </div>
                    <img class="pc__count fs-15px-fw-600 pc__control" src="../src/img/svg/arrow-right.svg" alt="">
                </div>
                <div class="pr">
                    <p class="fs-14px-fw-400 mr_16px">Show rows</p>
                    <div class="pr__dprows color_gray_200_bg radius-6px">
                        <p class="prdpr__p fs-15px-fw-600">20</p>
                        <img src="../src/img/svg/dropdown-down.svg" class="prdpr__dp"></img>
                    </div>
                </div>
            </div>
            <div class="pr__pages__rss d_none">
                <p class="pr__pages__prss fs-12px-fw-400">Showing 1 - 20 out of 9056</p>
                <div class="prrss flex align_center">
                    <p class="fs-14px-fw-400 mr_16px">Show rows</p>
                    <div class="pr__dprows color_gray_200_bg radius-6px">
                        <p class="prdpr__p fs-15px-fw-600">20</p>
                        <img src="../src/img/svg/dropdown-down.svg" class="prdpr__dp"></img>
                    </div>
                </div>
            </div>
            <div class="pr__fd__rm">
                <div class="pr__findout">
                    <p class="text-2nd-color fs-12px-fw-400">Find out how we work by clicking here.</p>
                    <p class="prfo__rm text-2nd-color fs-12px-fw-500">Read More</p>
                </div>
                <div class="border-bottom"></div>
            </div>
        </div>
    </div>

    <div class="bg_color_2 ctn__newsletter">
        <div class="ctn__newsletter__bg">
            <div class="ctnn__title__btn">
                <div class="ctnn__title">
                    <div class="ctnnt__top">
                        <div class="ctnnt__top__title fs-32px-fw-700">Stay on top of crypto.All the time, any time.</div>
                    </div>
                    <div class="ctnnt__top__detail fs-14px-fw-400 gray-2nd-color">Please keep me updated by email with the latest crypto news, research findings, reward programs, event updates, coin listings and more information from MarketPlaceAsset.</div>
                </div>

                <input type="text" class="ctnn__input fs-16px-fw-600 radius-6px" placeholder="Enter your e-mail address">
                <div class="ctnnbtn">
                    <div class="ctnn__btn fs-16px-fw-600 main-color-bg text-white radius-6px">
                        Subscribe now
                    </div>
                </div>
            </div>
            <div class="ctnn_backg">
                <img src="../src/img/svg/newsletterbg.svg" alt="" class="ctnn__bg">
            </div>
        </div>
    </div>

    <!-- End container  -->

    <!-- start footer  -->
    <div class="footer">
        <?php include "./component/footer.php" ?>
    </div>
    <!-- end footer  -->

    <script src="../src/js/app.js"></script>
    <script src="../src/js/data.js"></script>
</body>

</html>