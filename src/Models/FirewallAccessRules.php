<?php

namespace Secretwebmaster\LaravelCloudflare\Models;

/**
 * Firewall Access Rules Model to interact with Cloudflare Firewall Access Rules API
 * 
 * IP Access Rules allow you to allowlist, block, and challenge traffic based on 
 * IP address, IP range, ASN, or country.
 * 
 * Access rules can be applied at three levels:
 * - User level: Apply to all zones in your account
 * - Account level: Apply to all zones in a specific account
 * - Zone level: Apply to a specific zone only
 * 
 * Cloudflare API Documentation:
 * https://developers.cloudflare.com/api/resources/firewall/subresources/access_rules/
 */
class FirewallAccessRules extends AbstractModel
{
    // ============================================================================
    // User-Level Access Rules
    // ============================================================================

    /**
     * List User-Level IP Access Rules
     *
     * Permission: Firewall Services:Read
     *
     * List all IP access rules for the user.
     *
     * Supported query parameters:
     * | Key       | Type   | Description |
     * |-----------|--------|-------------|
     * | mode      | string | Filter by mode: block, challenge, whitelist, js_challenge, managed_challenge |
     * | match     | string | all or any |
     * | page      | int    | Page number |
     * | per_page  | int    | Number per page (max 100) |
     *
     * @param array $data Query parameters
     * @return mixed
     */
    public function listUser(array $data = [])
    {
        $endpoint = "/user/firewall/access_rules/rules";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Create User-Level IP Access Rule
     *
     * Permission: Firewall Services:Edit
     *
     * Create a new IP access rule for the user.
     *
     * Required parameters:
     * | Key           | Type   | Description |
     * |---------------|--------|-------------|
     * | mode          | string | block, challenge, whitelist, js_challenge, managed_challenge |
     * | configuration | object | Target configuration with "target" and "value" |
     *
     * Optional parameters:
     * | Key   | Type   | Description |
     * |-------|--------|-------------|
     * | notes | string | Description of the rule |
     *
     * @param array $data Rule data
     * @return mixed
     */
    public function createUser(array $data = [])
    {
        $endpoint = "/user/firewall/access_rules/rules";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get User-Level IP Access Rule
     *
     * Permission: Firewall Services:Read
     *
     * Get details of a specific user-level IP access rule.
     *
     * @param string $ruleId Rule identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getUser(string $ruleId, array $data = [])
    {
        $endpoint = "/user/firewall/access_rules/rules/{$ruleId}";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Update User-Level IP Access Rule
     *
     * Permission: Firewall Services:Edit
     *
     * Update a user-level IP access rule.
     *
     * @param string $ruleId Rule identifier
     * @param array  $data Rule data to update
     * @return mixed
     */
    public function updateUser(string $ruleId, array $data = [])
    {
        $endpoint = "/user/firewall/access_rules/rules/{$ruleId}";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Delete User-Level IP Access Rule
     *
     * Permission: Firewall Services:Edit
     *
     * Delete a user-level IP access rule.
     *
     * @param string $ruleId Rule identifier
     * @param array  $data Additional parameters
     * @return mixed
     */
    public function deleteUser(string $ruleId, array $data = [])
    {
        $endpoint = "/user/firewall/access_rules/rules/{$ruleId}";
        $method = 'DELETE';
        return $this->client->fetch($endpoint, $data, $method);
    }

    // ============================================================================
    // Account-Level Access Rules
    // ============================================================================

    /**
     * List Account-Level IP Access Rules
     *
     * Permission: Firewall Services:Read
     *
     * @param string $accountId Account identifier
     * @param array  $data Query parameters
     * @return mixed
     */
    public function listAccount(string $accountId, array $data = [])
    {
        $endpoint = "/accounts/{$accountId}/firewall/access_rules/rules";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Create Account-Level IP Access Rule
     *
     * Permission: Firewall Services:Edit
     *
     * @param string $accountId Account identifier
     * @param array  $data Rule data
     * @return mixed
     */
    public function createAccount(string $accountId, array $data = [])
    {
        $endpoint = "/accounts/{$accountId}/firewall/access_rules/rules";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Account-Level IP Access Rule
     *
     * Permission: Firewall Services:Read
     *
     * @param string $accountId Account identifier
     * @param string $ruleId Rule identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getAccount(string $accountId, string $ruleId, array $data = [])
    {
        $endpoint = "/accounts/{$accountId}/firewall/access_rules/rules/{$ruleId}";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Update Account-Level IP Access Rule
     *
     * Permission: Firewall Services:Edit
     *
     * @param string $accountId Account identifier
     * @param string $ruleId Rule identifier
     * @param array  $data Rule data to update
     * @return mixed
     */
    public function updateAccount(string $accountId, string $ruleId, array $data = [])
    {
        $endpoint = "/accounts/{$accountId}/firewall/access_rules/rules/{$ruleId}";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Delete Account-Level IP Access Rule
     *
     * Permission: Firewall Services:Edit
     *
     * @param string $accountId Account identifier
     * @param string $ruleId Rule identifier
     * @param array  $data Additional parameters
     * @return mixed
     */
    public function deleteAccount(string $accountId, string $ruleId, array $data = [])
    {
        $endpoint = "/accounts/{$accountId}/firewall/access_rules/rules/{$ruleId}";
        $method = 'DELETE';
        return $this->client->fetch($endpoint, $data, $method);
    }

    // ============================================================================
    // Zone-Level Access Rules
    // ============================================================================

    /**
     * List Zone-Level IP Access Rules
     *
     * Permission: Firewall Services:Read
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Query parameters
     * @return mixed
     */
    public function list(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/access_rules/rules";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Create Zone-Level IP Access Rule
     *
     * Permission: Firewall Services:Edit
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Rule data
     * @return mixed
     */
    public function create(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/access_rules/rules";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Zone-Level IP Access Rule
     *
     * Permission: Firewall Services:Read
     *
     * @param string $zoneId Zone identifier
     * @param string $ruleId Rule identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function get(string $zoneId, string $ruleId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/access_rules/rules/{$ruleId}";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Update Zone-Level IP Access Rule
     *
     * Permission: Firewall Services:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $ruleId Rule identifier
     * @param array  $data Rule data to update
     * @return mixed
     */
    public function update(string $zoneId, string $ruleId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/access_rules/rules/{$ruleId}";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Delete Zone-Level IP Access Rule
     *
     * Permission: Firewall Services:Edit
     *
     * @param string $zoneId Zone identifier
     * @param string $ruleId Rule identifier
     * @param array  $data Additional parameters
     * @return mixed
     */
    public function delete(string $zoneId, string $ruleId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/firewall/access_rules/rules/{$ruleId}";
        $method = 'DELETE';
        return $this->client->fetch($endpoint, $data, $method);
    }

    // ============================================================================
    // Helper Functions
    // ============================================================================

    /**
     * Cloudflare Firewall Access Rules Error Codes
     *
     * @return array<string, string> Associative array of error codes and descriptions
     */
    public function errorCodes(): array
    {
        return [
            '1000' => "Invalid or missing user",
            '1001' => "Invalid or missing zone/account identifier",
            '1002' => "Invalid or missing rule identifier",
            '1003' => "Rule not found",
            '1004' => "You do not have permission to modify firewall rules",
            '1005' => "Invalid mode. Must be: block, challenge, whitelist, js_challenge, or managed_challenge",
            '1006' => "Invalid configuration object",
            '1007' => "Invalid target. Must be: ip, ip_range, country, asn, or ip6",
            '1008' => "Invalid IP address or IP range",
            '1009' => "Invalid country code. Must be a valid ISO 3166-1 alpha-2 code",
            '1010' => "Invalid ASN number",
            '1011' => "Duplicate rule. A rule with this configuration already exists",
            '1012' => "Rule limit reached for this zone/account/user",
            '1013' => "Failed to create access rule",
            '1014' => "Failed to update access rule",
            '1015' => "Failed to delete access rule",
            '1016' => "Notes must be less than 500 characters",
            '1017' => "Invalid IPv6 address",
            '1018' => "Missing required field: configuration",
            '1019' => "Missing required field: mode",
        ];
    }
}
