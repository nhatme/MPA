import express from "express"

const router = express.Router()

const api_key = '4f10050d-6940-42fd-86ff-8bd8ed6b0306'
const endPoint = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest'
const headers = 'X-CMC_PRO_API_KEY'

const url = `${endPoint}?limit=5&${headers}=${api_key}`


router.get('/', (req, res, next) => {
    res.status(200).json({
        message: "Handling GET requests to /products"
    })

})

router.post('/', (req, res, next) => {
    res.status(200).json({
        message: "Handling POST requests to /products"
    })
})

router.get('/:productId', (req, res, next) => {
    const id = req.params.productId
    if (id === 'special') {
        res.status(200).json({
            message: 'You discovered the special ID',
            orderId: req.params.productId
        })
    } else {
        res.status(200).json({
            message: 'You passed an ID'
        })
    }
})

router.patch('/:productId', (req, res, next) => {
    res.status(200).json({
        message: 'Updated product!'
    })
})

router.delete('/:productId', (req, res, next) => {
    res.status(200).json({
        message: 'Deleted product',
        orderId: req.params.productId
    })
})

export default router