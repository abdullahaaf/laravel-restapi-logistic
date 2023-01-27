
# Example Handling Logistic data using Laravel, implement with Rest API and MongoDB

## API Postman Documentation
https://documenter.getpostman.com/view/2479819/2s8ZDd1LUh

## API Reference

#### Get all logistic data

```http
  GET /api/packages
```

#### Get certain logistic

```http
  GET /api/packages/{package}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `package`      | `integer` | **Required**. Fill with customer code |

#### Add new Logistic Data

```http
  POST /api/packages
```

#### Update Certain Logistic Data
```http
  PUT /api/packages/{package}
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `package`      | `integer` | **Required**. Fill with customer code |

#### Add koli data to certain Logistic Data
```http
  PATCH /api/kolidata/{customercode}
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `customercode`      | `integer` | **Required**. Fill with customer code |

#### Delete certain Logistic Data
```http
  DELETE /api/packages/{package}
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `package`      | `integer` | **Required**. Fill with customer code |


## Installation

1. Clone this repository
2. Make sure you already create mongodb cluster on atlas or on other mongodb cloud service, and activate php extension for mongodb
3. Enter to the project folder, and run command

```bash
  composer install 
```
4. Setup your env

```bash
DB_CONNECTION=mongodb
DB_HOST=<mongodb atlas cluster host>
DB_PORT=27017
DB_DATABASE=<mongodb database name>
DB_USERNAME=<mongodb database username>
DB_PASSWORD=<mongodb database password>
API_TOKEN=<fill with static jwt>
```
5. Run command 
```bash
php artisan serve
```

6. To run unit testing, simply with this command 
```bash
php artisan test --filter PackageTest
```
