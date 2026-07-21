# Database migrations

Run the following command to apply the service-module schema safely on the hosting environment that already has the live database connection configured:

php database/run_service_module_migration.php

## Production deployment notes
- The implementation is wired into the existing admin, mobile, controller, and model architecture and does not require installing extra PHP packages or changing the local Codespaces environment.
- The runtime database validation in this container is limited because the PHP MySQL driver is not available here (`could not find driver`).
- The remaining deployment checks should be run on the real hosting server where the production database exists:
  1. Run the migration command above.
  2. Open the admin dashboard and confirm the new service pages load.
  3. Create a test provider entry for SIM, NIN, and BVN flows.
  4. Submit a test transaction from the mobile user pages and confirm it is recorded with the expected wallet deduction and transaction reference.
