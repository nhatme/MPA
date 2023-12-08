<div class="container_funds border-left border-right border-bottom">
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
    <div class="portfolio_main">
        <div class="portfolio_transaction flex f_column" style="margin: 26px 0;">
            <div class="p_16px_0px border-bottom">
                <div style="width: 100%; height: 26px;" class="flex">
                    <div style="width: 14.28%" class="second-color-body fs-14px-fw-600">Current Assets</div>
                </div>
            </div>
            <div class="p_16px_0px border-bottom pointer">
                <div style="width: 100%;" class="flex_sp_bt p_16px_0px">
                    <div>
                        <div style="width: 14.28%" class="fs-12px-fw-600 flex g_16px">
                            <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" alt="" style="border-radius: 50px; width: 30px; height: 30px;">
                            <div>
                                <p>ETH</p>
                                <p class="second-color-body">Ethereum</p>
                            </div>
                        </div>
                    </div>
                    <div class="fs-12px-fw-600">
                        <p>6.2</p>
                        <p class="second-color-body">$13,021.67</p>
                    </div>
                </div>
                <div style="width: 100%;" class="flex_sp_bt p_16px_0px">
                    <div>
                        <div style="width: 14.28%" class="fs-12px-fw-600 flex g_16px">
                            <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" alt="" style="border-radius: 50px; width: 30px; height: 30px;">
                            <div>
                                <p>ETH</p>
                                <p class="second-color-body">Ethereum</p>
                            </div>
                        </div>
                    </div>
                    <div class="fs-12px-fw-600">
                        <p>6.2</p>
                        <p class="second-color-body">$13,021.67</p>
                    </div>
                </div>
                <div style="width: 100%;" class="flex_sp_bt p_16px_0px">
                    <div>
                        <div style="width: 14.28%" class="fs-12px-fw-600 flex g_16px">
                            <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png" alt="" style="border-radius: 50px; width: 30px; height: 30px;">
                            <div>
                                <p>ETH</p>
                                <p>Ethereum</p>
                            </div>
                        </div>
                    </div>
                    <div class="fs-12px-fw-600">
                        <p>6.2</p>
                        <p class="second-color-body">$13,021.67</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>