<?php

namespace Secretwebmaster\LaravelCloudflare\Models;

/**
 * Accounts Model to interact with Cloudflare Accounts API
 * 
 * Provides methods to manage Cloudflare accounts including listing, 
 * retrieving details, and updating account information.
 * 
 * Cloudflare API Documentation:
 * https://developers.cloudflare.com/api/resources/accounts/
 */
class Accounts extends AbstractModel
{
    /**
     * List Accounts
     *
     * Permission: Account Settings:Read
     *
     * List all accounts you have ownership or verified access to.
     *
     * Supported query parameters:
     * | Key       | Type   | Description |
     * |-----------|--------|-------------|
     * | name      | string | Account name |
     * | page      | int    | Page number for pagination |
     * | per_page  | int    | Number of accounts per page (max 50) |
     * | direction | string | Direction to order accounts (asc, desc) |
     *
     * @param array $data Query parameters
     * @return mixed
     */
    public function list(array $data = [])
    {
        $endpoint = "/accounts";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }
    
    /**
     * Account Details
     *
     * Permission: Account Settings:Read
     *
     * Get information about a specific account that you are a member of.
     *
     * @param string $accountId Account identifier tag
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function get(string $accountId, array $data = [])
    {
        $endpoint = "/accounts/{$accountId}";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Edit Account
     *
     * Permission: Account Settings:Write
     *
     * Edit an existing account. Only the fields you wish to update need to be provided.
     *
     * Supported parameters:
     * | Key      | Type   | Description |
     * |----------|--------|-------------|
     * | name     | string | Account name |
     * | settings | object | Account settings (enforce_twofactor, etc.) |
     *
     * @param string $accountId Account identifier tag
     * @param array  $data Account data to update
     * @return mixed
     */
    public function edit(string $accountId, array $data = [])
    {
        $endpoint = "/accounts/{$accountId}";
        $method = 'PUT';
        return $this->client->fetch($endpoint, $data, $method);
    }

    // ============================================================================
    // Helper Functions
    // ============================================================================

    /**
     * Cloudflare Accounts Error Codes
     *
     * Returns an array of all possible Cloudflare Accounts API error codes.
     * Useful for debugging and error handling.
     * 
     * @return array<string, string> Associative array of error codes and descriptions
     */
    public function errorCodes(): array
    {
        return [
            '1000' => "Invalid or missing user",
            '1001' => "Invalid or missing account identifier",
            '1002' => "Account not found",
            '1003' => "You do not have permission to perform this action on this account",
            '1004' => "Invalid account name. Account name must be between 3 and 100 characters",
            '1005' => "Account name already exists",
            '1006' => "Invalid settings object",
            '1007' => "Failed to update account",
            '1008' => "Invalid pagination parameters",
            '1009' => "Unable to list accounts",
            '1010' => "Account is suspended and cannot be modified",
            '1011' => "Invalid enforce_twofactor setting. Must be a boolean value",
            '1012' => "Account type cannot be changed",
            '1013' => "Missing required parameter",
            '1014' => "Invalid parameter value",
            '1015' => "Account has reached the maximum number of allowed members",
            '1016' => "Operation not permitted for this account type",
            '1017' => "Account settings update failed",
            '1018' => "Invalid account settings configuration",
        ];
    }
}

