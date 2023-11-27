# Documentation of the project

## Getting started
To configure the database, create a DATABASE_URL property in the .env file :
```
# .env (or override DATABASE_URL in .env.local to avoid committing your changes)

# customize this line!
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"

# to use mariadb:
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=mariadb-10.5.8"

# to use sqlite:
# DATABASE_URL="sqlite:///%kernel.project_dir%/var/app.db"

# to use postgresql:
# DATABASE_URL="postgresql://db_user:db_password@127.0.0.1:5432/db_name?serverVersion=11&charset=utf8"

# to use oracle:
# DATABASE_URL="oci8://db_user:db_password@127.0.0.1:1521/db_name"
```

## Database schema
![Alt text](db_schema.png)

## Front-end Routes
| Route        | Description           |
| ------------- |-------------|
| /      | Displays the home page |
| /login      | Displays the login page |
| /register      | Displays the register page |
| /profile      | Displays the profile page |
| /search      | Displays the search page |
| /event      | Displays the event page |