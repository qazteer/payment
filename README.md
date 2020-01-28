## Goal:
# Build API to validate payment information
## Requirements:
```
● Rest API
```
```
● Needs to support data in 2 formats: JSON and XML
```
```
● Needs to authorize request hash from the key, data and timestamp
```
## Supported payment types:
```
● Credit card
○ Credit card number
○ Expiration date
○ CVV2
○ Email
```
```
● Mobile
○ Phone number
```
## Validation:
```
● Credit card:
○ Credit card number based on Luhn's algorithm
○ Expiration date
○ CVV2
○ Email
○ All data is required
```
```
● Mobile
○ Phone number format
```
## Response:
```
● Valid: bool
● Error code: list of error codes based on validation
```
#
```
The result of your work sends by email as a zip archive.
Do not copy/paste solution from the Internet! Instead, you'll be dismissed.
Not allowed using of any open source libs or/and frameworks.
```