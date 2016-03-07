<?php
namespace Kirugan\GoogleTrendsAPI;

/**
 * @property-read string $id
 * @property-read string $title
 * @property-read string $url
 * @property-read string $imgUrl
 * @property-read string $dailyViewCount
 * @property-read string $totalViewCount
 * @property-read string $commentCount
 * @property-read string $username
 * @property-read string $length
 * @property-read string $shareUrl
 * @property-read string $publishedTime
 * @property-read string $channelUrl
 */
class HotVideo
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }
}