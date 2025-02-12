<?php
$pageTitle = get_the_title();
if (is_archive()):
    $object = get_queried_object();
    $pageTitle = $object->label;
endif;
?>

<div class="mt-5 px-0 breadcrumb-section entry-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2><?php echo $pageTitle; ?></h2>
                    <div class="bt-option">
                        <a href="<?php echo site_url(); ?>">Home</a>
                        <span><?php echo $pageTitle; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>