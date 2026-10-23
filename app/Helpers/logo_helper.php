<?php

if (!defined('DEFAULT_ENTITY_NAME')) {
    define('DEFAULT_ENTITY_NAME', 'PT JAKARTA INTERNATIONAL EXPO');
}

if (!function_exists('entityName')) {
    function entityName($entityName = null)
    {
        // 🔥 handle null / kosong → default entity
        $entityName = is_string($entityName) ? trim($entityName) : $entityName;

        return empty($entityName) ? DEFAULT_ENTITY_NAME : $entityName;
    }
}

if (!function_exists('getEntityLogo')) {
    function getEntityLogo($entityName = null)
    {
        foreach ([entityName($entityName), DEFAULT_ENTITY_NAME] as $baseName) {
            $fileNames = [
                $baseName . '.png',
                str_replace(' ', '_', $baseName) . '.png',
                strtolower(str_replace(' ', '_', $baseName)) . '.png',
            ];

            foreach ($fileNames as $file) {
                $path = public_path('images/logo/' . $file);
                if (file_exists($path)) {
                    return url('public/images/logo/' . $file);
                }
            }
        }

        return url('public/images/email_header.png'); // default
    }
}
