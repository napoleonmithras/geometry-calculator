# Geometry Calculator

A modern web application for calculating geometric properties of circles and triangles, built with Symfony and modern web technologies.

## Features

- Calculate properties of geometric shapes:
  - Circle: area, diameter, circumference
  - Triangle: area, diameter (longest side), perimeter
- Combined shape calculations:
  - Sum of areas between any two shapes
  - Sum of diameters between any two shapes
- Real-time calculations via API endpoints
- Modern, responsive UI with interactive elements
- Input validation and error handling
- Support for calculating combined properties of shapes

## API Documentation

### Endpoints

#### Circle Calculations
`GET /circle/{radius}`
- Input: radius (positive float)
- Returns: `{ surface, circumference, radius }`
- Example: `/circle/5.0` → `{ "surface": 78.54, "circumference": 31.42, "radius": 5.0 }`

#### Triangle Calculations
`GET /triangle/{a}/{b}/{c}`
- Input: three sides (positive floats)
- Returns: `{ surface, circumference, a, b, c }`
- Example: `/triangle/3/4/5` → `{ "surface": 6.0, "circumference": 12.0, "a": 3, "b": 4, "c": 5 }`

#### Combined Calculations
`GET /combined/{radius}/{a}/{b}/{c}`
- Input: circle radius and triangle sides
- Returns: `{ totalArea, totalDiameter }`
- Example: `/combined/5/3/4/5` → `{ "totalArea": 84.54, "totalDiameter": 15.0 }`

### Error Handling
All endpoints return:
- 200 OK for success
- 400 Bad Request with `{ "error": "message" }` for invalid inputs

## Tech Stack

- PHP 8.x
- Symfony 6.x
- Bootstrap 5
- Font Awesome 6
- JavaScript (ES6+)

## Installation

1. Clone the repository
2. Run `composer install`
3. Configure `.env.local`
4. Start server: `symfony server:start`

## Testing
Run tests with:

### Basic Test Commands

```bash
# Run all tests
php bin/phpunit