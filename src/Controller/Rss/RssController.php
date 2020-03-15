<?php

namespace App\Controller\Rss;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use FeedIo\FeedIo;

class RssController extends AbstractController
{
    const RSS_FOOTBALL = 'http://www.madeinfoot.com/flux/rss_news.php';
    const RSS_BASKET = 'https://www.insidebasket.com/news/rss.php';
    const RSS_TENNIS = 'https://www6.lequipe.fr/rss/actu_rss_Tennis.xml';

    /**
     * @type \FeedIo\FeedIo
     */
    private $feedIo;

    /**
     * @Route("/rss", name="rss")
     */
    public function index()
    {
        return $this->render('utils/rss.html.twig',
            [
                'rssfootball' => $this->getRssFootball(),
                'rssbasket' => $this->getRssBasket(),
                'rsstennis' => $this->getRssTennis()
            ]
        );
    }

    /**
     * RssController constructor.
     * @param FeedIo $feedIo
     */
    public function __construct(FeedIo $feedIo)
    {
        $this->feedIo = $feedIo;
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
            $rssfootball [$i]['image'] = $item->getMedias()[0]->getUrl();
            $rssfootball [$i]['title'] = $item->getTitle();
            $rssfootball [$i]['description'] = $item->getdescription();
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
            $rssbasket[$i]['title'] = $item->getTitle();
            $rssbasket[$i]['description'] = $this->getRssBasketDescription($item->getdescription());
            $i++;

            if ($i > 19) {
                break;
            }
        }

        return dump($rssbasket);
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
        $replace = preg_replace('/<img.*?src="(.*?)"[^\>]+>/', '' ,$feed);
        $replace = strip_tags($replace);
        $replace = preg_replace('/&#39;/', '\'' ,$replace);

        return substr($replace, 0, 250).'...';
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
            $rsstennis [$i]['image'] = $item->getMedias()[0]->getUrl();
            $rsstennis [$i]['title'] = $item->getTitle();
            $rsstennis [$i]['description'] = $item->getdescription();
            $i++;

            if ($i > 19) {
                break;
            }
        }

        return $rsstennis;
    }

}