<?php

namespace App\Twig;;

use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use FeedIo\FeedIo;

class RssExtension extends AbstractExtension
{
    private const RSS_FOOTBALL = 'http://www.madeinfoot.com/flux/rss_news.php';
    private const RSS_BASKET = 'https://www.insidebasket.com/news/rss.php';
    private const RSS_TENNIS = 'https://www6.lequipe.fr/rss/actu_rss_Tennis.xml';

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var FeedIo
     */
    private $feedIo;

    /**
     * BreadcrumbExtension constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig, FeedIo $feedIo)
    {
        $this->twig = $twig;
        $this->feedIo = $feedIo;
    }

    /**
     * @return array
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('rss',
                [$this, 'rssData'], ['is_safe' => ['html']])
        ];
    }

    /**
     * @return array
     */
    public function rssData()
    {
        return $rssData = [
            'rssfootball' => $this->getRssFootball(),
            'rssbasket' => $this->getRssBasket(),
            'rsstennis' => $this->getRssTennis()
        ];
    }

    /**
     * @return array
     */
    private function getRssFootball()
    {
        $rssfootball = [];
        $i = 0;

        foreach ($this->feedIo->read(self::RSS_FOOTBALL)->getFeed() as $item) {
            $rssfootball [$i]['link'] = $item->getLink();
            $rssfootball [$i]['image'] = isset($item->getMedias()[0]) ? $item->getMedias()[0]->getUrl() : '';
            $rssfootball [$i]['title'] = $this->cutText($item->getTitle(), 30);
            $rssfootball [$i]['description'] = $this->cutText($item->getdescription(), 140);
            $i++;

            if ($i > 19) {
                break;
            }
        }

        return $rssfootball;
    }

    /**
     * @return array
     */
    private function getRssBasket()
    {
        $rssbasket = [];
        $i = 0;

        foreach ($this->feedIo->read(self::RSS_BASKET)->getFeed() as $item) {
            $rssbasket[$i]['link'] = $item->getLink();
            $rssbasket[$i]['image'] = $this->getRssBasketImg($item->getdescription());
            $rssbasket[$i]['title'] = $this->cutText($item->getTitle(), 30);
            $rssbasket[$i]['description'] = $this->cutText($this->getRssBasketDescription($item->getdescription()), 150);
            $i++;

            if ($i > 19) {
                break;
            }
        }

        return $rssbasket;
    }

    /**
     * @param $feed
     * @return string
     */
    private function getRssBasketImg($feed)
    {
        $match = '';
        preg_match('/<img.*?src="(.*?)"[^\>]+>/', $feed, $matches);

        if (isset($matches[0])) {
            $match = trim($matches[1]);
        }

        return $match;
    }

    /**
     * @param $feed
     * @return string
     */
    private function getRssBasketDescription($feed)
    {
        $replace = preg_replace('/<img.*?src="(.*?)"[^\>]+>/', '', $feed);
        $replace = strip_tags($replace);
        $replace = preg_replace('/&#39;/', '\'', $replace);

        return $replace;
    }

    /**
     * @return array
     */
    private function getRssTennis()
    {
        $rsstennis = [];
        $i = 0;

        foreach ($this->feedIo->read(self::RSS_TENNIS)->getFeed() as $item) {
            $rsstennis [$i]['link'] = $item->getLink();
            $rsstennis [$i]['image'] = isset($item->getMedias()[0]) ? $item->getMedias()[0]->getUrl() : '';
            $rsstennis [$i]['title'] = $this->cutText($item->getTitle(), 30);
            $rsstennis [$i]['description'] = $item->getdescription();
            $i++;

            if ($i > 19) {
                break;
            }
        }

        return $rsstennis;
    }

    private function cutText($text, $length = 210)
    {
        return str_replace('Ã', 'é', trim(substr($text, 0, $length) . '...'));
    }
}


