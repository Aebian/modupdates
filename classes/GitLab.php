<?php namespace Aebian\ModUpdates\Classes;

use Cache;

/**
 * GitLab API Fetcher
 * @package Aebian\ModUpdates\Classes
 */
class GitLab
{
    /**
     * TTL in minutes
     * @var int
     */
    public static $TTL = -60;

    /**
     * @var string
     */
    private $endpoint = 'https://gitlab.gruppe-w.de/api/v4/';

    /**
     * List public issues for the specified project
     * GET /project/:project_name/issues  
     *
     * @param string $tracker
     * @param string $label
     * @param string $state
     * @param string $accesstoken
     * @return stdObj[]
     */
    public function issues($tracker,$label, $state, $accesstoken, $per_page = 50) 
    {
        return $this->fetchCache(
            "/projects/$tracker/issues?labels" . http_build_query([
                'label'  => $label,
                'state'  => $state,
                'private_token'  => $accesstoken,
                'per_page'  => $per_page,
            ])
        );
    }

    /**
     * Fetch API resource from cache or from endpoint
     *
     * @param string $key
     * @return stdObj
     */
    protected function fetchCache($key)
    {
        return Cache::remember($key, self::$TTL, function () use ($key) {
            return $this->fetch($key);
        });
    }

    /**
     * Fetch API Ressource
     *
     * @param string $url
     * @return stdObj
     */
    protected function fetch($url)
    {
        // create a new cURL resource
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->endpoint . $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "Aebian-ModUpdates");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        // grab URL and pass it to the browser
        $request = curl_exec($ch);

        // close cURL resource, and free up system resources
        curl_close($ch);

        return json_decode($request);
    }
}
