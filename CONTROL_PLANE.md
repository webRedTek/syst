# MControl — CakePHP Multi-Site Control Plane

## Non-Negotiables
- Serve live domains directly from CakePHP (no WordPress)
- Host-based routing: resolve Site by HTTP_HOST
- Pages are database-driven
- ORM only, validate input, protect mass assignment
- Secrets via env/system_secrets (no hardcoding)
- External endpoints require HMAC + timestamp

## Current Phase
PHASE 1 — Multi-Site Delivery Engine

## Phase Goal
Serve projectjerky.com and bizloan.com directly from CakePHP using host-based resolution.

## Completed
- [ ] Sites table confirmed in DB
- [ ] Sites schema stabilized for runtime needs
- [ ] Domains seeded in sites table

## In Progress
- [ ] SiteResolverMiddleware (resolve host -> Site entity -> request attribute)

## Next Task (Single Source of Truth)
Implement SiteResolverMiddleware + register it in src/Application.php