# ReliefLink

ReliefLink is split into a Laravel API application and a React single page app:

- `backend/` contains the Laravel application and serves the app shell and API.
- `frontend/` contains the React source and Vite configuration. Vite writes its build to `backend/public/build` for Laravel to serve.

## Setup

1. Configure the root `.env` with a MySQL database and working credentials. The database named by `DB_DATABASE` must exist.
2. From `backend/`, run `composer install` and `php artisan migrate:fresh --seed`.
3. From `frontend/`, run `npm install` and `npm run dev` (or `npm run build`).
4. From `backend/`, run `php artisan serve` and visit the displayed URL.

You can also start Laravel and Vite together by running `composer dev` from `backend/`.

The SPA uses Sanctum personal-access tokens. Tokens are sent as Bearer tokens through the single Axios client, so the frontend and API can be deployed separately by setting `VITE_API_BASE_URL` in the root `.env` to the API's `/api` URL. Client-side role routing is only an experience feature; every protected API endpoint also enforces `auth:sanctum` and role middleware/policies.

Seeded administrator: `admin@relieflink.test` / `password`.

## Main endpoints

- `POST /api/register`, `POST /api/login`, `POST /api/logout`, `GET /api/user`
- Donations and requests: `/api/donations`, `/api/requests`
- Matches and notifications: `/api/matches`, `/api/notifications`
- Administrator functions: `/api/admin/*`

Matching ranks approved requests by urgency and then oldest submission, supports quantity splitting, and records proposed matches transactionally. An admin must confirm each proposal.
