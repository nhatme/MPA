<div class="container_orders border-left border-right border-bottom">
    <div class="flex_sp_bt align_center mb_32px">
        <div class="flex align_center">
            <a href="?mod=order&act=orders" class="fs-14px-fw-600 pointer p_8px">
                Open Orders
                <span>( <?= count($resultOrders) ?> )</span>
            </a>
            <a href="?mod=order&act=funds" style="margin-left: 16px;" class="fs-14px-fw-600 pointer p_8px">Funds</a>
        </div>
        <a href="?mod=order&act=transaction_history" class="flex p_8px fs-14px-fw-600 flex align_center">
            <span>( <?= count($resultTransHistory) ?> )</span>
            <iconify-icon class="fs_24px" icon="ic:round-history"></iconify-icon>
        </a>
    </div>
    <div class="portfolio_main" style="max-height: 500px; overflow-x: scroll;">
        <div class="portfolio_transaction flex f_column" style="margin: 26px 0;">
            <div class="p_16px_0px border-bottom">
                <div style="width: 100%;" class="flex">
                    <div style="width: 14.28%" class="second-color-body fs-14px-fw-600">Time</div>
                    <div style="width: 14.28%; text-align: center;" class="second-color-body fs-14px-fw-600">Symbol</div>
                    <div style="width: 14.28%" class="second-color-body fs-14px-fw-600">Status</div>
                    <div style="width: 14.28%" class="second-color-body fs-14px-fw-600">Amount</div>
                    <div style="width: 14.28%" class="second-color-body fs-14px-fw-600">Price</div>
                    <div style="width: 14.28%" class="second-color-body fs-14px-fw-600">Type</div>
                    <div style="width: 14.28%; text-align: center;" class="second-color-body fs-14px-fw-600">Cancel</div>
                </div>
            </div>
            <?php

            foreach ($resultOrders as $key => $value) {
                $idCrypto = $coin->getDetailCoin($value["id_crypto"]);
            ?>
                <div class="p_16px_0px border-bottom">
                    <div style="width: 100%;" class="flex">
                        <div style="width: 14.28%" class="fs-12px-fw-600"><?= $value["created_at"] ?></div>
                        <div style="width: 14.28%; text-align: center;" class="fs-12px-fw-600"><?= $idCrypto["symbol"] ?></div>
                        <div style="width: 14.28%; <?php switch ($value["status"]) {
                                                        case "Pending":
                                                            echo "color: orange";
                                                            break;
                                                        case "Confirmed":
                                                            echo "color: green";
                                                            break;
                                                        case "Cancelled":
                                                            echo "color: gray";
                                                            break;
                                                    } ?>" class="fs-12px-fw-600"><?= $value["status"] ?></div>
                        <div style="width: 14.28%" class="fs-12px-fw-600"><?= number_format($value["amount"], 2) ?></div>
                        <div style="width: 14.28%" class="fs-12px-fw-600">$ <?= number_format(($idCrypto["price"]) * ($value["amount"]), 2) ?></div>
                        <div style="width: 14.28%" class="fs-12px-fw-600"><?= $value["type"] ?></div>
                        <form action="" method="post">
                            <div style="width: 14.28%; text-align: center;" class=""><?php if ($value["status"] == "Pending") {
                                                                                            $idTable = $value['id'];
                                                                                            $html = <<< STR
                                                                                                            <input class="pointer" type="submit" value="X" name="submitCancel[$idTable]">
                                                                                                STR;
                                                                                            echo $html;
                                                                                        } else {
                                                                                            echo '<input class="pointer" style="background-color: green; color: white;" type="submit" value="OKE" name="" disabled>';
                                                                                        } ?></div>
                        </form>
                    </div>
                </div>
            <?php
                if (isset($_POST["submitCancel"][$value['id']])) {
                    $openOrder->canceledOrder($value["id"], $_SESSION["id"]);
                    $openOrder->transHistory($_SESSION["id"]);
                }
            }
            ?>
        </div>
    </div>
</div>