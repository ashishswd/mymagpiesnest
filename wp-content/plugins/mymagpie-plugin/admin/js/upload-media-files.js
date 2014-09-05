jQuery(document).ready(function() {
    jQuery('.upload_image_button').live('click', function () {
        var mymagpie_uploader,
            button = jQuery(this);
        mymagpie_uploader = wp.media.frames.file_frame = wp.media({
            multiple: false
        });
        mymagpie_uploader.on('select', function() {
            var attachment = mymagpie_uploader.state().get('selection').first().toJSON();
            button.prev('input[type="text"]').val(attachment.url)
        }).open();
        return !1;
    });
});