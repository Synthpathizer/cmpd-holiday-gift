# CMPD Explorers Christmas Project 2017

This application, developed by [Code for Charlotte], helps automate
the [CMPD Explorers Christmas Project].

# Getting Started

Node 8 is **required**. We recommend at least Node 8.4.0. You should use [nvm](https://github.com/creationix/nvm) to install and use the appripriate version of Node on a per-project basis.

See [Dependencies Documentation](#dependencies-documentation) below for more information
on the dependencies we use.

* Clone from github: `git clone https://github.com/CodeForCharlotte/cmpd-holiday-gift.git && cd cmpd-holiday-gift`
* Run `nvm use` to ensure you're using the appropriate Node version for the project.
* Run `npm install` to install the dependencies.
* Copy `env.example.js` to `env.js`.
* Run `npm run start-client` to start the front-end in development mode. Access the application at http://localhost:3000. 
* In a separate terminal (re-run `nvm use` if needed) run `npm run nodemon-server` to start the back-end in development mode. The back end runs on port 3001 and the development mode front-end server will act as a reverse proxy for it. If you get an error
saying you need to install sqlite3 manually, run `npm install sqlite3`.
* Run `npm run seed-server` to generate sample data.

Read [Front end development notes here](#front-end-development).

Read [Back end development notes here](#back-end-development).

## Checking out the old codebase

To access the PHP version of the project from 2016 you can run `git checkout 1.3.2`. It's recommended to clone a separate copy of the repository for when you need to access the original application to research and port features. 

## Troubleshooting

### Resetting your database

When you pull changes to the database schema or sample data the application may stop working. When this occurs you need
to delete the SQLite database in `run/` and restart your server instance. After restarting the server be sure to
seed the database using `npm run seed-server`. You should now be good to keep going!

# Build for Production

To prepare the server for production, run `npm run build`.

Optionally run `npm prune --production`.

Start the production-mode server with `NODE_ENV=production npm run start-server`

# Front-end development

Static assets are in `public/`. The react app is in `src/`.

All front-end dependencies should be added using `npm install
--save-dev`. They will be bundled into `build/` in production mode.

# Back end development

The entire backend source is in `server/`. The dependencies and
scripts are in `package.json`. The logs, database and temporary test
files are placed in `run/`.

Optionally, set up a [mailtrap.io] account if you are working on
emails. Put your account info in `env.js` (see `env.example.js` for an
example).

Seed database: `node seed-server`

Run tests: `npm test-server`

Why we chose Node.js over PHP: https://medium.com/fuzz/php-a0d0b1d365d8

## Back End Configuration

The default configuration is stored in `server/config/env.default.js`.

The values can be overridden in `server/env.js`. See `server/env.example.js` for examples.

The tests ignore `server/env.js` and use the values from `server/config/env.default.js` instead.

## Models

Each file in `server/models/` describes a different table.

### Private Fields

The `private: true` property prevents a field from being output as JSON in API responses.

### Encrypted Fields

The `encrypt: true` property causes the field to be encrypted before storing it into the database.

# Tests, types and lint

Before pushing your code or sending a pull request, make sure the
tests pass and let [ESLint] clean up your code.

* To test the front-end: `npm run test-client`
* To test the back-end: `npm run test-server`
* To run eslint: `npm run lint`. 
* To run the [flow] type-checker: `npm run flow`

# Dependencies Documentation

The backend is an [Express] application running in [Node]. Some newer
[ES6 features] are used.

Authentication is provided by [express-jwt] and [node-jsonwebtoken]. Passwords are encrypted using [bcrypt].

Data is stored in an [Sqlite] database using the [Sequelize] ORM. Some of
the fields are encrypted using [sequelize-encrpyted].

Email is sent using [nodemailer]. Email templates are rendered with
[Mustache]. For development, we use [mailtrap.io] to test sending
emails.

The frontend is written with [React]. It is scaffolded using
[create-react-app]. The theme is [AdminLTE], based on
[Bootstrap 3]. To use bootstrap components, use [react-bootstrap].
We're using [styled-components] for custom styles (in place of LESS / SCSS).

Back end tests are run using [Jasmine].

Coding style is enforced by [eslint].

# Get Involved

* Join us on Slack: http://codeforcharlotte.org/slack
* Slack channel: https://codeforclt.slack.com/messages/C0A7A7C6L/
* Issue tracker: https://codeforcharlotte.atlassian.net/wiki/display/GIFT/CMPD+Winter+Gift+Project
* Work with us in-person at our next MeetUp! https://www.meetup.com/Code-For-Charlotte/


[Code for Charlotte]: http://www.codeforcharlotte.org/
[CMPD Explorers Christmas Project]: http://charlottenc.gov/CMPD/Organization/Pages/SupportSvcs/Explorer_XmasProject.aspx
[Node]: https://nodejs.org/dist/latest-v6.x/docs/api/
[Express]: https://expressjs.com/en/4x/api.html
[ES6 features]: https://github.com/lukehoban/es6features
[express-jwt]: https://github.com/auth0/express-jwt
[node-jsonwebtoken]: https://github.com/auth0/node-jsonwebtoken
[bcrypt]: https://en.wikipedia.org/wiki/Bcrypt
[Sqlite]: https://sqlite.org/docs.html
[Sequelize]: http://docs.sequelizejs.com/en/v3/
[sequelize-encrpyted]: https://github.com/defunctzombie/sequelize-encrypted
[mailtrap.io]: https://mailtrap.io
[nodemailer]: https://nodemailer.com/
[React]: https://facebook.github.io/react/
[react-bootstrap]: https://react-bootstrap.github.io/
[styled-components]: https://github.com/styled-components/styled-components
[create-react-app]: https://github.com/facebookincubator/create-react-app
[AdminLTE]: https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html
[Bootstrap 3]: http://getbootstrap.com/getting-started/
[Jasmine]: https://jasmine.github.io/1.3/introduction
[eslint]: http://eslint.org/docs/user-guide/getting-started
[NodeJS 7]: https://nodejs.org/en/download/current/
[Mustache]: https://www.npmjs.com/package/mustache
[ESLint]: https://eslint.org/docs/user-guide/getting-started