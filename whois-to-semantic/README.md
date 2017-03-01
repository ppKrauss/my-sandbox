# whois-to-semantic

There are a lot of "good" WHOIS interpreters, like [python-whois](https://github.com/joepie91/python-whois) or [phpWhois](https://github.com/phpWhois/phpWhois), but each has its own interpretation of the fields and use different JSON fields and JSON structures... 

In this project we are looking for a ["Rosetta Stone"](https://en.wikipedia.org/wiki/Rosetta_Stone) semantic tool... It not exists, so want to build it: any sematic jargon as [SchemaOrg](https://schema.org/) or free RDF/JSON-LD/etc. interpretion, mapping fields of the raw whois file into its semantic.  

## Illustrating

Examples of  **most frequent semantic usage**, and its fieldName-to-Semantic mapping:

* WHOIS field `domain` is [wikidata:Q32635](https://www.wikidata.org/wiki/Q32635) or [uri4uri:Domain](http://uri4uri.net/vocab.html/#Domain).
 
* WHOIS field `owner` is  the *Agent's* [schemaOrg:name](https://schema.org/name). The *Agent* is *legal person* ([wikidata:Q3778211](https://www.wikidata.org/wiki/Q3778211)): a formal [schemaOrg:Organization](https://schema.org/Organization) or a real [schemaOrg:Person](https://schema.org/Person). This *Agent* [schemaOrg:owns](https://schema.org/owns) the *domain* (it is owned by the *Agent*). 
 
* WHOIS field `ownerid` is the *Agent's*  [schemaOrg:vatID](https://schema.org/vatID).

* WHOIS field `country` is  [schemaOrg:Country](https://schema.org/Country)'s [schemaOrg:addressCountry](https://schema.org/addressCountry) of the *Agent* headquarters.

* ... we need  **a lot of another mappings to express** WHOIS fields  &mdash; of all WHOIS authorities, that sometimes changes semantic to more specific interpretation, or create exclusive fields ...

## Objective
To add a JSON-LD semantic layer into the *WHOIS interpreters* for
* standarize the WHOIS-interpreter's algorithms;
* create a way to audit the WHOIS data;
* standarize algorithms to translate the standard JSON-LD WHOIS semantic into other semantic expressions (RDF, Microdata, etc.), and the full WHOIS text into HTML5 with Microdata page.

Indirect goals are also related  to enhance the "WHOIS to RDAP transition":
* offer an usable (*[de facto](https://en.wikipedia.org/wiki/De_facto_standard)*) intermediary  standard, between WHOIS protocol and [HTTP RDAP](https://tools.ietf.org/html/rfc7480) protocols, for WHOIS audit and content presentation.  
* offer a [maturity intermediary](https://en.wikipedia.org/wiki/Capability_Maturity_Model) for RDAP.
