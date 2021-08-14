<?php 
require "src/Quotes_Searcher.php";

$quotes = new SearchQuotes;

$PageNumber = 1; // Setting nomor halaman.
$quotes->ShowTotalLikes = true; // Set `true` jika ingin menampilkan jumlah like. Value default adalah `false` yang berarti tidak akan ditampilkan

echo json_encode($quotes->NewQuotes($PageNumber));