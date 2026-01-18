<?php

namespace Secretwebmaster\LaravelCloudflare\Models;

/**
 * Page Rules Model to interact with Cloudflare Page Rules API
 * 
 * Page Rules allow you to customize Cloudflare's functionality for specific URL patterns.
 * You can use page rules to control caching, security settings, and more.
 * 
 * Cloudflare API Documentation:
 * https://developers.cloudflare.com/api/resources/page_rules/
 * 
 * Important Notes:
 * - Free plans: 3 page rules
 * - Pro plans: 20 page rules
 * - Business plans: 50 page rules
 * - Enterprise plans: 125 page rules
 */
class PageRules extends AbstractModel
{
    /**
     * List Page Rules
     *
     * Permission: Page Rules:Read
     *
     * Fetch all Page Rules for a zone.
     *
     * Supported query parameters:
     * | Key       | Type   | Description |
     * |-----------|--------|-------------|
     * | status    | string | Filter by status: active, disabled |
     * | order     | string | Field to order by |
     * | direction | string | asc or desc |
     * | match     | string | all or any |
     *
     * @link https://developers.cloudflare.com/api/operations/page-rules-list-page-rules
     * @param string $zoneId Zone identifier
     * @param array  $data Query parameters
     * @return mixed
     */
    public function list(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/pagerules";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Create a Page Rule
     *
     * Permission: Page Rules:Write
     *
     * Create a new Page Rule for a zone.
     *
     * Required parameters:
     * | Key     | Type   | Description |
     * |---------|--------|-------------|
     * | targets | array  | URL pattern targets |
     * | actions | array  | Actions to perform when rule matches |
     *
     * Optional parameters:
     * | Key      | Type   | Description |
     * |----------|--------|-------------|
     * | status   | string | active or disabled (default: disabled) |
     * | priority | int    | Rule priority (1 is highest) |
     * 
     * Usee getSettingList() to see available actions.
     *
     * @link https://developers.cloudflare.com/api/operations/page-rules-create-a-page-rule
     * @param string $zoneId Zone identifier
     * @param array  $data Page rule configuration
     * @return mixed
     */
    public function create(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/pagerules";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get a Page Rule
     *
     * Permission: Page Rules:Read
     *
     * Fetch details of a single Page Rule.
     *
     * @link https://developers.cloudflare.com/api/operations/page-rules-get-a-page-rule
     * @param string $zoneId Zone identifier
     * @param string $ruleId Page rule identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function get(string $zoneId, string $ruleId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/pagerules/{$ruleId}";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Update a Page Rule
     *
     * Permission: Page Rules:Write
     *
     * Replace all attributes of an existing Page Rule. All fields required.
     *
     * Required parameters:
     * | Key     | Type   | Description |
     * |---------|--------|-------------|
     * | targets | array  | URL pattern targets |
     * | actions | array  | Actions to perform |
     * | status  | string | active or disabled |
     *
     * @link https://developers.cloudflare.com/api/operations/page-rules-update-a-page-rule
     * @param string $zoneId Zone identifier
     * @param string $ruleId Page rule identifier
     * @param array  $data Complete page rule configuration
     * @return mixed
     */
    public function update(string $zoneId, string $ruleId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/pagerules/{$ruleId}";
        $method = 'PUT';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Edit a Page Rule
     *
     * Permission: Page Rules:Write
     *
     * Update individual attributes of a Page Rule. Only specified fields updated.
     *
     * @link https://developers.cloudflare.com/api/operations/page-rules-edit-a-page-rule
     * @param string $zoneId Zone identifier
     * @param string $ruleId Page rule identifier
     * @param array  $data Partial page rule data to update
     * @return mixed
     */
    public function edit(string $zoneId, string $ruleId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/pagerules/{$ruleId}";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Delete a Page Rule
     *
     * Permission: Page Rules:Write
     *
     * Delete an existing Page Rule.
     *
     * @link https://developers.cloudflare.com/api/operations/page-rules-delete-a-page-rule
     * @param string $zoneId Zone identifier
     * @param string $ruleId Page rule identifier
     * @param array  $data Additional parameters
     * @return mixed
     */
    public function delete(string $zoneId, string $ruleId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/pagerules/{$ruleId}";
        $method = 'DELETE';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Get Available Page Rule Settings
     *
     * Get a list of available settings that can be used in page rule actions.
     * This is a helper function to understand what actions are available.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function getSettingList(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/pagerules/settings";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    // ============================================================================
    // Helper Functions
    // ============================================================================

    /**
     * Cloudflare Page Rules Error Codes
     *
     * Returns an array of all possible Cloudflare Page Rules API error codes.
     * Useful for debugging and error handling.
     * 
     * @return array<string, string> Associative array of error codes and descriptions
     */
    public function errorCodes(): array
    {
        return [
            '1000' => "Invalid or missing user",
            '1001' => "Invalid or missing zone_id",
            '1002' => "Invalid or missing page rule identifier",
            '1003' => "Page rule not found",
            '1004' => "You do not have permission to modify this page rule",
            '1005' => "Invalid targets array. Must contain at least one target",
            '1006' => "Invalid target constraint. Must specify target and constraint",
            '1007' => "Invalid target URL pattern",
            '1008' => "Invalid actions array. Must contain at least one action",
            '1009' => "Invalid action id",
            '1010' => "Invalid action value for the specified action id",
            '1011' => "Page rule limit reached for this zone",
            '1012' => "Invalid status. Must be 'active' or 'disabled'",
            '1013' => "Invalid priority. Must be a positive integer",
            '1014' => "Duplicate page rule. A page rule with this URL pattern already exists",
            '1015' => "Failed to create page rule",
            '1016' => "Failed to update page rule",
            '1017' => "Failed to delete page rule",
            '1018' => "Invalid URL pattern. Must be a valid URL with wildcards",
            '1019' => "Conflicting actions. Some actions cannot be used together",
            '1020' => "Action not allowed for this plan type",
            '1021' => "Missing required field",
            '1022' => "URL pattern exceeds maximum length",
            '1023' => "Too many actions specified",
            '1024' => "Invalid forwarding URL",
            '1025' => "Invalid cache level value",
            '1026' => "Invalid edge cache TTL value",
            '1027' => "Invalid browser cache TTL value",
            '1028' => "Invalid security level value",
            '1029' => "Invalid SSL mode value",
        ];
    }

    /**
     * Create page rule with specified Url, Cache Level and option edge cache TTL
     * 
     * @param string   $zoneId        Zone identifier
     * @param string   $urlPattern    URL pattern to match (e.g., '*.example.com/path/*')
     * @param string   $cacheLevel    Cache level (e.g., 'bypass', 'basic', 'simplified', 'aggressive', 'cache_everything')
     * @param int|null $edgeCacheTtl Optional Edge Cache TTL in seconds
     * @return mixed
     */
    public function createCacheRule(string $zoneId, string $urlPattern, string $cacheLevel = 'standard', ?int $edgeCacheTtl = null)
    {
        // check if $cacheLevel is valid
        $validCacheLevels = ['bypass', 'basic', 'simplified', 'aggressive', 'cache_everything'];
        if (!in_array($cacheLevel, $validCacheLevels)) {
            throw new \InvalidArgumentException("Invalid cache level: {$cacheLevel}. Valid options are: " . implode(', ', $validCacheLevels));
        }

        $actions = [
            [
                'id' => 'cache_level',
                'value' => $cacheLevel,
            ],
        ];

        if ($edgeCacheTtl !== null) {
            $actions[] = [
                'id' => 'edge_cache_ttl',
                'value' => $edgeCacheTtl,
            ];
        }

        return $this->create($zoneId, [
            'targets' => [
                [
                    'target' => 'url',
                    'constraint' => [
                        'operator' => 'matches',
                        'value' => $urlPattern,
                    ],
                ],
            ],
            'actions' => $actions,
            'status' => 'active',
            'priority' => 1,
        ]);
    }

    /**
     * Delete all page rules for a given zone
     */
    public function deleteAll(string $zoneId)
    {
        $list = $this->list($zoneId);
        $deletedCount = 0;
        if (isset($list->result) && is_array($list->result)) {
            foreach ($list->result as $rule) {
                $ruleId = $rule->id ?? null;
                if ($ruleId) {
                    $this->delete($zoneId, $ruleId);
                    $deletedCount++;
                }
            }
        }

        return $deletedCount;
    }

    /**
     * Delete rule by specified URL pattern
     */
    public function deleteByUrlPattern(string $zoneId, string $urlPattern)
    {
        $list = $this->list($zoneId);;
        $deletedCount = 0;
        if (isset($list->result) && is_array($list->result)) {
            foreach ($list->result as $rule) {
                $ruleId = $rule->id ?? null;
                $targets = $rule->targets ?? [];
                foreach ($targets as $target) {
                    if (($target->target ?? '') === 'url' && ($target->constraint->value ?? '') === $urlPattern) {
                        if ($ruleId) {
                            $this->delete($zoneId, $ruleId);
                            $deletedCount++;
                        }
                    }
                }
            }
        }
        return $deletedCount;
    }
}