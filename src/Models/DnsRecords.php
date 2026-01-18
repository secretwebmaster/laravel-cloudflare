<?php

namespace Secretwebmaster\LaravelCloudflare\Models;

/**
 * DNS Records Model to interact with Cloudflare DNS Records API
 * 
 * Cloudflare API Documentation:
 * https://developers.cloudflare.com/api/resources/dns_records/
 * 
 * Important Notes:
 * - If a zone's cname_setup_status is TRUE, you may only add A/AAAA and CNAME records
 * - CNAME records cannot coexist with A/AAAA records of the same name
 * - A CNAME record's name may not match its content
 * - NS records cannot share names with any other record type
 * - DNS serving begins when nameservers are switched to Cloudflare at the registrar
 * - DNS continues for 20 days after nameservers are switched away from Cloudflare
 * - Unicode characters in domain names are translated to punycode
 */
class DnsRecords extends AbstractModel
{
    /**
     * List DNS Records
     *
     * Permission: DNS:Read
     *
     * List, search, sort, and filter DNS records.
     *
     * Supported query parameters:
     * | Key       | Type   | Description |
     * |-----------|--------|-------------|
     * | name      | string | DNS record name |
     * | type      | string | Record type (A, AAAA, CNAME, MX, TXT, etc.) |
     * | content   | string | DNS record content |
     * | proxied   | bool   | Whether the record is proxied through Cloudflare |
     * | page      | int    | Page number |
     * | per_page  | int    | Records per page (max 5000) |
     * | order     | string | Field to order by |
     * | direction | string | asc or desc |
     * | match     | string | all or any |
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Query parameters
     * @return mixed
     */
    public function list(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/dns_records";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Create DNS Record
     *
     * Permission: DNS:Write
     *
     * Create a new DNS record for a zone.
     *
     * Required parameters:
     * | Key     | Type   | Description |
     * |---------|--------|-------------|
     * | type    | string | Record type (A, AAAA, CNAME, MX, TXT, etc.) |
     * | name    | string | DNS record name |
     * | content | string | DNS record content |
     *
     * Optional parameters:
     * | Key      | Type | Description |
     * |----------|------|-------------|
     * | ttl      | int  | Time to live (120-2147483647, or 1 for auto) |
     * | priority | int  | Priority (required for MX, SRV records) |
     * | proxied  | bool | Whether to proxy through Cloudflare (A, AAAA, CNAME only) |
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Record data
     * @return mixed
     */
    public function create(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/dns_records";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * DNS Record Details
     *
     * Permission: DNS:Read
     *
     * Get details of a specific DNS record.
     *
     * @param string $zoneId Zone identifier
     * @param string $recordId DNS record identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function get(string $zoneId, string $recordId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/dns_records/{$recordId}";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Override an existing DNS Record with full data 
     *
     * Permission: DNS:Write
     *
     * Override an existing DNS record. All fields must be provided.
     *
     * Required parameters:
     * | Key     | Type   | Description |
     * |---------|--------|-------------|
     * | type    | string | Record type |
     * | name    | string | DNS record name |
     * | content | string | DNS record content |
     *
     * @param string $zoneId Zone identifier
     * @param string $recordId DNS record identifier
     * @param array  $data Record data (all fields required)
     * @return mixed
     */
    public function replace(string $zoneId, string $recordId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/dns_records/{$recordId}";
        $method = 'PUT';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Update an existing DNS Record
     *
     * Permission: DNS:Write
     *
     * Update an existing DNS record. Only specified fields will be updated.
     *
     * @param string $zoneId Zone identifier
     * @param string $recordId DNS record identifier
     * @param array  $data Partial record data to update
     * @return mixed
     */
    public function edit(string $zoneId, string $recordId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/dns_records/{$recordId}";
        $method = 'PATCH';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Delete DNS Record
     *
     * Permission: DNS:Write
     *
     * Delete a DNS record.
     *
     * @param string $zoneId Zone identifier
     * @param string $recordId DNS record identifier
     * @param array  $data Additional parameters
     * @return mixed
     */
    public function delete(string $zoneId, string $recordId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/dns_records/{$recordId}";
        $method = 'DELETE';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Export DNS Records
     *
     * Permission: DNS:Read
     *
     * Export DNS records in BIND format.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional query parameters
     * @return mixed
     */
    public function export(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/dns_records/export";
        $method = 'GET';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Import DNS Records
     *
     * Permission: DNS:Write
     *
     * Import DNS records from a BIND zone file.
     *
     * Required parameters:
     * | Key  | Type   | Description |
     * |------|--------|-------------|
     * | file | string | BIND zone file contents |
     *
     * Optional parameters:
     * | Key           | Type | Description |
     * |---------------|------|-------------|
     * | proxied       | bool | Whether to proxy imported records |
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Import data (must include 'file' key)
     * @return mixed
     */
    public function import(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/dns_records/import";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    /**
     * Scan DNS Records
     *
     * Permission: DNS:Write
     *
     * Scan for common DNS records and add them to the zone.
     * This endpoint is typically used during zone setup.
     *
     * @param string $zoneId Zone identifier
     * @param array  $data Additional parameters
     * @return mixed
     */
    public function scan(string $zoneId, array $data = [])
    {
        $endpoint = "/zones/{$zoneId}/dns_records/scan";
        $method = 'POST';
        return $this->client->fetch($endpoint, $data, $method);
    }

    // ============================================================================
    // Helper Functions
    // ============================================================================

    /**
     * Cloudflare DNS Records Error Codes
     *
     * Returns an array of all possible Cloudflare DNS Records API error codes.
     * Useful for debugging and error handling.
     * 
     * @return array<string, string> Associative array of error codes and descriptions
     */
    public function errorCodes(): array
    {
        return [
            '1000' => "Invalid user",
            '1002' => "Invalid or missing zone_id",
            '1003' => "per_page must be a positive integer",
            '1004' => "Invalid or missing zone",
            '1005' => "Invalid or missing record",
            '1007' => "name required",
            '1008' => "content required",
            '1009' => "Invalid or missing record id",
            '1010' => "Invalid or missing record",
            '1011' => "Zone file for '<domain name>' could not be found",
            '1012' => "Zone file for '<domain name>' is not modifiable",
            '1013' => "The record could not be found",
            '1014' => "You do not have permission to modify this zone",
            '1015' => "Unknown error",
            '1017' => "Content for A record is invalid. Must be a valid IPv4 address",
            '1018' => "Content for AAAA record is invalid. Must be a valid IPv6 address",
            '1019' => "Content for CNAME record is invalid",
            '1024' => "Invalid priority, priority must be set and be between 0 and 65535",
            '1025' => "Invalid content for an MX record",
            '1026' => "Invalid format for a SPF record. A valid example is 'v=spf1 a mx -all'. You should not include either the word TXT or the domain name here in the content",
            '1027' => "Invalid service value",
            '1028' => "Invalid service value. Must be less than 100 characters",
            '1029' => "Invalid protocol value",
            '1030' => "Invalid protocol value. Must be less than 12 characters",
            '1031' => "Invalid SRV name",
            '1032' => "Invalid SRV name. Must be less than 90 characters",
            '1033' => "Invalid weight value. Must be between 0 and 65,535",
            '1034' => "Invalid port value. Must be between 0 and 65,535",
            '1037' => "Invalid domain name for a SRV target host",
            '1038' => "Invalid DNS record type",
            '1039' => "Invalid TTL. Must be between 120 and 4,294,967,295 seconds, or 1 for automatic",
            '1041' => "Priority must be set for SRV record",
            '1042' => "Zone file for '<domain name>' could not be found",
            '1043' => "Zone file for '<domain name>' is not editable",
            '1044' => "A record with these exact values already exists. Please modify or remove this record",
            '1045' => "The record could not be found",
            '1046' => "A record with these exact values already exists. Please modify or cancel this edit",
            '1047' => "You do not have permission to modify this zone",
            '1048' => "You have reached the record limit for this zone",
            '1049' => "The record content is missing",
            '1050' => "Could not find record",
            '1052' => "You can not point a CNAME to itself",
            '1053' => "Invalid lat_degrees, must be an integer between 0 and 90 inclusive",
            '1054' => "Invalid lat_minutes, must be an integer between 0 and 59 inclusive",
            '1055' => "Invalid lat_seconds, must be a floating point number between 0 and 60, including 0 but not including 60",
            '1056' => "Invalid or missing lat_direction. Values must be N or S",
            '1057' => "Invalid long_degrees, must be an integer between 0 and 180",
            '1058' => "Invalid long_minutes, must be an integer between 0 and 59",
            '1059' => "Invalid long_seconds, must be a floating point number between 0 and 60, including 0 but not including 60",
            '1060' => "Invalid or missing long_direction. Values must be E or S",
            '1061' => "Invalid altitude, must be a floating point number between -100000.00 and 42849672.95",
            '1062' => "Invalid size, must be a floating point number between 0 and 90000000.00",
            '1063' => "Invalid precision_horz, must be a floating point number between 0 and 90000000.00",
            '1064' => "Invalid precision_vert, must be a floating point number between 0 and 90000000.00",
            '1065' => "Invalid or missing data for <type> record",
            '1067' => "Invalid content for a NS record",
            '1068' => "Target cannot be an IP address",
            '1069' => "CNAME content cannot reference itself",
            '1070' => "CNAME content cannot be an IP",
            '1071' => "Invalid proxied mode. Record cannot be proxied",
            '1072' => "Invalid record identifier",
            '1073' => "Invalid TXT record. Must be less than 255 characters",
            '1074' => "Invalid TXT record. Record may only contain printable ASCII!",
        ];
    }

    /**
     * Delete a record by its name and type
     */
    public function deleteByNameAndType(string $zoneId, string $name, string $type)
    {
        // List records to find the record ID
        $records = $this->list($zoneId, ['name' => $name, 'type' => $type]);

        if ($records && isset($records->result) && is_array($records->result) && count($records->result) > 0) {
            $recordId = $records->result[0]->id;
            return $this->delete($zoneId, $recordId);
        }

        return null; // Record not found
    }

    /**
     * Get a record by its name and type
     */
    public function getByNameAndType(string $zoneId, string $name, string $type)
    {
        // List records to find the record ID
        $records = $this->list($zoneId, ['name' => $name, 'type' => $type]);
        if ($records && isset($records->result) && is_array($records->result) && count($records->result) > 0) {
            return $records->result[0];
        }

        return null; // Record not found
    }
}