import express from "express"
import productRoutes from './api/routes/products.js'
import orderRoutes from './api/routes/orders.js'
import dataprice from './api/routes/getdataprice.js'
import cors from "cors"
import morgan from "morgan"


const app = express()
app.use(cors())
app.use(morgan('dev'))

app.use('/products', productRoutes)
app.use('/orders', orderRoutes)
app.use('/getlistcoin', dataprice)

app.use((req, res, next) => {
    const error = new Error('Not found')
    error.status = 404
    next(error)
})

app.use((error, req, res, next) => {
    res.status(error.status || 500)
    res.json({
        error: {
            message: error.message
        }
    })
})

export default app