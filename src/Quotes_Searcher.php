<?php 
/*
Library ini hanya untuk praktek belajar PHP OOP dari Channel Web Programming UNPAS.
Jadi harap maklum jika source code ini masih acak-acakan.😂
*/
require "etc/simple_html_dom.php";
class SearchQuotes{
    public $ShowTotalLikes = false;
    public function SearchByQuery($query, $page = 1) {
        $dom = new simple_html_dom();
        $dom = file_get_html("https://www.goodreads.com/quotes/search?commit=Search&page={$page}&q={$query}&utf8=%E2%9C%93");
        $getData = $dom->find("div.quote.mediumText ");
        $result = [];
        $number = 0;
        if (!$this->ShowTotalLikes) {
            foreach ($getData as $results) {
                $result += [
                    $number => [
                        "quotes" => html_entity_decode($results->find("div.quoteText",0)->plaintext),
                        "author" => str_replace(", ", "", html_entity_decode($results->find("span.authorOrTitle",0)->plaintext))
                    ]
                ];
                $number++;
            }
        } else {
            foreach ($getData as $results) {
                $result += [
                    $number => [
                        "quotes" => html_entity_decode($results->find("div.quoteText",0)->plaintext),
                        "author" => str_replace(", ", "", html_entity_decode($results->find("span.authorOrTitle",0)->plaintext)),
                        "likes" => $dom->find("a.smallText", $number)->plaintext
                    ]
                ];
                $number++;
            }
        }
        return $result;
    }
    public function SearchByTag($tag, $page = 1){
        $dom = new simple_html_dom();
        $dom = file_get_html("https://www.goodreads.com/quotes/tag/{$tag}?page={$page}&utf8=%E2%9C%93");
        $getData = $dom->find("div.quote.mediumText ");
        $result = [];
        $number = 0;
        if (!$this->ShowTotalLikes) {
            foreach ($getData as $results) {
                $result += [
                    $number => [
                        "quotes" => html_entity_decode($results->find("div.quoteText",0)->plaintext),
                        "author" => str_replace(", ", "", html_entity_decode($results->find("span.authorOrTitle",0)->plaintext))
                    ]
                ];
                $number++;
            }
        } else {
            foreach ($getData as $results) {
                $result += [
                    $number => [
                        "quotes" => html_entity_decode($results->find("div.quoteText",0)->plaintext),
                        "author" => str_replace(", ", "", html_entity_decode($results->find("span.authorOrTitle",0)->plaintext)),
                        "likes" => $dom->find("a.smallText", $number)->plaintext
                    ]
                ];
                $number++;
            }
            return $result;
        }
    }
    public function PopularQuotes($page = 1){
        $dom = new simple_html_dom();
        $dom = file_get_html("https://www.goodreads.com/quotes?page={$page}");
        $getData = $dom->find("div.quoteDetails");
        $result = [];
        $number = 0;
        if (!$this->ShowTotalLikes) {
            foreach ($getData as $results) {
                $result += [
                    $number => [
                        "quotes" => html_entity_decode($results->find("div.quoteText",0)->plaintext),
                        "author" => str_replace(", ", "", html_entity_decode($results->find("span.authorOrTitle",0)->plaintext))
                    ]
                ];
                $number++;
            }
        } else {
            foreach ($getData as $results) {
                $result += [
                    $number => [
                        "quotes" => html_entity_decode($results->find("div.quoteText",0)->plaintext),
                        "author" => str_replace(", ", "", html_entity_decode($results->find("span.authorOrTitle",0)->plaintext)),
                        "likes" => $dom->find("a.smallText", $number)->plaintext
                    ]
                ];
                $number++;
            }
            return $result;
        }
    }
    public function NewQuotes($page = 1){
        $dom = new simple_html_dom();
        $dom = file_get_html("https://www.goodreads.com/quotes/recently_created?page={$page}");
        $getData = $dom->find("div.quoteDetails");
        $result = [];
        $number = 0;
        if (!$this->ShowTotalLikes) {
            foreach ($getData as $results) {
                $result += [
                    $number => [
                        "quotes" => html_entity_decode($results->find("div.quoteText",0)->plaintext),
                        "author" => str_replace(", ", "", html_entity_decode($results->find("span.authorOrTitle",0)->plaintext))
                    ]
                ];
                $number++;
            }
        } else {
            foreach ($getData as $results) {
                $result += [
                    $number => [
                        "quotes" => html_entity_decode($results->find("div.quoteText",0)->plaintext),
                        "author" => str_replace(", ", "", html_entity_decode($results->find("span.authorOrTitle",0)->plaintext)),
                        "likes" => $dom->find("a.smallText", $number)->plaintext
                    ]
                ];
                $number++;
            }
            return $result;
        }
    }
}