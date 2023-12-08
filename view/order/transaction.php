<div class="container_transaction border-left border-right border-bottom">
    <div class="flex_sp_bt align_center mb_32px">
        <div class="flex align_center">
            <a href="?mod=order&act=orders" class="fs-14px-fw-600 pointer p_8px">
                Open Orders
                <span>( <?= count($resultUser) ?> )</span>
            </a>
            <a href="?mod=order&act=funds" style="margin-left: 16px;" class="fs-14px-fw-600 pointer p_8px">Funds</a>
        </div>
        <a href="?mod=order&act=transaction_history" class="flex p_8px">
            <iconify-icon class="fs_24px" icon="ic:round-history"></iconify-icon>
        </a>
    </div>
    <div class="portfolio_main">
        <div class="portfolio_transaction flex f_column" style="margin: 26px 0;">
            <div class="p_16px_0px border-bottom">
                <div style="width: 100%;" class="flex">
                    <div style="width: 14.28%" class="second-color-body fs-14px-fw-600">Time</div>
                    <div style="width: 14.28%; text-align: center;" class="second-color-body fs-14px-fw-600">Symbol</div>
                    <div style="width: 14.28%" class="second-color-body fs-14px-fw-600">Status</div>
                    <div style="width: 14.28%" class="second-color-body fs-14px-fw-600">Amount</div>
                    <div style="width: 14.28%" class="second-color-body fs-14px-fw-600">Price</div>
                    <div style="width: 14.28%" class="second-color-body fs-14px-fw-600">Type</div>
                    <div style="width: 14.28%; text-align: center;" class="second-color-body fs-14px-fw-600">Archive</div>
                </div>
            </div>
            <?php
            if (!empty($resultUser)) {

                foreach ($resultUser as $key => $value) {
                    $idCrypto = $coin->getDetailCoin($value["id_crypto"]);
            ?>
                    <div class="p_16px_0px border-bottom pointer">
                        <div style="width: 100%;" class="flex align_center">
                            <div style="width: 14.28%" class="fs-12px-fw-600"><?= $value["created_at"] ?></div>
                            <div style="width: 14.28%; text-align: center;" class="fs-12px-fw-600"><?= $idCrypto["symbol"] ?></div>
                            <div style="width: 14.28%" class="fs-12px-fw-600"><?php if ($value["isCancel"] == 1) {
                                                                                    echo "<span style='color: red;'>Cancelled</span>";
                                                                                } else if ($value["isCancel"] == 2) {
                                                                                    echo "<span style='color: green;'>Confirmed</span>";
                                                                                } ?></div>
                            <div style="width: 14.28%" class="fs-12px-fw-600"><?= $value["amount"] ?></div>
                            <div style="width: 14.28%" class="fs-12px-fw-600">$ <?= number_format(($idCrypto["price"]) * ($value["amount"]), 2) ?></div>
                            <div style="width: 14.28%" class="fs-12px-fw-600">Buy</div>
                            <div style="width: 14.28%; text-align: center;" class=""><iconify-icon class="fs_24px" icon="material-symbols-light:archive"></iconify-icon></div>
                        </div>
                    </div>
            <?php }
            } else {
                echo "<p style='font-weight: bold; text-align: center; margin-top: 24px'>Empty...</p>";
            } ?>
        </div>
    </div>
</div>