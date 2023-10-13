import express from "express"

const router = express.Router()

router.get('/', (req, res, next) => {
    res.status(200).json({
        message: "Handling GET requests to /products"
    })
})

router.post('/:productId', (req, res, next) => {
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
        message: 'Deleted product'
    })
})

export default router