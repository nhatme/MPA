<div class="container_category">
    <div class="ctn__lists">

        <div class="ctn__lists__filter no_wrap scroll_x" draggable="true">
            <div class="ctn__lf__left">
                <div class="ctn__lfl__cur__categ ctn__lflcc__categ">
                    <div class="ctn__lflcc__cur ">
                        <iconify-icon icon="material-symbols:lists-rounded"></iconify-icon>
                        <a href="?mod=page&act=home" class="fs-12px-fw-600 ctn__lflccc__currency">Cryptocurrencies</a>
                    </div>
                    <div class="ctn__lflcc__cur active">
                        <iconify-icon class="main-color" icon="carbon:category"></iconify-icon>
                        <a href="?mod=category&act=list-category" class="fs-12px-fw-600 ctn__lflccc__category text-2nd-color">Categories</a>
                    </div>
                </div>

                <div class="ctn__lfl__lineStraight"></div>

                <div class="ctn__lfl__hot">
                    <div class="ctn__lflh__1">
                        <img src="./view/src/img/svg/burning-hot.svg" alt="">
                        <span class="fs-12px-fw-600 text-2nd-color">Savannah Nguyen</span>
                    </div>
                    <div class="ctn__lflh__1">
                        <img src="./view/src/img/svg/burning-hot.svg" alt="">
                        <span class="fs-12px-fw-600 text-2nd-color">Guy Hawkins</span>
                    </div>
                    <div class="ctn__lflh__1">
                        <img src="./view/src/img/svg/burning-hot.svg" alt="">
                        <span class="fs-12px-fw-600 text-2nd-color">Courtney Henry</span>
                    </div>
                    <div class="ctn__lflh__1">
                        <img src="./view/src/img/svg/burning-hot.svg" alt="">
                        <span class="fs-12px-fw-600 text-2nd-color">Cody Fisher</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="table-wrapper" style="position: relative;">
            <div class="scroll_x no_wrap">
                <table>
                    <thead>

                        <tr>
                            <th class="ctn__list__th fs-12px-fw-700 ctn__lists__table__td__left">#</th>
                            <th class="ctn__list__th fs-12px-fw-700 ctn__lists__table__td__left tb-fixed">Name</th>
                            <th class="ctn__list__th fs-12px-fw-700 ctn__lists__table__td__right">Avg.Price Change</th>

                            <th class="ctn__lists__table__td__right">
                                <div class="ctn__list__th__icon">
                                    <span class="fs-12px-fw-700">Market Cap</span>
                                    <img src="./view/src/img/svg/info-italic.svg" alt="">
                                </div>
                            </th>
                            <th class="ctn__lists__table__td__right">
                                <div class="ctn__list__th__icon">
                                    <span class="fs-12px-fw-700">Volume</span>
                                    <img src="./view/src/img/svg/info-italic.svg" alt="">
                                </div>
                            </th>

                        </tr>

                    </thead>
                    <tbody class="list-categories">
                        <!-- render list -->
                        <?php
                        foreach ($result as $key => $value) {
                        ?>
                            <tr class="pointer" onclick="window.location='?mod=page&act=home&categoryid=<?= $value['id'] ?>'">
                                <th class="ctn__list__th fs-14px-fw-600 ctn__lists__table__td__left"><?= $key + 1 ?></th>
                                <th class="ctn__list__th fs-14px-fw-600 ctn__lists__table__td__left tb-fixed"><?= $value["name"] ?></th>

                                <th class="ctn__list__th fs-14px-fw-600 ctn__lists__table__td__right">
                                    <?php
                                    if ((float)($value["avg_price_change"]) < 0) {
                                    ?>
                                        <iconify-icon class="fs_14px down-price" icon="icon-park-solid:down-one"></iconify-icon>
                                        <span class="down-price"><?= number_format($value["avg_price_change"], 2) ?>%</span>
                                    <?php
                                    } else {
                                    ?>
                                        <iconify-icon class="fs_14px up-price" icon="icon-park-solid:up-one"></iconify-icon>
                                        <span class="up-price"><?= number_format($value["avg_price_change"], 2) ?>%</span>
                                    <?php
                                    }; ?>
                                </th>

                                <th class="ctn__lists__table__td__right" style="display: flex; justify-content: end;">
                                    <div class="ctn__list__th__icon flex f_column">
                                        <span class="fs-14px-fw-600">$<?= number_format($value["market_cap"]) ?></span>
                                        <div class="fs-14px-fw-600">

                                            <?php
                                            if ((float)($value["market_cap_change"]) < 0) {
                                            ?>
                                                <iconify-icon class="fs_14px down-price" icon="icon-park-solid:down-one"></iconify-icon>
                                                <span class="down-price"><?= number_format($value["market_cap_change"], 2) ?>%</span>
                                            <?php
                                            } else {
                                            ?>
                                                <iconify-icon class="fs_14px up-price" icon="icon-park-solid:up-one"></iconify-icon>
                                                <span class="up-price"><?= number_format($value["market_cap_change"], 2) ?>%</span>
                                            <?php
                                            }; ?>
                                        </div>
                                    </div>
                                </th>

                                <th class="ctn__lists__table__td__right">
                                    <div class="ctn__list__th__icon">
                                        <span class="fs-14px-fw-600">$<?= number_format($value["volume"]) ?></span>
                                    </div>
                                </th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>