<?php

namespace Secretwebmaster\LaravelCloudflare\Models;

/**
 * Zones Model to interact with Cloudflare Zones API
 * 
 * Cloudflare API Documentation:
 * https://developers.cloudflare.com/api/resources/zones/
 * 
 * Postman Documentation:
 * https://documenter.getpostman.com/view/10394726/SzYbxHEm#b141157a-b333-4719-a076-5ac80949b702
 */
class Zones extends AbstractModel
{
    /**
     * List Zones
     *
     * Permission: Zone:Read
     *
     * Supported parameters:
     *
     * | Key       | Type   | Required | Description |
     * |-----------|--------|----------|-------------|
     * | name      | string | No       | Filter by zone name |
     * | status    | string | No       | Zone status |
     * | page      | int    | No       | Page number |
     * | per_page  | int    | No       | Results per page |
     * | order     | string | No       | Order field |
     * | direction | string | No       | asc or desc |
     * | match     | string | No       | all or any |
     *
     * @param array $data
     * @return mixed
     */
    public function list($data = [])
    {
        $endpoint = "/zones";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Create Zone
     *
     * Permission: Zone:Edit | Zone DNS:Edit
     *
     * Supported parameters:
     *
     * | Key     | Type  | Required | Description |
     * |---------|-------|----------|-------------|
     * | account | array | No       | Account object, must include `id` (string, max 32) |
     * | name    | string| Yes      | Domain name (max 253) |
     * | type    | string| No       | Zone type: full (default), partial |
     *
     * @param array $data
     * @return mixed
     */
    public function create($data = [])
    {
        $endpoint = "/zones";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Zone Details
     *
     * Permission: Zone:Read
     *
     * @param string $zoneId Zone ID
     * @param array  $data
     * @return mixed
     */
    public function get($zoneId, $data = [])
    {
        $endpoint = "/zones/{$zoneId}";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Edit Zone
     *
     * Permission: Zone:Write
     *
     * Supported parameters:
     *
     * | Key                 | Type    | Required | Description |
     * |---------------------|---------|----------|-------------|
     * | paused              | boolean | No       | DNS-only mode when true |
     * | type                | string  | No       | Zone type: full, partial, secondary |
     * | vanity_name_servers | array   | No       | Custom name servers (Business/Enterprise) |
     *
     * Note: Only one property can be changed per request.
     *
     * @param string $zoneId Zone ID
     * @param array  $data
     * @return mixed
     */
    public function edit($zoneId, $data = [])
    {
        $endpoint = "/zones/{$zoneId}";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Delete Zone
     *
     * Permission: Zone:Write
     *
     * @param string $zoneId Zone ID
     * @param array  $data
     * @return mixed
     */
    public function delete($zoneId, $data = [])
    {
        $endpoint = "/zones/{$zoneId}";
        $method = 'DELETE';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Rerun Zone Activation Check
     *
     * Permission: Zone:Write
     *
     * @param string $zoneId Zone ID
     * @param array  $data
     * @return mixed
     */
    public function activationCheck($zoneId, $data = [])
    {
        $endpoint = "/zones/{$zoneId}/activation_check";
        $method = 'PUT';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Purge All Files
     *
     * Permission: Zone Cache Purge
     *
     * Removes all cached content for a zone. This will purge cached files for the entire zone.
     *
     * Required data parameter:
     * | Key              | Type    | Required | Description |
     * |------------------|---------|----------|-------------|
     * | purge_everything | boolean | Yes      | Must be set to true to purge all files |
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Must include ['purge_everything' => true]
     * @return mixed
     */
    public function purge_all_files($zoneId, $data = [])
    {
        $endpoint = "/zones/{$zoneId}/purge_cache";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Purge Files by URL
     *
     * Permission: Zone Cache Purge
     *
     * Granularly remove specific files from Cloudflare's cache either by URL.
     *
     * Required data parameter:
     * | Key   | Type  | Required | Description |
     * |-------|-------|----------|-------------|
     * | files | array | Yes      | Array of URLs to purge (max 500 per request) |
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Must include ['files' => ['url1', 'url2', ...]]
     * @return mixed
     */
    public function purge_files_by_url($zoneId, $data = [])
    {
        $endpoint = "/zones/{$zoneId}/purge_cache";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Purge Files by Cache-Tags or Host
     *
     * Permission: Zone Cache Purge
     *
     * Granularly remove specific files from Cloudflare's cache either by cache-tag or host.
     * Only one zone property can be changed at a time.
     * 
     * Enterprise only: Purge by host
     *
     * Supported data parameters:
     * | Key   | Type  | Required | Description |
     * |-------|-------|----------|-------------|
     * | tags  | array | No       | Array of cache tags (max 30, Enterprise only) |
     * | hosts | array | No       | Array of hostnames (max 30, Enterprise only) |
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Must include either 'tags' or 'hosts' (Enterprise only)
     * @return mixed
     *
     * Example $data:
     * {
     *     "tags": [
     *         "some-tag",
     *         "another-tag"
     *     ],
     *     "hosts": [
     *         "www.example.com",
     *         "images.example.com"
     *     ]
     * }
     */
    public function purge_files_by_tags_or_host($zoneId, $data = [])
    {
        $endpoint = "/zones/{$zoneId}/purge_cache";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    // ============================================================================
    // Custom Helper Functions
    // ============================================================================

    /**
     * Get Zone by Domain Name
     *
     * Custom helper function to retrieve a zone by its domain name.
     * Filters the zone list by name and returns the first active match.
     * 
     * @param string $domain The domain name to search for
     * @return mixed|null Returns zone object if found, null otherwise
     */
    public function getByDomain(string $domain)
    {
        $zoneList = $this->list([
            'name' => $domain,
            'per_page' => 1,
            'status' => 'active',
        ]);

        try {

            return $zoneList->result[0] ?? null;
        } catch (\Exception $e) {

            return null;
        }

        return null;
    }

    /**
     * Get Zone ID by Domain Name
     *
     * Custom helper function to retrieve a zone ID by its domain name.
     * Utilizes getByDomain() and extracts the zone ID.
     * 
     * @param string $domain The domain name to search for
     * @return string|null Returns zone ID if found, null otherwise
     */
    public function getZoneIdByDomain(string $domain): ?string
    {
        $zone = $this->getByDomain($domain);

        try {

            return $zone->id ?? null;
        } catch (\Exception $e) {

            return null;
        }

        return null;
    }

    /**
     * Cloudflare Zone Error Codes
     *
     * Returns an array of all possible Cloudflare Zone API error codes and their descriptions.
     * Useful for debugging and error handling.
     * 
     * @return array Associative array of error codes and their descriptions
     */
    public function errorCodes()
    {
        return [
            '1100' => "Tag exceeds maximum length of 1024 characters",
            '1111' => "Exceeded maximum amount of 30 hosts that can be purged on a single request",
            '1001' => "Invalid zone identifier",
            '1012' => "Request must contain one of 'purge_everything', 'files', 'tags', or 'hosts'",
            '1023' => "Invalid or missing zone",
            '1056' => "preserve_ini must be a boolean",
            '1067' => "Invalid organization identifier passed in your organization variable",
            '1078' => "This zone has no valid vanity IPs.",
            '1089' => "Invalid/Missing Zone plan ID",
            '1101' => "Exceeded maximum amount of 30 tags that can be purged on a single request",
            '1112' => "Only enterprise zones can purge by host",
            '1002' => "Invalid domain",
            '1013' => "'purge_everything' must be true",
            '1057' => "Zone must be in 'initializing' status",
            '1068' => "Permission denied",
            '1079' => "This zone has no valid vanity name servers.",
            '1102' => "Unable to purge by tag, rate limit reached. Please wait if you need to perform more",
            '1113' => "Unable to purge by host, rate limit reached. Please wait if you need to perform more operations.",
            '1003' => "'jump_start' must be boolean",
            '1014' => "'files', 'tags', or 'hosts' must be an array",
            '1069' => "organization variable should be an organization object",
            '1114' => "Host exceeds maximum length of 200 characters",
            '1015' => "Unable to purge <url>",
            '1059' => "Unable to delete zone",
            '1104' => "Partial zone signup not allowed",
            '1115' => "Invalid host",
            '1016' => "Unable to purge any urls",
            '1049' => "<domain> is not a registered domain",
            '1105' => "This zone is temporarily banned and cannot be added to Cloudflare at this time, please contact Cloudflare Support",
            '1006' => "Invalid or missing zone",
            '1017' => "Unable to purge all",
            '1106' => "Sorry, you are not allowed to create new zones. Please contact support.",
            '1018' => "Invalid zone status",
            '1107' => "Only enterprise zones can purge by tag.",
            '1008' => "Invalid or missing Zone id",
            '1019' => "Zone is already paused",
            '1108' => "Unable to update domain subscription. Please contact support for assistance.",
            '1109' => "Unable to update domain subscription. Please contact support for assistance.",
            '1080' => "There is a conflict with one of the name servers.",
            '1070' => "This operation requires a Business or Enterprise account.",
            '1081' => "There are no valid vanity name servers to disable.",
            '1092' => "Request cannot contain 'purge_everything' and any of 'files', 'tags', or 'hosts'",
            '1071' => "Vanity name server array expected.",
            '1082' => "Unable to purge '<url>'. You can only purge files for this zone",
            '1050' => "<domain> is currently being tasted. It is not currently a registered domain",
            '1061' => "<domain> already exists",
            '1083' => "Unable to purge '<url>'. Rate limit reached. Please wait if you need to perform more operations",
            '1094' => "Exceeded maximum amount of 500 files that can be purged on a single request",
            '1051' => "Cloudflare is already hosting <domain>",
            '1073' => "A name server provided is in the wrong format.",
            '1084' => "Unable to purge '<url>'.",
            '1095' => "Sorry, you do not have access to purge cache for that zone id or that zone id is invalid",
            '1052' => "An error has occurred and it has been logged. We will fix this problem promptly. We apologize for the inconvenience",
            '1074' => "Could not find a valid zone.",
            '1085' => "Only one property can be updated at a time",
            '1096' => "This action is not available as your zone has been deactivated for a possible Terms of Service violation",
            '1020' => "Invalid or missing zone",
            '1064' => "Not allowed to update zone step. Bad zone status",
            '1075' => "Vanity name server array count is invalid",
            '1086' => "Invalid property",
            '1097' => "This zone is banned and cannot be added to Cloudflare at this time, please contact Cloudflare Support",
            '1010' => "Bulk deal limit reached",
            '1021' => "Invalid zone status",
            '1065' => "Not allowed to update zone step. Zone has already been set up",
            '1076' => "Name servers have invalid IP addresses",
            '1098' => "This zone is temporarily banned and cannot be added to Cloudflare at this time, please contact Cloudflare Support",
            '1110' => "Failed to lookup registrar and hosting information of <domain> at this time. Please contact Cloudflare Support or try again later.",
            '1000' => "Invalid or missing user",
            '1022' => "Zone is already unpaused",
            '1055' => "Failed to disable <domain>",
            '1066' => "Could not promote zone to step 3",
            '1077' => "Could not find a valid zone.",
            '1088' => "Invalid/Missing Zone plan ID",
            '1099' => "We were unable to identify <domain> as a registered domain. Please ensure you are providing the root domain and not any subdomains (e.g., example.com, not subdomain.example.com)",
        ];
    }
}
