<div class="container_category">
    <thead>

        <tr>
            <th class="ctn__list__th fs-12px-fw-700"></th>
            <th class="ctn__list__th fs-12px-fw-700 ctn__lists__table__td__left">#</th>
            <th class="ctn__list__th fs-12px-fw-700 ctn__lists__table__td__left tb-fixed">Name</th>
            <th class="ctn__list__th fs-12px-fw-700 ctn__lists__table__td__right">Price</th>
            <th class="ctn__list__th fs-12px-fw-700 ctn__lists__table__td__right">1h %</th>
            <th class="ctn__list__th fs-12px-fw-700 ctn__lists__table__td__right">24h %</th>
            <th class="ctn__list__th fs-12px-fw-700 ctn__lists__table__td__right">7d %</th>
            <th class="ctn__lists__table__td__right">
                <div class="ctn__list__th__icon">
                    <span class="fs-12px-fw-700">Market Cap</span>
                    <img src="./view/src/img/svg/info-italic.svg" alt="">
                </div>
            </th>
            <th class="ctn__lists__table__td__right">
                <div class="ctn__list__th__icon">
                    <span class="fs-12px-fw-700">Volume(24h)</span>
                    <img src="./view/src/img/svg/info-italic.svg" alt="">
                </div>
            </th>
            <th class="ctn__lists__table__td__right">
                <div class="ctn__list__th__icon">
                    <span class="fs-12px-fw-700">Circulating Supply</span>
                    <img src="./view/src/img/svg/info-italic.svg" alt="">
                </div>
            </th>
            <th class="ctn__list__th fs-12px-fw-700 ctn__lists__table__td__right">Last 7 Days</th>
        </tr>

    </thead>
    <tbody>
        <!-- render list -->

        <tr onclick="window.location='?mod=page-detail&id=<?= $value->getId() ?>';" class="list-coin-detail" style="cursor: pointer;">

            <td class="ctn__list__td__star">
                <img src="./view/src/img/svg/star-stroke.svg" alt="">
            </td>
            <td class="ctn__list__td fs-14px-fw-600 fs-12px-fw-700 text-2nd-color"><?= $value->getRank() ?></td>
            <td class="ctn__list__td">
                <div>
                    <div class="ctn__list__td__info">
                        <img style="border-radius: 50px;" src="<?= $value->getLogo() ? $value->getLogo() : "https://s2.coinmarketcap.com/static/img/coins/64x64/" . $value->getId() . '.png' ?>" alt="">
                        <span class="fs-14px-fw-600 no_wrap"><?= $value->getName(); ?></span>
                        <span class="fs-14px-fw-600 gray-2nd-color"><?= $value->getSymbol(); ?></span>
                    </div>



                    <div class="flex_sp_bt align_center p_8px_16px color_gray_200_bg radius-8px pointer mt_12px">
                        <div class="flex align_center g_8px">
                            <iconify-icon class="fs_16px flex gray-2nd-color" icon="lets-icons:order"></iconify-icon>
                            <span class="fs-12px-fw-700 gray-2nd-color">Add to Order</span>
                        </div>
                        <iconify-icon class="fs_16px gray-2nd-color" icon="ic:round-plus"></iconify-icon>
                    </div>

                </div>
            </td>
            <td class="ctn__list__td fs-14px-fw-600 ctn__lists__table__td__right">$<?= number_format($value->getPrice(), 2) ?></td>
            <td class="ctn__list__td fs-14px-fw-600 ctn__lists__table__td__right">
                <div class="ctn__list__td__percentIndex">
                    <?php
                    if ((float)($value->getchange_1h()) < 0) {
                    ?>
                        <iconify-icon class="fs_14px down-price" icon="icon-park-solid:down-one"></iconify-icon>
                        <span class="down-price"><?= number_format($value->getchange_1h(), 2); ?>%</span>
                    <?php
                    } else {
                    ?>
                        <iconify-icon class="fs_14px up-price" icon="icon-park-solid:up-one"></iconify-icon>
                        <span class="up-price"><?= number_format($value->getchange_1h(), 2); ?>%</span>
                    <?php
                    }; ?>
                </div>
            </td>
            <td class="ctn__list__td fs-14px-fw-600 ctn__lists__table__td__right">
                <div class="ctn__list__td__percentIndex">
                    <?php
                    if ((float)($value->getchange_24h()) < 0) {
                    ?>
                        <iconify-icon class="fs_14px down-price" icon="icon-park-solid:down-one"></iconify-icon>
                        <span class="down-price"><?= number_format($value->getchange_24h(), 2); ?>%</span>
                    <?php
                    } else {
                    ?>
                        <iconify-icon class="fs_14px up-price" icon="icon-park-solid:up-one"></iconify-icon>
                        <span class="up-price"><?= number_format($value->getchange_24h(), 2); ?>%</span>
                    <?php
                    }; ?>
                    </span>
                </div>
            </td>
            <td class="ctn__list__td fs-14px-fw-600 ctn__lists__table__td__right">
                <div class="ctn__list__td__percentIndex">
                    <?php
                    if ((float)($value->getchange_7d()) < 0) {
                    ?>
                        <iconify-icon class="fs_14px down-price" icon="icon-park-solid:down-one"></iconify-icon>
                        <span class="down-price"><?= number_format($value->getchange_7d(), 2); ?>%</span>
                    <?php
                    } else {
                    ?>
                        <iconify-icon class="fs_14px up-price" icon="icon-park-solid:up-one"></iconify-icon>
                        <span class="up-price fm-price"><?= number_format($value->getchange_7d(), 2) ?></span>
                    <?php
                    }; ?>
                    </span>
                </div>
            </td>
            <td class="ctn__list__td fs-14px-fw-600 ctn__lists__table__td__right"><?= number_format($value->getmarket_cap()); ?></td>
            <td class="ctn__list__td fs-14px-fw-600 ctn__lists__table__td__right">
                <div class="ctn__list__td__totalVolume">
                    <span><?= number_format($value->getvolume_24h()); ?></span>
                </div>
            </td>
            <td class="ctn__list__td fs-14px-fw-600 ctn__lists__table__td__right">
                <div class="flex f_column">
                    <div>
                        <span class="m_inline_end_4px"><?= number_format($value->getcirculating_supply()); ?></span><span><?= ($value->getSymbol()); ?></span>
                    </div>
                    <span class="gray-2nd-color"><?= number_format($value->getmax_supply()); ?></span>
                </div>
            </td>
            <td class="ctn__list__td fs-14px-fw-600 ctn__lists__table__td__right no_wrap">Line chart</td>

        </tr>


        <!-- asd -->


    </tbody>


</div>