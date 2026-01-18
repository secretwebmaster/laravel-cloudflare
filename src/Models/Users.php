<?php

namespace Secretwebmaster\LaravelCloudflare\Models;

/**
 * Users Model to interact with Cloudflare User API
 * 
 * Provides methods to manage the authenticated user's details and settings.
 * 
 * Cloudflare API Documentation:
 * https://developers.cloudflare.com/api/resources/user/
 */
class Users extends AbstractModel
{
    /**
     * User Details
     *
     * Permission: User:Read
     *
     * Get information about the currently logged in/authenticated user.
     *
     * @param array $data Additional query parameters
     * @return mixed
     */
    public function get(array $data = [])
    {
        $endpoint = "/user";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Edit User
     *
     * Permission: User:Edit
     *
     * Edit part of your user details.
     *
     * Supported parameters:
     * | Key        | Type   | Description |
     * |------------|--------|-------------|
     * | first_name | string | User's first name |
     * | last_name  | string | User's last name |
     * | telephone  | string | User's telephone number |
     * | country    | string | The country in which the user lives |
     * | zipcode    | string | The zipcode or postal code where the user lives |
     *
     * @param array $data User data to update
     * @return mixed
     */
    public function update(array $data = [])
    {
        $endpoint = "/user";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Edit User (Alias)
     *
     * Alias for update() method for backward compatibility.
     *
     * @param array $data User data to update
     * @return mixed
     */
    public function edit(array $data = [])
    {
        return $this->update($data);
    }

    // ============================================================================
    // Helper Functions
    // ============================================================================

    /**
     * Cloudflare User Error Codes
     *
     * Returns an array of all possible Cloudflare User API error codes.
     * Useful for debugging and error handling.
     * 
     * @return array<string, string> Associative array of error codes and descriptions
     */
    public function errorCodes(): array
    {
        return [
            '1000' => "Invalid or missing user",
            '1001' => "You do not have permission to perform this action",
            '1002' => "Invalid first_name. Must be between 1 and 60 characters",
            '1003' => "Invalid last_name. Must be between 1 and 60 characters",
            '1004' => "Invalid telephone number",
            '1005' => "Invalid country code. Must be a valid ISO 3166-1 alpha-2 country code",
            '1006' => "Invalid zipcode",
            '1007' => "Failed to update user",
            '1008' => "User is suspended and cannot be modified",
            '1009' => "Invalid parameter value",
            '1010' => "Missing required parameter",
            '1011' => "Email address cannot be changed through this endpoint",
            '1012' => "Unable to retrieve user information",
            '1013' => "User authentication required",
            '1014' => "Invalid user session",
            '1015' => "User account is disabled",
        ];
    }
}
