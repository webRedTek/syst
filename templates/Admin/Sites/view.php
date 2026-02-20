<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Site $site
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Site'), ['action' => 'edit', $site->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Site'), ['action' => 'delete', $site->id], ['confirm' => __('Are you sure you want to delete # {0}?', $site->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sites'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Site'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sites view content">
            <h3><?= h($site->uuid) ?></h3>
            <table>
                <tr>
                    <th><?= __('Uuid') ?></th>
                    <td><?= h($site->uuid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Domain') ?></th>
                    <td><?= h($site->domain) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($site->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Config') ?></th>
                    <td><?= h($site->config) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($site->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($site->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($site->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Affiliate Links') ?></h4>
                <?php if (!empty($site->affiliate_links)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Affiliate Id') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Tracking Data') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($site->affiliate_links as $affiliateLink) : ?>
                        <tr>
                            <td><?= h($affiliateLink->id) ?></td>
                            <td><?= h($affiliateLink->affiliate_id) ?></td>
                            <td><?= h($affiliateLink->slug) ?></td>
                            <td><?= h($affiliateLink->tracking_data) ?></td>
                            <td><?= h($affiliateLink->created) ?></td>
                            <td><?= h($affiliateLink->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'AffiliateLinks', 'action' => 'view', $affiliateLink->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'AffiliateLinks', 'action' => 'edit', $affiliateLink->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'AffiliateLinks', 'action' => 'delete', $affiliateLink->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $affiliateLink->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Payments') ?></h4>
                <?php if (!empty($site->payments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Stripe Payment Id') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Currency') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Metadata') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($site->payments as $payment) : ?>
                        <tr>
                            <td><?= h($payment->id) ?></td>
                            <td><?= h($payment->user_id) ?></td>
                            <td><?= h($payment->stripe_payment_id) ?></td>
                            <td><?= h($payment->amount) ?></td>
                            <td><?= h($payment->currency) ?></td>
                            <td><?= h($payment->status) ?></td>
                            <td><?= h($payment->metadata) ?></td>
                            <td><?= h($payment->created) ?></td>
                            <td><?= h($payment->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payment->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Payments', 'action' => 'edit', $payment->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Payments', 'action' => 'delete', $payment->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $payment->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Projects') ?></h4>
                <?php if (!empty($site->projects)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('External Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Meta') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($site->projects as $project) : ?>
                        <tr>
                            <td><?= h($project->id) ?></td>
                            <td><?= h($project->external_id) ?></td>
                            <td><?= h($project->name) ?></td>
                            <td><?= h($project->status) ?></td>
                            <td><?= h($project->meta) ?></td>
                            <td><?= h($project->created) ?></td>
                            <td><?= h($project->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $project->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $project->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Projects', 'action' => 'delete', $project->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $project->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Site Pages') ?></h4>
                <?php if (!empty($site->site_pages)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($site->site_pages as $sitePage) : ?>
                        <tr>
                            <td><?= h($sitePage->id) ?></td>
                            <td><?= h($sitePage->slug) ?></td>
                            <td><?= h($sitePage->title) ?></td>
                            <td><?= h($sitePage->status) ?></td>
                            <td><?= h($sitePage->created) ?></td>
                            <td><?= h($sitePage->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SitePages', 'action' => 'view', $sitePage->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SitePages', 'action' => 'edit', $sitePage->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'SitePages', 'action' => 'delete', $sitePage->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $sitePage->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Workflows') ?></h4>
                <?php if (!empty($site->workflows)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Engine') ?></th>
                            <th><?= __('External Workflow Id') ?></th>
                            <th><?= __('Webhook Url') ?></th>
                            <th><?= __('Config') ?></th>
                            <th><?= __('Active') ?></th>
                            <th><?= __('Version') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($site->workflows as $workflow) : ?>
                        <tr>
                            <td><?= h($workflow->id) ?></td>
                            <td><?= h($workflow->name) ?></td>
                            <td><?= h($workflow->engine) ?></td>
                            <td><?= h($workflow->external_workflow_id) ?></td>
                            <td><?= h($workflow->webhook_url) ?></td>
                            <td><?= h($workflow->config) ?></td>
                            <td><?= h($workflow->active) ?></td>
                            <td><?= h($workflow->version) ?></td>
                            <td><?= h($workflow->created) ?></td>
                            <td><?= h($workflow->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Workflows', 'action' => 'view', $workflow->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Workflows', 'action' => 'edit', $workflow->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Workflows', 'action' => 'delete', $workflow->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $workflow->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>