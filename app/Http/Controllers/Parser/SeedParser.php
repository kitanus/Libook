<?php


namespace App\Http\Controllers\Parser;

use Symfony\Component\DomCrawler\Crawler;

class SeedParser
{

    public function getBookInfo()
    {
        $book = [];
        for($d=1; $d<=10; $d++)
        {
            $html = file_get_contents("https://www.100bestbooks.ru/index.php?page=".$d);
            $crawler = new Crawler();
            $crawler->addHtmlContent($html, 'UTF-8');

            for ($i = 0; $i < count($crawler->filter('td.vline-year'))*2; $i = $i + 2)
            {
                $value['authors'] = $crawler->filter('span[itemprop="name"]')->eq($i)->text();
                $value['names'] = $crawler->filter('span[itemprop="name"]')->eq($i + 1)->text();
                $value['year'] = $crawler->filter('td.vline-year')->eq($i / 2)->text();
                array_push($book, $value);
            }
        }

        return $book;
    }

}
