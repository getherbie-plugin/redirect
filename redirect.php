<?php

use Herbie\Hook;
use Herbie\Http\RedirectResponse;

class RedirectPlugin
{

    public static function install()
    {
        Hook::attach('pageLoaded', function($page) {
            if (!empty($page->redirect)) {
                $url = RedirectPlugin::getUrl($page->redirect);
                $status = RedirectPlugin::getStatus($page->redirect);
                $response = new RedirectResponse($url, $status);
                $response->send();
            }
        });
    }

    /**
     * @param mixed $redirect
     * @return int
     */
    private static function getStatus($redirect)
    {
        if (is_array($redirect) && !empty($redirect['status'])) {
            return $redirect['status'];
        }
        return 302;
    }

    /**
     * @param mixed $redirect
     * @return string
     * @throws \Exception
     */
    private static function getUrl($redirect)
    {
        if (is_string($redirect)) {
            return $redirect;
        }
        if (is_array($redirect) && !empty($redirect['url'])) {
            return $redirect['url'];
        }
        throw new \Exception('Redirect not properly configued.', 500);
    }
}

RedirectPlugin::install();
