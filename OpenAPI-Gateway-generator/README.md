This project solves some usual API Gateway drawbacks. There are many ways to implement an *API Gateway* at server-side... Imagining it as a simple *router*, there are two ways: as a independent software package (like [npmjs.com/http-proxy](https://www.npmjs.com/package/http-proxy)), and  as an application of the  [web server](https://en.wikipedia.org/wiki/Web_server) (eg. Nginx or Apache), by its rewrite module for [reverse proxy](https://en.wikipedia.org/wiki/Reverse_proxy).  

![](assets/Reverse_proxy2.svg.png)

This project is an specialilized solution for [Nginx](http://nginx.org/) &mdash; that use a script language to express reverse-proxy and implement it. The main software piece here is a **[code generator](https://en.wikipedia.org/wiki/Code_generation_(compiler)) for [Nginx rewrite module](http://nginx.org/en/docs/http/ngx_http_rewrite_module.html)**.  This project also uses  [_convention over configuration_](https://en.wikipedia.org/wiki/Convention_over_configuration) principle to merge some conventions to the code generation, reducing scope without lost of usability. The main convention is that **all APIs**, to be grouped by the gateway, **are specified in [OpenAPI JSON files](https://www.openapis.org/specification/repo)**.

## Motivations

The agregation of microservices in the server must be easy, and, when microservices are OpenAPI specifications, must be plug-and-play... And not something vendor-dependent (as Amazon, APIumbrella, TYK, etc. solutions).  The most "independent and popular" way is by Nginx (or Apache) rewrite script. It is perfect, but have some drawbacks:<sup>[1]</sup>

* the API Gateway itself (as another highly available component) must be developed, deployed, and managed. 
* a risk that the API Gateway becomes a development bottleneck &mdash; developers must update the API Gateway in order to expose each microservice’s endpoints... and developers will be forced to wait in line in order to update the gateway.

Other important motivation was the need (in [agile developing](https://en.wikipedia.org/wiki/Agile_software_development) and [prototyping](https://en.wikipedia.org/wiki/Software_prototyping)) for tests and generalized *endpoints*, as offered by [PostREST](https://postgrest.com) and similar back-end solutions.<sup>[2]</sup> 

## Approach and implementation

The [swagger.io/tools](http://swagger.io/tools/) implements  its code generation with [Mustache](https://mustache.github.io/),  and developing templates with sucess by [collaborative development model](https://github.com/swagger-api/swagger-codegen/blob/master/CONTRIBUTING.md). So, the purpose here is to use Mustache and gradual-collaborative growing.

### Illustrating
... source-code examples and diagrams...

## Summarizing

The API Gateway acts as a dedicated orchestration layer for all your backend APIs, to separate orchestration from implementation concerns. The gateway is a Nginx script generated from the OpenAPI specifications of each microservice (adding some `x-` properties when need), and the `openapi-gateway.json` file.

Leverages the governance capabilities of the API Manager, so that you can apply throttling, security, and other policies to your APIs.

## Usage

```sh
node api-gateway-codegen.js --help 
```
## References

1. [nginx.com/blog](https://www.nginx.com/blog/building-microservices-using-an-api-gateway/), "Building Microservices: Using an API Gateway". 

2. [PostgREST-writeAPI project](https://github.com/ppKrauss/PostgREST-writeAPI#motivations), "Motivations".

3. [wikipedia.org](https://en.wikipedia.org/wiki/Composite_pattern), "Composite pattern". Definition.

4. [yosriady/api-development-tools](https://github.com/yosriady/api-development-tools#api-gateways), "HTTP API Development Tools/API Gateways". A list of interesting API Gateways.

5. [auth0.com/blog](https://auth0.com/blog/an-introduction-to-microservices-part-2-API-gateway/), "API Gateway - An Introduction to Microservices, Part 2 / What is an API gateway and why use it?".

Similar projects or product modules with similar function:
* [APIumbrella.io](https://apiumbrella.io) (see https://github.com/NREL/api-umbrella)
* [Amazon's AWS API-Gateway](https://aws.amazon.com/pt/api-gateway/)
* [tyk.io](https://tyk.io) (see gateway building)
* [memcached.org](http://www.memcached.org/)
* https://github.com/ppKrauss/PostgREST-writeAPI
* https://github.com/antirez/redis
* https://github.com/twitter/twemproxy

Auxiliar references:
* swagger-codegen's [Mustache-Template-Variables extractor](https://github.com/swagger-api/swagger-codegen/wiki/Mustache-Template-Variables).
* ...
