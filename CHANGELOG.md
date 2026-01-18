# Changelog

All notable changes to `secretwebmaster/laravel-cloudflare` will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.1] - 2026-01-18

### Added
- **Configuration file** (`config/cloudflare.php`) for centralized credential management
- **Service Provider** (`CloudflareServiceProvider`) with Laravel auto-discovery
- Config publishing support via `php artisan vendor:publish --tag=cloudflare-config`
- Container binding for dependency injection support

### Changed
- **BREAKING**: Constructor parameter order changed to `__construct($apiToken, $email, $apiKey)`
  - API Token is now the first parameter for easier single-parameter usage: `new Client('token')`
  - Old: `new Client($email, $apiToken)` → New: `new Client($apiToken, $email, $apiKey)`
- Client now auto-loads credentials from config when instantiated without parameters
- Improved header initialization with proper authentication method detection
- Updated README.md with comprehensive examples showing correct API response format
- Fixed all README examples to use proper object syntax (`$response->success` instead of `$response['success']`)
- Clarified difference between API methods (return `{success, result, errors}`) and helpers (return direct data)

### Fixed
- Proper authentication header setup for both API Token and Email + API Key methods
- README examples now correctly demonstrate stdClass object access patterns
- Service provider properly registers Client as singleton in container

### Documentation
- Complete README rewrite with installation, configuration, and usage examples
- Added examples for Zone management (9 operations)
- Added examples for DNS management (10 operations)
- Added advanced usage examples for Settings, Firewall, Page Rules
- Added proper error handling examples
- Removed deprecated GraphQL Analytics references
- Added all 10 available models to documentation table

### Composer
- Updated `composer.json` with complete package metadata
- Added keywords for better package discovery
- Specified PHP 8.0+ requirement
- Added Laravel 8.x - 11.x support
- Added auto-discovery configuration for service provider
- Added proper dependencies: `illuminate/support` and `illuminate/http`

## [1.0.0] - 2026-01-18

### 🎉 Initial Release

Complete rewrite and modernization of the Laravel Cloudflare package with PHP 8+ features and comprehensive API coverage.

### Added

#### Core Features
- **Modern PHP 8+ codebase** with strict type hints, typed properties, and return types
- **Service Provider** with auto-discovery for seamless Laravel integration
- **Configuration file** (`config/cloudflare.php`) for centralized credential management
- **Dual authentication support**: API Token (recommended) and Email + API Key (legacy)

#### API Models

**Zone Management**
- `Zones` model with complete CRUD operations
- Zone activation checking
- Cache purging (full, files, tags, hosts)
- Custom helpers: `getByDomain()`, `getZoneIdByDomain()`
- Comprehensive error codes array

**DNS Management**
- `DnsRecords` model with all CRUD operations
- DNS record import/export (BIND format)
- DNS record scanning
- Support for A, AAAA, CNAME, MX, TXT, and all other record types
- Partial updates with `patch()` method

**Zone Settings**
- `ZoneSettings` model with 86 methods (43 getters + 43 setters)
- Individual methods for each setting (SSL, Minify, Cache Level, etc.)
- Generic `update()` method for any setting
- Complete free tier settings coverage

**Firewall Management**
- `FirewallAccessRules` - IP access rules at User/Account/Zone levels
- `FirewallLockdowns` - Zone lockdown rules for URL protection
- `FirewallUARules` - User Agent blocking rules
- `Waf` - Web Application Firewall management (Overrides, Packages, Groups, Rules)

**Additional Features**
- `PageRules` - URL-specific behavior configuration
- `Accounts` - Account management and details
- `Users` - User profile management

### Technical Improvements

**Code Quality**
- Full PSR-4 autoloading
- Comprehensive PHPDoc blocks with parameter tables
- Consistent naming conventions throughout
- Modern match expressions for HTTP methods
- Protected properties with proper encapsulation

**Developer Experience**
- Auto-discovery of service provider
- Dependency injection support
- Configuration file publishing
- Detailed error code helpers in each model
- Extensive README with real-world examples

**Laravel Integration**
- Native Laravel HTTP Client usage
- Container binding for dependency injection
- Config-based initialization
- Support for Laravel 8.x, 9.x, 10.x, and 11.x

### Package Structure

```
secretwebmaster/laravel-cloudflare/
├── config/
│   └── cloudflare.php              # Configuration file
├── src/
│   ├── Client.php                  # Core API client
│   ├── CloudflareServiceProvider.php
│   └── Models/
│       ├── AbstractModel.php
│       ├── Accounts.php
│       ├── DnsRecords.php
│       ├── FirewallAccessRules.php
│       ├── FirewallLockdowns.php
│       ├── FirewallUARules.php
│       ├── PageRules.php
│       ├── Users.php
│       ├── Waf.php
│       ├── Zones.php
│       └── ZoneSettings.php
├── tests/
│   ├── Feature/
│   └── Test.php                    # Test harness
├── composer.json
├── README.md
└── CHANGELOG.md
```

### Requirements
- PHP 8.0 or higher
- Laravel 8.0 or higher
- Cloudflare API Token or API Key

### Documentation
- Complete README with installation and usage examples
- Zone management examples (9 operations)
- DNS management examples (10 operations)
- Firewall configuration examples
- Error handling best practices

### Notes
- Prioritizes free tier Cloudflare functions
- All models include error code reference arrays
- Backward compatibility considered in design
- Future-proof architecture for API additions

[1.0.0]: https://github.com/secretwebmaster/laravel-cloudflare/releases/tag/v1.0.0
