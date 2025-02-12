<div class="wrap theme_options">
    <div id="tabs">
        <ul>
            <?php $keys = array_keys($options);
            foreach ($keys as $key) {
                echo '<li><a href="#' . $key . '">' . str_replace('_', ' ', ucfirst($key)) . '</a></li>';
            } ?>
        </ul>

        <?php foreach ($options as $key => $option) { ?>
            <div id="<?php echo $key ?>">
                <form class="theme_options" name="theme_options" action="" method="post">
                    <h2><?php echo str_replace('_', ' ', ucfirst($key)) ?></h2>
                    <?php foreach ($option as $key => $arr): ?>
                        <p><?php renderField($arr['type'], $arr['label'], $key, get_option($key), ($arr['attr'] ?? [])); ?></p>
                    <?php endforeach; ?>
                    <button type="submit" class="button button-primary alignright" name="save_meta">Save</button>
                </form>
            </div>
        <?php
        } ?>
    </div>
</div>

<script defer>
    jQuery(function() {
        // declare CodeMirror editors
        const inlineCssEditor = wp.codeEditor.initialize($("#inline_css"), cm_settings.codeEditor.ce_css);
        const inlineScriptEditor = wp.codeEditor.initialize($("#inline_script"), cm_settings.codeEditor.ce_script);

        // declare tabs
        jQuery("#tabs").tabs().addClass("ui-tabs-vertical ui-helper-clearfix");

        // handle ajax save
        jQuery('button[name="save_meta"]').click(function(e) {
            e.preventDefault();
            const form = jQuery(this).parent('form');
            let data = form.serialize();

            if (jQuery(form).find('#inline_css')?.length > 0) {
                data = 'inline_css=' + inlineCssEditor.codemirror.getValue();
            } else if (jQuery(form).find('#inline_script')?.length > 0) {
                data = 'inline_script=' + inlineScriptEditor.codemirror.getValue();
            }

            jQuery.ajax({
                url: "<?php echo admin_url('admin-ajax.php') ?>",
                type: 'POST',
                data: {
                    action: 'bsg_save_theme_options',
                    data: data
                },
                success: function(res, status, xhr) {
                    if (xhr.status === 200 && res === 'success') {
                        alert('Theme options saved successfully.');
                    } else {
                        alert('Failed to save theme options.');
                    }
                }
            });
        });
    });
</script>

<style>
    form.theme_options label {
        vertical-align: top;
    }

    form.theme_options button[type="submit"] {
        position: relative;
        right: 3%;
        padding: 3px 15px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    input[type="email"],
    input[type="url"],
    input[type="tel"],
    input[type="password"],
    textarea {
        width: 90%;
    }


    .theme_options form label {
        font-weight: bold;
        width: 120px;
        display: inline-block;
    }

    .ui-tabs-anchor,
    .ui-tabs-tab {
        width: 100%;
    }

    .ui-tabs .ui-tabs-nav .ui-tabs-anchor {
        font-weight: bold;
        padding: 13px 0 10px 12px !important;
        background: transparent;
        border: 0px;
    }

    .ui-state-default,
    .ui-widget-content .ui-state-default,
    .ui-widget-header .ui-state-default,
    .ui-button,
    .ui-tabs .ui-tabs-nav .ui-tabs-anchor:focus,
    .ui-tabs .ui-tabs-nav .ui-tabs-tab:focus,
    .ui-tabs .ui-tabs-nav .ui-tabs-tab:focus-visible,
    html .ui-button.ui-state-disabled:hover,
    html .ui-button.ui-state-disabled:active {
        box-shadow: none;
        border: 0px;
        outline: none;
    }

    .ui-tabs-vertical .ui-tabs-nav {
        padding: .2em .1em .2em .2em;
        float: left;
        width: 10%;
    }

    .ui-tabs-vertical .ui-tabs-nav li {
        clear: left;
        width: 100%;
        border-bottom-width: 1px !important;
        border-right-width: 0 !important;
    }

    .ui-tabs-vertical .ui-tabs-nav li a {
        display: block;
    }

    .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active {
        padding-bottom: 0;
        padding-right: .1em;
        border-right-width: 1px;
    }

    .ui-tabs-vertical .ui-tabs-panel {
        padding: 1em;
        float: right;
        width: 85%;
    }

    .ui-widget.ui-widget-content {
        background-color: #efefef;
    }
</style>