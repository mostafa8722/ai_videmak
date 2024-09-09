<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Extension;
use App\Models\Setting;
use App\Models\MainSetting;

class ExtensionController extends Controller
{
    public const API_URL = 'https://marketplace.berkine.net/api/';

    public function extensions()
    {
        return $this->get();
    }


    public function themes()
    {
        return $this->get(true);
    }


    public function search($slug)
    {
        $response = $this->request('post', "extension/{$slug}");

        if ($response->ok()) {

            $data = $response->json('data');

            $extension = Extension::where('slug', $slug)->first();

            return array_merge($data, [
                'latest_version' => $extension?->version,
                'installed' => (bool) $extension?->installed,
                'upgradable' => $extension?->version !== $data['version'],
            ]);
        }

        return [];
    }


    public function verify($slug, $payment)
    {
        $response = $this->request('post', "extension/purchase/{$slug}/verify/{$payment}");

        if ($response->ok()) {

            $status = $response->json('status');
            $data = $response->json('data');

            $extension = Extension::where('slug', $slug)->first();
            
            if ($status == 'succeeded') {
                $extension->purchased = true;
                $extension->save();

                return array_merge($data, [
                    'latest_version' => $extension?->version,
                    'installed' => (bool) $extension?->installed,
                    'upgradable' => $extension?->version !== $data['version'],
                    'purchased' => true
                ]);

            } else {
                return [];
            }
            
        }

        return [];
    }


    public function checkPayment($slug)
    {
        if ($slug != 'default') {
            $response = $this->request('post', "extension/purchase/check/{$slug}");

            if ($response->ok()) {

                $data = $response->json('data');

                $extension = Extension::where('slug', $slug)->first();
                $extension->purchased = true;
                $extension->save();

                $setting = MainSetting::first();

                if (strtolower($data['type']) == 'dashboard') {
                    $setting->dashboard_theme = $extension->slug;
                } elseif (strtolower($data['type']) == 'frontend') {
                    $setting->frontend_theme = $extension->slug;
                } else {
                    $setting->dashboard_theme = $extension->slug;
                    $setting->dashboard_theme = $extension->slug;
                }

                $setting->save();
                
            }
        } else {
            $setting = MainSetting::first();

            $setting->dashboard_theme = 'default';
            $setting->dashboard_theme = 'default';         
            $setting->save();
        }

        return [];
    }


    public function get(bool $is_theme = false)
    {
        $appVersion = env('APP_VERSION');

        $response = $this->request('post', 'extension', [
            'is_theme' => $is_theme,
            'app_version' => $appVersion
        ]);

        if ($response->ok()) {

            $data = $response->json('data');

            $this->update($data);

            return $this->merge($data);
        }

        return [];
    }


    public function install(string $slug)
    {
        $extension = Extension::where('slug', $slug)->first();
        $version = $extension->version;
        $appVersion = env('APP_VERSION');

        $response = $this->request('post', 'extension/version/install', [
            'slug' => $slug,
            'version' => $version,
            'app_version' => $appVersion
        ]);
        \Log::info($response);
        if ($response->ok()) {

            $data = $response->json('data');
\Log::info($data);
            //$this->update($data);

            //return $this->merge($data);

            return $data;
        }

    }


    public function request(string $method, string $route, array $body = [], $url = null)
    {   
        $user_data = $this->userInfo();
        $url = $url ?? self::API_URL.$route;

        return Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'x-domain' => request()->getHost(),
            'x-username' => $user_data['username'],
            'x-activation-code' => $user_data['license'],
        ])->when($method === 'post', function ($http) use ($url, $body) {
            return $http->post($url, $body);
        }, function ($http) use ($url, $body) {
            return $http->get($url, $body);
        });
    }

    public function merge(array $data): array
    {
        $extensions = Extension::query()->get();

        return collect($data)->map(function ($extension) use ($extensions) {
            $value = $extensions->firstWhere('slug', $extension['slug']);

            return array_merge($extension, [
                'latest_version' => $value?->version,
                'installed' => (bool) $value?->installed,
                'upgradable' => $value?->version !== $extension['version'],
            ]);
        })->toArray();
    }

    private function update(array $data): void
    {
        foreach ($data as $extension) {
            Extension::query()->firstOrCreate([
                'slug' => $extension['slug'],
                'is_theme' => $extension['is_theme'],
            ], [
                'version' => $extension['version'],
                'is_free' => $extension['is_free'],
            ]);
        }
    }


    public function userInfo()
    {
        $information_rows = ['license', 'username'];
        $information = [];
        $settings = Setting::all();

        foreach ($settings as $row) {
            if (in_array($row['name'], $information_rows)) {
                $information[$row['name']] = $row['value'];
            }
        }

        return $information;
    }


    public function sak()
    {
        $response = $this->request('post', "extension/sak");

        if ($response->ok()) {

            $data = $response->json('data');

            return $data;
        }

    }


}