let currentPage = 1
let limit = 5

function getAPI(page = 1, limit) {
    $(".list-coin").html("loading")
    $.ajax({
        url: `http://localhost:3000/getlistcoin?page=${page}&limit=${limit}`,
        success: function (data) {
            if (data.data) {
                renderListCoin(data.data)
                renderPage(data.status.total_count)
            }
        }
    })

}

getAPI(currentPage, limit)
// render list coin
function renderListCoin(data) {
    // console.log(data)
    const html = data.map((item, index) => {
        return `
                <tr>
                    <td class="ctn__list__td__star">
                        <img src="../src/img/svg/star-stroke.svg" alt="">
                    </td>
                    <td class="ctn__list__td fs-14px-fw-500 fs-12px-fw-700 text-2nd-color">${index + 1}</td>
                    <td class="ctn__list__td">
                        <div class="ctn__list__td__info">
                            <img src="../src/img/avatar/img.png" alt="">
                            <span class="fs-14px-fw-600">${item.name}</span>
                            <span class="fs-14px-fw-500 gray-2nd-color">${item.symbol}</span>
                        </div>
                    </td>
                    <td class="ctn__list__td fs-14px-fw-500 ctn__lists__table__td__right">$${item.quote.USD.price.toFixed(8)}</td>
                    <td class="ctn__list__td fs-14px-fw-500 ctn__lists__table__td__right">
                        <div class="ctn__list__td__percentIndex">
                            <img src="../src/img/svg/up-price.svg" alt="">
                            <span class="up-price">${item.quote.USD.percent_change_1h.toFixed(2)}%</span>
                        </div>
                    </td>
                    <td class="ctn__list__td fs-14px-fw-500 ctn__lists__table__td__right">
                        <div class="ctn__list__td__percentIndex">
                            <img src="../src/img/svg/up-price.svg" alt="">
                            <span class="up-price">${item.quote.USD.percent_change_24h.toFixed(2)}</span>
                        </div>
                    </td>
                    <td class="ctn__list__td fs-14px-fw-500 ctn__lists__table__td__right">
                        <div class="ctn__list__td__percentIndex">
                            <img src="../src/img/svg/up-price.svg" alt="">
                            <span class="up-price">${item.quote.USD.percent_change_7d.toFixed(2)}</span>
                        </div>
                    </td>
                    <td class="ctn__list__td fs-14px-fw-500 ctn__lists__table__td__right">$${item.quote.USD.market_cap.toFixed(2)}</td>
                    <td class="ctn__list__td fs-14px-fw-500 ctn__lists__table__td__right">
                        <div class="ctn__list__td__totalVolume">
                            <span>$${item.quote.USD.volume_24h.toFixed(2)}</span>
                            <span class="text-2nd-color fs-12px-fw-500">360,056 BTC</span>
                        </div>
                    </td>
                    <td class="ctn__list__td fs-14px-fw-500 ctn__lists__table__td__right">
                        <span>${item.circulating_supply}</span>
                        <span>${item.symbol}</span>
                    </td>
                    <td class="ctn__list__td fs-14px-fw-500 ctn__lists__table__td__right">Line chart</td>
                </tr>
                `
    }).join("")
    $(".list-coin").html(html)
}
function renderPage(total) {
    const totalPage = Math.round(total / 20)
    let html = ""
    for (var i = 1; i <= 6; i++) {

        console.log(currentPage)
        if (currentPage == i) {
            html += `<div class="page-item pc__count main-color fs-15px-fw-600" page="${i}">${i}</div>`

        } else {

            html += `<div  class="page-item pc__count fs-15px-fw-600" page="${i}">${i}</div>`
        }
    }
    html += '<div class="pc__count fs-15px-fw-600 " page="">...</div>'
    html += `<div class="page-item pc__count fs-15px-fw-600" page="">${totalPage}</div>`
    $(".pagination").html(html)

    $(".page-item").click(function () {
        currentPage = $(this).attr("page")
        getAPI(currentPage, limit)

    })

}