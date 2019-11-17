<?php
    // Simple function to page redirect
    function redirect($page) {
        header('location:' . URLROOT . $page);
    }