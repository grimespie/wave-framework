/**
 *
 * Wave Admin Javascript
 *
 */

jQuery(document).ready(function() {

    //***************************************
    // Theme Options Color Picker
    //***************************************
    jQuery(".my-color-field").wpColorPicker();


    //***************************************
    // Theme Options Top Tab Navigation
    //***************************************
    jQuery("#wave-theme-options .nav-tab").click(function() {
        jQuery(".nav-tab").removeClass("nav-tab-active");
        jQuery(this).addClass("nav-tab-active");

        jQuery(".admin-panel").removeClass("active-panel");
        jQuery("#wave-panel-" + jQuery(this).data("panel")).addClass("active-panel");
    });


    //***************************************
    // Theme Options Navigation
    //***************************************
    jQuery("#wave-theme-options h3.accordion-section-title").click(function() {
        jQuery("#wave-theme-options h3.accordion-section-title").removeClass("active");
        jQuery(this).addClass("active");

        jQuery(".wave-options-panel").hide();
        jQuery("#wave-options-" + jQuery(this).data("option")).show();
    });


    //***************************************
    // Template Builder
    //***************************************
    function get_row_settings() {
        jQuery.ajaxSetup({cache: false});

        jQuery.get(jQuery("#wave-template-row-settings-get").data("url"), function(data) {
            jQuery("#wave-row-settings-popup").after(data);
        });
    }

    function get_module_settings() {
        jQuery.ajaxSetup({cache: false});

        jQuery.get(jQuery("#wave-template-module-settings-get").data("url"), function(data) {
console.log(jQuery("#wave-template-module-settings-get").data("url"));
            jQuery("#wave-row-settings-popup").after(data);
        });
    }

    jQuery("body").prepend('<div id="wave-row-settings-popup"></div>');

    jQuery("#wave-template-sandbox").on("click", ".wave-row-settings", function() {
        jQuery("#wave-row-settings-popup").show();
        get_row_settings();
    });

    jQuery("#wave-template-sandbox").on("click", ".menu-item-handle", function() {
        jQuery("#wave-row-settings-popup").show();
        get_module_settings();
    });

    jQuery("#wave-row-settings-popup").click(function() {
        jQuery(this).hide();
        jQuery("#wave-row-settings").remove();
    });

    jQuery("body").on("click", "#wave-row-settings .media-modal-icon", function() {
        jQuery("#wave-row-settings-popup").hide();
        jQuery("#wave-row-settings").remove();
    });

    function get_col_select(columns) {
        var return_data = '<div class="wave-template-element-label"><select class="wave-select-col-size">';

        for(var i=1; i<=20; i++) {
            var percent  = Math.round((i / 20) * 100);
            var selected = '';

            if(columns == i) {
                selected = 'selected="selected"';
            }

            return_data = return_data + '<option ' + selected + ' value="' + i + '">' + i + ' col (' + percent + '%)</option>';
        }

        return_data = return_data + '</select></div>';

        return(return_data);
    }

    function get_module_template() {
        return('<li id="menu-item-46" class="menu-item menu-item-depth-0 menu-item-page menu-item-edit-inactive"><dl class="menu-item-bar"><dt class="menu-item-handle"><span class="item-title"><span class="menu-item-title">New Module</span> <span class="is-submenu" style="display: none;">sub item</span></span></dt></dl></li>');
    }

    function row_template(columns) {
        return('<div class="col-' + columns + '" data-columns="' + columns + '"><div class="wave-template-row"><div class="wave-sep"></div>' + get_col_select(columns) + '<div class="wave-template-split-action">Split</div><div class="wave-row-settings dashicons dashicons-admin-generic"></div><ul class="menu ui-sortable" id="menu-to-edit"></ul><div class="wave-template-add-module"><a class="button">Add Module</a></div></div></div>');
    }

    jQuery("#wave-template-add-row .button").click(function() {
        jQuery("#wave-template-sandbox").append('<div class="container">' + row_template(20) + '</div>');
    });

    jQuery("#wave-template-sandbox").on("click", ".wave-template-add-module", function() {
        jQuery(this).parent().children(".menu").append(get_module_template());
    });

    jQuery("#wave-template-sandbox").on("click", ".wave-template-split-action", function() {
        var current_columns = jQuery(this).parent().parent().data("columns");

        if(current_columns > 1) {
            var current_new_columns = Math.round(current_columns / 2);
            var new_section_columns = current_columns - current_new_columns;

            jQuery(this).parent().parent().after(row_template(new_section_columns));
            jQuery(this).parent().parent().data("columns", current_new_columns);
            jQuery(this).parent().parent().removeClass("col-" + current_columns);
            jQuery(this).parent().parent().addClass("col-" + current_new_columns);
            jQuery(this).parent().children(".wave-template-element-label").replaceWith(get_col_select(current_new_columns));
        }
    });

    jQuery("#wave-template-sandbox").on("change", "select.wave-select-col-size", function() {
        var select_col = jQuery(this).children(":selected").val();

        var current_columns = jQuery(this).parent().parent().parent().data("columns");

        if((current_columns == 20) && (select_col < 20)) {
            jQuery(this).parent().parent().parent().after(row_template(20 - select_col));
            jQuery(this).parent().parent().parent().data("columns", select_col);
            jQuery(this).parent().parent().parent().removeClass("col-" + current_columns);
            jQuery(this).parent().parent().parent().addClass("col-" + select_col);
            jQuery(this).parent().parent().children(".wave-template-element-label").replaceWith(get_col_select(select_col));
        }
        else {
            jQuery(this).parent().parent().parent().data("columns", select_col);
            jQuery(this).parent().parent().parent().removeClass("col-" + current_columns);
            jQuery(this).parent().parent().parent().addClass("col-" + select_col);
            jQuery(this).parent().parent().children(".wave-template-element-label").replaceWith(get_col_select(select_col));            
        }
    });

    jQuery("#wave-panel-templates input.button").click(function(e) {
        var input   = jQuery(this).parent().parent().parent().parent().parent().children(".wave-template-admin-content");
        var sandbox = jQuery(this).parent().parent().parent().parent().parent().children(".menu-edit").children("#wave-template-wrapper").children("#wave-template-sandbox").html();

        jQuery(this).parent().parent().parent().parent().parent().children(".wave-template-admin-content").val(sandbox);
    });


    //***************************************
    // Media Uploader
    //***************************************
    var custom_uploader;
 
    jQuery(".wave-upload-image-button").click(function(e) {
        e.preventDefault();

        var input_id = jQuery(this).data("input");
 
        //If the uploader object has already been created, reopen the dialog
        if(custom_uploader) {
            custom_uploader.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: "Choose Image",
            button: {
                text: "Choose Image"
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on("select", function() {
            attachment = custom_uploader.state().get("selection").first().toJSON();
            jQuery("#" + input_id).val(attachment.url);
            jQuery("#" + input_id).parent().children(".wave-upload-image-button").value("Choose Different Image");
            jQuery("#" + input_id).parent().children(".wave-admin-image-preview").html('<img src="' + attachment.url + '" />');
        });
 
        //Open the uploader dialog
        custom_uploader.open();
 
    });


    //***************************************
    // Analytics Graph
    //***************************************
        var analytics_input      = jQuery("#wave-dashboard-analytics").data("input");
        var analytics_input_last = jQuery("#wave-dashboard-analytics").data("input-last");
        var style_colour         = jQuery("#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu").css("background-color");

        if(jQuery("#wave-dashboard-analytics").length) {
        jQuery("#wave-dashboard-analytics").highcharts({
            chart: {
                type: 'area'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    formatter: function() {
                        return this.value;
                    }
                }
            },
            yAxis: {
                title: {
                    text: ''
                },
                labels: {
                    formatter: function() {
                        return this.value;
                    }
                }
            },
            tooltip: {
                headerFormat: '{point.x}th<br/>',
                pointFormat: '<span style="color: ' + style_colour + '">{series.name}</span> : <b>{point.y:,.0f}</b><br/>',
                shared: true,
                crosshairs: true,
                borderRadius: 0
            },
            plotOptions: {
                area: {
                    pointStart: 1,
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 2,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [{
                name: 'This Month',
                data: analytics_input,
                color: style_colour,
                zIndex: 1,
		    	marker: {
		    		fillColor: 'white',
		    		lineWidth: 2,
		    		lineColor: style_colour
		    	}
            }, {
                name: 'Last Month',
                data: analytics_input_last,
                color: "#f0f0f0",
                zIndex: 1,
		    	marker: {
		    		fillColor: 'white',
		    		lineWidth: 2,
		    		lineColor: "#f0f0f0"
		    	}
            }],
            credits: {
                enabled: false
            }
        });
        }
    
});