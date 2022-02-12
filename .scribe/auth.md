# Authenticating requests

Authenticate requests to this API's endpoints by sending an **`Authorization`** header with the value **`"Bearer {YOUR_AUTH_KEY}"`**.

All authenticated endpoints are marked with a `requires authentication` badge in the documentation below.

API tokens are generated from the CLI using "php artisan token:issue."
