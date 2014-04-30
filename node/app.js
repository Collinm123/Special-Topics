
var mysql = require('mysql');
var express = require('express');
var app = express();
var config = require('./modules/config');

app.engine('.html', require('ejs').__express)

app.configure(function(){
	app.set('views', __dirname + '/views');
	app.set('view engine', 'html');
	app.set(express.static(__dirname + '/public'));
});

app.get('/', function(req, res) {
	res.render('hello', {
		name: 'Collin'
	});
});

app.get('/artists/search', function(req, res){
	res.render('artist-search');
});

app.get('/artists', function(req, res){
	var connection = mysql.createConnection(config);

	var sql = "SELECT * FROM artists";
	connection.query(sql, ['%' + req.query.artist + '%'] ,function(err, rows) {
		console.log(rows);
		res.render('artists', {
			artists: rows,
			searchTerm: req.query.artist
		});
	});
});


app.listen(3000);
console.log('Express app started on port %d', 3000);