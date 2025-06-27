<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Auth extends BaseConfig
{
    public array $redirects = [
        'register'          => '/',
        'login'             => '/',
        'logout'            => 'login',
        'force_reset'       => '/',
        'permission_denied' => '/',
        'group_denied'      => '/',
    ];

    public function loginRedirect(): string
    {
        $session = session();
        $url = $session->getTempdata('beforeLoginUrl') ?? $this->redirects['login'];
        return site_url($url);
    }

    public function logoutRedirect(): string
    {
        return site_url($this->redirects['logout']);
    }

    public function registerRedirect(): string
    {
        return site_url($this->redirects['register']);
    }

    public function forcePasswordResetRedirect(): string
    {
        return site_url($this->redirects['force_reset']);
    }

    public function permissionDeniedRedirect(): string
    {
        return site_url($this->redirects['permission_denied']);
    }

    public function groupDeniedRedirect(): string
    {
        return site_url($this->redirects['group_denied']);
    }
}
