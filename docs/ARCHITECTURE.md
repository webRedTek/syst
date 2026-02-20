# mcontrol Architecture Rules (Non-Negotiable)

## Schema-first rule (prevents migration drift)

**Rule:** We do not bake models/controllers until the Phase schema is finalized and migrated.

### Why
- Migrations are immutable once run (editing an already-applied migration does nothing).
- Baking against incomplete tables causes churn: many follow-up migrations and wrong assumptions in generated code.

### Required workflow (always)
1. **Design full table shape for the phase** (all columns, indexes, FKs, defaults).
2. **Create + run migrations** (single “CreateX” per table where possible).
3. **Only then** bake models/controllers (`bake model`, `bake controller`).

### Enforcement
- If a table was created incorrectly early in development, **reset local DB + phinxlog** and re-run the correct Create migrations (local-first only).
- UI concerns never drive schema decisions (Admin UI is Phase 4).
- `/api/*` is machine-to-machine and stays JSON-only; `/admin/*` is the human UI later.

## Routing separation
- `/api/*` → `src/Controller/Api/*` (stateless, HMAC required)
- `/admin/*` → `src/Controller/Admin/*` (Phase 4+)
