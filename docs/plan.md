# Laravel Cloudflare API Wrapper Plan

## Pending to create/update

### User's Account Memberships

* List Memberships (GET)
* Membership Details (GET)
* Update Membership (PUT)
* Delete Membership (DEL)
* Error Codes (OPT)

### Account Members

* List Members (GET)
* Add Member (POST)
* Member Details (GET)
* Update Member (PUT)
* Remove Member (DEL)

### Account Roles

* List Roles (GET)
* Role Details (GET)

### Account Subscriptions

* List Subscriptions (GET)
* Create Subscription (POST)
* Update Subscription (PUT)
* Delete Subscription (DEL)

### Organizations

* Organization Details (GET)
* Edit Organization (PATCH)

### Organization Invites

* List Invitations (GET)
* Create Invitation (POST)
* Invitation Details (GET)
* Edit Invitation Roles (PATCH)
* Cancel Invitation (DEL)

### Organization Members

* List Members (GET)
* Member Details (GET)
* Edit Member Roles (PATCH)
* Remove member (DEL)

### Organization Roles

* List Roles (GET)
* Role Details (GET)

### User's Invites

* List Invitations (GET)
* Invitation Details (GET)
* Respond to Invitation (PATCH)

### User's Organizations

* List Organizations (GET)
* Organization Details (GET)
* Leave Organization (DEL)

### User Billing Profile

* Billing Profile Details (GET)

### User Billing History

* Billing History Details (GET)

### User Subscription

* Get User Subscriptions (GET)
* Update User Subscription (PUT)
* Delete User Subscriptions (DEL)

### Account Billing Profile

* Billing Profile Details (GET)

### Zone Rate Plan

* List Available Rate Plans (GET)
* List Available Plans (GET)
* Available Plan Details (GET)

### Zone Subscription

* Zone Subscription Details (GET)
* Update Zone Subscription (PUT)
* Create Zone Subscription (POST)

### Audit Logs

* List User Audit Logs (GET)
* List Organization Audit Logs (GET)

### Argo Smart Routing

* Get Argo Smart Routing Setting (GET)
* Patch Argo Smart Routing Setting (PATCH)

### Argo Analytics for Zone

* Argo Analytics for Zone (GET)

### Argo Analytics for Geolocation

* Argo Analytics for Zone by PoP (GET)

### Static IPs for a Zone

* List static IPs (GET)

### Logs Received

* Logs Received (GET)
* Logs RayIDs (GET)
* Fields (GET)
* Notes (OPT)

### Logpush Jobs

* List Logpush Jobs (GET)
* Get Ownership Challenge (POST)
* Validate Ownership Challenge (POST)
* Validate Origin (POST)
* Create Logpush Job (POST)
* Logpush Job Details (GET)
* Update Logpush Job (PUT)
* Delete Logpush Job (DEL)
* Check Destination Exists (POST)


### DNS Firewall (Users)

### DNS Firewall (Organizations)

* List DNS Firewall Clusters (GET)
* Create DNS Firewall Cluster (POST)
* DNS Firewall Cluster Details (GET)
* Edit DNS Firewall Cluster (PATCH)
* Delete a DNS Firewall Cluster (DEL)

### DNS Firewall (Accounts)

* List DNS Firewall Clusters (GET)
* DNS Firewall Cluster Details (GET)
* Update DNS Firewall Cluster (PATCH)
* Delete DNS Firewall Cluster (DEL)
* Create DNS Firewall Cluster (POST)

### Secondary DNS

* Secondary Zone Configuration Details (GET)
* Update Secondary Zone Configuration (PUT)
* Delete Secondary Zone Configuration (DEL)
* Create Secondary Zone Configuration (POST)

### Secondary DNS (TSIG)

* List TSIGs (GET)
* TSIG Details (GET)
* Update TSIG (PUT)
* Delete TSIG (DEL)
* Create TSIG (POST)

### Secondary DNS (Master)

* List Masters (GET)
* Master Details (GET)
* Update Master (PUT)
* Delete Master (DEL)
* Create Master (POST)

### Cloudflare IPs

* Cloudflare IP Details (GET)

### Custom Pages for a Zone

* List Available Custom Pages (GET)
* Custom Page Details (GET)
* Update Custom Page URL (PUT)
* Error Codes (OPT)

### Custom SSL for a Zone

* List SSL Configurations (GET)
* Create SSL Configuration (POST)
* SSL Configuration Details (GET)
* Edit SSL configuration (PATCH)
* Delete SSL Configuration (DEL)
* Re-prioritize SSL Certificates (PUT)

### Custom Hostname for a Zone

* List custom hostnames (GET)
* Create custom hostname (POST)
* Custom hostname configuration details (GET)
* Update custom hostname configuration (PATCH)
* Delete a custom hostname (and any issued SSL certificates) (DEL)

### Keyless SSL for a Zone

* List Keyless SSL Configurations (GET)
* Create Keyless SSL Configuration (POST)
* Get Keyless SSL Configuration (GET)
* Edit Keyless SSL Configuration (PATCH)
* Delete Keyless configuration (DEL)

### Analyze Certificate

* Analyze Certificate (POST)

### Certificate Packs

* List all certificate packs (GET)
* Order a certificate pack (POST)
* Edit a certificate pack (PATCH)
* Error Codes (OPT)

### SSL Verification

* Get SSL Verification (GET)

### SSL Verification - (Dedicated certs)

* Obtain CNAME token (POST)
* Check DNS record status (GET)
* Confirm to complete DCV (POST)

### Universal SSL Settings for a Zone

* Universal SSL Settings Details (GET)
* Edit Universal SSL Settings (PATCH)

### Origin CA

* List Certificates (GET)
* Create Certificate (POST)
* Get Certificate (GET)
* Revoke Certificate (DEL)
* Error Codes (OPT)

### Stream Videos

* List Videos (GET)
* Initiate a Video Upload (POST)
* Upload a Video Content Range (PATCH)
* Video Details (GET)
* Embed Code HTML (GET)
* Link to Video (GET)
* Delete Video (DEL)
* Error Codes (OPT)

### Worker Script

* Download Worker (GET)
* Delete Worker (DEL)
* Upload Worker (PUT)
* Error Codes (OPT)

### Worker Binding

* List Bindings (GET)

### Worker Filters

* List Filters (GET)
* Update Filter (PUT)
* Delete Filter (DEL)
* Create Filter (POST)
* Error Codes (OPT)

### Worker Script (Enterprise)

* Upload Worker (PUT)
* List Workers (GET)
* Download Worker (GET)
* Delete Worker (PUT)
* Error Codes (OPT)

### Worker Routes (Enterprise)

* Create Route (POST)
* List Route (GET)
* Get Route (GET)
* Update Route (PUT)
* Delete Route (DEL)
* Error Codes (OPT)

### Workers KV Namespace

* List Namespaces (GET)
* Create a Namespace (POST)
* Remove a Namespace (DEL)
* Rename a Namespace (PUT)
* List a Namespace's Keys (GET)
* Read key-value pair (GET)
* Write key-value pair (PUT)
* Write multiple key-value pairs (PUT)
* Delete key-value pair (DEL)
* Delete multiple key-value pairs (DEL)
* Error Codes (OPT)

### Workers KV Analytics

* Query Analytics (GET)
* Error Codes (OPT)

### Spectrum Applications

* List Spectrum Applications (GET)
* Create Spectrum Application (POST)
* Get Spectrum Application Configuration (GET)
* Update Spectrum Application Configuration (PUT)
* Delete Spectrum Application (DEL)
* Error Codes (OPT)

### Spectrum Analytics (Summary)

* Get Analytics Summary (GET)

### Spectrum Analytics (By Time)

* Get Analytics By Time (GET)

### Spectrum Aggregate Analytics

* Get Current Aggregate Analytics (GET)

### Rate Limits for a Zone

* List rate limits (GET)
* Create a ratelimit (POST)
* Rate limit details (GET)
* Update rate limit (PUT)
* Delete rate limit (DEL)
* Error Codes (OPT)

### User-level Firewall Access rule

* List Access Rules (GET)
* Create Access Rule (POST)
* Edit Access Rule (PATCH)
* Delete Access Rule (DEL)

### Account-level Firewall Access Rule

* List Access Rules (GET)
* Create Access Rule (POST)
* Access Rule Details (GET)
* Update Access Rule (PATCH)
* Delete Access Rule (DEL)

### Organization-level Firewall access rule

* List Access Rules (GET)
* Create Access Rule (POST)
* Edit Access Rule (PATCH)
* Delete Access Rule (DEL)

### Filters

* List Filters (GET)
* List Individual Filter (GET)
* Create Filters (POST)
* Update Filters (PUT)
* Update Individual Filter (PUT)
* Delete Filters (DEL)
* Delete Individual Filter (DEL)

### Firewall Events

* List Events (GET)

### Load Balancer Monitors

* List Monitors (GET)
* Create Monitor (POST)
* Monitor Details (GET)
* Update Monitor (PUT)
* Delete Monitor (DEL)

### Load Balancer Pools

* List Pools (GET)
* Create Pool (POST)
* Pool Details (GET)
* Pool Health Details (GET)
* Update Pool (PUT)
* Delete Pool (DEL)

### Load Balancer Healthcheck Events

* List Healthcheck Events (GET)

### Account Load Balancer Monitors

* List Monitors (GET)
* Create Monitor (POST)
* Monitor Details (GET)
* Delete Monitor (DEL)
* Update Monitor (PUT)

### Account Load Balancer Pools

* List Pools (GET)
* Create Pool (POST)
* Pool Details (GET)
* Pool Health Details (GET)
* Update Pool (PUT)
* Delete Pool (DEL)

### Organization Load Balancer Monitors

* List Monitors (GET)
* Create Monitor (POST)
* Monitor Details (GET)
* Update Monitor (PUT)
* Delete Monitor (DEL)

### Organization Load Balancer Pools

* List Pools (GET)
* Create Pool (POST)
* Pool Details (GET)
* Pool Health Details (GET)
* Update Pool (PUT)
* Delete Pool (DEL)

### Load Balancers

* List Load Balancers (GET)
* Create Load Balancer (POST)
* Load Balancer Details (GET)
* Update Load Balancer (PUT)
* Delete Load Balancer (DEL)

### Railgun

* List Railguns (GET)
* Create Railgun (POST)
* Railgun Details (GET)
* Enable or disable a Railgun (PATCH)
* Delete Railgun (DEL)
* List Railgun Zones (GET)

### Railgun Connections for a Zone

* List Available Railguns (GET)
* Railgun Details (GET)
* Connect or Disconnect a Railgun (PATCH)
* Test Railgun Connection (GET)

### Account Railguns

* List Railguns (GET)
* Create Railgun (POST)
* Railgun Details (GET)
* Update Railgun (PUT)
* Delete Railgun (DEL)

### Railgun Connections

* List Connections (GET)
* Connection Details (GET)
* Update Connection (PUT)
* Delete Connection (DEL)
* Create Connection (POST)

### Organization Railgun

* List Railguns (GET)
* Create Railgun (POST)
* Railgun Details (GET)
* Enable or Disable a Railgun (PATCH)
* Delete Railgun (DEL)
* Get Railgun Zones (GET)

### AML

* AML Viewer Details (GET)
* Update AML Viewer (PUT)

### Custom Pages (Account)

* List Custom Pages (GET)
* Custom Page Details (GET)
* Update Custom Page (PUT)
* Error Codes (OPT)

### Access Applications

* List Access Applications (GET)
* Access Application Details (GET)
* Create Access Application (POST)
* Update Access Application (PUT)
* Delete Access Application (DEL)
* Revoke Access Tokens (POST)

### Access Policy

* List Access Policies (GET)
* Access Policy Details (GET)
* Create Access Policy (POST)
* Update Access Policy (PUT)
* Delete Access Policy (DEL)

### Registrar Domains

* List Domains (POST)
* Get Domain (GET)
* Update Domain (PUT)
* Transfer Domain (POST)
* Cancel Transfer (POST)
* Error Codes (OPT)
