<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class Initial extends BaseMigration
{
    public bool $autoId = false;

    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/5/en/migrations.html#the-up-method
     *
     * @return void
     */
    public function up(): void
    {
        $this->table('affiliate_links')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('affiliate_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('site_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('slug', 'string', [
                'default' => null,
                'limit' => 160,
                'null' => false,
            ])
            ->addColumn('tracking_data', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                $this->index('affiliate_id')
                    ->setName('idx_affiliate_links_affiliate')
            )
            ->addIndex(
                $this->index('site_id')
                    ->setName('idx_affiliate_links_site')
            )
            ->create();

        $this->table('affiliates')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('code', 'string', [
                'default' => null,
                'limit' => 80,
                'null' => false,
            ])
            ->addColumn('commission_rate', 'decimal', [
                'default' => '0.00',
                'null' => false,
                'precision' => 5,
                'scale' => 2,
            ])
            ->addColumn('status', 'string', [
                'default' => 'active',
                'limit' => 24,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                $this->index('code')
                    ->setName('uniq_affiliate_code')
                    ->setType('unique')
            )
            ->addIndex(
                $this->index('user_id')
                    ->setName('idx_affiliate_user')
            )
            ->create();

        $this->table('audit_logs')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('entity', 'string', [
                'default' => null,
                'limit' => 80,
                'null' => false,
            ])
            ->addColumn('entity_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('action', 'string', [
                'default' => null,
                'limit' => 80,
                'null' => false,
            ])
            ->addColumn('before_state', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('after_state', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                $this->index([
                        'entity',
                        'entity_id',
                    ])
                    ->setName('idx_audit_entity')
            )
            ->addIndex(
                $this->index('user_id')
                    ->setName('fk_audit_user')
            )
            ->create();

        $this->table('executions')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('workflow_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('triggered_by', 'string', [
                'default' => null,
                'limit' => 32,
                'null' => false,
            ])
            ->addColumn('idempotency_key', 'string', [
                'default' => null,
                'limit' => 160,
                'null' => true,
            ])
            ->addColumn('status', 'string', [
                'default' => null,
                'limit' => 24,
                'null' => false,
            ])
            ->addColumn('request_payload', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('response_payload', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('error_message', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('attempt', 'integer', [
                'default' => '1',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('started_at', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('finished_at', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                $this->index('idempotency_key')
                    ->setName('uniq_executions_idempotency')
                    ->setType('unique')
            )
            ->addIndex(
                $this->index('workflow_id')
                    ->setName('idx_executions_workflow')
            )
            ->addIndex(
                $this->index('status')
                    ->setName('idx_executions_status')
            )
            ->create();

        $this->table('page_versions')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('site_page_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('html', 'text', [
                'default' => null,
                'limit' => 4294967295,
                'null' => true,
            ])
            ->addColumn('css', 'text', [
                'default' => null,
                'limit' => 4294967295,
                'null' => true,
            ])
            ->addColumn('js', 'text', [
                'default' => null,
                'limit' => 4294967295,
                'null' => true,
            ])
            ->addColumn('active', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                $this->index('site_page_id')
                    ->setName('idx_page_versions_page')
            )
            ->create();

        $this->table('payments')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('site_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('stripe_payment_id', 'string', [
                'default' => null,
                'limit' => 160,
                'null' => false,
            ])
            ->addColumn('amount', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 10,
                'scale' => 2,
            ])
            ->addColumn('currency', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('status', 'string', [
                'default' => null,
                'limit' => 24,
                'null' => false,
            ])
            ->addColumn('metadata', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                $this->index('stripe_payment_id')
                    ->setName('uniq_stripe_payment')
                    ->setType('unique')
            )
            ->addIndex(
                $this->index('site_id')
                    ->setName('fk_payments_site')
            )
            ->addIndex(
                $this->index('user_id')
                    ->setName('fk_payments_user')
            )
            ->create();

        $this->table('projects')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('site_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('external_id', 'string', [
                'default' => null,
                'limit' => 80,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 160,
                'null' => false,
            ])
            ->addColumn('status', 'string', [
                'default' => 'active',
                'limit' => 24,
                'null' => false,
            ])
            ->addColumn('meta', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                $this->index('external_id')
                    ->setName('uniq_projects_external_id')
                    ->setType('unique')
            )
            ->addIndex(
                $this->index('site_id')
                    ->setName('idx_projects_site')
            )
            ->addIndex(
                $this->index('status')
                    ->setName('idx_projects_status')
            )
            ->create();

        $this->table('roles')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 80,
                'null' => false,
            ])
            ->addColumn('permissions', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                $this->index('name')
                    ->setName('uniq_roles_name')
                    ->setType('unique')
            )
            ->create();

        $this->table('site_pages')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('site_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('slug', 'string', [
                'default' => null,
                'limit' => 160,
                'null' => false,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('status', 'string', [
                'default' => 'draft',
                'limit' => 24,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                $this->index([
                        'site_id',
                        'slug',
                    ])
                    ->setName('uniq_site_slug')
                    ->setType('unique')
            )
            ->create();

        $this->table('sites')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('uuid', 'string', [
                'default' => null,
                'limit' => 64,
                'null' => false,
            ])
            ->addColumn('domain', 'string', [
                'default' => null,
                'limit' => 160,
                'null' => false,
            ])
            ->addColumn('status', 'string', [
                'default' => 'active',
                'limit' => 24,
                'null' => false,
            ])
            ->addColumn('config', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                $this->index('uuid')
                    ->setName('uniq_sites_uuid')
                    ->setType('unique')
            )
            ->addIndex(
                $this->index('domain')
                    ->setName('uniq_sites_domain')
                    ->setType('unique')
            )
            ->addIndex(
                $this->index('status')
                    ->setName('idx_sites_status')
            )
            ->create();

        $this->table('stripe_events')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('stripe_event_id', 'string', [
                'default' => null,
                'limit' => 160,
                'null' => false,
            ])
            ->addColumn('type', 'string', [
                'default' => null,
                'limit' => 80,
                'null' => false,
            ])
            ->addColumn('payload', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('processed', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                $this->index('stripe_event_id')
                    ->setName('uniq_stripe_event')
                    ->setType('unique')
            )
            ->create();

        $this->table('subscriptions')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('stripe_subscription_id', 'string', [
                'default' => null,
                'limit' => 160,
                'null' => false,
            ])
            ->addColumn('status', 'string', [
                'default' => null,
                'limit' => 24,
                'null' => false,
            ])
            ->addColumn('plan', 'string', [
                'default' => null,
                'limit' => 80,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                $this->index('stripe_subscription_id')
                    ->setName('uniq_stripe_subscription')
                    ->setType('unique')
            )
            ->addIndex(
                $this->index('user_id')
                    ->setName('fk_subscriptions_user')
            )
            ->create();

        $this->table('system_secrets')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 80,
                'null' => false,
            ])
            ->addColumn('value', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('active', 'boolean', [
                'default' => true,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                $this->index('name')
                    ->setName('uniq_secret_name')
                    ->setType('unique')
            )
            ->create();

        $this->table('tasks')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('project_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('type', 'string', [
                'default' => null,
                'limit' => 80,
                'null' => false,
            ])
            ->addColumn('status', 'string', [
                'default' => 'queued',
                'limit' => 24,
                'null' => false,
            ])
            ->addColumn('priority', 'integer', [
                'default' => '0',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('payload', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('result', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('score', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 8,
                'scale' => 3,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                $this->index('project_id')
                    ->setName('idx_tasks_project')
            )
            ->addIndex(
                $this->index('status')
                    ->setName('idx_tasks_status')
            )
            ->addIndex(
                $this->index([
                        'project_id',
                        'status',
                    ])
                    ->setName('idx_tasks_project_status')
            )
            ->create();

        $this->table('users')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 160,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('role_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('status', 'string', [
                'default' => 'active',
                'limit' => 24,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                $this->index('email')
                    ->setName('uniq_users_email')
                    ->setType('unique')
            )
            ->addIndex(
                $this->index('role_id')
                    ->setName('idx_users_role')
            )
            ->create();

        $this->table('webhook_logs')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('direction', 'string', [
                'default' => null,
                'limit' => 16,
                'null' => false,
            ])
            ->addColumn('source', 'string', [
                'default' => null,
                'limit' => 80,
                'null' => false,
            ])
            ->addColumn('signature_valid', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('headers', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('payload', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('response_code', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                $this->index('direction')
                    ->setName('idx_webhook_direction')
            )
            ->addIndex(
                $this->index('source')
                    ->setName('idx_webhook_source')
            )
            ->create();

        $this->table('workflows')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('site_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 160,
                'null' => false,
            ])
            ->addColumn('engine', 'string', [
                'default' => null,
                'limit' => 32,
                'null' => false,
            ])
            ->addColumn('external_workflow_id', 'string', [
                'default' => null,
                'limit' => 160,
                'null' => true,
            ])
            ->addColumn('webhook_url', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('config', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('active', 'boolean', [
                'default' => true,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('version', 'integer', [
                'default' => '1',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                $this->index([
                        'site_id',
                        'name',
                    ])
                    ->setName('uniq_workflow_site_name')
                    ->setType('unique')
            )
            ->addIndex(
                $this->index('engine')
                    ->setName('idx_workflows_engine')
            )
            ->create();

        $this->table('affiliate_links')
            ->addForeignKey(
                $this->foreignKey('affiliate_id')
                    ->setReferencedTable('affiliates')
                    ->setReferencedColumns('id')
                    ->setOnDelete('CASCADE')
                    ->setOnUpdate('CASCADE')
                    ->setName('fk_affiliate_links_affiliate')
            )
            ->addForeignKey(
                $this->foreignKey('site_id')
                    ->setReferencedTable('sites')
                    ->setReferencedColumns('id')
                    ->setOnDelete('CASCADE')
                    ->setOnUpdate('CASCADE')
                    ->setName('fk_affiliate_links_site')
            )
            ->update();

        $this->table('affiliates')
            ->addForeignKey(
                $this->foreignKey('user_id')
                    ->setReferencedTable('users')
                    ->setReferencedColumns('id')
                    ->setOnDelete('CASCADE')
                    ->setOnUpdate('CASCADE')
                    ->setName('fk_affiliates_users')
            )
            ->update();

        $this->table('audit_logs')
            ->addForeignKey(
                $this->foreignKey('user_id')
                    ->setReferencedTable('users')
                    ->setReferencedColumns('id')
                    ->setOnDelete('SET_NULL')
                    ->setOnUpdate('CASCADE')
                    ->setName('fk_audit_user')
            )
            ->update();

        $this->table('executions')
            ->addForeignKey(
                $this->foreignKey('workflow_id')
                    ->setReferencedTable('workflows')
                    ->setReferencedColumns('id')
                    ->setOnDelete('CASCADE')
                    ->setOnUpdate('CASCADE')
                    ->setName('fk_executions_workflows')
            )
            ->update();

        $this->table('page_versions')
            ->addForeignKey(
                $this->foreignKey('site_page_id')
                    ->setReferencedTable('site_pages')
                    ->setReferencedColumns('id')
                    ->setOnDelete('CASCADE')
                    ->setOnUpdate('CASCADE')
                    ->setName('fk_page_versions_pages')
            )
            ->update();

        $this->table('payments')
            ->addForeignKey(
                $this->foreignKey('site_id')
                    ->setReferencedTable('sites')
                    ->setReferencedColumns('id')
                    ->setOnDelete('CASCADE')
                    ->setOnUpdate('CASCADE')
                    ->setName('fk_payments_site')
            )
            ->addForeignKey(
                $this->foreignKey('user_id')
                    ->setReferencedTable('users')
                    ->setReferencedColumns('id')
                    ->setOnDelete('CASCADE')
                    ->setOnUpdate('CASCADE')
                    ->setName('fk_payments_user')
            )
            ->update();

        $this->table('projects')
            ->addForeignKey(
                $this->foreignKey('site_id')
                    ->setReferencedTable('sites')
                    ->setReferencedColumns('id')
                    ->setOnDelete('CASCADE')
                    ->setOnUpdate('CASCADE')
                    ->setName('fk_projects_sites')
            )
            ->update();

        $this->table('site_pages')
            ->addForeignKey(
                $this->foreignKey('site_id')
                    ->setReferencedTable('sites')
                    ->setReferencedColumns('id')
                    ->setOnDelete('CASCADE')
                    ->setOnUpdate('CASCADE')
                    ->setName('fk_site_pages_sites')
            )
            ->update();

        $this->table('subscriptions')
            ->addForeignKey(
                $this->foreignKey('user_id')
                    ->setReferencedTable('users')
                    ->setReferencedColumns('id')
                    ->setOnDelete('CASCADE')
                    ->setOnUpdate('CASCADE')
                    ->setName('fk_subscriptions_user')
            )
            ->update();

        $this->table('tasks')
            ->addForeignKey(
                $this->foreignKey('project_id')
                    ->setReferencedTable('projects')
                    ->setReferencedColumns('id')
                    ->setOnDelete('CASCADE')
                    ->setOnUpdate('CASCADE')
                    ->setName('fk_tasks_projects')
            )
            ->update();

        $this->table('users')
            ->addForeignKey(
                $this->foreignKey('role_id')
                    ->setReferencedTable('roles')
                    ->setReferencedColumns('id')
                    ->setOnDelete('RESTRICT')
                    ->setOnUpdate('CASCADE')
                    ->setName('fk_users_roles')
            )
            ->update();

        $this->table('workflows')
            ->addForeignKey(
                $this->foreignKey('site_id')
                    ->setReferencedTable('sites')
                    ->setReferencedColumns('id')
                    ->setOnDelete('CASCADE')
                    ->setOnUpdate('CASCADE')
                    ->setName('fk_workflows_sites')
            )
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/5/en/migrations.html#the-down-method
     *
     * @return void
     */
    public function down(): void
    {
        $this->table('affiliate_links')
            ->dropForeignKey(
                'affiliate_id'
            )
            ->dropForeignKey(
                'site_id'
            )->save();

        $this->table('affiliates')
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('audit_logs')
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('executions')
            ->dropForeignKey(
                'workflow_id'
            )->save();

        $this->table('page_versions')
            ->dropForeignKey(
                'site_page_id'
            )->save();

        $this->table('payments')
            ->dropForeignKey(
                'site_id'
            )
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('projects')
            ->dropForeignKey(
                'site_id'
            )->save();

        $this->table('site_pages')
            ->dropForeignKey(
                'site_id'
            )->save();

        $this->table('subscriptions')
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('tasks')
            ->dropForeignKey(
                'project_id'
            )->save();

        $this->table('users')
            ->dropForeignKey(
                'role_id'
            )->save();

        $this->table('workflows')
            ->dropForeignKey(
                'site_id'
            )->save();

        $this->table('affiliate_links')->drop()->save();
        $this->table('affiliates')->drop()->save();
        $this->table('audit_logs')->drop()->save();
        $this->table('executions')->drop()->save();
        $this->table('page_versions')->drop()->save();
        $this->table('payments')->drop()->save();
        $this->table('projects')->drop()->save();
        $this->table('roles')->drop()->save();
        $this->table('site_pages')->drop()->save();
        $this->table('sites')->drop()->save();
        $this->table('stripe_events')->drop()->save();
        $this->table('subscriptions')->drop()->save();
        $this->table('system_secrets')->drop()->save();
        $this->table('tasks')->drop()->save();
        $this->table('users')->drop()->save();
        $this->table('webhook_logs')->drop()->save();
        $this->table('workflows')->drop()->save();
    }
}
