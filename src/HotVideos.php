<?php
namespace Kirugan\GoogleTrendsAPI;


class HotVideos
{
    const URL = 'https://www.google.com/trends/hotvideos/hotItems';

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    public function setClient(\GuzzleHttp\Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param \DateTime $dt
     * @param string $geo
     * @param int $mob
     * @param int $saveSearch
     * @return array
     */
    public function getVideos(\DateTime $dt, $geo, $mob = 0, $saveSearch = 1)
    {
        $params = [
            'hvd' => $dt->format('Ymd'),
            'geo' => $geo,
            'mob' => (int) !!$mob,
            'hvsm' => (int) !!$saveSearch
        ];

        $body = $this->client->request('POST', self::URL, [
            'form_params' => $params
        ])->getBody();

        return $this->parseBody((string) $body);
    }

    private function parseBody($json)
    {
        $ret = [];

        $body = json_decode($json, true);
        foreach($body['videoList'] as $video) {
            $ret[] = new HotVideo($video);
        }

        return $ret;
    }
}