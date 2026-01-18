<?php

namespace Secretwebmaster\LaravelCloudflare\Models;

/**
 * Zone Settings Model to interact with Cloudflare Zone Settings API
 * 
 * This class provides methods to retrieve and update various zone settings
 * including security, performance, and caching configurations.
 * 
 * Cloudflare API Documentation:
 * https://developers.cloudflare.com/api/resources/zone_settings/
 */
class ZoneSettings extends AbstractModel
{
    /**
     * Get All Zone Settings
     * @deprecated This endpoint is deprecated. Zone settings should instead be managed individually.
     *
     * Permission: Zone Settings:Read
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function list(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Edit Multiple Zone Settings
     * @deprecated This endpoint is deprecated. Zone settings should instead be managed individually.
     *
     * Permission: Zone Settings Write
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Settings to update
     * @return mixed
     */
    public function bulk_edit(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Edit Single Zone Setting
     *
     * Permission: Zone Settings Write
     *
     * Updates a single zone setting by its identifier.
     *
     * Endpoint:
     * PATCH /zones/{zone_id}/settings/{setting_id}
     *
     * @param string $zoneId Zone identifier
     * @param string $settingId Setting name (setting identifier)
     * @param array  $data Request body for the setting
     *
     * Request Body (varies by setting):
     *
     * - enabled:
     *   [
     *     'enabled' => bool
     *   ]
     *
     * - value:
     *   [
     *     'value' => mixed
     *   ]
     *
     *
     * @return mixed
     */
    public function edit(string $zoneId, string $settingId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/{$settingId}";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Advanced DDoS Setting
     *
     * Permission: Zone Settings:Read
     *
     * Advanced protection from Distributed Denial of Service (DDoS) attacks.
     * Only available for zones on the Enterprise plan.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getAdvancedDdos(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/advanced_ddos";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Always Online Setting
     *
     * Permission: Zone Settings:Read
     *
     * When enabled, Cloudflare serves limited copies of web pages available 
     * from the Internet Archive's Wayback Machine when the origin is offline.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getAlwaysOnline(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/always_online";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Always Use HTTPS Setting
     *
     * Permission: Zone Settings:Read
     *
     * Reply to all requests for URLs that use HTTP with a 301 redirect to 
     * the equivalent HTTPS URL.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getAlwaysUseHttps(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/always_use_https";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Opportunistic Onion Setting
     *
     * Permission: Zone Settings:Read
     *
     * Add an Alt-Svc header to all legitimate requests from Tor, allowing 
     * the connection to use our onion services instead of exit nodes.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getOpportunisticOnion(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/opportunistic_onion";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Automatic HTTPS Rewrites Setting
     *
     * Permission: Zone Settings:Read
     *
     * Enable Automatic HTTPS Rewrites feature for this zone.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getAutomaticHttpsRewrites(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/automatic_https_rewrites";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Browser Cache TTL Setting
     *
     * Permission: Zone Settings:Read
     *
     * Browser Cache TTL (in seconds) specifies how long Cloudflare-cached 
     * resources will remain on your visitors' computers.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getBrowserCacheTtl(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/browser_cache_ttl";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Browser Check Setting
     *
     * Permission: Zone Settings:Read
     *
     * Browser Integrity Check is similar to Bad Behavior and blocks 
     * the most common types of malicious traffic.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getBrowserCheck(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/browser_check";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Cache Level Setting
     *
     * Permission: Zone Settings:Read
     *
     * Cache Level determines how much of your static content is cached.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getCacheLevel(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/cache_level";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Challenge TTL Setting
     *
     * Permission: Zone Settings:Read
     *
     * Specify how long a visitor is allowed access to your site after 
     * successfully completing a challenge.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getChallengeTtl(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/challenge_ttl";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Development Mode Setting
     *
     * Permission: Zone Settings:Read
     *
     * Development Mode temporarily bypasses our cache allowing you to see 
     * changes to your origin server in realtime.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getDevelopmentMode(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/development_mode";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Email Obfuscation Setting
     *
     * Permission: Zone Settings:Read
     *
     * Encrypt email addresses on your web page from bots, while keeping them 
     * visible to humans.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getEmailObfuscation(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/email_obfuscation";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Hotlink Protection Setting
     *
     * Permission: Zone Settings:Read
     *
     * When enabled, the Hotlink Protection option ensures that other sites 
     * cannot suck up your bandwidth by building pages that link to images.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getHotlinkProtection(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/hotlink_protection";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get IP Geolocation Setting
     *
     * Permission: Zone Settings:Read
     *
     * Enable IP Geolocation to have Cloudflare geolocate visitors to your 
     * website and pass the country code to you.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getIpGeolocation(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/ip_geolocation";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get IPv6 Setting
     *
     * Permission: Zone Settings:Read
     *
     * Enable IPv6 on all subdomains that are Cloudflare enabled.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getIpv6(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/ipv6";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Minify Setting
     *
     * Permission: Zone Settings:Read
     *
     * Automatically minify certain assets for your website.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getMinify(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/minify";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Mobile Redirect Setting
     *
     * Permission: Zone Settings:Read
     *
     * Automatically redirect visitors on mobile devices to a mobile-optimized 
     * subdomain.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getMobileRedirect(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/mobile_redirect";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Mirage Setting
     *
     * Permission: Zone Settings:Read
     *
     * Automatically optimize image loading for website visitors on mobile devices.
     * Deprecated in favor of Polish and Image Resizing.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getMirage(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/mirage";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Enable Error Pages Setting
     *
     * Permission: Zone Settings:Read
     *
     * Cloudflare will proxy customer error pages on any 502,504 errors on 
     * origin server instead of showing a default Cloudflare error page.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getOriginErrorPagePassThru(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/origin_error_page_pass_thru";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Opportunistic Encryption Setting
     *
     * Permission: Zone Settings:Read
     *
     * Enable the Opportunistic Encryption feature for this zone.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getOpportunisticEncryption(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/opportunistic_encryption";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Polish Setting
     *
     * Permission: Zone Settings:Read
     *
     * Removes metadata and compresses your images for faster page load times.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getPolish(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/polish";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get WebP Setting
     *
     * Permission: Zone Settings:Read
     *
     * When the client requesting the image supports the WebP format, 
     * Cloudflare will serve a WebP version of the image when possible.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getWebp(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/webp";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Brotli Setting
     *
     * Permission: Zone Settings:Read
     *
     * When the client requesting a file supports the Brotli compression 
     * algorithm, Cloudflare will serve a Brotli compressed version.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getBrotli(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/brotli";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Prefetch Preload Setting
     *
     * Permission: Zone Settings:Read
     *
     * Cloudflare will prefetch any URLs that are included in the response 
     * headers.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getPrefetchPreload(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/prefetch_preload";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Privacy Pass Setting
     *
     * Permission: Zone Settings:Read
     *
     * Privacy Pass is a browser extension developed by the Privacy Pass Team.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getPrivacyPass(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/privacy_pass";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Response Buffering Setting
     *
     * Permission: Zone Settings:Read
     *
     * Enables or disables buffering of responses from the proxied server.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getResponseBuffering(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/response_buffering";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Rocket Loader Setting
     *
     * Permission: Zone Settings:Read
     *
     * Rocket Loader is a general-purpose asynchronous JavaScript optimisation.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getRocketLoader(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/rocket_loader";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Security Header (HSTS) Setting
     *
     * Permission: Zone Settings:Read
     *
     * Cloudflare security header for a zone.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getSecurityHeader(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/security_header";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Security Level Setting
     *
     * Permission: Zone Settings:Read
     *
     * Choose the appropriate security level for your website. Under Attack 
     * mode is for when you are experiencing a DDoS attack.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getSecurityLevel(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/security_level";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Server Side Exclude Setting
     *
     * Permission: Zone Settings:Read
     *
     * If there is sensitive content on your website that you want visible 
     * to real visitors, but hidden from bots, use Server Side Excludes.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getServerSideExclude(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/server_side_exclude";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Enable Query String Sort Setting
     *
     * Permission: Zone Settings:Read
     *
     * Cloudflare will treat files with the same query strings as the same 
     * file in cache, regardless of the order of the query strings.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getSortQueryStringForCache(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/sort_query_string_for_cache";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get SSL Setting
     *
     * Permission: Zone Settings:Read
     *
     * SSL encrypts your visitor's connection and safeguards credit card 
     * numbers and other personal data to and from your website.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getSsl(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/ssl";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Minimum TLS Version Setting
     *
     * Permission: Zone Settings:Read
     *
     * Only allow HTTPS connections from visitors that support the selected 
     * TLS protocol version or newer.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getMinTlsVersion(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/min_tls_version";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get TLS 1.3 Setting
     *
     * Permission: Zone Settings:Read
     *
     * Enable Crypto TLS 1.3 feature for this zone.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getTls13(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/tls_1_3";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get TLS Client Auth Setting
     *
     * Permission: Zone Settings:Read
     *
     * TLS Client Auth requires Cloudflare to connect to your origin server 
     * using a client certificate.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getTlsClientAuth(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/tls_client_auth";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get True Client IP Setting
     *
     * Permission: Zone Settings:Read
     *
     * Allows customer to continue to use True Client IP (Akamai feature) 
     * in the headers we send to the origin.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getTrueClientIpHeader(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/true_client_ip_header";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get WAF Setting
     *
     * Permission: Zone Settings:Read
     *
     * The WAF examines HTTP requests to your website.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getWaf(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/waf";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get HTTP2 Setting
     *
     * Permission: Zone Settings:Read
     *
     * HTTP/2 improves page load time by allowing multiple requests to be 
     * sent on the same connection.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getHttp2(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/http2";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Pseudo IPv4 Setting
     *
     * Permission: Zone Settings:Read
     *
     * Value of the Pseudo IPv4 setting.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getPseudoIpv4(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/pseudo_ipv4";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get WebSockets Setting
     *
     * Permission: Zone Settings:Read
     *
     * WebSockets are open connections sustained between the client and the 
     * origin server.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getWebsockets(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/websockets";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Image Resizing Setting
     *
     * Permission: Zone Settings:Read
     *
     * Image Resizing provides on-demand resizing, conversion and optimisation 
     * for images served through Cloudflare's network.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getImageResizing(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/image_resizing";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get HTTP/2 Edge Prioritization Setting
     *
     * Permission: Zone Settings:Read
     *
     * Gets HTTP/2 Edge Prioritization setting.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getHttp2EdgePrioritization(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/settings/h2_prioritization";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    // ============================================================================
    // Update Methods - PATCH endpoints for individual settings
    // ============================================================================

    /**
     * Change Always Online Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setAlwaysOnline(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/always_online";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Always Use HTTPS Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setAlwaysUseHttps(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/always_use_https";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Opportunistic Onion Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setOpportunisticOnion(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/opportunistic_onion";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Automatic HTTPS Rewrites Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setAutomaticHttpsRewrites(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/automatic_https_rewrites";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Browser Cache TTL Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param int $value Value: 0, 30, 60, 300, 1200, 1800, 3600, 7200, 10800, 14400, 18000, 28800, 43200, 57600, 72000, 86400, 172800, 259200, 345600, 432000, 691200, 1382400, 2678400, 5356800, 16070400, 31536000
     * @return mixed
     */
    public function setBrowserCacheTtl(string $zoneId, int $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/browser_cache_ttl";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Browser Check Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setBrowserCheck(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/browser_check";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Cache Level Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "aggressive", "basic", "simplified"
     * @return mixed
     */
    public function setCacheLevel(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/cache_level";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Challenge TTL Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param int $value Value: 300, 900, 1800, 2700, 3600, 7200, 10800, 14400, 28800, 57600, 86400, 604800, 2592000, 31536000
     * @return mixed
     */
    public function setChallengeTtl(string $zoneId, int $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/challenge_ttl";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Development Mode Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setDevelopmentMode(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/development_mode";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Email Obfuscation Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setEmailObfuscation(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/email_obfuscation";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Enable Error Pages On Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setOriginErrorPagePassThru(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/origin_error_page_pass_thru";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Enable Query String Sort Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setSortQueryStringForCache(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/sort_query_string_for_cache";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Hotlink Protection Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setHotlinkProtection(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/hotlink_protection";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change IP Geolocation Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setIpGeolocation(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/ip_geolocation";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change IPv6 Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setIpv6(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/ipv6";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Minify Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param array $value Array with keys: "css", "html", "js" (each "on" or "off")
     * @return mixed
     */
    public function setMinify(string $zoneId, array $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/minify";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Mobile Redirect Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param array $value Array with keys: "status" (on/off), "mobile_subdomain", "strip_uri"
     * @return mixed
     */
    public function setMobileRedirect(string $zoneId, array $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/mobile_redirect";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Mirage Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setMirage(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/mirage";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Opportunistic Encryption Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setOpportunisticEncryption(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/opportunistic_encryption";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Polish Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "off", "lossless", "lossy"
     * @return mixed
     */
    public function setPolish(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/polish";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change WebP Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setWebp(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/webp";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Brotli Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setBrotli(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/brotli";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Prefetch Preload Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setPrefetchPreload(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/prefetch_preload";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Privacy Pass Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setPrivacyPass(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/privacy_pass";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Response Buffering Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setResponseBuffering(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/response_buffering";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Rocket Loader Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on", "off", "manual"
     * @return mixed
     */
    public function setRocketLoader(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/rocket_loader";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Security Header (HSTS) Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param array $value Array with keys: "strict_transport_security" containing "enabled", "max_age", "include_subdomains", "nosniff"
     * @return mixed
     */
    public function setSecurityHeader(string $zoneId, array $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/security_header";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Security Level Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "off", "essentially_off", "low", "medium", "high", "under_attack"
     * @return mixed
     */
    public function setSecurityLevel(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/security_level";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Server Side Exclude Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setServerSideExclude(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/server_side_exclude";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change SSL Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "off", "flexible", "full", "strict"
     * @return mixed
     */
    public function setSsl(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/ssl";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change TLS Client Auth Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setTlsClientAuth(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/tls_client_auth";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change True Client IP Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setTrueClientIpHeader(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/true_client_ip_header";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Minimum TLS Version Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "1.0", "1.1", "1.2", "1.3"
     * @return mixed
     */
    public function setMinTlsVersion(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/min_tls_version";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change TLS 1.3 Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on", "off", "zrt"
     * @return mixed
     */
    public function setTls13(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/tls_1_3";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Web Application Firewall (WAF) Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setWaf(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/waf";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change HTTP2 Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setHttp2(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/http2";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Pseudo IPv4 Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "off", "add_header", "overwrite_header"
     * @return mixed
     */
    public function setPseudoIpv4(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/pseudo_ipv4";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change WebSockets Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on" or "off"
     * @return mixed
     */
    public function setWebsockets(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/websockets";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change Image Resizing Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on", "off", "open"
     * @return mixed
     */
    public function setImageResizing(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/image_resizing";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }

    /**
     * Change HTTP/2 Edge Prioritization Setting
     *
     * Permission: Zone Settings:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $value Value: "on", "off", "custom"
     * @return mixed
     */
    public function setHttp2EdgePrioritization(string $zoneId, string $value)
    {
        $endpoint = "/zones/{$zoneId}/settings/h2_prioritization";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, ['value' => $value], $method);
    }
}

