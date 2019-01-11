const mysql = require('mysql');
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'Steaua86',
  database: 'proiectsincretic'
});
connection.connect((err) => {
  if (err) throw err;
  console.log('Connected!');
});
