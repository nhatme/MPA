import app from './main.js'
const port = process.env.PORT || 3000

app.listen(port, () => {
    console.log(`We're running on ${port} `)
})