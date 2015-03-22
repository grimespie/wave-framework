jQuery(document).ready(function() {
    
    jQuery("h3").each(function() {
        if(jQuery(this).html() == "Personal Options") {
            jQuery(this).hide();
        }
        
        if(jQuery(this).html() == "About Yourself") {
            jQuery(this).html("Password");
        }
    });
    
    jQuery("#wordpress-seo + .form-table").hide();
    
});