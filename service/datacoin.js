import axios from "axios";

let res = null;

const getLastest = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?limit=20'
const getLogo = 'https://pro-api.coinmarketcap.com/v2/cryptocurrency/info'


function getData(endPoint, param) {
    return new Promise(async (resolve, reject) => {
        try {
            res = await axios.get(endPoint + `${param}`, {
                headers: {
                    'X-CMC_PRO_API_KEY': '4f10050d-6940-42fd-86ff-8bd8ed6b0306',
                },
            });
        } catch (ex) {
            res = null;
            // error
            // console.log(ex);
            reject(ex);
        }
        if (res) {
            // success
            const json = res.data.data;
            // console.log("okokok", json.data)
            for (const key in json) {
                idCoin.push(json[key].id)
            }

            // console.log(`?id=${idCoin.join(",")}`)
            // console.log( idCoin.join(","))
            resolve(idCoin.join(","))

            // console.log(json);
            // resolve(json);
        }
    })
}

function getLogoFunc(endPoint, param) {
    new Promise(async (resolve, reject) => {
        try {
            res = await axios.get(endPoint + `${param}`, {
                headers: {
                    'X-CMC_PRO_API_KEY': '4f10050d-6940-42fd-86ff-8bd8ed6b0306',
                },
            });
        } catch (ex) {
            res = null;
            // error
            // console.log(ex);
            reject(ex);
        }
        if (res) {
            // success
            const json = res.data.data;
            // console.log("okokok", json.data)
            for (const key in json) {
                console.log(json)
            }
            // console.log(json);
            // resolve(json);
        }
    })
}


// get logo, slug,... 

// getLogoFunc(getLogo, `?id=${getData(getLastest, "")}`)
// getLogoFunc(getLogo, `?id=1,1027,825,1839,52,5426,3408,2010,74,1958`)

// let arrid20 = [1,1027,825,1839,52,5426,3408,2010,74,1958,11419,1975,5805,3890,6636,3717,4943,2,5994,1831]

// let arrId = [1,1027,825,1839,52,5426,3408,2010,74,1958,11419,1975,5805,3890,6636,3717,4943,2,5994,1831,3957,7083,3897,3794,512,2563,328,20396,1321,3635,8000,2280,4642,21794,8916,4157,6535,4687,10603,11840,3077,4195,27075,1518,7278,6719,7226,11841,5690,3155,6892,4030,2586,2416,4558,3602,22861,4847,6783,3513,6210,2011,1966,1376,11092,1765,2087,19891,4846,2634,4256,26081,7080,8646,11156,7186,2943,10791,4066,6953,18876,1720,20947,6538,23121,7334,1659,5632,1785,5176,2502,25028,5964,11857,1437,7653,24478,4705,3330,16086]
// getLogoFunc(getLogo, `?id=${arrid20.join(',')}`)
// getLogoFunc(getLogo, `?id=${getData(getLastest, "")}`)


// get id 
getData(getLastest, "")

    .then(data => {
        getLogoFunc(getLogo, `?id=${data}`)
    })


