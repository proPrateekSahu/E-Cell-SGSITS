<?php
$vdperanto_actions = $this->recommended_actions;
$vdperanto_actions_todo = get_option('vdperanto_recommended_actions', false);
?>
<div id="recommended_actions" class="vdperanto-tab-pane panel-close">
    <div class="action-list">
        <?php if ($vdperanto_actions): foreach ($vdperanto_actions as $key => $vdperanto_actionValue): ?>
                <div class="action" id="<?php echo esc_attr($vdperanto_actionValue['id']); ?>">
                    <div class="recommended_box col-md-6 col-sm-6 col-xs-12">
                        <img width="772" height="180" src="<?php echo esc_url(VDPERANTO_TEMPLATE_DIR_URI) . '/images/' . str_replace(' ', '-', strtolower($vdperanto_actionValue['title'])) . '.png'; ?>">
                        <div class="action-inner">
                            <h3 class="action-title"><?php echo esc_html($vdperanto_actionValue['title']); ?></h3>
                            <div class="action-desc"><?php echo esc_html($vdperanto_actionValue['desc']); ?></div>
                            <?php echo wp_kses_post($vdperanto_actionValue['link']); ?>
                            <div class="action-watch">
                                <?php if (!$vdperanto_actionValue['is_done']): ?>
                                    <?php if (!isset($vdperanto_actions_todo[$vdperanto_actionValue['id']]) || !$vdperanto_actions_todo[$vdperanto_actionValue['id']]): ?>
                                        <span class="dashicons dashicons-visibility"></span>
                                    <?php else: ?>
                                        <span class="dashicons dashicons-hidden"></span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="dashicons dashicons-yes"></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        endif; ?>
    </div>
</div>