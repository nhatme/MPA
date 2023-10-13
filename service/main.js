import express from "express"
import productRoutes from './api/routes/products.js'
import orderRoutes from './api/routes/products.js'
// import bodyParser from "body-parser"
import morgan from "morgan"



const app = express()

app.use(morgan('dev'))
// app.use(bodyParser.urlencoded({extended: false}))
// app.use(bodyParser.json())


app.use('/products', productRoutes)
app.use('/orders', orderRoutes)


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