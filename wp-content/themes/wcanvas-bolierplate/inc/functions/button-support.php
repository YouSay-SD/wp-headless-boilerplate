<?php
    //For use it make an acf with field value: $fieldName and display as a group (clone support: buttons).
    //In case you need repeat the same acf on a module enable Prefix Field Names on your button suport clone acf.
    //$cta is a string selectro for ACF
    //$id in case if you need use it
    //$fieldName is for using other field name in case we need repeat on a same module

    function buttonSupport($classes, $fieldName='button_settings', $id=NULL){
        //Find button cta
        if($id || $id != '' || $id != NULL){
            if(get_sub_field($fieldName, $id)){
                $buttonData = get_sub_field($fieldName, $id);
                $showModal = $buttonData['show_modal'];
                $modal = $buttonData['select_your_modal'];
            }else{
                $buttonData = get_field($fieldName, $id);
                $showModal = $buttonData['show_modal'];
                $modal = $buttonData['select_your_modal'];
            }
        }else{
            if(get_sub_field($fieldName)){
                $buttonData = get_sub_field($fieldName);
                $showModal = $buttonData['show_modal'];
                $modal = $buttonData['select_your_modal'];
            }else{
                $buttonData = get_field($fieldName);
                $showModal = $buttonData['show_modal'];
                $modal = $buttonData['select_your_modal'];
            }
        }

        //Print if button have content
        if($buttonData['button-link']){
            //Button modal selector
            if($showModal){
                echo '<button href="' . esc_url($buttonData['button-link']['url']) . '" target="' . esc_attr($buttonData['button-link']['target']) . '" modal="' . esc_attr($modal[0]) . '" class="' . $classes . ' js-modal-contact-open' .  '">' . esc_html($buttonData['button-link']['title']) . '</button>';
            }else{
                echo '<a href="' . esc_url($buttonData['button-link']['url']) . '" target="' . esc_attr($buttonData['button-link']['target']) . '" class="' . $classes . '">' . esc_html($buttonData['button-link']['title']) . '</a>';
            }
        }
        
    }

?>