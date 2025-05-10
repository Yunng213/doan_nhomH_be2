const express = require('express');
const sqlite3 = require('sqlite3').verbose();
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
const db = new sqlite3.Database(':memory:');
app.use(cors({
    origin: 'http://127.0.0.1:8000' 
}));
app.use(bodyParser.json());

db.run(`
    CREATE TABLE reviews (
        id INTEGER PRIMARY KEY,
        product_name TEXT,
        rating INTEGER,
        review_text TEXT
    )
`);

app.post('/submit-review', (req, res) => {
    const { product_name, rating, review_text } = req.body;

    const stmt = db.prepare('INSERT INTO reviews (product_name, rating, review_text) VALUES (?, ?, ?)');
    stmt.run(product_name, rating, review_text, function(err) {
        if (err) {
            res.status(500).json({ error: err.message });
        } else {
            res.status(200).json({ message: 'Đánh giá đã được lưu', reviewId: this.lastID });
        }
    });
});

app.get('/get-reviews/:product_name', (req, res) => {
    const { product_name } = req.params;
    db.all('SELECT * FROM reviews WHERE product_name = ?', [product_name], (err, rows) => {
        if (err) {
            res.status(500).json({ error: err.message });
        } else {
            res.status(200).json(rows);
        }
    });
});
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Máy chủ đang chạy trên cổng ${PORT}`);
});
