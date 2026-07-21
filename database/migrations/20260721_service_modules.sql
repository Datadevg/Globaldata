SET NAMES utf8mb4;

CREATE TABLE IF NOT EXISTS service_module_migrations (
    version VARCHAR(64) PRIMARY KEY,
    applied_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    notes TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT IGNORE INTO service_module_migrations (version, notes)
VALUES ('20260721_service_modules', 'phpMyAdmin import for SIM hosting, NIN verification, and BVN verification modules');

CREATE TABLE IF NOT EXISTS sim_hosting_providers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    code VARCHAR(100) NOT NULL,
    service_type VARCHAR(30) NOT NULL DEFAULT 'sim',
    endpoint TEXT,
    api_key VARCHAR(255) DEFAULT '',
    priority INT DEFAULT 1,
    status VARCHAR(20) DEFAULT 'On',
    config_json TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS sim_hosting_devices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    provider_id INT DEFAULT 0,
    name VARCHAR(100) NOT NULL,
    slot VARCHAR(50) DEFAULT 'auto',
    network VARCHAR(50) DEFAULT 'MTN',
    status VARCHAR(20) DEFAULT 'Active',
    metadata TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS sim_hosting_transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sId INT DEFAULT 0,
    transref VARCHAR(100) NOT NULL,
    provider_id INT DEFAULT 0,
    provider_name VARCHAR(150) DEFAULT '',
    service_type VARCHAR(30) DEFAULT 'sim',
    phone VARCHAR(20) DEFAULT '',
    network VARCHAR(50) DEFAULT '',
    amount DECIMAL(10,2) DEFAULT 0.00,
    status VARCHAR(30) DEFAULT 'processing',
    response_code VARCHAR(50) DEFAULT '',
    response_msg TEXT,
    retry_count INT DEFAULT 0,
    payload TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS sim_hosting_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transref VARCHAR(100) NOT NULL,
    log_type VARCHAR(50) DEFAULT 'info',
    message TEXT,
    payload TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS sim_hosting_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    value TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS nin_verification_transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sId INT DEFAULT 0,
    transref VARCHAR(100) NOT NULL,
    verification_type VARCHAR(50) DEFAULT 'number',
    value_text TEXT,
    provider_name VARCHAR(150) DEFAULT '',
    amount DECIMAL(10,2) DEFAULT 0.00,
    status VARCHAR(30) DEFAULT 'processing',
    response_msg TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS bvn_verification_transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sId INT DEFAULT 0,
    transref VARCHAR(100) NOT NULL,
    bvn_number VARCHAR(20) DEFAULT '',
    provider_name VARCHAR(150) DEFAULT '',
    amount DECIMAL(10,2) DEFAULT 0.00,
    status VARCHAR(30) DEFAULT 'processing',
    response_msg TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Guarded column additions for existing installations
SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'sim_hosting_transactions' AND COLUMN_NAME = 'provider_id');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE sim_hosting_transactions ADD COLUMN provider_id INT DEFAULT 0', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'sim_hosting_transactions' AND COLUMN_NAME = 'provider_name');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE sim_hosting_transactions ADD COLUMN provider_name VARCHAR(150) DEFAULT ""', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'sim_hosting_transactions' AND COLUMN_NAME = 'service_type');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE sim_hosting_transactions ADD COLUMN service_type VARCHAR(30) DEFAULT "sim"', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'sim_hosting_transactions' AND COLUMN_NAME = 'phone');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE sim_hosting_transactions ADD COLUMN phone VARCHAR(20) DEFAULT ""', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'sim_hosting_transactions' AND COLUMN_NAME = 'network');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE sim_hosting_transactions ADD COLUMN network VARCHAR(50) DEFAULT ""', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'sim_hosting_transactions' AND COLUMN_NAME = 'amount');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE sim_hosting_transactions ADD COLUMN amount DECIMAL(10,2) DEFAULT 0.00', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'sim_hosting_transactions' AND COLUMN_NAME = 'status');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE sim_hosting_transactions ADD COLUMN status VARCHAR(30) DEFAULT "processing"', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'sim_hosting_transactions' AND COLUMN_NAME = 'response_code');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE sim_hosting_transactions ADD COLUMN response_code VARCHAR(50) DEFAULT ""', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'sim_hosting_transactions' AND COLUMN_NAME = 'response_msg');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE sim_hosting_transactions ADD COLUMN response_msg TEXT', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'sim_hosting_transactions' AND COLUMN_NAME = 'retry_count');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE sim_hosting_transactions ADD COLUMN retry_count INT DEFAULT 0', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'sim_hosting_transactions' AND COLUMN_NAME = 'payload');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE sim_hosting_transactions ADD COLUMN payload TEXT', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'nin_verification_transactions' AND COLUMN_NAME = 'verification_type');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE nin_verification_transactions ADD COLUMN verification_type VARCHAR(50) DEFAULT "number"', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'nin_verification_transactions' AND COLUMN_NAME = 'value_text');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE nin_verification_transactions ADD COLUMN value_text TEXT', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'nin_verification_transactions' AND COLUMN_NAME = 'provider_name');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE nin_verification_transactions ADD COLUMN provider_name VARCHAR(150) DEFAULT ""', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'nin_verification_transactions' AND COLUMN_NAME = 'amount');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE nin_verification_transactions ADD COLUMN amount DECIMAL(10,2) DEFAULT 0.00', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'nin_verification_transactions' AND COLUMN_NAME = 'status');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE nin_verification_transactions ADD COLUMN status VARCHAR(30) DEFAULT "processing"', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'nin_verification_transactions' AND COLUMN_NAME = 'response_msg');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE nin_verification_transactions ADD COLUMN response_msg TEXT', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'bvn_verification_transactions' AND COLUMN_NAME = 'bvn_number');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE bvn_verification_transactions ADD COLUMN bvn_number VARCHAR(20) DEFAULT ""', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'bvn_verification_transactions' AND COLUMN_NAME = 'provider_name');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE bvn_verification_transactions ADD COLUMN provider_name VARCHAR(150) DEFAULT ""', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'bvn_verification_transactions' AND COLUMN_NAME = 'amount');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE bvn_verification_transactions ADD COLUMN amount DECIMAL(10,2) DEFAULT 0.00', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'bvn_verification_transactions' AND COLUMN_NAME = 'status');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE bvn_verification_transactions ADD COLUMN status VARCHAR(30) DEFAULT "processing"', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @col_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'bvn_verification_transactions' AND COLUMN_NAME = 'response_msg');
SET @stmt := IF(@col_exists = 0, 'ALTER TABLE bvn_verification_transactions ADD COLUMN response_msg TEXT', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Guarded index additions
SET @idx_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.STATISTICS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'sim_hosting_providers' AND INDEX_NAME = 'idx_sim_hosting_providers_type_status');
SET @stmt := IF(@idx_exists = 0, 'ALTER TABLE sim_hosting_providers ADD INDEX idx_sim_hosting_providers_type_status (service_type, status)', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.STATISTICS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'sim_hosting_devices' AND INDEX_NAME = 'idx_sim_hosting_devices_provider_status');
SET @stmt := IF(@idx_exists = 0, 'ALTER TABLE sim_hosting_devices ADD INDEX idx_sim_hosting_devices_provider_status (provider_id, status)', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.STATISTICS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'sim_hosting_transactions' AND INDEX_NAME = 'idx_sim_hosting_transactions_user_ref');
SET @stmt := IF(@idx_exists = 0, 'ALTER TABLE sim_hosting_transactions ADD INDEX idx_sim_hosting_transactions_user_ref (sId, transref)', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.STATISTICS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'sim_hosting_logs' AND INDEX_NAME = 'idx_sim_hosting_logs_transref');
SET @stmt := IF(@idx_exists = 0, 'ALTER TABLE sim_hosting_logs ADD INDEX idx_sim_hosting_logs_transref (transref, created_at)', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.STATISTICS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'nin_verification_transactions' AND INDEX_NAME = 'idx_nin_verification_transactions_user_ref');
SET @stmt := IF(@idx_exists = 0, 'ALTER TABLE nin_verification_transactions ADD INDEX idx_nin_verification_transactions_user_ref (sId, transref)', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.STATISTICS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'bvn_verification_transactions' AND INDEX_NAME = 'idx_bvn_verification_transactions_user_ref');
SET @stmt := IF(@idx_exists = 0, 'ALTER TABLE bvn_verification_transactions ADD INDEX idx_bvn_verification_transactions_user_ref (sId, transref)', 'SELECT 1');
PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Default data for configuration and provider routing
INSERT IGNORE INTO sim_hosting_settings (name, value) VALUES
('sim_hosting_price', '0'),
('nin_verification_price', '150'),
('bvn_verification_price', '150'),
('sim_provider_endpoint', ''),
('sim_provider_api_key', '');

INSERT IGNORE INTO sim_hosting_providers (name, code, service_type, endpoint, api_key, priority, status, config_json) VALUES
('System Queue', 'system', 'sim', '', '', 1, 'Off', '{"mode":"queued"}'),
('System Queue', 'system-nin', 'nin', '', '', 1, 'Off', '{"mode":"queued"}'),
('System Queue', 'system-bvn', 'bvn', '', '', 1, 'Off', '{"mode":"queued"}');
