import mysql from 'mysql'

let conn = mysql.createConnection({
    host: 'localhost:3308',
    user: 'root',
    password: 'Nhatp@20',
    database: "mpa_db"
})

conn.connect(function (err) {
    if (err) throw err
        console.log("connected");
})

