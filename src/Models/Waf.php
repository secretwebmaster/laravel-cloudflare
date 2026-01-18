<?php

namespace Secretwebmaster\LaravelCloudflare\Models;

/**
 * WAF Model to interact with Cloudflare Web Application Firewall API
 * 
 * The Web Application Firewall (WAF) protects against common web exploits,
 * including OWASP Top 10 threats, SQL injection, cross-site scripting (XSS),
 * and more.
 * 
 * This model handles:
 * - WAF Overrides: Custom configurations for specific URLs
 * - WAF Packages: Managed rulesets from Cloudflare and OWASP
 * - WAF Rule Groups: Collections of related WAF rules
 * - WAF Rules: Individual security rules
 * 
 * Cloudflare API Documentation:
 * https://developers.cloudflare.com/api/resources/waf/
 */
class Waf extends AbstractModel
{
    // ============================================================================
    // WAF Overrides
    // ============================================================================

    /**
     * List WAF Overrides
     *
     * Permission: WAF:Read
     *
     * List all WAF overrides for a zone.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Query parameters
     * @return mixed
     */
    public function listOverrides(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/waf/overrides";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Create WAF Override
     *
     * Permission: WAF:Edit
     *
     * Create a new WAF override.
     *
     * Required parameters:
     * | Key  | Type   | Description |
     * |------|--------|-------------|
     * | urls | array  | URLs to apply the override |
     *
     * Optional parameters:
     * | Key         | Type   | Description |
     * |-------------|--------|-------------|
     * | rules       | object | Rule-specific overrides |
     * | groups      | object | Group-specific overrides |
     * | description | string | Description of the override |
     * | paused      | bool   | Whether override is paused |
     * | priority    | int    | Priority order |
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Override configuration
     * @return mixed
     */
    public function createOverride(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/waf/overrides";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get WAF Override
     *
     * Permission: WAF:Read
     *
     * @param string $zoneId Zone identifier
     * @param string $overrideId Override identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getOverride(string $zoneId, string $overrideId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/waf/overrides/{$overrideId}";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Update WAF Override
     *
     * Permission: WAF:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $overrideId Override identifier
     * @param array  $data Override data to update
     * @return mixed
     */
    public function updateOverride(string $zoneId, string $overrideId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/waf/overrides/{$overrideId}";
        $method = 'PUT';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Delete WAF Override
     *
     * Permission: WAF:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $overrideId Override identifier
     * @param array  $data Additional parameters
     * @return mixed
     */
    public function deleteOverride(string $zoneId, string $overrideId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/waf/overrides/{$overrideId}";
        $method = 'DELETE';
        return $this->client->fetch($endpoint, $data, $method);
    }

    // ============================================================================
    // WAF Packages
    // ============================================================================

    /**
     * List WAF Packages
     *
     * Permission: WAF:Read
     *
     * List all available WAF packages for a zone.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Query parameters
     * @return mixed
     */
    public function listPackages(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/waf/packages";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get WAF Package
     *
     * Permission: WAF:Read
     *
     * Get details of a specific WAF package.
     *
     * @param string $zoneId Zone identifier
     * @param string $packageId Package identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getPackage(string $zoneId, string $packageId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/waf/packages/{$packageId}";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    // ============================================================================
    // WAF Rule Groups
    // ============================================================================

    /**
     * List WAF Rule Groups
     *
     * Permission: WAF:Read
     *
     * List all rule groups in a WAF package.
     *
     * @param string $zoneId Zone identifier
     * @param string $packageId Package identifier
     * @param array  $data Query parameters
     * @return mixed
     */
    public function listGroups(string $zoneId, string $packageId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/waf/packages/{$packageId}/groups";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get WAF Rule Group
     *
     * Permission: WAF:Read
     *
     * Get details of a specific WAF rule group.
     *
     * @param string $zoneId Zone identifier
     * @param string $packageId Package identifier
     * @param string $groupId Group identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getGroup(string $zoneId, string $packageId, string $groupId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/waf/packages/{$packageId}/groups/{$groupId}";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Update WAF Rule Group
     *
     * Permission: WAF:Edit
     *
     * Update settings for a WAF rule group.
     *
     * Supported parameters:
     * | Key  | Type   | Description |
     * |------|--------|-------------|
     * | mode | string | on or off |
     *
     * @param string $zoneId Zone identifier
     * @param string $packageId Package identifier
     * @param string $groupId Group identifier
     * @param array  $data Group settings to update
     * @return mixed
     */
    public function updateGroup(string $zoneId, string $packageId, string $groupId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/waf/packages/{$packageId}/groups/{$groupId}";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, $data, $method);
    }

    // ============================================================================
    // WAF Rules
    // ============================================================================

    /**
     * List WAF Rules
     *
     * Permission: WAF:Read
     *
     * List all rules in a WAF package.
     *
     * Supported query parameters:
     * | Key       | Type   | Description |
     * |-----------|--------|-------------|
     * | mode      | string | Filter by mode: on, off, default, disable, simulate, block, challenge |
     * | group_id  | string | Filter by group ID |
     * | page      | int    | Page number |
     * | per_page  | int    | Number per page (max 100) |
     *
     * @param string $zoneId Zone identifier
     * @param string $packageId Package identifier
     * @param array  $data Query parameters
     * @return mixed
     */
    public function listRules(string $zoneId, string $packageId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/waf/packages/{$packageId}/rules";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get WAF Rule
     *
     * Permission: WAF:Read
     *
     * Get details of a specific WAF rule.
     *
     * @param string $zoneId Zone identifier
     * @param string $packageId Package identifier
     * @param string $ruleId Rule identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getRule(string $zoneId, string $packageId, string $ruleId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/waf/packages/{$packageId}/rules/{$ruleId}";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Update WAF Rule
     *
     * Permission: WAF:Edit
     *
     * Update the mode of a specific WAF rule.
     *
     * Supported parameters:
     * | Key  | Type   | Description |
     * |------|--------|-------------|
     * | mode | string | default, disable, simulate, block, challenge |
     *
     * @param string $zoneId Zone identifier
     * @param string $packageId Package identifier
     * @param string $ruleId Rule identifier
     * @param array  $data Rule settings to update
     * @return mixed
     */
    public function updateRule(string $zoneId, string $packageId, string $ruleId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/waf/packages/{$packageId}/rules/{$ruleId}";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, $data, $method);
    }

    // ============================================================================
    // Helper Functions
    // ============================================================================

    /**
     * Cloudflare WAF Error Codes
     *
     * @return array<string, string> Associative array of error codes and descriptions
     */
    public function errorCodes(): array
    {
        return [
            '1000' => "Invalid or missing user",
            '1001' => "Invalid or missing zone identifier",
            '1002' => "Invalid or missing package identifier",
            '1003' => "Invalid or missing group identifier",
            '1004' => "Invalid or missing rule identifier",
            '1005' => "Invalid or missing override identifier",
            '1006' => "Package not found",
            '1007' => "Group not found",
            '1008' => "Rule not found",
            '1009' => "Override not found",
            '1010' => "You do not have permission to modify WAF settings",
            '1011' => "WAF not available for this plan",
            '1012' => "Invalid mode. Check allowed values for this endpoint",
            '1013' => "Invalid URLs array in override",
            '1014' => "Failed to create WAF override",
            '1015' => "Failed to update WAF override",
            '1016' => "Failed to delete WAF override",
            '1017' => "Failed to update WAF group",
            '1018' => "Failed to update WAF rule",
            '1019' => "Override limit reached for this zone",
            '1020' => "Invalid priority value",
            '1021' => "Description must be less than 1024 characters",
            '1022' => "Invalid paused value. Must be a boolean",
        ];
    }
}
