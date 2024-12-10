<?php
function phcreativeblog_add_customizer_top_link() {
    ?>
    <script>
        jQuery(document).ready(function($) {
            // Create the link element with a class name
            var link = document.createElement('a');
            link.href = 'https://pixahive.com/themes/ph-creative-blog//'; // Replace with your desired URL
            link.textContent = 'Unlock Everything Go Pro';
            link.className = 'customizer-buy-pro'; // Add your desired class name

            // Create the container div with a class name
            var container = document.createElement('div');
            container.className = 'customizer-buy-pro-container'; // Add your desired class name
            container.appendChild(link);

            // Append the container to the desired location in the Customizer
            $('#customize-theme-controls').prepend(container); // Change this to another desired location if needed
        });
    </script>
    <style>
        /* Add CSS styles for your custom classes here */
        .customizer-buy-pro {
            color: #fff; /* Change the color to your preference */
            text-decoration:none; /* Underline the link */
        }
        
        .customizer-buy-pro-container {
            background:#ff0f4b;
            padding: 15px 15px;
            font-weight:600;
            font-size:16px;
            position: relative;
            top: 0; /* Adjust the positioning as needed */
        }
    </style>
    <?php
}

add_action('customize_controls_print_scripts', 'phcreativeblog_add_customizer_top_link');
