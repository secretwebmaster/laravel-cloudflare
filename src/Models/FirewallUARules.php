<?php

namespace Secretwebmaster\LaravelCloudflare\Models;

/**
 * Firewall User Agent Rules Model to interact with Cloudflare User Agent Blocking API
 * 
 * User Agent Blocking rules allow you to block, challenge, or allow requests based on
 * the User-Agent HTTP header. This is useful for blocking bad bots, scrapers, or
 * specific user agents.
 * 
 * Cloudflare API Documentation:
 * https://developers.cloudflare.com/api/resources/user_agent_blocking_rules/
 */
class FirewallUARules extends AbstractModel
{
    /**
     * List User Agent Blocking Rules
     *
     * Permission: Firewall Services:Read
     *
     * List all User Agent Blocking rules for a zone.
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
        $endpoint = "/zones/{$zoneId}/firewall/ua_rules";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Create User Agent Blocking Rule
     *
     * Permission: Firewall Services:Edit
     *
     * Create a new User Agent Blocking rule.
     *
     * Required parameters:
     * | Key           | Type   | Description |
     * |---------------|--------|-------------|
     * | mode          | string | block, challenge, js_challenge, or managed_challenge |
     * | configuration | object | Contains "target" (ua) and "value" (user agent string) |
     *
     * Optional parameters:
     * | Key         | Type    | Description |
     * |-------------|---------|-------------|
     * | description | string  | Description of the rule |
     * | paused      | boolean | Whether the rule is paused (default: false) |
     *
     * @param string $zoneId Zone identifier
     * @param array  $data User Agent rule data
     * @return mixed
     */
    public function create(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/ua_rules";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get User Agent Blocking Rule
     *
     * Permission: Firewall Services:Read
     *
     * Get details of a specific User Agent Blocking rule.
     *
     * @param string $zoneId Zone identifier
     * @param string $ruleId UA rule identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function get(string $zoneId, string $ruleId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/ua_rules/{$ruleId}";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Update User Agent Blocking Rule
     *
     * Permission: Firewall Services:Edit
     *
     * Update an existing User Agent Blocking rule.
     *
     * @param string $zoneId Zone identifier
     * @param string $ruleId UA rule identifier
     * @param array  $data User Agent rule data to update
     * @return mixed
     */
    public function update(string $zoneId, string $ruleId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/ua_rules/{$ruleId}";
        $method = 'PUT';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Delete User Agent Blocking Rule
     *
     * Permission: Firewall Services:Edit
     *
     * Delete a User Agent Blocking rule.
     *
     * @param string $zoneId Zone identifier
     * @param string $ruleId UA rule identifier
     * @param array  $data Additional parameters
     * @return mixed
     */
    public function delete(string $zoneId, string $ruleId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/ua_rules/{$ruleId}";
        $method = 'DELETE';
        return $this->client->fetch($endpoint, $data, $method);
    }

    // ============================================================================
    // Helper Functions
    // ============================================================================

    /**
     * Cloudflare User Agent Blocking Rules Error Codes
     *
     * @return array<string, string> Associative array of error codes and descriptions
     */
    public function errorCodes(): array
    {
        return [
            '1000' => "Invalid or missing user",
            '1001' => "Invalid or missing zone identifier",
            '1002' => "Invalid or missing UA rule identifier",
            '1003' => "User Agent rule not found",
            '1004' => "You do not have permission to modify User Agent rules",
            '1005' => "Invalid mode. Must be: block, challenge, js_challenge, or managed_challenge",
            '1006' => "Invalid configuration object",
            '1007' => "Invalid target. Must be 'ua'",
            '1008' => "Invalid or missing user agent value",
            '1009' => "User agent string must be between 1 and 1024 characters",
            '1010' => "Duplicate rule. A rule with this user agent already exists",
            '1011' => "User Agent rule limit reached for this zone",
            '1012' => "Failed to create User Agent rule",
            '1013' => "Failed to update User Agent rule",
            '1014' => "Failed to delete User Agent rule",
            '1015' => "Description must be less than 1024 characters",
            '1016' => "Invalid paused value. Must be a boolean",
            '1017' => "User agent string contains invalid characters",
            '1018' => "Missing required field: configuration",
            '1019' => "Missing required field: mode",
        ];
    }
}
