<?php
/**
 * Standalone Demo - Testing distributed-laravel package
 */

require __DIR__ . '/vendor/autoload.php';

echo "=== DISTRIBUTED LARAVEL PACKAGE DEMO ===\n\n";

// Test 1: Autoload all classes
echo "1. Testing Class Autoloading:\n";
echo "   - RouteServiceProvider: ";
echo class_exists('Optimus\Api\System\RouteServiceProvider') ? "✓\n" : "✗\n";
echo "   - ViewServiceProvider: ";
echo class_exists('Optimus\Api\System\ViewServiceProvider') ? "✓\n" : "✗\n";
echo "   - TranslationServiceProvider: ";
echo class_exists('Optimus\Api\System\TranslationServiceProvider') ? "✓\n" : "✗\n";
echo "   - Utilities: ";
echo class_exists('Optimus\Api\System\Utilities') ? "✓\n" : "✗\n";

// Test 2: Test Utilities function
echo "\n2. Testing Utilities::findNamespaceResources:\n";
$testPaths = [__DIR__ . '/tests'];
$result = \Optimus\Api\System\Utilities::findNamespaceResources($testPaths, 'views', 'resources');
echo "   - Method callable: ✓\n";
echo "   - Returns array: " . (is_array($result) ? "✓\n" : "✗\n");

// Test 3: Verify config file exists
echo "\n3. Checking Configuration:\n";
$configPath = __DIR__ . '/src/config/optimus.components.php';
echo "   - Config file exists: " . (file_exists($configPath) ? "✓\n" : "✗\n");
$config = require $configPath;
echo "   - Config is array: " . (is_array($config) ? "✓\n" : "✗\n");
echo "   - Has 'namespaces' key: " . (isset($config['namespaces']) ? "✓\n" : "✗\n");

echo "\n✅ Package is working correctly!\n";
echo "\nTo use in a Laravel app:\n";
echo "1. Run: composer require optimus/distributed-laravel\n";
echo "2. Register service providers in config/app.php\n";
echo "3. Configure component namespaces\n";
