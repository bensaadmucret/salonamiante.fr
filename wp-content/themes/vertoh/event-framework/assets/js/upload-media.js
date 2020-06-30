/*jQuery(document).ready(function() {
 jQuery(document).on("click", ".upload_image_button", function() {
 
 jQuery.data(document.body, 'prevElement', jQuery(this).prev());
 
 window.send_to_editor = function(html) {
 var imgurl = jQuery('img', html).attr('src');
 var inputText = jQuery.data(document.body, 'prevElement');
 
 if (inputText != undefined && inputText != '')
 {
 inputText.val(imgurl);
 }
 
 tb_remove();
 };
 
 tb_show('dd', 'media-upload.php?type=image&TB_iframe=true');
 return false;
 });
 });*/
jQuery(document).ready(function() {
    function media_upload(button_class) {
        var _custom_media = true,
                _orig_send_attachment = wp.media.editor.send.attachment;

        jQuery('body').on('click', button_class, function(e) {
            var button = jQuery(this);
            _custom_media = true;

            wp.media.editor.send.attachment = function(props, attachment) {
                if (_custom_media) {
                    jQuery(button).parent().find('.upload_image_id').val(attachment.id); //.closest('.widget-content')
                    jQuery(button).parent().find('.upload_image').attr('src', attachment.url);
                } else {
                    return _orig_send_attachment.apply(button_id, [props, attachment]);
                }
            }
            wp.media.editor.open(jQuery(this).attr('id'));
            return false;
        });
    }
    media_upload('.upload_image_button');
});