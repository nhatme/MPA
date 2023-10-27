import express from "express"
import request from "request"
const router = express.Router()

const api_key = "4f10050d-6940-42fd-86ff-8bd8ed6b0306"
const url = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest"

router.get('', (req, res, next) => {

    // 
    const page = req.query?.page || 1
    const limit = req.query?.limit || 20
    request.get({
        url: url + `?start=${(+page - 1) * limit + 1}&limit=${limit}`,
        json: true,
        headers: {
            "X-CMC_PRO_API_KEY": api_key
        }
    }, (error, response, data) => {
        if (error) {
            return res.send({
                error: error
            })
        }

        res.send(data)
    })
})
export default router;
