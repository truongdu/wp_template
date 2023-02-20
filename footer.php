<!-- ADĐ -->



<!-- ADĐ -->
<?php wp_footer(); ?>
<?php
if( is_page('confirm')|| is_page('success')){ ?>
<script type="text/javascript">
    $(window).load(function () {
        var p = $('.contact_box_list').offset();
            if ($(window).width() > 750) {
                $('html,body').animate({ scrollTop: p.top - 120 }, 400);
            }
            else {
                $('html,body').animate({ scrollTop: p.top - 80 }, 400);
            }
    });
</script>
<?php }
?>
<?php
if( is_page('contact')){ ?>
<script type="text/javascript">
    $('.input_zip_code').attr('onKeyUp',"AjaxZip3.zip2addr(this,'','address','citi');");
    $(window).load(function () {
        if($(".error").length > 0){
            $('.hide-err').css('display','none');
            var p = $('.contact_box_list').offset();
            if ($(window).width() > 750) {
                $('html,body').animate({ scrollTop: p.top - 120 }, 400);
            }
            else {
                $('html,body').animate({ scrollTop: p.top - 80 }, 400);
            }
        }else{
            $('.hide-err').css('display','block');
        }
    });
    $(window).bind('load', function () {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const from = urlParams.get('from');
    if(from=="recruit"){
        $(".box-checkbox-col .mwform-checkbox-field:nth-of-type(5) input[type='checkbox']").prop('checked', 'checked');
    }
});
</script>
<?php } ?>
</body>
</html>