# Cinema Guide API

A simple RESTful API to access cinemas and movies information built with Laravel 4.1.

## API Specification

### Cinemas Listing
- List of available cinemas.
```
/cinemas
```
Sample Response in JSON:
```json
[
  {
    id: 1,
    name: "cinema1",
    address: "address1",
    latitude: "1.000000",
    longitude: "1.000000"
  },
  {
    id: 2,
    name: "cinema2",
    address: "address2",
    latitude: "2.000000",
    longitude: "2.000000"
  },
  {
    id: 3,
    name: "cinema3",
    address: "address3",
    latitude: "3.000000",
    longitude: "3.000000"
  }
]
```
- cinema listing with page
```
/cinemas?page={number}
```
- list of cinemas order by the distance to specified location.
```
cinemas/location/{latitude}/{longitude}/{radius?}
```
> **Note: {radius} is optional parameter in kilometers. API would provide default value if it's omitted. This can be used to find the nearest cinemas to your home.**

Sample Response in JSON:
```json
[
  {
    id: 6,
    name: "cinema6",
    address: "address6",
    latitude: "6.000000",
    longitude: "6.000000",
    distance: 5.89231520115
  },
  {
    id: 4,
    name: "cinema5",
    address: "address5",
    latitude: "5.000000",
    longitude: "5.000000",
    distance: 8.7790829048
  }
]
```

### Cinema Information
- Information about an individual cinema.
```
/cinemas/{name}
```
Sample Response in JSON:
```json
{
  id: 1,
  name: "c1",
  address: "a1",
  latitude: "1.000000",
  longitude: "1.000000"
}
```

### Movie Information
- Information about an individual movie.
```
/movies/{name}
```
Sample Response in JSON:
```json
[
  {
    id: 1,
    title: "movie1"
  },
  {
    id: 2,
    title: "movie2"
  },
  {
    id: 3,
    title: "movie3"
  }
]
```

### Movies Listing at given cinema on given date
- List of movies with session times at specified cinema on specified date in url.
```
/cinemas/{name}/{date}
```
> **Note: {date} could be any date string that is supported by PHP DateTime class. For example, `2014-04-25`, `25 April 2014`, `Today` and `next Sunday`. However, {date} containing `/`(slash) as delimiter would cause a invalid request.**

Sample Response in JSON:
```json
{
  id: 1,
  name: "cinema1",
  address: "address1",
  latitude: "1.000000",
  longitude: "1.000000",
  movies: [
    {
      id: 1,
      title: "movie1",
      session_times: [
        "2014-04-25 09:00:00",
        "2014-04-25 10:00:00"
      ]
    },
    {
      id: 2,
      title: "movie2",
      session_times: [
        "2014-04-25 10:00:00",
        "2014-04-25 11:00:00"
      ]
    }
  ]
}
```

## Authentication
This API is protected by HTTP Basic Authentication. Users must provide valid **username** and **password** to send request. For test purpose, API supplies a test user(`tester/testing`) by default.