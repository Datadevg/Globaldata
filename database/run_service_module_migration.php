<?php
require_once __DIR__ . '/../core/Models/Model.php';
require_once __DIR__ . '/../core/Models/ApiModel.php';
require_once __DIR__ . '/../core/Models/ServiceModulesModel.php';

try {
    $pdo = new PDO(
        'mysql:host=' . Model::$host . ';dbname=' . Model::$dbName,
        Model::$username,
        Model::$password,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );

    $executed = ServiceModulesModel::applyDatabaseMigrations($pdo);
    echo $executed ? "Service module migration completed successfully (or was already applied).\n" : "Service module migration did not apply.\n";
} catch (Throwable $e) {
    echo 'Migration failed: ' . $e->getMessage() . "\n";
    exit(1);
}
