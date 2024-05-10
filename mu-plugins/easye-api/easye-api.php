<?php
/*
Plugin Name: EasyE API
Description: Plugin for handling EasyE API integration.
Version: 1.0
*/

// Add the plugin settings page
add_action('admin_menu', 'easye_api_add_admin_menu');
add_action('admin_init', 'easye_api_settings_init');

function easye_api_add_admin_menu()
{
    add_options_page('EasyE API', 'EasyE API', 'manage_options', 'easye_api', 'easye_api_options_page');
}

function easye_api_settings_init()
{
    register_setting('easye_api', 'easye_api_key');
    add_settings_section('easye_api_section', 'EasyE API Settings', 'easye_api_section_callback', 'easye_api');
    add_settings_field('easye_api_key', 'API Key', 'easye_api_key_render', 'easye_api', 'easye_api_section');
}

function easye_api_key_render()
{
    $api_key = get_option('easye_api_key');
    echo "<input type='text' name='easye_api_key' value='$api_key' />";
}

function easye_api_section_callback()
{
    echo 'Enter your EasyE API key below:';
}

function easye_api_options_page()
{
    ?>
    <div>
        <h2>EasyE API Settings</h2>
        <form action="options.php" method="post">
            <?php
            settings_fields('easye_api');
            do_settings_sections('easye_api');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Handle form submission
add_action('gform_after_submission_2', 'send_to_erp', 10, 2);

function send_to_erp($entry, $form)
{
    $url = 'https://easye-energialaskuri-stag.taitodev.com/api/orders';
    $api_key = get_option('easye_api_key'); // Retrieve the API key from plugin settings
    $boundary = 'EasyE';

    $headers = array(
        'Content-Type' => 'multipart/form-data; boundary=' . $boundary,
        'easye-api-key' => $api_key
    );

    $values = array(
        'katuosoite' => rgar($entry, '6.1'),
        'postinumero' => rgar($entry, '6.5'),
        'postitoimipaikka' => rgar($entry, '6.3'),
        'ordererFirstName' => rgar($entry, '1.3'),
        'ordererLastName' => rgar($entry, '1.6'),
        'ordererEmail' => rgar($entry, '4'),
        'ordererPhoneNumber' => rgar($entry, '3'),
        'ordererBusinessId' => rgar($entry, '25')
    );

    $files = array(
        'file1' => $_FILES['8'],
        'file2' => $_FILES['9']
    );

    $body = '';

    // Add values as JSON
    $body .= '--' . $boundary . "\r\n";
    $body .= 'Content-Disposition: form-data; name="values"' . "\r\n";
    $body .= 'Content-Type: application/json' . "\r\n\r\n";
    $body .= wp_json_encode($values) . "\r\n";

    // Add files
    foreach ($files as $name => $file_path) {
        if (!empty($file_path)) {
            $file_name = basename($file_path);
            $file_type = mime_content_type($file_path);

            $body .= '--' . $boundary . "\r\n";
            $body .= 'Content-Disposition: form-data; name="' . $name . '"; filename="' . $file_name . "\"\r\n";
            $body .= 'Content-Type: ' . $file_type . "\r\n\r\n";
            $body .= file_get_contents($file_path) . "\r\n";
        }
    }

    $body .= '--' . $boundary . '--' . "\r\n";

    $response = wp_remote_post($url, array(
        'headers' => $headers,
        'body' => $body
    ));

    if (is_wp_error($response)) {
        $error_message = $response->get_error_message();
        echo 'Error: ' . $error_message;
    } else {
        $response_code = wp_remote_retrieve_response_code($response);
        $response_body = wp_remote_retrieve_body($response);

        // echo 'Form submitted successfully!<br>';
        // echo 'Server Response Code: ' . $response_code . '<br>';
        // echo 'Server Response Body: ' . $response_body;

        // Output submitted data
        // echo 'Submitted Data:<br>';
        // foreach ($values as $key => $value) {
        //     echo $key . ': ' . $value . '<br>';
        // }

        // Output file information
        // foreach ($files as $file_name => $file) {
        //     echo 'File Name: ' . $file_name . '<br>';
        //     echo 'File Type: ' . $file['type'] . '<br>';
        //     echo 'File Size: ' . $file['size'] . ' bytes<br>';
        //     echo 'Temporary File Path: ' . $file['tmp_name'] . '<br>';
        //     // If you want to display a link to the file, uncomment the following line
        //     // echo 'File URL: ' . wp_get_attachment_url($file['attachment_id']) . '<br>';
        //     echo '<br>';
        // }
    }
}

add_action('gform_notification', 'send_to_erp_after_notification', 10, 3);

function send_to_erp_after_notification($notification, $form, $entry)
{
    send_to_erp($entry, $form);
}

add_action('gform_after_submission_3', 'send_to_erp_form_3', 10, 2);

function send_to_erp_form_3($entry, $form)
{
    $url = 'https://easye-energialaskuri-stag.taitodev.com/api/orders';
    $api_key = get_option('easye_api_key'); // Retrieve the API key from plugin settings
    $boundary = 'EasyE';

    $headers = array(
        'Content-Type' => 'multipart/form-data; boundary=' . $boundary,
        'easye-api-key' => $api_key
    );

    $values = array(
        'katuosoite' => rgar($entry, '6.1'),
        'postinumero' => rgar($entry, '6.5'),
        'postitoimipaikka' => rgar($entry, '6.3'),
        'ordererFirstName' => rgar($entry, '1.3'),
        'ordererLastName' => rgar($entry, '1.6'),
        'ordererEmail' => rgar($entry, '3'),
        'ordererPhoneNumber' => rgar($entry, '4')
    );

    $files = array(
        'file1' => $_FILES['2_8'],
        'file2' => $_FILES['2_9']
    );

    $body = '';

    // Add values as JSON
    $body .= '--' . $boundary . "\r\n";
    $body .= 'Content-Disposition: form-data; name="values"' . "\r\n";
    $body .= 'Content-Type: application/json' . "\r\n\r\n";
    $body .= wp_json_encode($values) . "\r\n";

    // Add files
    foreach ($files as $file) {
        $file_path = $file['tmp_name'];
        $file_name = $file['name'];
        $file_type = $file['type'];

        $body .= '--' . $boundary . "\r\n";
        $body .= 'Content-Disposition: form-data; name="' . $file_name . "\"\r\n";
        $body .= 'Content-Type: ' . $file_type . "\r\n\r\n";
        $body .= file_get_contents($file_path) . "\r\n";
    }

    $body .= '--' . $boundary . '--' . "\r\n";

    $response = wp_remote_post($url, array(
        'headers' => $headers,
        'body' => $body
    ));

    if (is_wp_error($response)) {
        $error_message = $response->get_error_message();
        echo 'Error: ' . $error_message;
    } else {
        $response_code = wp_remote_retrieve_response_code($response);
        $response_body = wp_remote_retrieve_body($response);

        // echo 'Form submitted successfully!<br>';
        // echo 'Server Response Code: ' . $response_code . '<br>';
        // echo 'Server Response Body: ' . $response_body;
    }
}
