<head>
    <link rel="stylesheet" href="addNewProduct.css">
    <link rel="stylesheet" href="../css/my-style.css">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</head>

<div class="container border_main p_32px radius-8px">
    <h3 class="mb_32px">Add new product</h3>


    <div class="flex align_center mb_16px">
        <div>
            <label class="mr_16px fs-14px-fw-600" for="">ID</label>
            <input class="input pointer mr_16px" type="submit" value="Generate">
        </div>
        <div class="id-generate">#123456</div>
    </div>

    <div class="flex g_32px">


        <div class="flex f_column g_32px w_50pc">
            <div class="flex f_column g_8px">
                <label class="fs-14px-fw-600" for="">Name</label>
                <input class="input" type="text" placeholder="Bitcoin" spellcheck="false">
            </div>
            <div class="flex f_column g_8px">
                <label class="fs-14px-fw-600" for="">Symbol</label>
                <input class="input" type="text" placeholder="BTC" spellcheck="false">
            </div>
            <div class="flex f_column g_8px">
                <label class="fs-14px-fw-600" for="">Image</label>
                <input class="input" type="file" placeholder="" spellcheck="false">
            </div>
        </div>



        <div class="flex f_column g_32px w_50pc">
            <div class="flex f_column g_8px">
                <label class="fs-14px-fw-600" for="">Price</label>
                <input class="input" type="text" placeholder="$10.000" spellcheck="false">
            </div>
            <div class="flex f_column g_8px">
                <label class="fs-14px-fw-600" for="">Market Cap</label>
                <input class="input" type="text" placeholder="$721.000.000.000" spellcheck="false">
            </div>
            <div class="flex f_column g_8px">
                <label class="fs-14px-fw-600" for="">Circulating Supply</label>
                <input class="input" type="text" placeholder="21.000.000" spellcheck="false">
            </div>
        </div>

    </div>

    <div class="flex g_16px">
        <button class="mt_32px fs-14px-fw-600" name="Add">Add</button>
        <button class="mt_32px fs-14px-fw-600" name="Back">Back</button>
    </div>

</div>