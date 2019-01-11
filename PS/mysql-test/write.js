const mysql = require('mysql');
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'Steaua86',
  database: 'proiectsincretic'
});

connection.connect((err) => {
  if (err) throw err;
  console.log('Connected');
});


const medic = { cnp_medic: '1860119250060', nume_medic: 'Radu', prenume_medic: 'Iulian', zin_medic: '19', lunan_medic: '01', ann_medic: '1096' };
connection.query('INSERT INTO medici SET ?', medic, (err, res) => {
  if(err) throw err;

  console.log('Last insert ID:', res.insertId);
});
