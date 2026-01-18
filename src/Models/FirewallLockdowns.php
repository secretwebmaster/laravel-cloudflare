<?php

namespace Secretwebmaster\LaravelCloudflare\Models;

/**
 * Firewall Lockdowns Model to interact with Cloudflare Zone Lockdown API
 * 
 * Zone Lockdown restricts access to URLs in your zone to only allowed IP addresses
 * or IP ranges. This is useful for admin panels, staging environments, or any other
 * resources that should only be accessible from specific IPs.
 * 
 * Cloudflare API Documentation:
 * https://developers.cloudflare.com/api/resources/zone_lockdown/
 */
class FirewallLockdowns extends AbstractModel
{
    /**
     * List Zone Lockdown Rules
     *
     * Permission: Firewall Services:Read
     *
     * List all lockdown rules for a zone.
     *
     * Supported query parameters:
     * | Key       | Type   | Description |
     * |-----------|--------|-------------|
     * | page      | int    | Page number |
     * | per_page  | int    | Number per page (max 100) |
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Query parameters
     * @return mixed
     */
    public function list(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/lockdowns";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Create Zone Lockdown Rule
     *
     * Permission: Firewall Services:Edit
     *
     * Create a new Zone Lockdown rule.
     *
     * Required parameters:
     * | Key            | Type   | Description |
     * |----------------|--------|-------------|
     * | urls           | array  | URLs or URL patterns to protect |
     * | configurations | array  | IP addresses or IP ranges allowed to access URLs |
     *
     * Optional parameters:
     * | Key         | Type    | Description |
     * |-------------|---------|-------------|
     * | description | string  | Description of the rule |
     * | paused      | boolean | Whether the rule is paused (default: false) |
     * | priority    | int     | Priority order (lower = higher priority) |
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Lockdown rule data
     * @return mixed
     */
    public function create(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/lockdowns";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Zone Lockdown Rule
     *
     * Permission: Firewall Services:Read
     *
     * Get details of a specific Zone Lockdown rule.
     *
     * @param string $zoneId Zone identifier
     * @param string $lockdownId Lockdown rule identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function get(string $zoneId, string $lockdownId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/lockdowns/{$lockdownId}";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Update Zone Lockdown Rule
     *
     * Permission: Firewall Services:Edit
     *
     * Update an existing Zone Lockdown rule.
     *
     * @param string $zoneId Zone identifier
     * @param string $lockdownId Lockdown rule identifier
     * @param array  $data Lockdown rule data to update
     * @return mixed
     */
    public function update(string $zoneId, string $lockdownId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/lockdowns/{$lockdownId}";
        $method = 'PUT';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Delete Zone Lockdown Rule
     *
     * Permission: Firewall Services:Edit
     *
     * Delete a Zone Lockdown rule.
     *
     * @param string $zoneId Zone identifier
     * @param string $lockdownId Lockdown rule identifier
     * @param array  $data Additional parameters
     * @return mixed
     */
    public function delete(string $zoneId, string $lockdownId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/lockdowns/{$lockdownId}";
        $method = 'DELETE';
        return $this->client->fetch($endpoint, $data, $method);
    }

    // ============================================================================
    // Helper Functions
    // ============================================================================

    /**
     * Cloudflare Zone Lockdown Error Codes
     *
     * @return array<string, string> Associative array of error codes and descriptions
     */
    public function errorCodes(): array
    {
        return [
            '1000' => "Invalid or missing user",
            '1001' => "Invalid or missing zone identifier",
            '1002' => "Invalid or missing lockdown rule identifier",
            '1003' => "Lockdown rule not found",
            '1004' => "You do not have permission to modify lockdown rules",
            '1005' => "Invalid URLs array. Must contain at least one URL pattern",
            '1006' => "Invalid URL pattern. Must be a valid URL with optional wildcards",
            '1007' => "Invalid configurations array. Must contain at least one IP/range",
            '1008' => "Invalid IP address or IP range in configurations",
            '1009' => "Invalid configuration target. Must be 'ip' or 'ip_range'",
            '1010' => "Duplicate lockdown rule. A rule with this configuration already exists",
            '1011' => "Lockdown rule limit reached for this zone",
            '1012' => "Failed to create lockdown rule",
            '1013' => "Failed to update lockdown rule",
            '1014' => "Failed to delete lockdown rule",
            '1015' => "Description must be less than 1024 characters",
            '1016' => "Invalid paused value. Must be a boolean",
            '1017' => "Invalid priority value. Must be a positive integer",
            '1018' => "URLs array cannot exceed 1000 entries",
            '1019' => "Configurations array cannot exceed 1000 entries",
        ];
    }
}
