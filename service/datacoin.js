import axios from "axios";

let res = null;
new Promise(async (resolve, reject) => {
    try {
        res = await axios.get('https://pro-api.coinmarketcap.com/v2/cryptocurrency/info?id=1,2,3', {
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
            console.log(json[key]["tags"])
        }
        // console.log(json);
        // resolve(json);
    }
})